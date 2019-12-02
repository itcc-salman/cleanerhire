<?php

/*
|--------------------------------------------------------------------------
| Front Routes
|--------------------------------------------------------------------------
|
| Here is where you can register front routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('front.home');

Route::get('/become-a-cleaner', 'HomeController@becomeACleaner')->name('front.become_a_cleaner');

Route::match(['GET', 'POST'], '/registercleaner', [
    'uses' => 'HomeController@registerCleaner',
    'as'   =>  'front.register_cleaner'
]);
