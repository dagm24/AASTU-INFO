<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require_once __DIR__ . '/../../vendor/autoload.php';


$from = $to = $subject = $message = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['from'], $_POST['to'], $_POST['subject'], $_POST['message'])) {
        $from = trim($_POST['from']);
        $to = trim($_POST['to']);
        $subject = trim($_POST['subject']);
        $message = trim($_POST['message']);

        // Validate email addresses
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
            $mail->Username = 'tibebudag07@gmail.com';  // Your Gmail address
            $mail->Password = 'ymdf djny uqjc ohzo';    // Your Gmail app password
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
            echo "✅ Email sent successfully.";
        } catch (Exception $e) {
            echo "❌ Mailer Error: " . $mail->ErrorInfo;
        }
    } else {
        echo "❌ Missing required fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Send Response</title>
    <link rel="stylesheet" href="../../public/assets/styles/sendResponse.css"> <!-- Corrected path to CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #218838;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Send Email Response</h2>
        <form action="" method="POST">
            <label for="from">Your Email (Sender):</label>
            <input type="email" name="from" value="tibebudag07@gmail.com" readonly> <!-- Pre-filled sender email -->

            <label for="to">Recipient's Email:</label>
            <input type="email" name="to" required>

            <label for="subject">Subject:</label>
            <input type="text" name="subject" required>

            <label for="message">Message:</label>
            <textarea name="message" rows="5" required></textarea>

            <button type="submit">Send Response</button>
        </form>
        <a href="view_inquiries.php" class="back-link">⬅️ Back</a> <!-- Corrected path to inquiries -->
    </div>
</body>
</html>
