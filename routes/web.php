<?php

use App\Http\Controllers\DrinkController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect('/api/documentation');
});


