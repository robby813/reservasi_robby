<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;



// Tampilkan halaman login
use App\Http\Controllers\Auth\LoginController;

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login_proses', [LoginController::class, 'login'])->name('login_proses');
});


Route::get('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\AdminController;
Route::resource('/admin', \App\Http\Controllers\AdminController::class, );
use App\Http\Controllers\HomeController;
Route::resource('/', \App\Http\Controllers\HomeController::class);
Route::resource('/home', \App\Http\Controllers\HomeController::class);
Route::resource('/about', \App\Http\Controllers\AboutController::class);
Route::resource('/servis', \App\Http\Controllers\ServisController::class);
Route::resource('/packages', \App\Http\Controllers\PackagesController::class);
Route::resource('/blog', \App\Http\Controllers\BlogController::class);
Route::resource('/contact', \App\Http\Controllers\ContactController::class);
Route::resource('/booking', \App\Http\Controllers\BookingController::class);
Route::resource('/paket_wisata', \App\Http\Controllers\PaketWisataController::class);
// Route::resource('/pelanggan', \App\Http\Controllers\LoginPelangganController::class);
// Route::resource('/register', \App\Http\Controllers\RegisterController::class);


use App\Http\Controllers\KategoriWisataController;

Route::resource('kategori_wisata', KategoriWisataController::class);

use App\Http\Controllers\KategoriBeritaController;

Route::resource('kategori_berita', KategoriBeritaController::class);

use App\Http\Controllers\PelangganController;

Route::resource('pelanggan', PelangganController::class);

use App\Http\Controllers\KaryawanController;

Route::resource('karyawan', KaryawanController::class);

use App\Http\Controllers\ObyekWisataController;

Route::resource('obyek_wisata', ObyekWisataController::class);
Route::get('/obyek_wisata/create', [ObyekWisataController::class, 'create'])->name('obyek_wisata.create');

use App\Http\Controllers\PenginapanController;

use App\Http\Controllers\BeritaController;

Route::resource('berita', BeritaController::class);



Route::resource('penginapan', PenginapanController::class);

use App\Http\Controllers\ReservasiController;
Route::resource('reservasi', ReservasiController::class);





Route::prefix('pelanggan')->name('pelanggan.')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    // Route lain seperti post login dll
});
