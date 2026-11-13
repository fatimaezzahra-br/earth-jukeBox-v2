# earth jukebox

Prototype Laravel de l’interface de la maquette : exploration de séries de température, navigation entre les vues, sonification de démonstration et export CSV.

## Lancer l’application

Depuis le dossier `laravel-app` :

```powershell
composer install
php artisan serve
```

Ouvrir ensuite `http://127.0.0.1:8000`.

Le projet utilise Laravel 9 pour rester compatible avec PHP 8.0. Les observations affichées sont des données de démonstration : elles ne proviennent pas d’une connexion active à NASA ou NOAA. Avant toute mise en production, mettez à niveau PHP et Laravel vers une version maintenue et traitez les alertes signalées par `composer audit`.

## Fonctionnalités incluses

- Navigation entre les vues Explorer, Bibliothèque, Géographie, Comparer, Studio sonore, Comprendre et Exporter.
- Recherche dans la bibliothèque, réglages d’interface et contrôles de sélection.
- Lecture sonore synthétisée côté navigateur à partir des fréquences de démonstration.
- API JSON `GET /api/observations` et export CSV `GET /api/observations/export`.

## Tests

```powershell
php artisan test
```
