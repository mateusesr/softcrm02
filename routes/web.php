<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('client',[ClientController::class, "store"]);
Route::get('/client/create',[ClientController::class, "create"]);
Route::get('/client',[ClientController::class, "index"]);
