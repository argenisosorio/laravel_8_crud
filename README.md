# Laravel 8 - CRUD Example

Base on: <a href="https://github.com/Kingsconsult/laravel_8_crud">https://github.com/Kingsconsult/laravel_8_crud</a>

## Requirements
```
PHP 7.4
$ sudo apt install php7.4 php7.4-gd php7.4-mysql libapache2-mod-php7.4 php-zip php7.4-mbstring php7.4-xml php7.4-intl php-symfony-intl php7.4-pgsql
Laravel Framework 8.0.0
```
<b>Note:</b>
<br />
We will use $ to describe the commands that will be used with regular user.

1- Run the following commands in sequence to deploy the project in a development
environment:

$ cp .env.example .env

$ composer install

$ npm install

$ npm run dev

2- Create and configure database in .env.

$ php artisan key:generate

$ php artisan migrate

$ php artisan serve

3- Next, you may navigate to you URL http://127.0.0.1:8000/projects
