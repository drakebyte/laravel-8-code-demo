<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::view('contact', 'contact');

Route::view('about', 'about');

Route::get('customers', function () {

    $customers = [
        'Mary',
        'Sonya',
        'Misha',
    ];

    return view('internals.customers', [
        'customers_array' => $customers
    ]);

});