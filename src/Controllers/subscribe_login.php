<?php
session_start();

// Use environment variables or a secure database for admin credentials in production
$admin_email = "admin@example.com";
$admin_password = "password123"; // In production, hash and verify the password!

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["email"] === $admin_email && $_POST["password"] === $admin_password) {
        $_SESSION["admin_logged_in"] = true;
        header("Location: subscribe_dashboard.php"); // Corrected path to the dashboard
        exit;
    } else {
        $error = "Invalid credentials";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  <link rel="stylesheet" href="../../public/assets/styles/admin_login.css"> <!-- Corrected path to CSS -->
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      padding: 0;
      background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login-container {
      background: white;
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 12px 35px rgba(0, 0, 0, 0.15);
      width: 100%;
      max-width: 400px;
      animation: fadeIn 0.7s ease;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    h2 {
      text-align: center;
      margin-bottom: 24px;
      color: #333;
    }

    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 14px;
      margin-bottom: 18px;
      border: 1px solid #ddd;
      border-radius: 12px;
      font-size: 16px;
      transition: all 0.3s ease;
    }

    input[type="email"]:focus,
    input[type="password"]:focus {
      border-color: #ff8c42;
      box-shadow: 0 0 0 4px rgba(255, 140, 66, 0.2);
      outline: none;
    }

    button {
      width: 100%;
      padding: 14px;
      background: #ff8c42;
      color: white;
      border: none;
      border-radius: 12px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    button:hover {
      background: #e6732e;
    }

    .error-message {
      color: red;
      text-align: center;
      margin-top: 10px;
      font-weight: bold;
    }
  </style>
</head>
<body>

<div class="login-container">
  <h2>🔐 Admin Login</h2>
  <form method="POST">
    <input type="email" name="email" placeholder="Admin Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
    <?php if (isset($error)) echo "<div class='error-message'>$error</div>"; ?>
  </form>
</div>

</body>
</html>
