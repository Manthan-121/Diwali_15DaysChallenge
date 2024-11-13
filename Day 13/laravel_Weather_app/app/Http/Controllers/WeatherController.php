<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class WeatherController extends Controller
{
    public function getWeather(Request $request)
    {
        $location = $request->input('location');
        $apiKey = env('WEATHER_API_KEY');

        $response = Http::get("https://api.weatherapi.com/v1/current.json", [
            'key' => $apiKey,
            'q' => $location,
            'aqi' => 'no'
        ]);

        if ($response->successful()) {
            $weatherData = $response->json();
            return view('show', compact('weatherData'));
        } else {
            return back()->with('error', 'Weather data not found!');
        }
    }
}
