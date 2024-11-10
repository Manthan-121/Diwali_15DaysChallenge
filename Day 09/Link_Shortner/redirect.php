<?php
// Include the external config file
require_once 'config.php';

// Get the shortened code from the URL
if (isset($_GET['code'])) {
    $code = $_GET['code'];

    // Look up the original URL
    $sql = "SELECT * FROM urls WHERE shortened_code = '$code'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $original_url = $row['original_url'];

        // Redirect to the original URL
        header("Location: $original_url");
        exit();
    } else {
        echo "URL not found!";
    }
} else {
    echo "Invalid URL.";
}
?>
