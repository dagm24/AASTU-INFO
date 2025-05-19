<?php
require_once '../../Models/db_connect.php'; // Corrected path to db_connect.php

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $summary = $_POST['summary'];
    $description = $_POST['description'];

    $sql = "INSERT INTO offices (title, summary, details) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $title, $summary, $description);

    if ($stmt->execute()) {
        $success = "✅ Office created successfully!";
    } else {
        $error = "❌ Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Create Office</title>
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

<h2>Create Office</h2>
<form method="POST" action="">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" required>

    <label for="summary">Summary:</label>
    <textarea id="summary" name="summary" rows="4" required></textarea>

    <label for="description">Description:</label>
    <textarea id="description" name="description" rows="6" required></textarea>

    <button type="submit">Create Office</button>
</form>

<!-- Corrected path to the back link -->
<a href="./offices_crud.php">⬅️ Back</a>

</body>
</html>
