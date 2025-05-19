<?php
session_start();
if (!isset($_SESSION["admin_logged_in"])) {
    header("Location: login.php");
    exit;
}

// Corrected path to the database connection file
require_once __DIR__ . '/../Models/db_connect.php';

// Corrected path to Composer's autoloader
require_once __DIR__ . '/../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$success = "";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["send"])) {
    $subject = trim($_POST["subject"]);
    $message = trim($_POST["message"]);
    $selectedEmails = $_POST["selected_emails"] ?? [];

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'tibebudag07@gmail.com';
        $mail->Password = 'ymdf djny uqjc ohzo'; // Your actual app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->setFrom('tibebudag07@gmail.com', 'Admin');
        $mail->Subject = $subject;
        $mail->CharSet = 'UTF-8';
        $mail->isHTML(false);

        if (!empty($selectedEmails)) {
            foreach ($selectedEmails as $email) {
                $mail->clearAddresses();
                $mail->addAddress($email);
                $mail->Body = $message;
                try {
                    $mail->send();
                } catch (Exception $e) {
                    $success .= "❌ Could not send to $email: " . $mail->ErrorInfo . "<br>";
                }
            }
            $success .= "✅ Email attempt complete.";
        } else {
            $success = "⚠️ No emails selected.";
        }
    } catch (Exception $e) {
        $success = "❌ Error configuring email: " . $mail->ErrorInfo;
    }
}

// Fetch all subscribers
$subscribers = $conn->query("SELECT id, email, status FROM subscribers");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Email Subscribers</title>
    <style>
        body {
            background: #f4f7f8;
            font-family: 'Segoe UI', sans-serif;
            padding: 40px;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 24px;
            border-radius: 16px;
            box-shadow: 0 12px 24px rgba(0,0,0,0.1);
        }

        h2 { text-align: center; margin-bottom: 24px; }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 24px;
        }

        table th, table td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        table th {
            background: #f0f0f0;
        }

        textarea, input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        button {
            background-color: #ff8c42;
            color: white;
            border: none;
            padding: 14px;
            font-size: 16px;
            border-radius: 12px;
            width: 100%;
            cursor: pointer;
        }

        button:hover {
            background-color: #e6732e;
        }

        .success-message {
            margin-top: 20px;
            text-align: center;
            color: green;
            font-weight: bold;
        }
    </style>
    <script>
        function toggleSelectAll(checkbox) {
            const checkboxes = document.querySelectorAll('.email-checkbox');
            checkboxes.forEach(cb => cb.checked = checkbox.checked);
        }
    </script>
</head>
<body>
<div class="container">
    <h2>📧 Send Email to Subscribers</h2>
    <form method="POST">
        <table>
            <thead>
                <tr>
                    <th><input type="checkbox" onclick="toggleSelectAll(this)"></th>
                    <th>Email</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($row = $subscribers->fetch_assoc()): ?>
                <tr>
                    <td><input type="checkbox" name="selected_emails[]" value="<?= htmlspecialchars($row['email']) ?>" class="email-checkbox"></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['status']) ?></td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
        <input type="text" name="subject" placeholder="Email Subject" required>
        <textarea name="message" rows="5" placeholder="Message here..." required></textarea>
        <button type="submit" name="send">Send Email</button>
    </form>
    <?php if ($success): ?>
        <div class="success-message"><?= $success ?></div>
    <?php endif; ?>
</div>
</body>
</html>
