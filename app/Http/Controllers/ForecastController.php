<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForecastController extends Controller
{
    public function index($city)
    {
        $forecasts = [
            "podgorica" => [25, 27, 29, 22, 7],
            "niksic" => [19, 20, 21, 22, 9],
        ];

        if(!array_key_exists($city, $forecasts))
        {
            die('Ovaj grad ne postoji');
        }

        dd($forecasts[$city]);
    }
}
