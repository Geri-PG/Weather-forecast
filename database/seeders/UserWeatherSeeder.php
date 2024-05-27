<?php

namespace Database\Seeders;

use App\Models\WeatherModel;
use Illuminate\Database\Seeder;

class UserWeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $city = $this->command->getOutput()->ask('Unesite grad');

        if ($city === null)
        {
            $this->command->getOutput()->error('Niste unijeli grad!');
        }

        $temp = $this->command->getOutput()->ask('Unesite temperaturu');

        if ($temp === null)
        {
            $this->command->getOutput()->error('Niste unijeli temperaturu!');
        }

        WeatherModel::create([
            'city' => $city,
            'temperature' => $temp
        ]);

        $this->command->getOutput()->info('Uspjesno ste dodali grad i temperaturu!');
    }
}
