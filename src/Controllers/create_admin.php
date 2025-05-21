<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../Models/db_connect.php'; // Corrected path to db_connect.php
$username = $password = "";
$username_error = $password_error = $success = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = $_POST["password"];

    // Username validation
    if (empty($username)) {
        $username_error = "Username is required.";
    } elseif (strlen($username) < 3) {
        $username_error = "Username must be at least 3 characters.";
    } elseif (!preg_match("/^[a-zA-Z0-9_]+$/", $username)) {
        $username_error = "Only letters, numbers, and underscores allowed.";
    }

    // Password validation
    $password_errors = [];
    if (empty($password)) {
        $password_errors[] = "Password is required.";
    } else {
        if (strlen($password) < 8) $password_errors[] = "at least 8 characters";
        if (!preg_match("/[a-z]/", $password)) $password_errors[] = "one lowercase letter";
        if (!preg_match("/[A-Z]/", $password)) $password_errors[] = "one uppercase letter";
        if (!preg_match("/[0-9]/", $password)) $password_errors[] = "one number";
        if (!preg_match("/[\W]/", $password)) $password_errors[] = "one special character";
    }

    if (!empty($password_errors)) {
        $password_error = "Password must contain: " . implode(", ", $password_errors) . ".";
    }

    // Insert if no errors
    if (empty($username_error) && empty($password_error)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO admins (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $hashed_password);

        if ($stmt->execute()) {
            $success = "Admin created successfully.";
            $username = $password = "";
        } else {
            $username_error = "Error: " . $stmt->error;
        }
        $stmt->close();
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Admin</title>
    <!-- Corrected path to the CSS file -->
    <link rel="stylesheet" href="../../public_html/styles/create_admin.css" />
</head>
<body>
    <h2>Create Admin</h2>

    <?php if ($success) echo "<p class='success'>$success</p>"; ?>
    <form method="POST">
        <label>Username:</label>
        <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>">
        <span class="error"><?php echo $username_error; ?></span>

        <label>Password:</label>
        <input type="password" name="password">
        <span class="error"><?php echo $password_error; ?></span>

        <button type="submit">Create Admin</button>
    </form>
</body>
</html>
