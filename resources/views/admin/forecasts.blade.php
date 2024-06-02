@php use App\Http\ForecastHelper;use App\Models\ForecastsModel; @endphp
@php use App\Models\CitiesModel; @endphp

@extends('admin.layout')
@section('content')
    <form method="POST" action="{{route('forecast.save')}}">
        <h2>Create new Forecast</h2>
        @csrf

        <div class="mb-3">
            <select name="city_id" class="form-select">
                @foreach(CitiesModel::all() as $city)
                    <option value="{{$city->id}}">{{$city->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <input class="form-control" type="text" name="temperature" placeholder="Enter temperature">
        </div>


        <div class="mb-3">
            <select name="weather_type" class="form-select">
                @foreach(ForecastsModel::WEATHER as $weather)
                    <option>{{$weather}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <input class="form-control" type="text" name="probability" placeholder="Enter chance for precipitation">
        </div>

        <div class="mb-3">
            <input class="form-control" type="date" name="date">
        </div>
        <div class="mb-3">
            <button class="form-control btn btn-primary">Save</button>
        </div>
    </form>

    <div class="d-flex flex-wrap" style="gap: 10px">
        @foreach(CitiesModel::all() as $city)
            <div>
                <p class="mb-1">{{$city->name}}</p>
                <ul class="list-group mb-4">
                    @foreach($city->forecasts as $forecast)
                        @php
                            $color = ForecastHelper::TempColor($forecast->temperature);
                            $icon = ForecastHelper::weatherIcon($forecast->weather_type);
                        @endphp
                        <li class="list-group-item">
                            {{$forecast->date}} - <i class="fa-solid {{$icon}}"></i>
                            <span style="color: {{$color}}">{{$forecast->temperature}}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach

    </div>
@endsection


