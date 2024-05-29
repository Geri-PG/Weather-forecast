<?php

use App\Http\Controllers\ForecastController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;


Route::get('/home', function () {
   return 'Hello World';
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/forecast', [WeatherController::class, 'index']);

Route::get('/single-forecast/{city:name}', [ForecastController::class, 'index']);

Route::view('/admin/weather', 'weatherCity');

Route::post('/admin/weather/update', [\App\Http\Controllers\AdminWeatherController::class, 'update'])
    ->name('weather.update');










Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
