<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\HotelsMappingController;

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

Route::apiResource('hotels', HotelController::class);
Route::apiResource('facilities', FacilityController::class);
Route::post('hotels-mappings', [HotelsMappingController::class, 'store']);
Route::get('hotels-customizable/{hotelId}/{sourceId}', [HotelsMappingController::class, 'listCustomizable']);
