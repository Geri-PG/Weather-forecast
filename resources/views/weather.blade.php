@foreach($forecast as $city=>$temperature)
    <p>In {{$city}} is {{$temperature}} degrees</p>
@endforeach
