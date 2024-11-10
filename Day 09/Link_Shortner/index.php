<?php
// Include the external config file
require_once 'config.php';

// Function to generate a unique short code
function generateShortCode($length = 6) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $code = '';
    for ($i = 0; $i < $length; $i++) {
        $code .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $code;
}

// Handle form submission
if (isset($_POST['submit'])) {
    $original_url = $_POST['url'];
    $short_code = generateShortCode();

    // Check if the short code already exists
    $sql = "SELECT * FROM urls WHERE shortened_code = '$short_code'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // If the code already exists, generate a new one
        $short_code = generateShortCode();
    }

    // Insert the URL into the database
    $sql = "INSERT INTO urls (original_url, shortened_code) VALUES ('$original_url', '$short_code')";
    
    if ($conn->query($sql) === TRUE) {
        // echo "Shortened URL: <a href='http://yourdomain.com/$short_code'>http://yourdomain.com/$short_code</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URL Shortener</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>URL Shortener</h2>
        <form action="" method="post">
            <label for="url">Enter URL:</label>
            <input type="text" id="url" name="url" required>
            <button type="submit" name="submit">Shorten URL</button>
        </form>
        <?php if (isset($short_code)): ?>
            <div class="result">
                <!-- <p class="success-message">URL Shortened Successfully!</p> -->
                Shortened URL: <a href="http://localhost/Link_Shortner/<?php echo $short_code; ?>" target="_blank">http://localhost/Link_Shortner/<?php echo $short_code; ?></a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>


