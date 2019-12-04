<?php

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register backend routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('backend.dashboard');
Route::get('cleaners', 'CleanerController@index')->name('backend.cleaners');
Route::get('cleaner/add', 'CleanerController@add')->name('backend.cleaner.add');
Route::post('cleaner/create', 'CleanerController@postCreate')->name('backend.cleaner.create');
Route::post('cleaner/update', 'CleanerController@postUpdate')->name('backend.cleaner.update');


Route::prefix('ajax')->group(function () {
    Route::get('cleaners', 'CleanerController@getAllCleaners')->name('backend.ajax.cleaners');
    Route::get('cleaner/get-cleaner-by-id', 'CleanerController@get-cleaner-by-id')->name('backend.ajax.cleaner.get_cleaner_by_id');
});

Route::post('uploadfile','CleanerController@showUploadFile');
