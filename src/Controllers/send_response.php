<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '../../phpmailer/src/Exception.php'; // Corrected path to Exception.php
require_once '../../phpmailer/src/PHPMailer.php'; // Corrected path to PHPMailer.php
require_once '../../phpmailer/src/SMTP.php'; // Corrected path to SMTP.php

$from = $to = $subject = $message = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the expected keys exist in the $_POST array
    if (isset($_POST['from'], $_POST['to'], $_POST['subject'], $_POST['message'])) {
        $from = trim($_POST['from']);
        $to = trim($_POST['to']);
        $subject = trim($_POST['subject']);
        $message = trim($_POST['message']);

        // Debug outputs
        echo "From: $from<br>";
        echo "To: $to<br>";

        // Validate email formats
        if (!filter_var($from, FILTER_VALIDATE_EMAIL) || !filter_var($to, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format.";
            exit;
        }

        $mail = new PHPMailer(true);

        try {
            // SMTP configuration
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; 
            $mail->SMTPAuth = true;
            $mail->Username = 'dagmawityoseph0@gmail.com'; 
            $mail->Password = 'vivm ojbe czjh fufc'; // Ensure this is secure
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Set email parameters
            $mail->setFrom($from, 'Admin');
            $mail->addAddress($to);
            $mail->Subject = $subject;
            $mail->Body = nl2br(htmlspecialchars($message));
            $mail->AltBody = $message;

            // Send email
            $mail->send();
            echo "Email sent successfully.";
        } catch (Exception $e) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
    } 
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Send Response</title>
    <!-- Corrected path to the CSS file -->
    <link rel="stylesheet" href="../../public_html/styles/sendResponse.css">
</head>
<body>
    <h2>Send Email Response</h2>
    <form action="" method="POST">
        <label for="from">Your Email (Sender):</label>
        <input type="email" name="from" required>

        <label for="to">Recipient's Email:</label>
        <input type="email" name="to" required>

        <label for="subject">Subject:</label>
        <input type="text" name="subject" required>

        <label for="message">Message:</label>
        <textarea name="message" rows="5" required></textarea>

        <button type="submit">Send Response</button>
    </form>
    <a href="view_inquiries.php">⬅️ Back</a>

</body>
</html>