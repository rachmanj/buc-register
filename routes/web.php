<?php

use App\Http\Controllers\BucController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PersonInchargeController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;


// Register
Route::middleware('guest')->prefix('register')->name('register.')->group(function () {
  Route::get('/', [RegisterController::class, 'index'])->name('index');
  Route::post('/', [RegisterController::class, 'store'])->name('store');
});

// Login
Route::middleware('guest')->group(function () {
  Route::get('/login', [LoginController::class, 'index'])->name('login');
  Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware('auth')->group(function () {
  Route::get('/', [HomeController::class, 'index'])->name('home');
});


//Person In Charge
Route::middleware('auth')->prefix('pincharges')->name('person_incharge.')->group(function () {
  Route::get('/data', [PersonInchargeController::class, 'index_data'])->name('index.data');
  
  Route::put('/activate', [PersonInchargeController::class, 'activate'])->name('activate');
  Route::get('/', [PersonInchargeController::class, 'index'])->name('index');
  Route::get('/create', [PersonInchargeController::class, 'create'])->name('create');
  Route::post('/', [PersonInchargeController::class, 'store'])->name('store');
  Route::get('/{id}/edit', [PersonInchargeController::class, 'edit'])->name('edit');
  Route::put('/{id}', [PersonInchargeController::class, 'update'])->name('update');
  Route::delete('/{id}', [PersonInchargeController::class, 'destroy'])->name('destroy');
});


// BUCs
Route::middleware('auth')->prefix('bucs')->name('buc.')->group(function () {
  Route::get('/data', [BucController::class, 'index_data'])->name('index.data');

  Route::get('/', [BucController::class, 'index'])->name('index');
  Route::get('/create', [BucController::class, 'create'])->name('create');
  Route::post('/', [BucController::class, 'store'])->name('store');
  Route::get('/{id}/edit', [BucController::class, 'edit'])->name('edit');
  Route::put('/{id}', [BucController::class, 'update'])->name('update');
  Route::delete('/{id}', [BucController::class, 'destroy'])->name('destroy');
});
