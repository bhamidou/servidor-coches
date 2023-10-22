<?php

use App\Http\Controllers\Coche;
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
    Route::get('coches','show');
    Route::post('coche','store');
    Route::put('coche/{id}','update');
    Route::delete('coche/{id}','destroy');
});