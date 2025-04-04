<?php

use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\HouseController;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::get('/address', [AddressController::class, 'index']);
Route::get('/house', [HouseController::class, 'index']);
Route::post('/house', [HouseController::class, 'validateStore']);
