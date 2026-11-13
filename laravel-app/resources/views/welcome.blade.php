<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#07111f">
    <title>earth jukebox — Écouter la Terre</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script defer src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <div class="app-shell">
        <aside class="sidebar" id="sidebar">
            <a class="brand" href="{{ route('home') }}" aria-label="earth jukebox, accueil">
                <span class="brand-mark" aria-hidden="true"><i></i><i></i><i></i></span>
                <span><strong>earth jukebox</strong><small>CLIMAT · MUSIQUE · SCIENCES</small></span>
            </a>

            <div class="side-label">Explorer</div>
            <nav class="primary-nav" aria-label="Navigation principale">
                <button class="nav-link active" type="button" data-page="explore"><span class="nav-icon">◉</span>Explorer</button>
                <button class="nav-link" type="button" data-page="library"><span class="nav-icon">▤</span>Bibliothèque</button>
                <button class="nav-link" type="button" data-page="geography"><span class="nav-icon">◎</span>Géographie</button>
                <button class="nav-link" type="button" data-page="compare"><span class="nav-icon">⇄</span>Comparer</button>
                <button class="nav-link" type="button" data-page="studio"><span class="nav-icon">♫</span>Studio sonore</button>
                <button class="nav-link" type="button" data-page="learn"><span class="nav-icon">◈</span>Comprendre</button>
                <button class="nav-link" type="button" data-page="share"><span class="nav-icon">↗</span>Exporter & partager</button>
            </nav>

            <section class="sidebar-note">
                <span class="eyebrow">MVP · Température</span>
                <p>Une variable scientifique, une note. La Terre devient une expérience à écouter.</p>
                <span class="side-caption">SPACE APPS CHALLENGE 2025</span>
                <small>Explorer les données NASA autrement, entre science et création sonore.</small>
            </section>
            <div class="sidebar-foot">Une expérience sensible des données terrestres.</div>
        </aside>

        <main class="main-shell">
            <header class="topbar">
                <div class="breadcrumbs"><span>Espace d’exploration</span><b>/</b><strong id="breadcrumb-current">Explorer</strong></div>
                <div class="top-actions">
                    <span class="live-status"><i></i> Sources ouvertes · interface prévisualisée</span>
                    <button class="button button-quiet" type="button" id="accessibility-toggle" aria-pressed="false">◉ <span>Accessibilité</span></button>
                    <button class="menu-toggle" type="button" id="menu-toggle" aria-label="Ouvrir le menu" aria-expanded="false">☰</button>
                </div>
            </header>

            <div class="content">
                <section class="page-section is-active" data-section="explore">
                    <div class="page-heading">
                        <div>
                            <p class="kicker">DONNÉES DE LA TERRE · EN TEMPS LONG</p>
                            <h1>Écouter la Terre, autrement.</h1>
                            <p class="intro">Une expérience pour transformer les données climatiques en paysages sonores.</p>
                        </div>
                        <span class="status-pill"><i></i> DÉMO MVP</span>
                    </div>

                    <div class="dashboard-grid">
                        <article class="panel chart-panel">
                            <div class="panel-heading">
                                <div><span class="eyebrow">VARIABLE · 01</span><h2>Température de surface</h2></div>
                                <span class="tiny-tag">NASA · MODIS</span>
                            </div>
                            <div class="controls-row">
                                <label class="field">Phénomène
                                    <select id="phenomenon-select"><option>Température de surface</option><option>Précipitations</option><option>Concentration de CO₂</option></select>
                                </label>
                                <label class="field">Région
                                    <select id="region-select"><option value="Monde">Monde</option><option value="Amazonie">Amazonie</option><option value="Arctique">Arctique</option><option value="Maroc">Maroc</option></select>
                                </label>
                                <label class="field">Période étudiée
                                    <select id="period-select"><option>Jan. – Déc. 2025</option><option>Jan. – Déc. 2024</option><option>Jan. – Déc. 2023</option></select>
                                </label>
                            </div>
                            <div class="metrics-row">
                                <div><span class="muted-label">Valeur moyenne · 2025</span><strong class="metric-value">17,4 <small>°C</small></strong><span class="metric-note">+0,8 °C vs. période précédente</span></div>
                                <div class="frequency-metric"><span class="muted-label">Fréquence sonore</span><strong class="metric-value">708 <small>Hz</small></strong><span class="metric-note">La température devient une note</span></div>
                                <button class="button button-primary small" type="button" data-play>♫ <span>Écouter la série</span></button>
                            </div>
                            <div class="chart-wrap">
                                <div class="chart-axis"><span>18 °C</span><span>16 °C</span><span>14 °C</span><span>12 °C</span></div>
                                <svg class="line-chart" id="main-chart" viewBox="0 0 760 220" role="img" aria-label="Courbe de température de surface sur douze mois">
                                    <defs><linearGradient id="chartFill" x1="0" x2="0" y1="0" y2="1"><stop offset="0" stop-color="#4ed8c3" stop-opacity=".18"/><stop offset="1" stop-color="#4ed8c3" stop-opacity="0"/></linearGradient></defs>
                                    <path class="grid-line" d="M0 24H760 M0 78H760 M0 132H760 M0 186H760"/>
                                    <path class="chart-area" d="M8 177 C65 168 80 157 128 147 S208 125 260 107 S333 82 386 66 S476 43 523 51 S612 78 655 99 S710 122 752 133 L752 200 L8 200Z"/>
                                    <path class="chart-line" d="M8 177 C65 168 80 157 128 147 S208 125 260 107 S333 82 386 66 S476 43 523 51 S612 78 655 99 S710 122 752 133"/>
                                    <path class="chart-cursor" d="M386 24V200"/>
                                    <circle class="chart-dot" cx="386" cy="66" r="5"/>
                                </svg>
                            </div>
                            <div class="chart-labels"><span>Jan.</span><span>Mar.</span><span>Mai</span><span>Juil.</span><span>Sept.</span><span>Déc.</span></div>
                            <div class="panel-footer"><span>Source : NASA Earth Observations · Série de démonstration</span><button class="text-button" type="button" data-page-link="learn">Lire la fiche scientifique ↗</button></div>
                        </article>

                        <div class="side-stack">
                            <article class="panel earth-card">
                                <div class="panel-heading"><div><span class="eyebrow">VUE GLOBALE</span><h2>Notre planète</h2></div><span class="orbit-icon">◎</span></div>
                                <div class="earth-orb" role="img" aria-label="Illustration stylisée de la planète Terre"><span></span></div>
                                <p class="muted-copy">Une planète, douze mois, une infinité d’histoires.</p>
                            </article>
                            <article class="panel listen-card">
                                <span class="eyebrow">COMMENT LIRE LE SON ?</span>
                                <h2>Un signal, trois repères.</h2>
                                <ul class="legend-list">
                                    <li><i class="legend-dot teal"></i><span><b>Plus chaud</b><small>La note monte.</small></span></li>
                                    <li><i class="legend-dot blue"></i><span><b>Plus froid</b><small>La note descend.</small></span></li>
                                    <li><i class="legend-dot amber"></i><span><b>Variation rapide</b><small>Le rythme s’accélère.</small></span></li>
                                </ul>
                                <p class="fine-print">La sonification est une aide à l’écoute, pas une mesure de la température.</p>
                            </article>
                        </div>
                    </div>

                    <article class="panel player-panel">
                        <div class="player-top"><span class="eyebrow"><i class="live-dot"></i> Lecture en cours · série Terre</span><span class="muted-label">Température · Monde · 2025</span></div>
                        <div class="player-controls">
                            <button class="button button-primary" type="button" data-play>▶ <span>Écouter</span></button>
                            <button class="button button-quiet" type="button" data-stop>■ <span>Arrêter</span></button>
                            <div class="track"><span>Janvier</span><div class="track-bar"><i></i></div><span>Décembre</span></div>
                            <label class="volume-control">Vitesse <select aria-label="Vitesse de lecture"><option>1×</option><option>0,5×</option><option>1,5×</option></select></label>
                            <label class="volume-control">Volume <input type="range" min="0" max="100" value="65" aria-label="Volume"></label>
                        </div>
                    </article>

                    <div class="two-column">
                        <article class="panel">
                            <div class="panel-heading"><div><span class="eyebrow">EN UN COUP D’ŒIL</span><h2>La courbe en toutes lettres</h2></div><span class="tiny-tag">12 MOIS</span></div>
                            <p class="body-copy">Dans cette série de démonstration, la température moyenne augmente du début de l’année jusqu’à l’été, puis redescend progressivement. La sonification suit cette évolution.</p>
                            <div class="insight-strip"><span>↗</span><p><b>Le point le plus chaud :</b> juillet — 17,4 °C</p></div>
                        </article>
                        <article class="panel table-panel">
                            <div class="panel-heading"><div><span class="eyebrow">DONNÉES ASSOCIÉES</span><h2>Extrait de la série</h2></div><span class="tiny-tag">°C / Hz</span></div>
                            <div class="table-scroll"><table><thead><tr><th>Mois</th><th>Température</th><th>Fréquence</th></tr></thead><tbody>
                                @foreach (array_slice($observations, 4, 4) as $observation)
                                    <tr><td>{{ \Carbon\Carbon::createFromFormat('Y-m', $observation['date'])->translatedFormat('M') }}</td><td>{{ number_format($observation['temperature'], 1, ',', ' ') }} °C</td><td>{{ $observation['frequency'] }} Hz</td></tr>
                                @endforeach
                            </tbody></table></div>
                            <button class="text-button" type="button" data-export>⇩ Exporter les données CSV</button>
                        </article>
                    </div>
                    <div class="source-bar"><span>◉</span><p><b>À votre écoute</b><small>Cette interface utilise des données de démonstration. Les sources NASA sont indiquées pour illustrer le parcours de données.</small></p><span class="source-tag">NASA · OPEN DATA</span></div>
                </section>

                <section class="page-section" data-section="library">
                    <div class="page-heading"><div><p class="kicker">EXPLORER · BIBLIOTHÈQUE</p><h1>Les phénomènes à l’écoute</h1><p class="intro">Un premier pas pour explorer les données et entendre leurs variations.</p></div><span class="status-pill">ÉVOLUTION · ANNÉE EN COURS</span></div>
                    <div class="filter-row">
                        <label class="search-field">⌕ <input type="search" id="library-search" placeholder="Rechercher dans la bibliothèque…"></label>
                        <select aria-label="Filtrer par catégorie"><option>Toutes les familles</option><option>Climat</option><option>Océans</option></select>
                        <select aria-label="Filtrer par source"><option>Source des données</option><option>NASA</option><option>NOAA</option></select>
                        <button class="button button-quiet" type="button" id="clear-search">↻ Réinitialiser</button>
                    </div>
                    <p class="results-count">5 phénomènes · 1 démonstration disponible</p>
                    <div class="phenomena-grid">
                        <article class="panel phenomenon-card" data-search="température surface climat chaleur">
                            <div class="phenomenon-art art-desert"><span>CLIMAT</span><b>NASA</b></div><div class="phenomenon-content"><div class="card-title-row"><h2>Température de surface</h2><span class="tiny-tag">Série pilote</span></div><p>Suivre les variations de température à la surface de la Terre au fil des saisons.</p><span class="data-meta">↗ NASA · MODIS · Mensuel</span><button class="button button-primary small" type="button" data-page-link="explore">Ouvrir dans l’explorateur</button></div>
                        </article>
                        <article class="panel phenomenon-card" data-search="précipitations pluie cyclone eau">
                            <div class="phenomenon-art art-storm"><span>EAU</span><b>À EXPLORER</b></div><div class="phenomenon-content"><div class="card-title-row"><h2>Précipitations</h2><span class="tiny-tag">Évolution</span></div><p>Écouter le rythme des pluies et comprendre les variations saisonnières.</p><span class="data-meta">↗ NASA · GPM · Mensuel</span><button class="button button-quiet small" type="button" data-toast="Cette série sera bientôt disponible.">Consulter la fiche phénomène</button></div>
                        </article>
                        <article class="panel phenomenon-card" data-search="incendies forêt feu végétation">
                            <div class="phenomenon-art art-forest"><span>RISQUES</span><b>À EXPLORER</b></div><div class="phenomenon-content"><div class="card-title-row"><h2>Incendies</h2><span class="tiny-tag">Évolution</span></div><p>Repérer les zones touchées et observer leur évolution dans le temps.</p><span class="data-meta">↗ NASA · FIRMS</span><button class="button button-quiet small" type="button" data-toast="Cette série sera bientôt disponible.">Consulter la fiche phénomène</button></div>
                        </article>
                        <article class="panel phenomenon-card" data-search="végétation forêt nature plantes">
                            <div class="phenomenon-art art-green"><span>BIOSPHÈRE</span><b>À EXPLORER</b></div><div class="phenomenon-content"><div class="card-title-row"><h2>Végétation</h2><span class="tiny-tag">Évolution</span></div><p>Une écoute des variations de la végétation et des cycles de croissance.</p><span class="data-meta">↗ NASA · MODIS</span><button class="button button-quiet small" type="button" data-toast="Cette série sera bientôt disponible.">Consulter la fiche phénomène</button></div>
                        </article>
                        <article class="panel phenomenon-card" data-search="océans mer eau température">
                            <div class="phenomenon-art art-ocean"><span>OCÉANS</span><b>À EXPLORER</b></div><div class="phenomenon-content"><div class="card-title-row"><h2>Océans</h2><span class="tiny-tag">Évolution</span></div><p>La température de surface des océans mise en musique, mois après mois.</p><span class="data-meta">↗ NOAA · OISST</span><button class="button button-quiet small" type="button" data-toast="Cette série sera bientôt disponible.">Consulter la fiche phénomène</button></div>
                        </article>
                        <article class="panel explain-card"><span class="eyebrow">COMMENCER PAR UNE SEULE VARIABLE</span><h2>Une donnée à la fois.</h2><p>La sonification aide à percevoir les tendances, pas à remplacer l’analyse. Choisissez une série, une période et une région pour commencer.</p><ul><li>Visualiser une évolution</li><li>Écouter les variations</li><li>Comprendre les limites</li></ul><button class="button button-primary small" type="button" data-page-link="learn">Comprendre les données</button></article>
                    </div>
                    <div class="source-bar"><span>✦</span><p><b>Les images illustrent les phénomènes.</b><small>Les séries autres que la température sont des aperçus d’interface et ne sont pas encore reliées à une source de données.</small></p></div>
                </section>

                <section class="page-section" data-section="geography">
                    <div class="page-heading"><div><p class="kicker">EXPLORER · GÉOGRAPHIE</p><h1>Un territoire, une autre écoute</h1><p class="intro">Sélectionnez une région et observez comment le lieu transforme le récit sonore.</p></div><span class="status-pill">ÉVOLUTION · ANNÉE EN COURS</span></div>
                    <div class="controls-row filter-panel">
                        <label class="field">Région recherchée<select id="map-region"><option>Maroc</option><option>Amazonie</option><option>Arctique</option><option>Monde</option></select></label>
                        <label class="field">Période étudiée<select><option>Janvier – Décembre 2025</option><option>Janvier – Décembre 2024</option></select></label>
                        <label class="field">Phénomène<select><option>Température de surface</option><option>Précipitations</option></select></label>
                        <label class="field">Agrégation spatiale<select><option>Moyenne régionale</option><option>Valeur par pixel</option></select></label>
                    </div>
                    <div class="geo-grid">
                        <article class="panel map-panel"><div class="panel-heading"><div><span class="eyebrow">CARTE INTERACTIVE</span><h2 id="map-title">Afrique du Nord · repérage</h2></div><span class="tiny-tag">VUE DÉMONSTRATION</span></div>
                            <div class="map-art"><div class="map-grid"></div><div class="map-land land-one"></div><div class="map-land land-two"></div><div class="map-land land-three"></div><div class="map-contour"></div><button class="map-pin" type="button" aria-label="Région sélectionnée">●<span id="map-pin-label">Maroc<br><small>Cliquer pour explorer</small></span></button><div class="map-zoom"><button type="button" aria-label="Zoom avant">+</button><button type="button" aria-label="Zoom arrière">−</button></div><span class="map-credit">Carte stylisée · données géographiques de démonstration</span></div>
                            <div class="panel-footer"><span>La sélection est active sur la carte.</span><button class="button button-quiet small" type="button" data-page-link="explore">Description du territoire</button></div>
                        </article>
                        <article class="panel selection-panel"><span class="eyebrow">VOTRE SÉLECTION</span><div class="region-badge">◉</div><h2 id="region-summary">Maroc</h2><p class="muted-copy">Afrique du Nord · zone de démonstration</p><dl class="detail-list"><div><dt>Phénomène</dt><dd>Température de surface</dd></div><div><dt>Unité</dt><dd>Degrés Celsius (°C)</dd></div><div><dt>Période couverte</dt><dd>Janvier – décembre 2025</dd></div><div><dt>Résolution</dt><dd>Aperçu régional</dd></div></dl><div class="notice notice-warm">La série régionale réelle n’est pas encore connectée dans cette démo.</div><button class="button button-primary full" type="button" data-page-link="explore">♫ Ouvrir dans le Monde</button></article>
                    </div>
                    <div class="two-column">
                        <article class="panel"><span class="eyebrow">ÉQUIVALENT VISUEL DE LA CARTE</span><h2>Le lieu donne un contexte.</h2><p class="body-copy">Les cartes donnent un aperçu géographique de la zone sélectionnée. Pour cette version de démonstration, les régions affichées servent à illustrer le parcours et ne représentent pas des mesures spatiales réelles.</p></article>
                        <article class="panel"><span class="eyebrow">AVANT DE SONIFIER UNE RÉGION</span><h2>À vérifier pour une écoute fiable</h2><ul class="check-list"><li>Vérifier la couverture et la résolution de la source.</li><li>Documenter la moyenne régionale choisie.</li><li>Signaler les données manquantes.</li></ul></article>
                    </div>
                </section>

                <section class="page-section" data-section="compare">
                    <div class="page-heading"><div><p class="kicker">EXPLORER · COMPARER</p><h1>Deux périodes. Une même échelle.</h1><p class="intro">Comparez deux périodes pour écouter les changements de température dans un contexte commun.</p></div><span class="status-pill">ANALYSE COMPARATIVE</span></div>
                    <div class="controls-row filter-panel compare-filters"><label class="field">Phénomène<select><option>Température de surface</option></select></label><label class="field">Région<select><option>Monde · série illustrative</option><option>Maroc</option><option>Arctique</option></select></label><label class="field">Échelle des valeurs<select><option>Échelle identique</option><option>Échelle indépendante</option></select></label><label class="field">Mode d’écoute<select><option>Alternance A / B</option><option>Superposition</option></select></label></div>
                    <div class="compare-grid">
                        <article class="panel compare-card"><div class="panel-heading"><div><span class="eyebrow">PÉRIODE A</span><h2>Jan. – Déc. 2024</h2></div><span class="tiny-tag">PÉRIODE A</span></div><div class="compare-metrics"><div><span class="muted-label">Moyenne sur 12 mois</span><strong>14,2 <small>°C</small></strong></div><div><span class="muted-label">Maximum local</span><strong>16,9 <small>°C</small></strong></div></div><svg class="line-chart compare-chart" viewBox="0 0 760 180" role="img" aria-label="Courbe illustrative de la période A"><path class="grid-line" d="M0 24H760 M0 78H760 M0 132H760"/><path class="chart-line" d="M8 150 C80 142 110 128 170 113 S270 80 330 64 S430 47 490 60 S590 99 650 115 S710 132 752 140"/></svg><div class="chart-labels"><span>Jan.</span><span>Avr.</span><span>Juil.</span><span>Oct.</span><span>Déc.</span></div><button class="button button-quiet small" type="button" data-play>▶ Écouter A</button></article>
                        <article class="panel compare-card"><div class="panel-heading"><div><span class="eyebrow">PÉRIODE B</span><h2>Jan. – Déc. 2025</h2></div><span class="status-pill">SÉRIE ACTIVE</span></div><div class="compare-metrics"><div><span class="muted-label">Moyenne sur 12 mois</span><strong>14,7 <small>°C</small></strong></div><div><span class="muted-label">Maximum local</span><strong>17,4 <small>°C</small></strong></div></div><svg class="line-chart compare-chart" viewBox="0 0 760 180" role="img" aria-label="Courbe de température de la période B"><path class="grid-line" d="M0 24H760 M0 78H760 M0 132H760"/><path class="chart-line chart-line-blue" d="M8 157 C72 148 110 132 170 115 S270 78 330 56 S430 34 490 50 S585 88 650 108 S710 125 752 135"/></svg><div class="chart-labels"><span>Jan.</span><span>Avr.</span><span>Juil.</span><span>Oct.</span><span>Déc.</span></div><button class="button button-primary small" type="button" data-play>▶ Écouter B</button></article>
                    </div>
                    <article class="panel player-panel"><div class="player-top"><span class="eyebrow"><i class="live-dot"></i> Comparaison en lecture</span><span class="muted-label">Même échelle · même région</span></div><div class="player-controls"><button class="button button-primary" type="button" data-play>▶ <span>Écouter</span></button><button class="button button-quiet" type="button" data-stop>■ Arrêter</button><div class="track"><span>2024</span><div class="track-bar"><i></i></div><span>2025</span></div><label class="volume-control">Vitesse <select aria-label="Vitesse de lecture"><option>1×</option><option>0,5×</option></select></label></div></article>
                    <div class="two-column"><article class="panel delta-card"><span class="eyebrow">ÉCART ENTRE LES MOYENNES</span><strong>+0,5 <small>°C</small></strong><p>entre les périodes sélectionnées</p></article><article class="panel"><span class="eyebrow">QU’ENTEND-ON ?</span><h2>Un changement subtil, mais mesurable.</h2><p class="body-copy">La série B présente une moyenne plus élevée dans cet exemple. L’échelle et les données de démonstration sont identiques pour faciliter la comparaison.</p></article></div>
                    <div class="source-bar"><span>◉</span><p><b>Comparer avec attention</b><small>Une différence de moyenne ne décrit pas à elle seule les variations locales, l’incertitude ou les choix de traitement.</small></p></div>
                </section>

                <section class="page-section" data-section="studio">
                    <div class="page-heading"><div><p class="kicker">CRÉER · STUDIO SONORE</p><h1>Donner une voix aux valeurs</h1><p class="intro">Ajustez une représentation sonore et écoutez comment la donnée prend forme.</p></div><span class="status-pill">RÉGLAGES DE SONIFICATION</span></div>
                    <div class="notice notice-success">Cette page propose des contrôles de représentation ; elle ne génère actuellement aucun son de données réel.</div>
                    <div class="studio-grid">
                        <article class="panel"><div class="panel-heading"><div><span class="eyebrow">SONIFICATION</span><h2>Palette d’instruments</h2></div><span class="tiny-tag">SON ENVISAGÉ</span></div><div class="instrument-grid"><button class="instrument-choice selected" type="button" data-instrument="Onde pure"><span>∿</span><b>Onde pure</b><small>Clair · sinusoïdal</small></button><button class="instrument-choice" type="button" data-instrument="Piano doux"><span>♬</span><b>Piano doux</b><small>Acoustique · calme</small></button><button class="instrument-choice" type="button" data-instrument="Nappe ambiante"><span>〰</span><b>Nappe ambiante</b><small>Large · évolutive</small></button></div><div class="selected-instrument">Instrument sélectionné : <b id="instrument-name">Onde pure</b></div></article>
                        <article class="panel"><div class="panel-heading"><div><span class="eyebrow">PROFIL SONORE</span><h2>Réglages de la représentation</h2></div><span class="tiny-tag">PAR DÉFAUT</span></div><label class="range-field">Plage de fréquence <span>220 Hz — 880 Hz</span><input type="range" min="220" max="880" value="708"></label><label class="range-field">Volume de sortie <span id="volume-value">65 %</span><input type="range" min="0" max="100" value="65" id="studio-volume"></label><label class="range-field">Variation temporelle <span>Normalisée · 12 mois</span><input type="range" min="1" max="12" value="6"></label></article>
                    </div>
                    <article class="panel sonify-panel"><div class="panel-heading"><div><span class="eyebrow">DE LA DONNÉE À LA NOTE</span><h2>Une échelle lisible</h2></div><span class="tiny-tag">LÉGENDE DE SONIFICATION</span></div><div class="note-steps"><div><b>10 °C <span>→</span> 220 Hz</b><small>Note grave</small></div><div><b>15 °C <span>→</span> 550 Hz</b><small>Note moyenne</small></div><div><b>20 °C <span>→</span> 880 Hz</b><small>Note aiguë</small></div></div><div class="wave-visual" aria-hidden="true"><svg viewBox="0 0 900 100" preserveAspectRatio="none"><path d="M0 50 C30 5 60 5 90 50 S150 95 180 50 S240 5 270 50 S330 95 360 50 S420 5 450 50 S510 95 540 50 S600 5 630 50 S690 95 720 50 S780 5 810 50 S870 95 900 50"/></svg></div><p class="muted-copy">Exemple d’échelle linéaire : une valeur plus élevée correspond à une fréquence plus aiguë.</p></article>
                    <article class="panel player-panel"><div class="player-top"><span class="eyebrow"><i class="live-dot"></i> Aperçu de la sonification</span><span class="muted-label">Température · Monde · 2025</span></div><div class="player-controls"><button class="button button-primary" type="button" data-play>▶ <span>Écouter</span></button><button class="button button-quiet" type="button" data-stop>■ Arrêter</button><div class="track"><span>Min.</span><div class="track-bar"><i></i></div><span>Max.</span></div><label class="volume-control">Volume <input type="range" min="0" max="100" value="65" aria-label="Volume"></label></div></article>
                    <div class="two-column"><article class="panel"><span class="eyebrow">VALEURS ABSENTES</span><h2>Ne pas masquer l’incertitude</h2><p class="body-copy">Les données absentes doivent rester visibles et ne pas être remplacées silencieusement par une valeur estimée.</p></article><article class="panel"><span class="eyebrow">HORS DE LA PLAGE 10–20 °C</span><h2>Conserver le contexte</h2><p class="body-copy">Une valeur hors plage doit être signalée dans la légende et ne pas être écrêtée sans avertissement.</p></article></div>
                </section>

                <section class="page-section" data-section="learn">
                    <div class="page-heading"><div><p class="kicker">APPRENDRE · GUIDES</p><h1>Savoir ce que l’on écoute</h1><p class="intro">La méthode, les limites et les sources : comprendre avant de se laisser porter par la sonification.</p></div><span class="status-pill">GUIDE MVP</span></div>
                    <div class="learn-grid"><div class="learn-main">
                        <article class="panel"><div class="panel-heading"><div><span class="eyebrow">FICHE PHÉNOMÈNE</span><h2>Température de surface</h2></div><span class="tiny-tag">NASA · MODIS</span></div><div class="notice notice-warm">Données de démonstration : les valeurs affichées illustrent une série mensuelle et ne constituent pas une mesure climatique vérifiée.</div><p class="body-copy">La température de surface décrit la chaleur rayonnée par la surface terrestre. Elle varie selon les saisons, la couverture nuageuse, l’heure d’observation et les caractéristiques du terrain.</p><div class="two-column inner-columns"><div><h3>Ce que décrit le phénomène</h3><p class="body-copy">Une mesure de télédétection liée à la surface observée. Elle ne doit pas être confondue avec la température de l’air.</p></div><div><h3>Normalisation et conversion</h3><p class="body-copy">Les valeurs sont associées à une échelle sonore choisie. Cette transformation facilite l’écoute mais ajoute un choix de représentation.</p></div></div><h3>À retenir avant d’interpréter</h3><ul class="check-list"><li>Vérifier la période, l’unité et la résolution.</li><li>Garder visibles les données manquantes et l’incertitude.</li><li>Interpréter le son avec sa légende, jamais isolément.</li></ul></article>
                        <article class="panel table-panel"><div class="panel-heading"><div><span class="eyebrow">SÉRIE ILLUSTRATIVE</span><h2>Les 12 valeurs, sans le son</h2></div><span class="tiny-tag">TABLEAU ACCESSIBLE</span></div><div class="table-scroll"><table><thead><tr><th>Mois</th><th>Température</th><th>Fréquence</th></tr></thead><tbody>@foreach ($observations as $observation)<tr><td>{{ \Carbon\Carbon::createFromFormat('Y-m', $observation['date'])->translatedFormat('F') }}</td><td>{{ number_format($observation['temperature'], 1, ',', ' ') }} °C</td><td>{{ $observation['frequency'] }} Hz</td></tr>@endforeach</tbody></table></div><button class="button button-quiet small" type="button" data-export>⇩ Lire les 12 valeurs en CSV</button></article>
                    </div><aside class="learn-aside">
                        <article class="panel"><span class="eyebrow">UN PEU D’AIDE POUR COMPRENDRE</span><h2>Que perçoit-on ?</h2><p class="body-copy">Pourquoi le son est-il plus aigu en juillet ?</p><div class="notice">La note change avec la valeur représentée. Pour cette démo, une valeur plus élevée est associée à une fréquence plus aiguë.</div><button class="button button-quiet full" type="button" data-toast="Le guide sonore est affiché dans cette page.">◉ Revoir la légende du son</button></article>
                        <article class="panel"><span class="eyebrow">SOURCES ENVISAGÉES</span><h2>D’où viennent les valeurs ?</h2><p class="body-copy">Cette démo illustre des sources ouvertes qui pourraient alimenter l’application :</p><ul class="source-list"><li>NASA Earth Observations</li><li>NASA Earthdata / MODIS</li><li>NASA GPM · précipitations</li><li>NOAA OISST · océans</li></ul><p class="fine-print">Les données de démonstration ci-dessus ne sont pas extraites de ces API.</p></article>
                    </aside></div>
                    <div class="source-bar"><span>◉</span><p><b>À votre écoute</b><small>Vérifiez la source, la couverture et les limites avant d’interpréter une tendance.</small></p><span class="source-tag">SOURCES OUVERTES</span></div>
                </section>

                <section class="page-section" data-section="share">
                    <div class="page-heading"><div><p class="kicker">TRANSMETTRE · EXPORT & PARTAGE</p><h1>Une expérience à transmettre</h1><p class="intro">Partagez l’écoute avec son contexte, ses sources et ses précautions scientifiques.</p></div><span class="status-pill">EXPORT DE DÉMONSTRATION</span></div>
                    <div class="share-grid">
                        <div class="share-main">
                            <article class="panel"><div class="panel-heading"><div><span class="eyebrow">DÉFINIR L’EXPÉRIENCE</span><h2>Votre sélection</h2></div><span class="tiny-tag">CONFIGURATION</span></div><div class="controls-row"><label class="field">Période<select><option>Janvier – Décembre 2025</option><option>Janvier – Décembre 2024</option></select></label><label class="field">Région<select><option>Monde · série illustrative</option><option>Maroc</option></select></label><label class="field">Instrument<select><option>Onde sinusoïdale · MVP</option><option>Piano doux</option></select></label><label class="field">Vitesse de lecture<select><option>1× · 44 secondes</option><option>0,5× · 88 secondes</option></select></label></div></article>
                            <article class="panel"><div class="panel-heading"><div><span class="eyebrow">CHOISIR UN FORMAT</span><h2>Exporter une version</h2></div><span class="tiny-tag">FORMATS ENVISAGÉS</span></div><div class="format-options"><button class="format-choice selected" type="button" data-format="CSV"><b>CSV</b><small>Données numériques</small></button><button class="format-choice" type="button" data-format="MP3"><b>MP3</b><small>Audio sonifié · à venir</small></button><button class="format-choice" type="button" data-format="WAV"><b>WAV</b><small>Audio non compressé · à venir</small></button></div><p class="fine-print" id="format-hint">Le CSV contient les valeurs de démonstration ; les formats audio ne sont pas encore générés.</p></article>
                            <article class="panel"><span class="eyebrow">NE PAS SÉPARER LE SON DE SON CONTEXTE</span><h2>Inclure les informations importantes</h2><ul class="check-list"><li>Source et période de la donnée.</li><li>Légende de conversion en fréquence.</li><li>Description accessible de la courbe.</li><li>Limites et statut de la série de démonstration.</li></ul></article>
                        </div>
                        <aside class="share-aside">
                            <article class="panel preview-card"><span class="eyebrow">VOTRE EXPÉRIENCE</span><span class="status-pill">TEMPÉRATURE · MONDE</span><h2>Douze mois, une trajectoire sonore.</h2><div class="mini-wave" aria-hidden="true"></div><div class="preview-stats"><div><b>00:44</b><small>Durée prévue</small></div><div><b>12 valeurs</b><small>Résolution mensuelle</small></div></div><button class="button button-primary full" type="button" data-export>⇩ Télécharger le CSV</button></article>
                            <article class="panel"><span class="eyebrow">PARTAGER UN LIEN</span><h2>Transmettre une sélection</h2><p class="body-copy">Un lien de démonstration peut être copié pour partager cette sélection.</p><div class="copy-row"><input id="share-url" aria-label="Lien de partage" readonly value="{{ url('/') }}#explore"><button class="button button-quiet" type="button" id="copy-link">Copier</button></div></article>
                            <div class="notice notice-warm">L’export sonore n’est pas encore activé. Le fichier CSV télécharge les douze valeurs d’exemple, avec leurs unités.</div>
                        </aside>
                    </div>
                    <article class="panel"><span class="eyebrow">RÉSUMÉ JOINT À L’EXPÉRIENCE</span><p class="body-copy">Cette série mensuelle de démonstration illustre la température de surface et sa mise en correspondance avec une fréquence sonore. Elle ne constitue pas un jeu de données NASA vérifié.</p></article>
                    <div class="source-bar"><span>◉</span><p><b>À votre écoute</b><small>Donner le contexte avec la donnée rend le partage plus accessible et plus fiable.</small></p></div>
                </section>
            </div>
            <footer class="app-footer"><span>earth jukebox · Une expérience de sonification</span><span>Données de démonstration · Sources envisagées : NASA / NOAA</span></footer>
        </main>
    </div>

    <nav class="mobile-nav" aria-label="Navigation mobile">
        <button class="active" type="button" data-page="explore"><span>◉</span>Explorer</button>
        <button type="button" data-page="library"><span>▤</span>Bibliothèque</button>
        <button type="button" data-page="compare"><span>⇄</span>Comparer</button>
        <button type="button" data-page="share"><span>↗</span>Partager</button>
    </nav>
    <div class="toast" id="toast" role="status" aria-live="polite"></div>
    <script>
        window.earthObservations = @json($observations);
        window.earthExportUrl = @json(route('observations.export'));
    </script>
</body>
</html>
