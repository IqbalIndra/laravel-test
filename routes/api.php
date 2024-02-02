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
    Route::post('hotels', ['HotelContoller::class,store']);
    Route::put('hotels/{hotel}', ['HotelContoller::class,update']);
    Route::delete('hotels/{hotel}', ['HotelContoller::class,destroy']);
    Route::get('hotels/all', ['HotelContoller::class,getAllHotels']);

    Route::get('hotels/all-without-pagination', ['HotelContoller::class,getAllHotelsWithoutPagination']);

    //Room routes
    Route::post('rooms', ['RoomContoller::class,store']);
    Route::put('rooms/{room}', ['RoomContoller::class,update']);
    Route::delete('rooms/{room}', ['RoomContoller::class,destroy']);
    Route::get('rooms', ['RoomContoller::class,index']);

    //Booking routes
    Route::get('bookings', ['BookingContoller::class,index']);
    Route::get('bookings/user/{user}', ['BookingContoller::class,getUserBookings']);
    Route::get('all-payment-bookings', ['BookingContoller::class,getAllPaymentBooking']);
    Route::get('all-payment-bookings/user/{user}', ['BookingContoller::class,getUserBookingsPaymentStatus']);
    Route::put('/bookings/{id}/update-status', ['BookingContoller::class,updateStatus']);

    //Review routes

    Route::get('reviews', ['ReviewContoller::class,index']);
    Route::post('reviews', ['ReviewContoller::class,store']);
    Route::put('reviews/{review}', ['ReviewContoller::class,update']);
    Route::delete('reviews/{review}', ['ReviewContoller::class,destroy']);
    Route::get('reviews/user/{user}', ['ReviewContoller::class,getUserReviews']);

    //User routes

    Route::get('users/{user}', ['UserContoller::class,show']);
    Route::put('users/{user}', ['UserContoller::class,update']);
    Route::put('users/{user}/update-personal-info', ['UserContoller::class,updatePersonalInfo']);
    Route::put('users/{user}/update-email', ['UserContoller::class,updateEmail']);
    Route::put('users/{user}/update-password', ['UserContoller::class,updatePassword']);
    Route::delete('users/{user}', ['UserContoller::class,destroy']);
});


Route::post('bookings', ['BookingContoller::class,store']);


//Hotel routes
Route::get('hotels', ['HotelContoller::class,index']);
Route::post('hotels/search', ['HotelContoller::class,search']);
Route::get('hotels/search', ['HotelContoller::class,getSearchData']);
Route::get('hotels/images', ['HotelContoller::class,getHotelImages']);
Route::get('hotels/{hotel}', ['HotelContoller::class,show']);

//Room routes
Route::get('rooms/{room}', ['RoomContoller::class,show']);

//User routes

Route::post('login', ['UserContoller::class,login']); //auth
Route::post('register', ['UserContoller::class,register']); //auth

//Feature routes

Route::get('features', ['FeatureContoller::class,index']);
Route::get('features/{feature}', ['FeatureContoller::class,show']);
Route::post('features', ['FeatureContoller::class,store']);
Route::put('features/{feature}', ['FeatureContoller::class,update']);
Route::delete('features/{feature}', ['FeatureContoller::class,destroy']);

//Review routes
//if no logged
Route::get('reviews/hotel/{hotel}/', ['ReviewContoller::class,getHotelReviews']);
//if logged
Route::get('reviews/hotel/{hotel}/{user}', ['ReviewContoller::class,getHotelReviews']);
