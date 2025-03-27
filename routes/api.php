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
Route::get('/frutas', [FrutaController::class, 'index']);
Route::get('/ingredientes', [IngredienteController::class, 'index']);
Route::get('/drink', [DrinkController::class, 'index']);

Route::post('/drink/novo', [DrinkController::class, 'store']);
Route::post('/fruta/novo', [FrutaController::class, 'store']);
Route::post('/bebida/novo', [BebidaController::class, 'store']);
Route::post('/ingrediente/novo', [IngredienteController::class, 'store']);
Route::post('/sugestao/novo', [SugestaoController::class, 'store']);