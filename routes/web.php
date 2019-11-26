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
Route::get('/', 'HomeController@index')->name('backend.dashboard');
Route::get('cleaners', 'CleanerController@index')->name('backend.cleaners');


Route::prefix('ajax')->group(function () {
    Route::get('cleaners', 'CleanerController@getAllCleaners')->name('backend.ajax.cleaners');
});


