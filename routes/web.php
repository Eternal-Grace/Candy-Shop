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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::namespace('Store')
    ->prefix('store')
    ->name('store.')
    ->group(function () {
    Route::get('/', 'ProductsController@list')->name('index');
    Route::get('{product}', 'ProductsController@show')->name('product');
});

Route::namespace('User')->prefix('user')->name('user.')->group(function () {
    Route::get('/', 'UserController@redirectUser')->name('profile');
    Route::get('settings', 'UserController@showSettings')->name('settings');
    Route::post('delete', 'UserController@destroy')->name('delete');
});

Route::prefix('img')->name('image.')->group(function () {
    Route::get('{image}/{size?}', 'ImageController@show')
        ->where(['size' => '(full|)'])
        ->name('show');
    // Route::post('/', 'ImageController@show')->name('add');
});

Route::redirect('/', '/store', 301);

Auth::routes(['verify' => true]);
