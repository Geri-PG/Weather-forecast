@foreach($forecast as $singleForecast)
    <p>Datum: {{$singleForecast->date}} - temperatura: {{$singleForecast->temperature}}</p>
@endforeach
