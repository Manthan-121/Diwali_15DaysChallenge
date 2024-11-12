<?php
include("includes/header.php");
?>

<div class="container mt-5">
    <!-- Form Container -->
    <div class="form-container mb-5">
        <form action="" method="POST">
            <!-- Subject Field -->
            <div class="mb-3">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter subject">
            </div>

            <!-- Message Field -->
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" name="message" rows="3"
                    placeholder="Enter your message"></textarea>
            </div>

            <!-- Send Button -->
            <div class="text-center">
                <button type="submit" name="btn_Send" class="btn btn-primary">Send</button>
            </div>
        </form>
    </div>

    <!-- Data Table -->
    <?php
    // SQL query to select data
    $sql = "SELECT * FROM file_info where F_file_name = '" . $_SESSION['filename'] . "'";

    // Execute the query
    $result = $conn->query($sql);

    ?>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th scope="col">Sequence No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Check if there are any results
                if ($result->num_rows > 0) {
                    $sqno = 1;
                    // Output data from each row
                    while ($row = $result->fetch_assoc()) {
                        $dbemails[] = $row["f_email"];
                        ?>
                        <tr>
                            <td><?php echo $sqno; ?></td>
                            <td><?php echo $row['f_name']; ?></td>
                            <td><?php echo $row['f_email']; ?></td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="delete_id" value="<?php echo $row['f_id']; ?>">
                                    <button type="submit"  class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php
                        $sqno++;
                    }
                } else {
                    echo "No records found.";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</script>
<?php
include("includes/footer.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if(isset($_POST['btn_Send'])){
    
    require 'vendor/autoload.php';
    
     
    $mail = new PHPMailer(true);
    $recipients = $dbemails;
    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';            // Set the SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'mistry2802@gmail.com';
        $mail->Password = 'bofaaxffzezzshff';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
    
        //Set email format to HTML
        $mail->isHTML(true);
        $mail->Subject = $_POST['subject'];
        $mail->Body = $_POST['message'];
    
        // Loop through each recipient and send the email
        foreach ($recipients as $email) {
            $mail->clearAddresses();
            $mail->addAddress($email);
            $mail->send();
        }
        ?>
        <script>
            alert("Email send successfully");
        </script>
        <?php
    
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}


if (isset($_POST['delete_id'])) {
    // Get the ID of the row to delete
    $id = $_POST['delete_id'];

    // Prepare the SQL DELETE statement
    $sql = "DELETE FROM file_info WHERE f_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    // Close the statement
    $stmt->close();
}
?>