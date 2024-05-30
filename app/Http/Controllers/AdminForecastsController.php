<?php

namespace App\Http\Controllers;

use App\Models\ForecastsModel;
use Illuminate\Http\Request;

class AdminForecastsController extends Controller
{
    public function save(Request $request)
    {

        $request->validate([
            'city_id' => ['required', 'exists:cities,id'],
            'temperature' => 'required',
            'date' => 'required',
            'weather_type' => 'required',
        ]);

            dd($request->all());
        ForecastsModel::create($request->all());

        //return redirect()->back();

    }
}
