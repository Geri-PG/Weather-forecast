@extends('layout')

@section('content')
    <form method="GET" action="{{route('forecast.search')}}">

        @if(\Illuminate\Support\Facades\Session::has('error'))
            <p class="text-danger">{{\Illuminate\Support\Facades\Session::get('error')}}</p>
        @endif

        <div>
            <input type="text" name="city" placeholder="Enter city name">
        </div>
        <button type="submit">Search</button>
    </form>
@endsection
