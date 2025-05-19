<?php
require_once '../db_connect.php';

$step = 1;
$office = null;
$error = '';
$success = '';

// Step 1: Admin submits ID to find office
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search_id'])) {
    $id = intval($_POST['search_id']);
    $stmt = $conn->prepare("SELECT * FROM offices WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $office = $result->fetch_assoc();
        $step = 2;
    } else {
        $error = "No office found with ID $id.";
    }

    $stmt->close();
}

// Step 2: Admin confirms deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_office'])) {
    $id = intval($_POST['id']);
    $stmt = $conn->prepare("DELETE FROM offices WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $success = "Office with ID $id deleted successfully.";
        $step = 3;
    } else {
        $error = "Error deleting office: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Delete Office</title>
  <link rel="stylesheet" href="../../styles/alldelete.css" />

</head>
<body>

<?php if ($error): ?>
  <p class="error"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<?php if ($success): ?>
  <p class="success"><?= htmlspecialchars($success) ?></p>
  <p><a href="delete_office.php">Delete another office</a></p>
<?php endif; ?>

<?php if ($step === 1): ?>
  <!-- STEP 1: Enter office ID -->
  <form method="POST">
    <h3>Enter Office ID to Delete</h3>
    <input type="text" name="search_id" placeholder="Enter Office ID" required>
    <button type="submit">Search</button>
  </form>

<?php elseif ($step === 2 && $office): ?>
  <!-- STEP 2: Confirm deletion -->
  <form method="POST">
    <h3>Confirm Deletion of Office ID <?= htmlspecialchars($office['id']) ?></h3>

    <div class="office-info">
      <p><strong>Title:</strong> <?= htmlspecialchars($office['title']) ?></p>
      <p><strong>Summary:</strong> <?= nl2br(htmlspecialchars($office['summary'])) ?></p>
      <p><strong>Details:</strong> <?= nl2br(htmlspecialchars($office['details'])) ?></p>
    </div>

    <input type="hidden" name="id" value="<?= htmlspecialchars($office['id']) ?>">
    <button type="submit" name="delete_office" onclick="return confirm('Are you sure you want to delete this office?')">Delete Office</button>
  </form>
<?php endif; ?>
<a href="offices_crud.php" style="display: block; text-align: center; margin-top: 20px;">⬅️ Back</a>

</body>
</html>
