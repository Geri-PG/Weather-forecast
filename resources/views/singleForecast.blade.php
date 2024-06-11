@foreach($city->forecasts as $singleForecast)
    <p>Sunrise: {{$sunrise}}</p>
    <p>Sunset: {{$sunset}}</p>
    <p>Date: {{$singleForecast->date}} - temperature: {{$singleForecast->temperature}}</p>
@endforeach
