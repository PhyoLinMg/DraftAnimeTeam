<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\v1;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//api/v1

Route::prefix('v1')->group(function(){
    Route::apiResource('battles',BattleController::class);
    Route::apiResource('boards',BoardController::class);
});
