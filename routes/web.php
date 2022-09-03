<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JawabanController;
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
    return view('auth.login');
});

Route::get('/dashboard',[PertanyaanController::class,'dashboard']);


// Route CRUD Pertanyaan
Route::resource('pertanyaan', PertanyaanController::class);

// Route CRUD Kategori
Route::resource('kategori', KategoriController::class);

// Route Edit Profile
Route::resource('profile', ProfileController::class)->only('index', 'update');

Route::middleware(['auth'])->group(function () {

    // Jawaban/Reply
    Route::post('/jawaban/{pertanyaan_id}', [JawabanController::class, 'tambah']);
});

Auth::routes();

