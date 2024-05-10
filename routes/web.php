<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/// routes/web.php
 use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\BoatController;
use App\Http\Controllers\BoatDetailController;
use App\Http\Controllers\BoatRentalRequestController;

Route::get('/rental-requests', [BoatRentalRequestController::class, 'getAllRental']);
Route::put('/accept-request/{requestId}', [BoatRentalRequestController::class, 'acceptRequest']);
Route::delete('delete-request/{id}', [BoatRentalRequestController::class, 'deleteRequest']);

Route::delete('cancel-request/{id}', [BoatRentalRequestController::class, 'cancelRequest']);
Route::get('/rental-requests/{registrationId}', [BoatRentalRequestController::class, 'fetchRentalRequests']);
Route::post('/rental-request', [BoatRentalRequestController::class, 'store']);
Route::get('/user/{user_id}',[RegistrationController::class,'show']);
//Route::get('/boat-details/{boat_id}', [BoatDetailController::class, 'shows']);
Route::get('/boat-details/{boat_id}', [BoatDetailController::class, 'show']);
Route::post('/boat-details', [BoatDetailController::class, 'store']);
Route::post('/boats', [BoatController::class, 'store']);
Route::get('/boats', [BoatController::class, 'data']);
Route::post('/reg', [RegistrationController::class, 'register']);
Route::post('/login', [RegistrationController::class, 'login']);
 Route::post('/sign', [AuthController::class, 'signup']);
 

Route::get('/hello', function () {
    return view('hello');
});


Route::get('/', function () {
    return view('welcome');
});
