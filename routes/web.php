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

Route::get('contact', [\App\Http\Controllers\ContactFormController::class, 'create'])->name('contact.create');
Route::post('contact', [\App\Http\Controllers\ContactFormController::class, 'store'])->name('contact.store');

Route::view('about', 'about');

Route::resource('customers', \App\Http\Controllers\CustomersController::class);

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
