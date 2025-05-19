<?php
require '../../src/Models/db_connect.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode([
            "status" => "error",
            "message" => "❌ Invalid email address. Please enter a valid one."
        ]);
        exit;
    }

    $stmt = $conn->prepare("SELECT id FROM subscribers WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo json_encode([
            "status" => "warning",
            "message" => "⚠️ This email is already subscribed."
        ]);
    } else {
        $insert = $conn->prepare("INSERT INTO subscribers (email) VALUES (?)");
        $insert->bind_param("s", $email);

        if ($insert->execute()) {
            echo json_encode([
                "status" => "success",
                "message" => "🎉 Thank you for subscribing!"
            ]);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "❌ Server error. Please try again."
            ]);
        }

        $insert->close();
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode([
        "status" => "error",
        "message" => "❌ Invalid request method."
    ]);
}
?>
