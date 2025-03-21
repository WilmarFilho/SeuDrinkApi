<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BebidaController;

Route::get('/', function () {
    return view('welcome');
});




Route::group(['prefix' => 'api/v1'], function() {
    Route::get('/bebidas/{value?}', [BebidaController::class, 'index']);
});