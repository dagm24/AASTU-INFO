<?php
require_once '../db_connect.php';

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $summary = $_POST['summary'] ?? '';
    $description = $_POST['description'] ?? '';

    if (!empty($name) && !empty($summary) && !empty($description)) {
        $sql = "INSERT INTO blocks (name, summary, description) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $name, $summary, $description);

        if ($stmt->execute()) {
            $success = "✅ Block created successfully!";
        } else {
            $error = "❌ Error: " . $conn->error;
        }

        $stmt->close();
    } else {
        $error = "❌ All fields are required.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Create Block</title>
  <link rel="stylesheet" href="../../styles/allcreate.css" />
  </head>
<body>

<?php if ($error): ?>
  <p class="error"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<?php if ($success): ?>
  <p class="success"><?= htmlspecialchars($success) ?></p>
<?php endif; ?>

<h2>Create Block</h2>
<form method="POST" action="">
    <label for="name">Block Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="summary">Summary:</label>
    <textarea id="summary" name="summary" rows="4" required></textarea>

    <label for="description">Description:</label>
    <textarea id="description" name="description" rows="6" required></textarea>

    <button type="submit">Create Block</button>
</form>

<a href="blocks_crud.php">⬅️ Back</a>

</body>
</html>
