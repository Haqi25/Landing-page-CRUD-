<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\produkController;
Route::get('/', function () {
    return view('welcome');
});



Route::resource('dashboard',produkController::class );