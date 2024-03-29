<?php

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


Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('kriteria', '\App\Http\Controllers\KriteriaController');
    Route::resource('minimarket', '\App\Http\Controllers\MinimarketController');
    Route::resource('sub_kriteria', '\App\Http\Controllers\SubKriteriaController');
    Route::resource('penilaian', '\App\Http\Controllers\PenilaianController');
    Route::resource('hasil', '\App\Http\Controllers\HasilController');
});
