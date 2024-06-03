@php use App\Http\ForecastHelper;use Illuminate\Support\Facades\Session; @endphp
@extends('layout')

@section('content')

    <div>
        @if(Session::has('error'))
            <a href="/login">
                <p class="btn btn-danger fw-bold">{{Session::get('error')}}</p>
            </a>
        @endif
    </div>

    <div class="d-flex flex-wrap container mt-5">
        @foreach($cities as $city)
            @php
                $icon = ForecastHelper::weatherIcon($city->today->weather_type);
            @endphp

            <p>
                @if(in_array($city->id, $user))
                    <a class="btn btn-primary" href="{{route('city.favourite', ['city'=> $city->id])}}">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                @else
                    <a class="btn btn-primary" href="{{route('city.favourite', ['city'=> $city->id])}}">
                        <i class="fa-regular fa-heart"></i>
                    </a>
                @endif
                <a class="btn btn-primary m-2" href="{{route('forecast.permalink', ['city' => $city->name])}}">
                    <i class="fa-solid {{$icon}}"></i> {{$city->weather_type}}{{$city->name}}
                </a>
            </p>
        @endforeach
    </div>
@endsection
