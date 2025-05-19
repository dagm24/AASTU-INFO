<?php include '../../Models/db_connect.php'; ?>

<?php
$success = '';
$error = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"] ?? '';
    $role = $_POST["role"] ?? '';
    $email = $_POST["email"] ?? '';

    // File Upload
    $image = $_FILES["image"]["name"];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($image);

    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $stmt = $conn->prepare("INSERT INTO leadership_team (name, role, email, image) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $role, $email, $image);

        if ($stmt->execute()) {
            $success = "✅ Staff added successfully!";
        } else {
            $error = "❌ Error: " . $conn->error;
        }

        $stmt->close();
    } else {
        $error = "❌ Image upload failed.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Create Staff Member</title>
  <!-- Corrected path to the CSS file -->
  <link rel="stylesheet" href="../../../public_html/styles/allcreate.css" />
</head>
<body>

<?php if ($error): ?>
  <p class="error"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<?php if ($success): ?>
  <p class="success"><?= htmlspecialchars($success) ?></p>
<?php endif; ?>

<h2>Create Staff Member</h2>
<form method="POST" enctype="multipart/form-data">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="role">Role:</label>
    <input type="text" id="role" name="role" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="image">Upload Image:</label>
    <input type="file" id="image" name="image" required>

    <button type="submit">Create Staff</button>
</form>

<!-- Corrected path to the back link -->
<a href="./aboutus_cruds.php">⬅️ Back</a>

</body>
</html>