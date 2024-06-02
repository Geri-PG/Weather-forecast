<?php

use App\Http\Controllers\AdminForecastsController;
use App\Http\Controllers\AdminWeatherController;
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

Route::view('/', 'welcome');


Route::get('/forecast', [WeatherController::class, 'index']);
Route::get('/single-forecast/{city:name}', [ForecastController::class, 'index']);

Route::view('/admin/weather', 'admin.weatherCity');
Route::post('/admin/weather/update', [AdminWeatherController::class, 'update'])
    ->name('weather.update');

Route::view('/admin/forecasts', 'admin.forecasts');
Route::post('/admin/forecast/save', [AdminForecastsController::class, 'save'])
    ->name('forecast.save');










Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
