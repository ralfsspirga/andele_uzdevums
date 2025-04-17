<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharacterApiController;

Route::get('/', function () {
    return view('home');
});

Route::controller(CharacterApiController::class)->prefix('characters')->group(function () {
    Route::get('/', 'getCharacterList');
    Route::get('/{characterId}', 'getCharacter');
});