<?php

namespace App\Console\Commands;

use App\Models\CitiesModel;
use App\Models\ForecastsModel;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetRealWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:get-real {city}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is used to get real weather data ';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $city = $this->argument('city');

        $dbCity = CitiesModel::where('name', $city)->first();

        if ($dbCity === null) {
           $dbCity = CitiesModel::create(['name' => $city]);
        }


        $response = Http::get('https://api.weatherapi.com/v1/forecast.json', [
            'key' => '508d18a8fa6348b4a61200153240606',
            'q' => $city,
            'aqi' => 'no',
            'days' => 1,
    ]);

        $jsonResponse = $response->json();
        if (isset($jsonResponse['error']))
        {
            $this->output->error($jsonResponse['error']['message']);
        }

        if ($dbCity->today !== null) {
            $this->output->comment('Command finshed');
            return;
        }

//        dd($jsonResponse['forecast']['forecastday'][0]['day']['maxtemp_c']); php artisan weather:get-real Podgorica
        $date = $jsonResponse['forecast']['forecastday'][0]['date'];
        $temperature = $jsonResponse['forecast']['forecastday'][0]['day']['avgtemp_c'];
        $weatherType = $jsonResponse['forecast']['forecastday'][0]['day']['condition']['text'];
        $probability = $jsonResponse['forecast']['forecastday'][0]['day']['avghumidity'];
        // dd($temperature, $date, $weatherType, $probability);

        $forecast = [
            'city_id' => $dbCity->id,
            'temperature' => $temperature,
            'date' => $date,
            'weather_type' => $weatherType,
            'probability' => $probability,
        ];

        ForecastsModel::create($forecast);

        // dd($forecast);
    }
}
