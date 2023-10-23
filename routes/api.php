<?php

use App\Http\Controllers\Coche;
use App\Http\Controllers\Persona;
use App\Http\Controllers\Propiedad;
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

Route::get('ranking',[Coche::class,'ranking'])->middleware('login');

Route::controller(Coche::class)->group( function () {
    // Route::get('car','index');
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
    Route::get('properties','index');
    Route::get('property/{id}','show');
    Route::post('property','store');
    Route::put('property/{id}','update');
    Route::delete('property/{id}','destroy');
    Route::get('returnRent','returnRentedCar');
})->middleware('login');

