<!-- resources/views/weather/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('weather.search') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="location">Enter City or Pincode:</label>
            <input type="text" id="location" name="location" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Get Weather</button>
    </form>
</div>
@endsection
