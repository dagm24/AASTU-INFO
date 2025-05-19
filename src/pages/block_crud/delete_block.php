<?php
require_once '../db_connect.php';

$step = 1;
$block = null;
$error = '';
$success = '';

// Step 1: Admin submits block ID to find it
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search_id'])) {
    $id = intval($_POST['search_id']);
    $sql = "SELECT * FROM blocks WHERE id = $id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $block = $result->fetch_assoc();
        $step = 2;
    } else {
        $error = "No block found with ID $id.";
    }
}

// Step 2: Admin confirms deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_block'])) {
    $id = intval($_POST['id']);
    $sql = "DELETE FROM blocks WHERE id = $id";

    if ($conn->query($sql)) {
        $success = "Block with ID $id deleted successfully.";
        $step = 3;
    } else {
        $error = "Error deleting block: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Delete Block</title>
  <link rel="stylesheet" href="../../styles/alldelete.css" />
</head>
<body>

<?php if ($error): ?>
  <p class="error"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<?php if ($success): ?>
  <p class="success"><?= htmlspecialchars($success) ?></p>
  <p><a href="delete_block.php">Delete another block</a></p>
<?php endif; ?>

<?php if ($step === 1): ?>
  <!-- STEP 1: Enter block ID -->
  <form method="POST">
    <h3>Enter Block ID to Delete</h3>
    <input type="text" name="search_id" placeholder="Enter Block ID" required>
    <button type="submit">Search</button>
  </form>

<?php elseif ($step === 2 && $block): ?>
  <!-- STEP 2: Confirm deletion -->
  <form method="POST">
    <h3>Confirm Deletion of Block ID <?= htmlspecialchars($block['id']) ?></h3>

    <div class="block-info">
      <p><strong>Name:</strong> <?= htmlspecialchars($block['name']) ?></p>
      <p><strong>Summary:</strong> <?= htmlspecialchars($block['summary']) ?></p>
      <p><strong>Description:</strong> <?= nl2br(htmlspecialchars($block['description'])) ?></p>
    </div>

    <input type="hidden" name="id" value="<?= htmlspecialchars($block['id']) ?>">
    <button type="submit" name="delete_block" onclick="return confirm('Are you sure you want to delete this block?')">Delete Block</button>
  </form>
<?php endif; ?>

<a href="blocks_crud.php">⬅️ Back</a>


</body>
</html>
