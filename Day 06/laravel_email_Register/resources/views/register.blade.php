<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="form-container">
        <h1>Register</h1>

        @if(session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @endif

        <form action="{{ route('register.store') }}" method="POST">
            @csrf

            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" id="first_name" required value="{{ old('first_name') }}">
            @error('first_name')
                <p class="error-message">{{ $message }}</p>
            @enderror

            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" id="last_name" required value="{{ old('last_name') }}">
            @error('last_name')
                <p class="error-message">{{ $message }}</p>
            @enderror

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required value="{{ old('email') }}">
            @error('email')
                <p class="error-message">{{ $message }}</p>
            @enderror

            <label for="mobile">Mobile:</label>
            <input type="text" name="mobile" id="mobile" value="{{ old('mobile') }}">
            @error('mobile')
                <p class="error-message">{{ $message }}</p>
            @enderror

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
            @error('password')
                <p class="error-message">{{ $message }}</p>
            @enderror

            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>

            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>
