<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\TelephoneController;
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

// Customers
Route::apiResource('customer', CustomerController::class);
Route::get('customer/{id}/telephone', [CustomerController::class, 'telephone']);
Route::get('customer/{id}/rentedFilms', [CustomerController::class, 'rentedFilms']);

// Telephones
Route::apiResource('telephone', TelephoneController::class);
Route::get('telephone/{id}/customer', [TelephoneController::class, 'customer']);

// Films
Route::apiResource('film', FilmController::class);