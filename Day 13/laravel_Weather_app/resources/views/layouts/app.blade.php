<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Finder</title>
    <!-- Link to the favicon -->
    <link rel="icon" type="image/png" href="https://cdn2.iconfinder.com/data/icons/weather-flat-14/64/weather02-512.png">
    <!-- Bootstrap CSS for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        /* Background with gradient and subtle animation */
        body {
            background: linear-gradient(135deg, #4e54c8, #8f94fb);
            color: #333;
            font-family: 'Arial', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Container styling with shadow and padding */
        .container {
            max-width: 700px;
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        /* Title styling with custom font size and color */
        h1 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #4e54c8;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Styling for form and button */
        .form-group label {
            color: #6c757d;
            font-size: 1.2rem;
        }

        .btn-primary {
            background-color: #ff6b6b;
            border: none;
            color: #fff;
            font-size: 1rem;
            padding: 10px 20px;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #ff4757;
        }

        /* Weather Info with larger icons and improved layout */
        .weather-info {
            font-size: 1.1rem;
            margin-top: 20px;
        }
        .weather-info p {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: #333;
        }
        .weather-info p i {
            margin-right: 10px;
            font-size: 1.5rem;
            color: #4e54c8;
        }
        .weather-info img {
            width: 90px;
            height: 90px;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }
            .weather-info p {
                font-size: 1rem;
            }
            .weather-info img {
                width: 70px;
                height: 70px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header with Icon -->
        <h1><i class="fas fa-cloud-sun-rain"></i> Weather Finder</h1>

        <!-- Main content placeholder -->
        @yield('content')
    </div>

    <!-- Bootstrap and Font Awesome JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
