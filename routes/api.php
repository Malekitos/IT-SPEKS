<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JaunumiController;

use App\Http\Controllers\VakanceController;
Route::apiResource('vakances', VakanceController::class);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});





