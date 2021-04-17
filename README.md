<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Install instructions

- **prerequisites:** php 7.4+, npm v12+
- **stack:** laravel 8.x, bootstrap + vue UI, auth
- clone the project
- run ```composer install```
- run ```npm install```
- run ```npm run dev``` until it works
- run ```npm run watch``` to constantly compile js and css
- to run the jobs queue ```php artisan queue:work > storage/logs/jobs.log```
- OR to start a new php process in the background ```php artisan queue:work &```
- we need a [supervisor](https://laravel.com/docs/8.x/queues#supervisor-configuration) to restart if it stops
  
- [Read Documentation](https://laravel.com/docs/8.x)
- [Coders Tape v5.8 playlist](https://www.youtube.com/playlist?list=PLpzy7FIRqpGD0kxI48v8QEVVZd744Phi4)