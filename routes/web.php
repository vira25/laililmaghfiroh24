<?php

use App\Http\Controllers\pegawaiController;
use App\Http\Controllers\SessionContoller;
use App\Models\pegawai;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('pegawai', pegawaiController::class);


Route::get('/sesi', [SessionContoller::class, 'index']);
Route::post('/sesi/login', [SessionContoller::class, 'login']);
Route::get('/sesi/logout', [SessionContoller::class, 'logout']);
Route::get('/sesi/register', [SessionContoller::class, 'register']);
Route::post('/sesi/create', [SessionContoller::class, 'create']);