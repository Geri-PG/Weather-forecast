@php use App\Http\ForecastHelper; @endphp
@extends('layout')

@section('content')

    <div class="d-flex flex-wrap container mt-5">
        @foreach($cities as $city)
            @php
                $icon = ForecastHelper::weatherIcon($city->today->weather_type);
            @endphp

            <p>
                <a class="btn btn-primary m-2" href="{{route('forecast.permalink', ['city' => $city->name])}}">
                    <i class="fa-solid {{$icon}}"></i> {{$city->weather_type}}{{$city->name}}
                </a>
            </p>
        @endforeach
    </div>
@endsection
