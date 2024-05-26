<?php

namespace Database\Seeders;

use App\Models\WeatherModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
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

        foreach ($forecast as $city=>$temperature)
        {
            $userWeather = WeatherModel::where('city', $city);

            if ($userWeather != null)
            {
                $this->command->getOutput()->error('Ovaj grad vec postoji!');
                continue;
            }

            WeatherModel::create([
                'city' => $city,
                'temperature' => $temperature
            ]);
        }
    }
}
