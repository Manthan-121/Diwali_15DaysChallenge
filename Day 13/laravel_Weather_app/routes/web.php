<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;

Route::get('/', function () {
    return view('index');
});

Route::post('/weather', [WeatherController::class, 'getWeather'])->name('weather.search');
