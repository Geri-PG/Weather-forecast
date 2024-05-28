<?php

namespace App\Http\Controllers;

use App\Models\ForecastsModel;

class WeatherController extends Controller
{
    public function index()
    {
        $forecast = ForecastsModel::all();

        return view('weather', compact('forecast'));
    }
}
