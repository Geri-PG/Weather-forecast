<?php

namespace App\Http\Controllers;

class WeatherController extends Controller
{
   public function index()
   {
       $forecast = [
           "Podgorica" => 25,
           "Nikšić" => 22,
           "Herceg Novi" => 24,
           "Bar" => 26,
           "Budva" => 27,
           "Kotor" => 23,
           "Cetinje" => 21
       ];

       return view('weather', compact('forecast'));
   }
}
