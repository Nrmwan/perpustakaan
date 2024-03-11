<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BukuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KbukuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PublicController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PublicController::class, 'index'], function () {
    return view('home_gues');
});

Auth::routes();

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/peminjaman', [HomeController::class, 'nyileh'])->name('pinjam');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    // buku
    Route::get('/admin/buku', [BukuController::class, 'index'])->name('buku');
    Route::get('/admin/tambah-buku', [BukuController::class, 'create'])->name('tambah-buku');
    Route::post('/admin/simpan-buku', [BukuController::class, 'store'])->name('simpan-buku');
    Route::get('/admin/edit-buku/{id}', [BukuController::class, 'edit'])->name('edit-buku');
    Route::get('/admin/hapus-buku/{id}', [BukuController::class, 'destroy'])->name('hapus-buku');
    Route::post('/admin/update-buku/{id}', [BukuController::class, 'update'])->name('update-buku');

    // Peminjaman
    Route::get('/admin/peminjam', [PeminjamanController::class, 'create'])->name('peminjam');
    Route::get('/admin/data-peminjam', [PeminjamanController::class, 'index'])->name('data-peminjam');
    // Route::get('/admin/tambah-peminjaman', [PeminjamanController::class, 'create'])->name('tambah-peminjaman');
    Route::post('/admin/simpan-peminjaman', [PeminjamanController::class, 'store'])->name('simpan-peminjaman');

    Route::get('/admin/kembalikan', [PeminjamanController::class, 'mbalekke'])->name('kembalikan');
    Route::post('/admin/simpen', [PeminjamanController::class, 'simpen'])->name('simpen');

    // kategori
    Route::get('/admin/kategori', [KbukuController::class, 'index'])->name('kategori');
    Route::get('/admin/tambah-kategori', [KbukuController::class, 'create'])->name('tambah-kategori');
    Route::post('/admin/simpan-kategori', [KbukuController::class, 'store'])->name('simpan-kategori');
    Route::get('/admin/edit-kategori/{id}', [KbukuController::class, 'edit'])->name('edit-kategori');
    Route::get('/admin/hapus-kategori/{id}', [KbukuController::class, 'destroy'])->name('hapus-kategori');
    Route::post('/admin/update-kategori/{id}', [KbukuController::class, 'update'])->name('update-kategori');

    // user
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('/admin/user', [HomeController::class, 'user'])->name('user');
    Route::get('/admin/tambah-user', [HomeController::class, 'create'])->name('tambah-user');
    Route::post('/admin/simpan-user', [HomeController::class, 'store'])->name('simpan-user');
    Route::get('/admin/edit-user/{id}', [HomeController::class, 'edit'])->name('edit-user');
    Route::get('/admin/hapus-user/{id}', [HomeController::class, 'destroy'])->name('hapus-user');
    Route::post('/admin/update-user/{id}', [HomeController::class, 'update'])->name('update-user');
});

