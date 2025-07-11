<?php

use App\Http\Controllers\Sesicontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view(view: 'welcome');
});


Route::get('/loginform',[Sesicontroller::class,'Login'])->name('login.show');
Route::post('/loginform',[Sesicontroller::class,'LoginData'])->name('login.valid');
Route::get('/register', [SesiController::class, 'createRegister'])->name('register.show'); // Menampilkan form registrasi
Route::post('/register', [SesiController::class, 'register'])->name('register.valid');


