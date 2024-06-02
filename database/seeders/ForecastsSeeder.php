<?php

namespace Database\Seeders;

use App\Models\CitiesModel;
use App\Models\ForecastsModel;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ForecastsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $cities = CitiesModel::all();

        foreach ($cities as $city)
        {
            for ($i = 0; $i < 5; $i++)
            {
                $weather_type = ForecastsModel::WEATHER[rand(0, 3)];
                $probability = null;

                if ($weather_type == 'rainy' || $weather_type == 'snowy')
                {
                    $probability = rand(1, 100);
                }

                $temperature = null;

                if ($temperature === rand(-50, 50)) {
                    $weather_type = 'sunny';
                } elseif ($temperature === rand(-50, 150)) {
                    $weather_type = 'cloudy';
                } elseif ($temperature === rand(-10, 50)) {
                    $weather_type = 'rainy';
                } elseif ($temperature === rand(-50, 1)) {
                    $weather_type = 'snowy';
                }

                ForecastsModel::create([
                    'city_id' => $city->id,
                    'temperature' => rand(-50, 50),
                    'date' => Carbon::now()->addDays(rand(1,30)),
                    'weather_type' => $weather_type,
                    'probability' => $probability,
                ]);
            }
        }
    }
}
