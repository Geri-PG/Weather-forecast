<?php

namespace App\Http\Controllers;

use App\Models\CitiesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

class ForecastsController extends Controller
{
    public function search(Request $request)
    {
        $cityName = $request->get('city');

        Artisan::call('weather:get-real', ['city' => $cityName]);

        $cities = CitiesModel::with('today')->where('name', 'LIKE', "%$cityName%")->get();
        if (count($cities) === 0) {
            return redirect()->back()->with('error', 'not found');
        }

        $user = [];

        if (Auth::check()) {
            $user = Auth::user()->cityFavourites;
            $user = $user->pluck('city_id')->toArray();
        }

        return view('searchResults', compact('cities', 'user'));
    }
}
