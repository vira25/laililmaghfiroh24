<?php

use App\Http\Controllers\pegawaiController;
use App\Http\Controllers\LoginController; 
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('pegawai', pegawaiController::class)->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/login', [LoginController::class, 'login']);
Route::get('/login/logout', [LoginController::class, 'logout']);
Route::get('/login/register', [LoginController::class, 'register']);
Route::post('/login/create', [LoginController::class, 'create']);