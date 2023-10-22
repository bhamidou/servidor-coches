<?php

use App\Http\Controllers\Coche;
use App\Http\Controllers\Persona;
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
    Route::get('coches','index');
    Route::post('coche','store');
    Route::put('coche/{id}','update');
    Route::delete('coche/{id}','destroy');
});


Route::controller(Persona::class)->group( function () {
    Route::get('personas','index');
    Route::get('personas/{id}','show');
    Route::post('personas','store');
    Route::put('personas/{id}','update');
    Route::delete('personas/{id}','destroy');
});