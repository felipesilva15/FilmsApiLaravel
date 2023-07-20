<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\TelephoneController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Auth
Route::post('login', [AuthController::class, 'login']);
Route::post('refresh-token', [AuthController::class, 'refresh']);
Route::get('me', [AuthController::class, 'me']);
Route::post('logout', [AuthController::class, 'logout']);

Route::group(['middleware' => 'auth:api'], function () {
    // Customers
    Route::apiResource('customer', CustomerController::class);
    Route::get('customer/{id}/telephone', [CustomerController::class, 'telephone']);
    Route::get('customer/{id}/rentedFilms', [CustomerController::class, 'rentedFilms']);

    // Telephones
    Route::apiResource('telephone', TelephoneController::class);
    Route::get('telephone/{id}/customer', [TelephoneController::class, 'customer']);

    // Films
    Route::apiResource('film', FilmController::class);

    // Users
    Route::apiResource('user', UserController::class);
});