<?php

namespace App\Http;

class ForecastHelper
{
    const WEATHER_TYPE = [
        'rainy' => 'fa-cloud-rain',
        'snowy' => 'fa-snowflake',
        'sunny' => 'fa-sun',
        'cloudy' => 'fa-cloud-sun'
    ];

    public static function weatherIcon($type)
    {
//        if (in_array($type, self::WEATHER_TYPE))
//        {
//            return self::WEATHER_TYPE [$type];
//        }
//        return 'fa-sun';

        return match ($type)
        {
            'rainy' => 'fa-cloud-rain',
            'snowy' => 'fa-snowflake',
            'sunny' => 'fa-sun',
            'cloudy' => 'fa-cloud-sun',
            default => 'fa-sun',
        };



//        if ($type === 'rainy')
//        {
//            $icon = 'fa-cloud-rain';
//        }
//        else if ($type === 'snowy')
//        {
//            $icon = 'fa-snowflake';
//        }
//        else if ($type === 'sunny')
//        {
//            $icon = 'fa-sun';
//        }

    }

    public static function TempColor($temperature)
    {

        if ($temperature <= 0) {
            $color = 'lightblue';
        } elseif ($temperature >= 1 && $temperature <= 15) {
            $color = 'blue';
        } elseif ($temperature >= 15 && $temperature <= 25) {
            $color = 'green';
        } else {
            $color = 'red';
        }

        return $color;

    }
}
