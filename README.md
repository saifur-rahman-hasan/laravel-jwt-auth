<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


## About Laravel JWT Auth

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

## Installation Guide

- ``cp .env.example .env``
- Open ``.env`` to your editor and update your database connection configuration
- ``composer install`` or ``composer update``
- ``php artisan key:generate``
- ``php artisan jwt:secret``
- ``yarn install`` or ``npm install``
- `yarn dev` or ``npm run dev``
- `php artisan migrate`

### Telescope Configuration
If you want to use Telescope You have to follow the following instructions

- ``php artisan telescope:install``
- ``php artisan migrate --path=database/migrations/telescope``

Add these configurations to your .env file. You can allow multiple users to allow using telescope but for this you have to mention their account email address. 
```dotenv
TELESCOPE_ENABLED=true
TELESCOPE_AUTHORIZED_USERS="my-email@mail.com,other-email@mail.com"
```

We have added ``$schedule->command('telescope:prune --hours=48')->daily();`` to ``app/Console/Kernel.php`` file. This will remove telescope data from database every 48 hours later. You can change the time as your need. But make sure your schedule is working properly.
See the official [laravel docs](https://laravel.com/docs/8.x/scheduling#running-the-scheduler) to configure according to your need.
