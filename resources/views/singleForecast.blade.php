@foreach($city->forecasts as $singleForecast)
    <p>Date: {{$singleForecast->date}} - temperature: {{$singleForecast->temperature}}</p>
@endforeach
