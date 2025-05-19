<?php
require_once '../db_connect.php';

$office = null;
$message = "";

// Step 1: Handle form to get ID
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['fetch_id'])) {
    $id = intval($_POST['fetch_id']);
    $result = $conn->query("SELECT * FROM offices WHERE id = $id");

    if ($result && $result->num_rows > 0) {
        $office = $result->fetch_assoc();
    } else {
        $message = "❌ Office with ID $id not found.";
    }
}

// Step 2: Handle update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_id'])) {
    $id = intval($_POST['update_id']);
    $title = trim($_POST['title']);
    $summary = trim($_POST['summary']);
    $details = trim($_POST['description']);

    $stmt = $conn->prepare("UPDATE offices SET title = ?, summary = ?, details = ? WHERE id = ?");
    $stmt->bind_param("sssi", $title, $summary, $details, $id);

    if ($stmt->execute()) {
        $message = "✅ Office updated successfully!";
    } else {
        $message = "❌ Error: " . $conn->error;
    }

    // Fetch updated info to show in form again
    $result = $conn->query("SELECT * FROM offices WHERE id = $id");
    if ($result && $result->num_rows > 0) {
        $office = $result->fetch_assoc();
    }
}
?>


<link rel="stylesheet" href="../../styles/allupdate.css" />


<?php if ($message): ?>
  <p class="message <?= strpos($message, '❌') !== false ? 'error' : '' ?>"><?= $message ?></p>
<?php endif; ?>

<!-- === Form to enter Office ID === -->
<?php if (!$office): ?>
  <form method="POST">
    <h2>Enter Office ID to Edit</h2>
    <label>Office ID:</label>
    <input type="text" name="fetch_id" required>
    <button type="submit">Fetch Office</button>
  </form>

<!-- === Form to update Office === -->
<?php else: ?>
  <form method="POST">
    <h2>Edit Office (ID: <?= $office['id'] ?>)</h2>
    <input type="hidden" name="update_id" value="<?= $office['id'] ?>">

    <label>Title:</label>
    <input type="text" name="title" value="<?= htmlspecialchars($office['title']) ?>" required>

    <label>Summary:</label>
    <textarea name="summary" rows="3" required><?= htmlspecialchars($office['summary']) ?></textarea>

    <label>Description:</label>
    <textarea name="description" rows="5" required><?= htmlspecialchars($office['details']) ?></textarea>

    <button type="submit">Update Office</button>
  </form>
<?php endif; ?>

<a href="offices_crud.php" style="display: block; text-align: center; margin-top: 20px;">⬅️ Back</a>
