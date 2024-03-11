<?php

use App\Http\Controllers\OwnerController;

Route::resource('owners', OwnerController::class);
Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
