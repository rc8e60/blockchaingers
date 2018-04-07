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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {
    Route::resource('corporation', 'CorporationController', ['only' => [
        'create', 'store', 'show', 'destroy', 'join',
    ]]);

    Route::get('/corporation/{corporation}/join', 'CorporationController@join');
});
