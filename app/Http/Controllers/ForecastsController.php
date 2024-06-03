<?php

namespace App\Http\Controllers;

use App\Models\CitiesModel;
use Illuminate\Http\Request;

class ForecastsController extends Controller
{
    public function search(Request $request) {
        $cityName = $request->get('city');

        $cities = CitiesModel::with('today')->where('name', 'LIKE', "%$cityName%")->get();

        if (count($cities) === 0) {
            return redirect()->back()->with('error', 'not found');
        }

        return view('searchResults', compact('cities'));
    }
}
