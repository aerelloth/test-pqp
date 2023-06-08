# Plus que PROjection

___Découvrez les nouveaux films tendance tous les jours !___

Site réalisé sous [Laravel 10.10](https://laravel.com/docs/10.x) avec les packages [JetStream](https://jetstream.laravel.com/3.x/introduction.html) et [Spatie (Laravel-permission)](https://spatie.be/docs/laravel-permission/v5/introduction). 

Styles et scripts compilés par Vite : [Bootstrap 5](https://getbootstrap.com/docs/5.0/getting-started/introduction/), [Bootstrap Icons](https://icons.getbootstrap.com/), [DataTables](https://datatables.net/manual/).

Imports via l'API [TheMovieDB](https://developer.themoviedb.org/docs).

## Démarrage projet
-   récupérer le projet sur Github : https://github.com/aerelloth/test-pqp
-   créer la base de données
-   configurer les infos de la base de données et de l’API dans le fichier `.env`
-   installer les dépendances avec `composer install`
-   effectuer les migrations : `php artisan migrate`
-   exécuter les seeders : `php artisan db:seed`
-   lancer l'application avec `php artisan serve`
-   pour avoir un site plus fourni, importer les films depuis l'API et/ou mettre en place le cron Laravel _(voir ci-dessous)_.

## Imports
L’import des films peut être réalisé grâce à la commande : `php artisan app:import-command` ou dans le panneau d'administration des utilisateurs avec le rôle admin. Si le cron Laravel est configuré dans la crontab, il sera réalisé automatiquement toutes les nuits à 03:00.

## Infos de connexion
Voici les identifiants des différents utilisateurs créés pour le test :
- test@example.com / userpassword _(rôle user)_
- admin@example.com / adminpassword _(rôle admin)_
- superadmin@example.com / superadminpassword _(rôle Super-Admin)_

