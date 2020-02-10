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
Route::get('/not-authorized-booking', 'BookingController@notAuthorizedBooking')->name('front.not_authorized_booking');
Route::get('/assign-cleaners/{id}', 'BookingController@assignCleaners')->name('front.assign_cleaners');
Route::get('/booking-confirm', 'BookingController@bookingConfirmed')->name('front.booking_confirm');
Route::get('/booking-failed', 'BookingController@bookingFailed')->name('front.booking_failed');
Route::post('/send-notification-all/{id}', 'BookingController@sendNotificationToAllCleaner')->name('front.send_notification_all');

Route::match(['GET','POST'], '/registercustomer', 'CustomerController@registerCustomer')->name('front.register_customer');

Route::get('/mytest', 'HomeController@test');

Route::get('mailable1', function () {
    $booking = App\Models\Booking::find(1);
    $cleaner = App\Models\Cleaner::find(1);
    return new App\Mail\NewBookingAvailable($booking,$cleaner);
});
Route::get('mailable2', function () {
    $booking = App\Models\Booking::find(1);
    return new App\Mail\BookingConfirmation($booking);
});
Route::get('mailable3', function () {
    $booking = App\Models\Booking::find(1);

    return new App\Mail\CleanerAssigned($booking);
});
