<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Project

A project in which we obtain information about cities in the Nitra district by parsing data
from https://www.e-obce.sk/kraj/NR.html and geocode their location using Google Geocoding API. We use import:data and
import:geocode artisan commands using redis queue workers. We then display a simple homepage using blade components, scss,
bootstrap and the vite build tool. We also responsively
show information about specific cities that we obtained by parsing. Localization is in English and Slovak language. It
is checked by session in our own middleware. Autocomplete for searching cities is developed using livewire. We use own
bindings in to the service container to perform dependency injection in the whole project for better testability. Our
BladeServiceProvider register new directory path for layout anonymous components for better blade files organization.

## Installation on the dev local enviroment

1. run php server with the PHP 8.1+ version
2. install node 14+ (my node version is 19.7, npm 9.5)
3. create ```.env``` file from ```.env.example``` file
4. set your app url to the ```APP_URL``` variable in the ```.env``` file
5. run database server
6. create database
7. set your database connection information in
   the ```DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD```
8. run ```composer install``` command
9. run ```npm install``` command
10. run ```php artisan key:generate``` command
11. run ```php artisan migrate``` command to run database migrations scripts
12. set your ```QUEUE_CONNECTION``` variable in the ```.env``` file for defining queue driver (I use redis)
    1. if you use redis queue driver, install and use the phpredis PHP extension via PECL
    2. run redis server
    3. set your redis connection information in the```REDIS_HOST, REDIS_PASSWORD, REDIS_PORT``` variables
13. run ```php artisan queue:work``` to run queue worker (run more workers in more terminals for distributing jobs and
    parallel running)
14. set your ```GOOGLE_MAPS_API_KEY``` variable in the ```.env``` file for geocoding function using Google Geocoding API
15. run ```php artisan storage:link``` command to create the symbolic links in /public/storage/ directory pointing to
    storage/app/public/ directory
16. run ```php artisan serve``` command to run php development server
17. run ```npm run dev``` for vite dev server for realtime building frontend files or build them by
    running ```npm run build```
18. run ```php artisan data:import``` to fulfill database with parsed Nitra district cities
19. run ```php artisan data:geocode``` to geocode cities geographic location
