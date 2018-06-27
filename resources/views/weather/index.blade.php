@extends('layouts.app')
@section('content')
    <div class="col-md-12">
        <h1>Текущая температура в г. Брянск: {{ $weather['temp'] }} &#8451;</h1>
        <h2>Ощущается как: {{ $weather['feels_like'] }} &#8451;</h2>
    </div>
@endsection