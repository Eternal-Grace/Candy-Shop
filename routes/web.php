<?php

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

use Illuminate\Support\Facades\Route;

Route::get('/', 'ShowcaseController@index')->name('home');

Route::group(['prefix' => 'product'], function () {
    Route::get('{slug}', 'ShowcaseController@show')
        ->where('slug', '^[a-z0-9\-]+')
        ->name('product.details');
});

Route::get('donation', 'DonationController@index')->name('donation');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
