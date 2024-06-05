@extends('layout')

@section('content')

    @foreach($userFavourites as $userFavourite)
        {{$userFavourite->city->today->temperature}}
    @endforeach

    <form class="text-left d-flex flex-wrap flex-column container justify-content-center align-item-center col-12" method="GET" action="{{route('forecast.search')}}">
        <h2 class="col-md-4 col-12"> <i class="fa-solid fa-house"></i> Search your city</h2>

        @if(\Illuminate\Support\Facades\Session::has('error'))
            <p class="text-danger">{{\Illuminate\Support\Facades\Session::get('error')}}</p>
        @endif

        <div class="mb-3 col-md-4 col-12">
            <input class="form-control col-12" type="text" name="city" placeholder="Enter city name">
        <button type="submit" class="btn btn-primary col-12 mt-3"> <i class="fa-brands fa-searchengin"></i> Search</button>
        </div>
    </form>
@endsection
