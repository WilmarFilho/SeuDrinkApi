<?php

use App\Http\Controllers\SugestaoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BebidaController;
use App\Http\Controllers\FrutaController;
use App\Http\Controllers\IngredienteController;
use App\Http\Controllers\DrinkController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');




Route::get('/bebidas', [BebidaController::class, 'index']);
Route::post('/bebida/novo', [BebidaController::class, 'store']);
Route::put('/bebida/{id}', [BebidaController::class, 'update']);

Route::get('/frutas', [FrutaController::class, 'index']);
Route::post('/fruta/novo', [FrutaController::class, 'store']);
Route::put('/fruta/{id}', [FrutaController::class, 'update']);

Route::get('/ingredientes', [IngredienteController::class, 'index']);
Route::post('/ingrediente/novo', [IngredienteController::class, 'store']);
Route::put('/ingrediente/{id}', [IngredienteController::class, 'update']);

Route::get('/drink', [DrinkController::class, 'index']);
Route::post('/drink/novo', [DrinkController::class, 'store']);
Route::post('/drink/{id}', [DrinkController::class, 'update']);

Route::get('/sugestoes', [SugestaoController::class, 'index']);
Route::post('/sugestao/novo', [SugestaoController::class, 'store']);
