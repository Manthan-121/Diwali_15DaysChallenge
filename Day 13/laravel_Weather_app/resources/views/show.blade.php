<!-- resources/views/weather/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Weather in {{ $weatherData['location']['name'] }}, {{ $weatherData['location']['region'] }}</h1>
    <div class="weather-info">
        <p><strong>Temperature:</strong> {{ $weatherData['current']['temp_c'] }} °C</p>
        <p><strong>Condition:</strong> {{ $weatherData['current']['condition']['text'] }}</p>
        <p><img src="{{ $weatherData['current']['condition']['icon'] }}" alt="Weather icon"></p>
        <p><strong>Humidity:</strong> {{ $weatherData['current']['humidity'] }}%</p>
        <p><strong>Wind Speed:</strong> {{ $weatherData['current']['wind_kph'] }} km/h</p>
    </div>
    <a href="/" class="btn btn-secondary mt-3">Search Again</a>
</div>
@endsection
