@foreach($forecast as $weather)
    <p>In {{$weather->city->name}} is {{$weather->temperature}} degrees</p>
@endforeach
