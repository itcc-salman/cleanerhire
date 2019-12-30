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

// Cleaners
Route::get('cleaners', 'CleanerController@index')->name('backend.cleaners');
Route::get('cleaners11111', 'CleanerController@getDistanceBetweenTwoPoints');
Route::get('cleaner/add', 'CleanerController@add')->name('backend.cleaner.add');
Route::get('cleaner/edit/{id}', 'CleanerController@edit')->name('backend.cleaner.edit');
Route::post('cleaner/create', 'CleanerController@postCreate')->name('backend.cleaner.create');
Route::post('cleaner/update', 'CleanerController@postUpdate')->name('backend.cleaner.update');

// Services
Route::prefix('services')->group(function () {
    Route::get('/', 'CleaningServiceController@index')->name('backend.services');
    Route::match(['GET', 'POST'], '/create', 'CleaningServiceController@create')->name('backend.sevice.create');
    Route::match(['GET', 'POST'], '/update/{id?}', 'CleaningServiceController@update')->name('backend.sevice.update');
});

// Properties
Route::prefix('properties')->group(function () {
    Route::get('/', 'PropertyController@index')->name('backend.properties');
    Route::match(['GET', 'POST'], '/create', 'PropertyController@create')->name('backend.properties.create');
    Route::match(['GET', 'POST'], '/update/{id?}', 'PropertyController@update')->name('backend.properties.update');
});

// Resources
Route::prefix('resources')->group(function () {
    Route::get('/', 'ResourceController@index')->name('backend.resources');
    Route::match(['GET', 'POST'], '/create', 'ResourceController@create')->name('backend.resource.create');
    Route::match(['GET', 'POST'], '/update/{id?}', 'ResourceController@update')->name('backend.resource.update');
    Route::get('resource/view/{id?}', 'ResourceController@view')->name('backend.resource.view');
});

// Bookings
Route::get('bookings', 'BookingController@index')->name('backend.bookings');

Route::prefix('ajax')->group(function () {
    // Cleaners
    Route::get('cleaners', 'CleanerController@getAllCleaners')->name('backend.ajax.cleaners');
    Route::get('cleaner/get-cleaner-by-id', 'CleanerController@getCleanerById')->name('backend.ajax.cleaner.get_cleaner_by_id');

    // Services
    Route::get('services', 'CleaningServiceController@getAllServices')->name('backend.ajax.services');
    Route::get('service/get-role-based-services', 'CleaningServiceController@getRoleBasedServices')->name('backend.ajax.get_role_based_services');
    Route::post('service/delete', 'CleaningServiceController@delete')->name('backend.ajax.service.delete');

    // Properties
    Route::get('properties', 'PropertyController@getAllProperty')->name('backend.ajax.properties');
    Route::get('active-properties', 'PropertyController@getAllActiveProperty')->name('backend.ajax.active.properties');
    Route::post('properties/delete', 'PropertyController@delete')->name('backend.ajax.properties.delete');

    // Resources
    Route::get('resources', 'ResourceController@getAllResources')->name('backend.ajax.resources');
    Route::post('resource/delete', 'ResourceController@delete')->name('backend.ajax.resource.delete');

    // Bookings
    Route::get('bookings', 'BookingController@getAllBookings')->name('backend.ajax.bookings');
});

Route::post('uploadfile','CleanerController@saveUploadedFile')->name('save_uploaded_file');
