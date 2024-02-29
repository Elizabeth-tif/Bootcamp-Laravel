<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\jawabController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\tanyajawabController;
use App\Http\Controllers\versionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [dashboardController::class, 'login']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    // CRUD Profile
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::get('/profile/update', [ProfileController::class, 'edit']);
    Route::put('/profile/{id}', [ProfileController::class, 'update']);

    // CRUD Tanya
    Route::post('/tanyajawab/store', [tanyajawabController::class, 'store']);
    Route::put('/tanyajawab/{id}/update', [tanyajawabController::class, 'update']);
    Route::delete('/tanyajawab/{id}/delete', [tanyajawabController::class, 'delete']);

    //CRUD Jawab
    Route::post('/jawab/store', [jawabController::class, 'store']);
    Route::put('/jawab/{id}/update', [jawabController::class, 'update']);
    Route::delete('/jawab/{id}/delete', [jawabController::class, 'delete']);
});

// Route untuk show detail pertanyaan
Route::get('/tanyajawab/{id}', [tanyajawabController::class, 'show']);

// buat ngerapihin pake route di bawah aja, langsung arahin ke bladenya aja
// di bawah contoh untuk ngeliat tampilan versi

// Route untuk version
Route::get('/versi', [versionController::class, 'index']);

// Route untuk tanya jawab
Route::get('/tanyajawab', [tanyajawabController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
