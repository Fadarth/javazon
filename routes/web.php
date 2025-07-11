<?php

use App\Http\Controllers\Sesicontroller;
use App\Http\Controllers\AddBarangController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view(view: 'welcome');
});
Route::get('shop', [ShopController::class, 'index'])->name('shop.index');

Route::get('add-barang', [AddBarangController::class, 'index']);
Route::get('add-barang/add', [AddBarangController::class, 'create']);
Route::post('add-barang/add', [AddBarangController::class, 'store'])->name('add-barang.store');
Route::get('add-barang/edit/{id}', [AddBarangController::class, 'edit'])->name('add-barang.edit');;
Route::patch('add-barang/{id}', [AddBarangController::class, 'update'])->name('add-barang.update');;
Route::delete('add-barang/{id}', [AddBarangController::class, 'delete'])->name('add-barang.delete');;


Route::get('/loginform',[Sesicontroller::class,'Login'])->name('login.show');
Route::post('/loginform',[Sesicontroller::class,'LoginData'])->name('login.valid');
Route::get('/register', [SesiController::class, 'createRegister'])->name('register.show'); // Menampilkan form registrasi
Route::post('/register', [SesiController::class, 'register'])->name('register.valid');

Route::get('/register', function() {
    return view('auth.register');
})->name('register');

