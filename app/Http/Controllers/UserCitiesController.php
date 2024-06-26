<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserCitiesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCitiesController extends Controller
{
    public function favourite(Request $request, $city)
    {
        $user = Auth::user();

       if ($user === null) {
            return redirect()->back()->with(['error' => 'Please login, if you want to continue!']);
       }

        UserCitiesModel::create([
            'city_id' => $city,
            'user_id' => $user->id,
        ]);

        return redirect()->back();

    }

    public function unfavourite($city)
    {
        $user = Auth::user();

        if ($user === null) {
            return redirect()->back()->with(['error' => 'Please login, if you want to continue!']);
        }

       $userFavourite = UserCitiesModel::where([
            'city_id' => $city,
            'user_id' => $user->id,
        ])->first();

            $userFavourite->delete();

            return redirect()->back();
    }
}
