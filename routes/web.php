<?php

use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Auth;
  
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
  
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
  
Route::get('/', function () {
    return view('welcome');
});
  
Auth::routes();
  
/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');

    Route::get('/admin/buku', [BukuController::class, 'index'])->name('buku');
    Route::get('/admin/tambah_buku', [BukuController::class, 'create'])->name('tambah');
    Route::post('/admin/simpan', [BukuController::class, 'store'])->name('simpan');
    
    Route::get('/admin/user', [HomeController::class, 'user'])->name('user');
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:petugas'])->group(function () {
  
    Route::get('/petugas/home', [HomeController::class, 'petugasHome'])->name('petugas.home');
});