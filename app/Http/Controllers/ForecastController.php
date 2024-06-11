<?php

namespace App\Http\Controllers;

use App\Models\CitiesModel;
use App\Models\ForecastsModel;
use Illuminate\Support\Facades\Http;

class ForecastController extends Controller
{
    public function index(CitiesModel $city)
    {
       $forecast = ForecastsModel::where('city_id', $city->id)->get();

       $sunsetTime = Http::get('https://api.weatherapi.com/v1/astronomy.json', [
           'key' => '508d18a8fa6348b4a61200153240606',
           'q' => $city->name,
           'aqi' => 'no',

       ]);

      $jsonResponse = $sunsetTime->json();
      $sunrise = $jsonResponse['astronomy']['astro']['sunrise'];
      $sunset = $jsonResponse['astronomy']['astro']['sunset'];



        return view('singleForecast', compact('city', 'forecast', 'sunrise', 'sunset'));
    }
}
