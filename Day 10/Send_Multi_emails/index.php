<?php
include("includes/header.php");
?>
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="form-container">
        <form action="" method="POST" enctype="multipart/form-data">
            <!-- Label -->
            <div class="mb-3">
                <label for="file" class="form-label">Select excel file</label>
                <input type="file" class="form-control" id="file" name="file">
            </div>
            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
        </form>
    </div>
</div>

<?php
include("includes/footer.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
    $file = $_FILES['file']['tmp_name'];
    $fileName = $_FILES['file']['name'];

    // Check if the file is a CSV file
    if (pathinfo($fileName, PATHINFO_EXTENSION) === 'csv') {
        // Open the CSV file for reading
        if (($handle = fopen($file, "r")) !== false) {
            // Skip the first row if it contains headers
            $isHeader = true;

            // Database connection
            $conn = getDatabaseConnection();

            while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                if ($isHeader) {
                    $isHeader = false;
                    continue;
                }

                // Assuming the CSV columns are: Name, Email
                $name = $data[0]; // First column data
                $email = $data[1]; // Second column data

                // Prepare and execute the SQL statement
                $stmt = $conn->prepare("INSERT INTO file_info (F_file_name, f_name, f_email) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $fileName, $name, $email);

                // Execute the query
                if (!$stmt->execute()) {
                    echo "Error: " . $stmt->error;
                }
            }

            // Close the file and database connection
            fclose($handle);
            $conn->close();
            $_SESSION['filename'] = $fileName;
            header("Location: sendmail.php");
            exit();
        } else {
            echo "Failed to open the file.";
        }
    } else {
        echo "Please upload a valid CSV file.";
    }
}
?>