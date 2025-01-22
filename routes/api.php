<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\v1\BattleController;
use App\Http\Controllers\API\v1\MatchMakingQueueController;
use App\Http\Controllers\API\v1\BoardController;
use App\Http\Controllers\API\v1\PlayerController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//api/v1

Route::prefix('v1')->group(function(){
    Route::apiResource('battles',BattleController::class);
    Route::apiResource('boards',BoardController::class);
    Route::post('queue', [MatchMakingQueueController::class,'create']);
    Route::get('match', [MatchMakingQueueController::class,'match']);

    Route::get('random', [PlayerController::class,'showCharacter']);
    Route::post('characters/pick', [PlayerController::class,'assignCharacterToPlayer']);
});
