<?php

use App\Http\Controllers\AdminForecastsController;
use App\Http\Controllers\AdminWeatherController;
use App\Http\Controllers\ForecastController;
use App\Http\Controllers\ForecastsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserCitiesController;
use App\Http\Controllers\WeatherController;
use App\Http\Middleware\AdminCheckMiddleware;
use Illuminate\Support\Facades\Auth;
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

    $userFavourites = [];

    $user = Auth::user();
    if ($user !== null) {
        $userFavourites = \App\Models\UserCitiesModel::where(['user_id'=>$user->id])->get();

    }
    return view('welcome', compact('userFavourites'));
});




Route::get('/forecast', [WeatherController::class, 'index']);
Route::get('/forecast/search', [ForecastsController::class, 'search'])
    ->name('forecast.search');
Route::get('/single-forecast/{city:name}', [ForecastController::class, 'index'])
    ->name('forecast.permalink');

Route::get('/user-cities/favourite/{city}', [UserCitiesController::class, 'favourite'])
    ->name('city.favourite');
Route::get('/user-cities/unfavourite/{city}', [UserCitiesController::class, 'unfavourite'])
    ->name('city.unfavourite');



Route::prefix('/admin')->middleware(AdminCheckMiddleware::class)->group(function () {
    Route::view('/weather', 'admin.weatherCity');
    Route::post('/weather/update', [AdminWeatherController::class, 'update'])
        ->name('weather.update');

    Route::view('/forecasts', 'admin.forecasts');
    Route::post('/forecast/save', [AdminForecastsController::class, 'save'])
        ->name('forecast.save');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
