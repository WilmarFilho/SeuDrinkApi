<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BebidaController;
use App\Http\Controllers\FrutaController;
use App\Http\Controllers\IngredienteController;

Route::get('/', function () {
    return view('welcome');
});



Route::group(['prefix' => 'api/v1'], function() {
    Route::get('/bebidas/{value?}', [BebidaController::class, 'index']);
    Route::get('/frutas/{value?}', [FrutaController::class, 'index']);
    Route::get('/ingredientes/{value?}', [IngredienteController::class, 'index']);
});