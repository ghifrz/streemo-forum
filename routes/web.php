<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\KategoriController;
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
// test bot gitlab

Route::get('/', function () {
    return view('dashboard');
});

// Route CRUD Pertanyaan
Route::resource('pertanyaan', PertanyaanController::class);

// Route CRUD Kategori
Route::resource('kategori', KategoriController::class);
