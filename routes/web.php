<?php

use App\Http\Controllers\OwnerController;
use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::post('/car/store', [CarController::class, 'store'])->name('car.store');
Route::post('/car/create', [CarController::class, 'create'])->name('car.create');
Route::post('/car/{id}/edit', [CarController::class, 'edit'])->name('car.edit');
Route::put('/car/{id}/edit', [CarController::class, 'edit'])->name('car.edit');
Route::put('/car/store', [CarController::class, 'store'])->name('car.store');
Route::put('/car/create', [CarController::class, 'create'])->name('car.create');

Route::resource('owners', OwnerController::class);
Route::resource('cars', CarController::class);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
