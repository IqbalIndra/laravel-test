<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Protected Routes

Route::group(['middleware' => 'auth:api'], function () {
    //Hotel routes
    Route::post('hotels', 'HotelContoller@store');
    Route::put('hotels/{hotel}', 'HotelContoller@update');
    Route::delete('hotels/{hotel}', 'HotelContoller@destroy');
    Route::get('hotels/all', 'HotelContoller@getAllHotels');

    Route::get('hotels/all-without-pagination', 'HotelContoller@getAllHotelsWithoutPagination');

    //Room routes
    Route::post('rooms', 'RoomContoller@store');
    Route::put('rooms/{room}', 'RoomContoller@update');
    Route::delete('rooms/{room}', 'RoomContoller@destroy');
    Route::get('rooms', 'RoomContoller@index');

    //Booking routes
    Route::get('bookings', 'BookingContoller@index');
    Route::get('bookings/user/{user}', 'BookingContoller@getUserBookings');
    Route::get('all-payment-bookings', 'BookingContoller@getAllPaymentBooking');
    Route::get('all-payment-bookings/user/{user}', 'BookingContoller@getUserBookingsPaymentStatus');
    Route::put('/bookings/{id}/update-status', 'BookingContoller@updateStatus');

    //Review routes

    Route::get('reviews', 'ReviewContoller@index');
    Route::post('reviews', 'ReviewContoller@store');
    Route::put('reviews/{review}', 'ReviewContoller@update');
    Route::delete('reviews/{review}', 'ReviewContoller@destroy');
    Route::get('reviews/user/{user}', 'ReviewContoller@getUserReviews');

    //User routes

    Route::get('users/{user}', 'UserContoller@show');
    Route::put('users/{user}', 'UserContoller@update');
    Route::put('users/{user}/update-personal-info', 'UserContoller@updatePersonalInfo');
    Route::put('users/{user}/update-email', 'UserContoller@updateEmail');
    Route::put('users/{user}/update-password', 'UserContoller@updatePassword');
    Route::delete('users/{user}', 'UserContoller@destroy');
});


Route::post('bookings', 'BookingContoller@store');


//Hotel routes
Route::get('hotels', 'HotelContoller@index');
Route::post('hotels/search', 'HotelContoller@search');
Route::get('hotels/search', 'HotelContoller@getSearchData');
Route::get('hotels/images', 'HotelContoller@getHotelImages');
Route::get('hotels/{hotel}', 'HotelContoller@show');

//Room routes
Route::get('rooms/{room}', 'RoomContoller@show');

//User routes

Route::post('login', 'UserContoller@login'); //auth
Route::post('register', 'UserContoller@register'); //auth

//Feature routes

Route::get('features', 'FeatureContoller@index');
Route::get('features/{feature}', 'FeatureContoller@show');
Route::post('features', 'FeatureContoller@store');
Route::put('features/{feature}', 'FeatureContoller@update');
Route::delete('features/{feature}', 'FeatureContoller@destroy');

//Review routes
//if no logged
Route::get('reviews/hotel/{hotel}/', 'ReviewContoller@getHotelReviews');
//if logged
Route::get('reviews/hotel/{hotel}/{user}', 'ReviewContoller@getHotelReviews');
