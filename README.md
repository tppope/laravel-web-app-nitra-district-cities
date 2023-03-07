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

