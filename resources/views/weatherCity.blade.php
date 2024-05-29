@php use App\Models\CitiesModel;use App\Models\WeatherModel; @endphp


<form method="POST" action="{{route('weather.update')}}" >
    @csrf
    <input type="text" name="temperature" placeholder="Add temperature">
    <select type="text" name="city_id">
        @foreach(CitiesModel::all() as $cities)
            <option value="{{$cities->id}}">{{$cities->name}}</option>
        @endforeach
    </select>
    <button>Save</button>
</form>

<div>
    @foreach(WeatherModel::all() as $weather)
        <p>{{$weather->city->name}} {{$weather->temperature}}</p>
    @endforeach
</div>
