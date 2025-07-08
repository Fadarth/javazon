<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/loginform', function () {
    return view('loginform.login'); 
});

Route::get('/register', function() {
    return view('auth.register');
})->name('register');