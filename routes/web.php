<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\CharacterController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/animes', [AnimeController::class, 'index'])->name('animes.index');
Route::post('/animes', [AnimeController::class, 'store'])->name('animes.store');

Route::get('/characters', [CharacterController::class, 'index'])->name('characters.index');
Route::post('/characters', [CharacterController::class, 'store'])->name('characters.store');
