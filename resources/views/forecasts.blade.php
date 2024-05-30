@php use App\Models\CitiesModel;use App\Models\ForecastsModel; @endphp

<form method="POST" action="{{route('forecast.save')}}">
    @csrf
    <select>
        @foreach(CitiesModel::all() as $city)
            <option value="{{$city->id}}">{{$city->name}}</option>
        @endforeach
    </select>

    <input type="text" name="temperature" placeholder="Enter temperature">

    <select name="weather_type">
        @foreach(ForecastsModel::WEATHER as $weather)
            <option>{{$weather}}</option>
        @endforeach
    </select>

    <input type="text" name="probability" placeholder="Enter chance for precipitation">
    <input type="date" name="date">
    <button>Save</button>
</form>

@foreach(CitiesModel::all() as $city)
    <p>{{$city->name}}</p>
    <ul>
        @foreach($city->forecasts as $forecast)
            <li>{{$forecast->date}} - {{$forecast->temperature}}</li>
        @endforeach
    </ul>
@endforeach
