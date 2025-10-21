<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\PostulantesController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::prefix('admin')->name('admin.')->group(function () {
//     Route::resource('postulantes', PostulantesController::class);


Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('postulantes', App\Http\Controllers\admin\PostulantesController::class);
});

