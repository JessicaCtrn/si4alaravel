<?php

use App\Http\Controllers\FakultasController; 
use App\Http\Controllers\ProdiController; 
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profil', function () {
    return view('profile');
});
Route::resource('/fakultas', FakultasController::class);
Route::resource('/prodi', ProdiController::class);