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

                switch ($weather_type)
                {
                    case 'sunny':
                        $temperature = rand(-50, 50);
                        break;
                    case 'cloudy':
                        $temperature = rand(-50, 15);
                        break;
                    case 'rainy':
                        $temperature = rand(-10, 50);
                        break;
                    case 'snowy';
                        $temperature = rand(-50, 1);
                        break;

                }

                ForecastsModel::create([
                    'city_id' => $city->id,
                    'temperature' => $temperature,
                    'date' => Carbon::now()->addDays($i),
                    'weather_type' => $weather_type,
                    'probability' => $probability,
                ]);
            }
        }
    }
}
