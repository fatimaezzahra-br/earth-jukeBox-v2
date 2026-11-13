(() => {
    const sections = [...document.querySelectorAll('[data-section]')];
    const navigationButtons = [...document.querySelectorAll('[data-page]')];
    const pageNames = {
        explore: 'Explorer',
        library: 'Bibliothèque',
        geography: 'Géographie',
        compare: 'Comparer',
        studio: 'Studio sonore',
        learn: 'Comprendre',
        share: 'Exporter & partager',
    };
    const toast = document.querySelector('#toast');
    let toastTimer;
    let audioContext;
    let oscillator;
    let gainNode;
    let playTimer;
    let currentObservation = 0;

    function showToast(message) {
        toast.textContent = message;
        toast.classList.add('visible');
        window.clearTimeout(toastTimer);
        toastTimer = window.setTimeout(() => toast.classList.remove('visible'), 3200);
    }

    function navigate(page) {
        const target = document.querySelector(`[data-section="${page}"]`);
        if (!target) return;

        sections.forEach((section) => section.classList.toggle('is-active', section === target));
        navigationButtons.forEach((button) => {
            const active = button.dataset.page === page;
            button.classList.toggle('active', active);
            if (button.closest('.mobile-nav')) {
                button.setAttribute('aria-current', active ? 'page' : 'false');
            }
        });
        document.querySelector('#breadcrumb-current').textContent = pageNames[page];
        document.querySelector('#sidebar').classList.remove('open');
        document.querySelector('#menu-toggle').setAttribute('aria-expanded', 'false');
        history.replaceState(null, '', `#${page}`);
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    navigationButtons.forEach((button) => {
        button.addEventListener('click', () => navigate(button.dataset.page));
    });

    document.querySelectorAll('[data-page-link]').forEach((button) => {
        button.addEventListener('click', () => navigate(button.dataset.pageLink));
    });

    document.querySelector('#menu-toggle').addEventListener('click', (event) => {
        const sidebar = document.querySelector('#sidebar');
        const isOpen = sidebar.classList.toggle('open');
        event.currentTarget.setAttribute('aria-expanded', String(isOpen));
    });

    document.querySelector('#accessibility-toggle').addEventListener('click', (event) => {
        const enabled = document.body.classList.toggle('large-text');
        event.currentTarget.setAttribute('aria-pressed', String(enabled));
        showToast(enabled ? 'Taille de texte augmentée.' : 'Taille de texte standard.');
    });

    const observations = Array.isArray(window.earthObservations) ? window.earthObservations : [];
    const chart = document.querySelector('#main-chart');
    if (chart && observations.length) {
        const values = observations.map((item) => Number(item.temperature));
        const min = Math.min(...values) - 0.8;
        const max = Math.max(...values) + 0.8;
        const points = values.map((value, index) => ({
            x: 8 + (index * 744) / (values.length - 1),
            y: 190 - ((value - min) / (max - min)) * 158,
        }));
        const path = points.map((point, index) => `${index ? 'L' : 'M'}${point.x.toFixed(1)} ${point.y.toFixed(1)}`).join(' ');
        const line = chart.querySelector('.chart-line');
        const area = chart.querySelector('.chart-area');
        const cursor = chart.querySelector('.chart-cursor');
        const dot = chart.querySelector('.chart-dot');
        line.setAttribute('d', path);
        area.setAttribute('d', `${path} L752 200 L8 200 Z`);

        function markObservation(index) {
            const point = points[index];
            cursor.setAttribute('d', `M${point.x} 24V200`);
            dot.setAttribute('cx', point.x);
            dot.setAttribute('cy', point.y);
            currentObservation = index;
            const progress = (index / (points.length - 1)) * 100;
            document.querySelectorAll('.track-bar i').forEach((bar) => {
                bar.style.width = `${Math.max(4, progress)}%`;
            });
        }

        markObservation(0);

        document.querySelectorAll('[data-play]').forEach((button) => {
            button.addEventListener('click', async () => {
                if (!observations.length) return;
                if (playTimer) window.clearInterval(playTimer);
                try {
                    audioContext = audioContext || new (window.AudioContext || window.webkitAudioContext)();
                    await audioContext.resume();
                    if (oscillator) oscillator.stop();
                    oscillator = audioContext.createOscillator();
                    gainNode = audioContext.createGain();
                    oscillator.type = 'sine';
                    oscillator.frequency.value = Number(observations[currentObservation].frequency);
                    gainNode.gain.value = 0.0001;
                    oscillator.connect(gainNode);
                    gainNode.connect(audioContext.destination);
                    oscillator.start();
                    gainNode.gain.setTargetAtTime(0.035, audioContext.currentTime, 0.04);

                    button.dataset.playing = 'true';
                    button.setAttribute('aria-pressed', 'true');
                    showToast('Lecture de la série sonore de démonstration.');
                    playTimer = window.setInterval(() => {
                        currentObservation = (currentObservation + 1) % observations.length;
                        markObservation(currentObservation);
                        oscillator.frequency.setTargetAtTime(Number(observations[currentObservation].frequency), audioContext.currentTime, 0.05);
                    }, 650);
                } catch (error) {
                    showToast('La lecture audio n’est pas disponible dans ce navigateur.');
                }
            });
        });

        document.querySelectorAll('[data-stop]').forEach((button) => {
            button.addEventListener('click', () => {
                window.clearInterval(playTimer);
                playTimer = null;
                if (gainNode && audioContext) gainNode.gain.setTargetAtTime(0.0001, audioContext.currentTime, 0.04);
                if (oscillator) {
                    oscillator.stop();
                    oscillator = null;
                }
                document.querySelectorAll('[data-play]').forEach((playButton) => {
                    delete playButton.dataset.playing;
                    playButton.setAttribute('aria-pressed', 'false');
                });
                showToast('Lecture arrêtée.');
            });
        });
    }

    document.querySelectorAll('[data-export]').forEach((button) => {
        button.addEventListener('click', () => {
            window.location.assign(button.dataset.exportUrl || window.earthExportUrl || '/api/observations/export');
        });
    });

    document.querySelectorAll('[data-toast]').forEach((button) => {
        button.addEventListener('click', () => showToast(button.dataset.toast));
    });

    const librarySearch = document.querySelector('#library-search');
    if (librarySearch) {
        const cards = [...document.querySelectorAll('.phenomenon-card')];
        const count = document.querySelector('.results-count');
        const filter = () => {
            const query = librarySearch.value.trim().toLocaleLowerCase('fr');
            let visible = 0;
            cards.forEach((card) => {
                const matches = card.dataset.search.toLocaleLowerCase('fr').includes(query);
                card.hidden = !matches;
                if (matches) visible += 1;
            });
            count.textContent = `${visible} phénomène${visible > 1 ? 's' : ''} · 1 démonstration disponible`;
        };
        librarySearch.addEventListener('input', filter);
        document.querySelector('#clear-search').addEventListener('click', () => {
            librarySearch.value = '';
            filter();
            librarySearch.focus();
        });
    }

    const regionSelect = document.querySelector('#map-region');
    if (regionSelect) {
        regionSelect.addEventListener('change', () => {
            const region = regionSelect.value;
            document.querySelector('#map-title').textContent = `${region} · repérage`;
            document.querySelector('#region-summary').textContent = region;
            document.querySelector('#map-pin-label').innerHTML = `${region}<br><small>Cliquer pour explorer</small>`;
        });
        document.querySelector('.map-pin').addEventListener('click', () => navigate('explore'));
    }

    document.querySelectorAll('.map-zoom button').forEach((button, index) => {
        button.addEventListener('click', () => {
            const map = document.querySelector('.map-art');
            const scale = Number(map.dataset.scale || 1) + (index === 0 ? 0.1 : -0.1);
            const nextScale = Math.min(1.5, Math.max(0.8, scale));
            map.dataset.scale = String(nextScale);
            map.querySelectorAll('.map-land, .map-contour').forEach((shape) => {
                shape.style.transform = `scale(${nextScale})`;
            });
        });
    });

    document.querySelectorAll('.instrument-choice').forEach((button) => {
        button.addEventListener('click', () => {
            document.querySelectorAll('.instrument-choice').forEach((choice) => choice.classList.remove('selected'));
            button.classList.add('selected');
            document.querySelector('#instrument-name').textContent = button.dataset.instrument;
        });
    });

    const studioVolume = document.querySelector('#studio-volume');
    if (studioVolume) {
        studioVolume.addEventListener('input', () => {
            document.querySelector('#volume-value').textContent = `${studioVolume.value} %`;
        });
    }

    document.querySelectorAll('.volume-control input').forEach((input) => {
        input.addEventListener('input', () => {
            if (gainNode && audioContext) {
                gainNode.gain.setTargetAtTime(Number(input.value) / 100 * 0.035, audioContext.currentTime, 0.04);
            }
        });
    });

    document.querySelectorAll('.format-choice').forEach((button) => {
        button.addEventListener('click', () => {
            document.querySelectorAll('.format-choice').forEach((choice) => choice.classList.remove('selected'));
            button.classList.add('selected');
            const isCsv = button.dataset.format === 'CSV';
            document.querySelector('#format-hint').textContent = isCsv
                ? 'Le CSV contient les valeurs de démonstration ; les formats audio ne sont pas encore générés.'
                : `L’export ${button.dataset.format} n’est pas encore disponible. Choisissez CSV pour télécharger les observations.`;
        });
    });

    document.querySelector('#copy-link').addEventListener('click', async () => {
        const input = document.querySelector('#share-url');
        try {
            await navigator.clipboard.writeText(input.value);
            showToast('Lien copié dans le presse-papiers.');
        } catch (error) {
            input.select();
            const copied = document.execCommand('copy');
            showToast(copied ? 'Lien copié dans le presse-papiers.' : 'Sélectionnez le lien pour le copier.');
        }
    });

    const initialPage = window.location.hash.slice(1);
    if (pageNames[initialPage]) navigate(initialPage);
})();
