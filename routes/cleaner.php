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

Route::get('/', 'HomeController@index')->name('cleaner.home');
Route::get('/calendar', 'HomeController@calendar')->name('cleaner.calendar');
Route::get('/profile', 'HomeController@profile')->name('cleaner.profile');
Route::get('/resources', 'ResourceController@index')->name('cleaner.resources');
Route::get('resource/view/{id?}', 'ResourceController@view')->name('cleaner.resource.view');
Route::get('/bookings', 'BookingController@index')->name('cleaner.bookings');
Route::get('booking/view/{id?}', 'BookingController@view')->name('cleaner.booking.view');
Route::get('review-and-confirm-booking/{token}', 'BookingController@reviewAndConfirm')->name('front.confirm_booking_cleaner');

Route::prefix('ajax')->group(function () {
    Route::post('profile/partial', 'HomeController@profile')->name('cleaner.ajax.profile.partial');
    Route::post('profile/personal_info', 'HomeController@personal_info')->name('cleaner.ajax.profile.personal_info');
    Route::post('profile/account_info', 'HomeController@account_info')->name('cleaner.ajax.profile.account_info');
    Route::post('profile/visa_documents','HomeController@visa_documents')->name('cleaner.ajax.profile.visa_documents');
    Route::post('profile/update_services', 'HomeController@update_services')->name('cleaner.ajax.profile.update_services');
    Route::post('profile/update_availability', 'HomeController@update_availability')->name('cleaner.ajax.profile.update_availability');
    Route::post('profile/update_service_area', 'HomeController@update_service_area')->name('cleaner.ajax.profile.update_service_area');

    Route::get('resources/list', 'ResourceController@getAllResources')->name('cleaner.ajax.resources');
    Route::get('booking/list', 'BookingController@getAllBookings')->name('cleaner.ajax.bookings');

});

