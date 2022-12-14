<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


## Requirements

# Before we start, make sure your server meets the following requirements:
- Server Requirements.

<ul>
<li>PHP >= 8.2</li>
<li>Composer Dependency Manager</li>
<li>Shell (SSH) Access</li>
<li>OpenSSL PHP Extension</li>
<li>PDO PHP Extension</li>
<li>Mbstring PHP Extension</li>
<li>Tokenizer PHP Extension</li>
<li>XML PHP Extension</li>
<li>Ctype PHP Extension</li>
<li>JSON PHP Extension</li>
</ul>

## Installation

# The installation process works the same as all Laravel applications. You can follow this installation guide for a quick start and also check the Laravel Documentation.

## Step One - Download Files

Download all files from the Repo (https://github.com/HosamSaleh1/supervisor.git). Then you have to configure your web server's document / web root to the /public/ directory. The index.php in this directory serves as the front controller for all HTTP requests entering the application. Wrong: http://www.yoursite.com/public Right: http://www.yoursite.com/



## Step Two - Set Permissions

# Set the following folder permissions (including all sub folders) (chmod):

    0755 /storage/*
    0755 /bootstrap/cache/*


## Step Three - Create .env file

Copy the content from the /.env.example file and paste it in a newly created /.env file. Update the /.env file with your configuration. The most important parts are the base configuration:

    APP_NAME=Laravel
    APP_ENV=local
    APP_KEY=
    APP_DEBUG=true
    APP_URL=http://localhost
    FORCE_HTTPS=false

# Please leave the APP_KEY= value empty, as the key will be generated in step five. If you are using SSL / HTTPS, set FORCE_HTTPS= to true. In production you should set the APP_ENV= value to production and APP_DEBUG= to false


## the database configuration:

    DB_CONNECTION=mysql
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=password


# and the SMTP / mail configuration:

    MAIL_MAILER=smtp
    MAIL_HOST=mailhog
    MAIL_PORT=1025
    MAIL_USERNAME=null
    MAIL_PASSWORD=null
    MAIL_ENCRYPTION=null
    MAIL_FROM_ADDRESS="hello@example.com"
    MAIL_FROM_NAME="${APP_NAME}"


## Double-check the configuration to avoid errors in the following steps.



## Step Four - Install Composer Packages

# SHH access to your server is required for the next steps. Please login to your server using your CLI (Windows: Power Shell / PuTTY, macOS: Terminal) and run following command in the GamePort root folder:

    composer install


# This command will install all packages required to run SupervisorApp.



## Step Five - Generate Application Key

# After installing the composer packages, you need to run the following command in the CLI to generate a random application key:

    php artisan key:generate


# This command will add a random application key to your .env file, which is required for security features and should not be changed afterwards.



## Step Six - Migrate Database

# After installation the composer packages, you need to run the following command in the CLI to migrate the database:

    php artisan migrate



## Step Seven - Seed Database

# To seed the database with initial data like platforms and the admin user, you need to run following command in the CLI:

    php artisan db:seed


# The credentials for the default admin user are:

    Email: admin@admin.com
    Password: password


# The credentials for the default employee user are:

    Email: user@user.com
    Password: password

## Please update the profile (email and password) after the first login.



    Installation complete!

    Congratulations! Your GamePort Application has been successfully installed!

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
