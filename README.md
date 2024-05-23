# DESCRIZIONE
Creiamo con Laravel il nostro sistema di gestione del nostro Portfolio di progetti.
Ripercorriamo gli steps fatti a lezione ed iniziamo un nuovo progetto usando laravel breeze ed il pacchetto Laravel Preset con autenticazione.
Iniziamo con il definire il layout, modello, migrazione, controller e rotte necessarie per il sistema portfolio:
- Autenticazione: si parte con l'autenticazione e la creazione di un layout per back-office
- Creazione del modello Project con relativa migrazione, seeder, controller e rotte
- Per la parte di back-office creiamo un resource controller Admin\ProjectController per gestire tutte le operazioni CRUD dei progetti
## Bonus
Implementiamo la validazione dei dati dei Progetti nelle operazioni CRUD che lo richiedono usando le form requests.


# STEPS
- Creo nuovo progetto Laravel: composer create-project laravel/laravel:^10.0 laravel-auth
- Installo breeze: composer require laravel/breeze --dev + php artisan breeze:install
- Installo il preset per laravel-breeze-bootstrap: composer require pacificdev/laravel_9_preset + php artisan preset:ui bootstrap --auth
- npm i
- Modifico il file vite.config.js in vite.config.cjs e modifico il file.env
- npm run dev + php artisan serve

- Creo un controller per gestire le richieste alla dashboard e aggiorno la rotta in web.php

- Creo il modello Project con migrazione, seeder, controller e form requests + aggiornamento rotte
- Compilo tabella da migrare + seeder
- Inserisco nel gruppo di rotte l'insieme di rotte che gestiscono le crud
- CRUD

- Modifico file .env: FILESYSTEM_DISK=public
- In config/filesystems.php switcho il disco da local a public: 'default' => env('FILESYSTEM_DISK', 'public')
- php artisan storage:link