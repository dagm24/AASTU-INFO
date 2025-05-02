<?php
include 'db_connect.php'; 

// --- Configuration ---
$new_username = "Dagi";  
$new_password = "12345678"; 

// --- Validation ---
$username_error = "";
$password_error = "";

// Validate Username
if (empty($new_username)) {
    $username_error = "Username is required.";
} elseif (strlen($new_username) < 3) {
    $username_error = "Username must be at least 3 characters long.";
} elseif (!preg_match("/^[a-zA-Z0-9_]+$/", $new_username)) {
    $username_error = "Username can only contain letters, numbers, and underscores.";
}

// Validate Password
if (empty($new_password)) {
    $password_error = "Password is required.";
} elseif (strlen($new_password) < 8) {
    $password_error = "Password must be at least 8 characters long.";
} elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+]).*$/", $new_password)) {
    $password_error = "Password must contain at least one lowercase letter, one uppercase letter, one number, and one special character.";
}

// --- Hash the password and insert if validation passes ---
if (empty($username_error) && empty($password_error)) {
    // --- Hash the password ---
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // --- Prepare the SQL statement ---
    $sql = "INSERT INTO admins (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);

    // --- Bind parameters ---
    $stmt->bind_param("ss", $new_username, $hashed_password);

    // --- Execute the statement ---
    if ($stmt->execute()) {
        echo "Admin user created successfully!";
    } else {
        echo "Error creating admin user: " . $stmt->error;
    }

    // --- Close the statement and connection ---
    $stmt->close();
    $conn->close();
} else {
    // Display Errors
    if (!empty($username_error)) {
        echo "<p style='color:red;'>Username Error: " . $username_error . "</p>";
    }
    if (!empty($password_error)) {
        echo "<p style='color:red;'>Password Error: " . $password_error . "</p>";
    }
}
?>