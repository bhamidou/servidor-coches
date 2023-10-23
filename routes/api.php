<?php

use App\Http\Controllers\Coche;
use App\Http\Controllers\Persona;
use App\Http\Controllers\Propiedad;
use App\Http\Controllers\Rent;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::controller(Coche::class)->group( function () {
    Route::get('cars','index');
    Route::get('car/{matricula}','show');
    Route::post('car','store');
    Route::put('car/{id}','update');
    Route::delete('car/{id}','destroy');
})->middleware('login');


Route::controller(Persona::class)->group( function () {
    Route::get('users','index');
    Route::get('user/{id}','show');
    Route::post('user','store');
    Route::put('user/{id}','update');
    Route::delete('user/{id}','destroy');
})->middleware('login');

Route::controller(Propiedad::class)->group( function () {
    Route::get('property/{id}','show');
    Route::put('property/{id}','update');
    Route::delete('property/{id}','destroy');

    Route::get('available-rents','index');
    Route::get('old-rents','showByID');
    Route::post('rent','store');
})->middleware('login');


Route::controller(Rent::class)->group( function () {
    Route::get('return-car','returnRentedCar');
    Route::post('rent/{matricula}','rentCar');
    
    Route::get('ranking','ranking');

})->middleware('login');