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
Route::get('/book-a-cleaning-job', 'HomeController@bookACleaningJob')->name('front.book_a_cleaning_job');

Route::match(['GET', 'POST'], '/registercleaner', [
    'uses' => 'HomeController@registerCleaner',
    'as'   =>  'front.register_cleaner'
]);

Route::post('/get-services', 'BookingController@getServices')->name('front.get_services');
Route::post('/add-booking', 'BookingController@addBooking')->name('front.add_booking');
Route::get('/booking-completed', 'BookingController@bookingCompleted')->name('front.booking_completed');
Route::get('/booking-confirm', 'BookingController@bookingConfirmed')->name('front.booking_confirm');
Route::get('/booking-failed', 'BookingController@bookingFailed')->name('front.booking_failed');

Route::match(['GET','POST'], '/registercustomer', 'CustomerController@registerCustomer')->name('front.register_customer');

Route::get('/mytest', 'HomeController@test');

Route::get('review-and-confirm-booking/{token}', 'BookingController@reviewAndConfirm')->name('front.confirm_booking_cleaner');
