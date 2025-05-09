<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\Auth_LoginController;
use App\Http\Controllers\PenginapanController;
use App\Http\Controllers\ObyekWisataController;
use App\Http\Controllers\PaketWisataController;
use App\Http\Controllers\KategoriBeritaController;
use App\Http\Controllers\KategoriWisataController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest:karyawan')->group(function () {
    Route::get('/login_kantorans', [Auth_LoginController::class, 'index'])->name('login');
    Route::post('/authenticate', [Auth_LoginController::class, 'authenticate'])->name('authenticate');
});

Route::get('/logout_kantorans', [Auth_LoginController::class, 'logout'])->name('logout_kantorans');

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [\App\Http\Controllers\Auth_PelangganController::class, 'index'])->name('pelanggan.login');
    Route::post('/login_proses', [\App\Http\Controllers\Auth_PelangganController::class, 'login_proses'])->name('login_proses');
});

Route::get('/logout', [\App\Http\Controllers\Auth_PelangganController::class, 'logout'])->name('logout');


Route::middleware('auth:karyawan')->group(function () {
    Route::resource('/admin', \App\Http\Controllers\AdminController::class, );
    Route::resource('berita', BeritaController::class);
    Route::resource('reservasi', ReservasiController::class);
    Route::resource('kategori_wisata', KategoriWisataController::class);
    Route::resource('kategori_berita', KategoriBeritaController::class);
    Route::resource('karyawan', KaryawanController::class);
    Route::resource('obyek_wisata', ObyekWisataController::class);
    Route::resource('paket_wisata', PaketWisataController::class);
    Route::resource('penginapan', PenginapanController::class);
    Route::resource('pelanggan', PelangganController::class);
    Route::resource('/paket_wisata', \App\Http\Controllers\PaketWisataController::class);
    Route::get('/obyek_wisata/create', [ObyekWisataController::class, 'create'])->name('obyek_wisata.create');

});
Route::resource('/', \App\Http\Controllers\HomeController::class);
Route::resource('/home', \App\Http\Controllers\HomeController::class);
Route::resource('/about', \App\Http\Controllers\AboutController::class);
Route::resource('/servis', \App\Http\Controllers\ServisController::class);
Route::resource('/packages', \App\Http\Controllers\PackagesController::class);
Route::resource('/blog', \App\Http\Controllers\BlogController::class);
Route::resource('/contact', \App\Http\Controllers\ContactController::class);
Route::resource('/booking', \App\Http\Controllers\BookingController::class);

// Route::resource('/pelanggan', \App\Http\Controllers\LoginPelangganController::class);
// Route::resource('/register', \App\Http\Controllers\RegisterController::class);








