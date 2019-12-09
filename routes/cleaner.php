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

Route::prefix('ajax')->group(function () {
    Route::post('profile/partial', 'HomeController@profile')->name('cleaner.ajax.profile.partial');
    Route::post('profile/personal_info', 'HomeController@personal_info')->name('cleaner.ajax.profile.personal_info');

});

// Route::get('/become-a-cleaner', 'HomeController@becomeACleaner')->name('front.become_a_cleaner');

// Route::match(['GET', 'POST'], '/registercleaner', [
//     'uses' => 'HomeController@registerCleaner',
//     'as'   =>  'front.register_cleaner'
// ]);
