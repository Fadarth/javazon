<?php

use App\Http\Controllers\AddBarangController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

<<<<<<< HEAD
Route::get('shop', [ShopController::class, 'index'])->name('shop.index');

Route::get('add-barang', [AddBarangController::class, 'index']);
Route::get('add-barang/add', [AddBarangController::class, 'create']);
Route::post('add-barang/add', [AddBarangController::class, 'store'])->name('add-barang.store');
Route::get('add-barang/edit/{id}', [AddBarangController::class, 'edit'])->name('add-barang.edit');;
Route::patch('add-barang/{id}', [AddBarangController::class, 'update'])->name('add-barang.update');;
Route::delete('add-barang/{id}', [AddBarangController::class, 'delete'])->name('add-barang.delete');;
=======

Route::get('/loginform', function () {
    return view('loginform.login'); 
});

Route::get('/register', function() {
    return view('auth.register');
})->name('register');
>>>>>>> eb788a0c001dcf52b45c9fe6710055198b89ed86
