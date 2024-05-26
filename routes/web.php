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

//Route::resource('owners', OwnerController::class) exept ->only(['edit', 'delete']);
Route::middleware(['auth'])->group(function (){
    Route::resource('owners', OwnerController::class);
    Route::resource('cars', CarController::class);
    //Route::resource('shortcode', ShortCodeController::class);
});
Route::resource('shortcode', ShortCodeController::class);
Route::delete('/owners/{id}/destroy', [OwnerController::class, 'destroy'])->name('owners.destroy');

Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');
Route::post('/cars/save', [CarController::class, 'save'])->name('cars.save');
Route::put('/cars/save', [CarController::class, 'save'])->name('cars.save');
Route::get('/cars/{id}/edit', [CarController::class, 'edit'])->name('cars.edit');
Route::post('/cars/{id}/update', [CarController::class, 'update'])->name('cars.update');
Route::put('/cars/{id}/update', [CarController::class, 'update'])->name('cars.update');
//Route::get('/cars/{id}/delete', [CarController::class, 'delete'])->name('cars.delete');


//Route::post('/cars/{id}/edit', [CarController::class, 'edit'])->name('cars.edit');
//Route::put('/cars/{id}/edit', [CarController::class, 'edit'])->name('cars.edit');
//Route::get('/cars/{id}/edit', [CarController::class, 'edit'])->name('cars.edit');

//Route::put('/cars/create', [CarController::class, 'create'])->name('cars.create');

Route::resource('cars', CarController::class)->middleware('adult');
//Route::resource('owners', CarController::class)->middleware('adult');


Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/setLanguage/{language}', [LanguageController::class, 'setLanguage'])->name("setLanguage");
