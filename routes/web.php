<?php

use App\Http\Controllers\OwnerController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ShortCodeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Auth::routes();
Route::get('/cars/{id}/specific', [CarController::class, 'specific'])->name('cars.specific');
Route::get('/cars/{id}/photoDelete', [CarController::class, 'photoDelete'])->name('cars.photoDelete');

Route::resource('owners', OwnerController::class)->except(['edit', 'delete']);
Route::middleware([ 'auth'])->group(function (){
    Route::resource('owners', OwnerController::class)->only(['edit', 'delete']);
    Route::resource('cars', CarController::class);
    Route::resource('shortcode', ShortCodeController::class);
});


Route::post('/cars/save', [CarController::class, 'save'])->name('cars.save');
Route::post('/cars/create', [CarController::class, 'create'])->name('cars.create');
Route::post('/cars/{id}/edit', [CarController::class, 'edit'])->name('cars.edit');
Route::put('/cars/{id}/edit', [CarController::class, 'edit'])->name('cars.edit');
Route::put('/cars/save', [CarController::class, 'save'])->name('cars.save');
Route::put('/cars/create', [CarController::class, 'create'])->name('cars.create');

Route::resource('cars', CarController::class)->middleware('adult');

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/setLanguage/{language}', [LanguageController::class, 'setLanguage'])->name("setLanguage");
