<?php
require_once '../../Models/db_connect.php'; // Corrected path to db_connect.php

$step = 1;
$block = null;
$error = '';
$success = '';

// Step 1: Admin submits ID to find block
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search_id'])) {
    $id = intval($_POST['search_id']);
    $sql = "SELECT * FROM blocks WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $block = $result->fetch_assoc();
        $step = 2;
    } else {
        $error = "No block found with ID $id.";
    }
}

// Step 2: Admin submits updated data
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_block'])) {
    $id = intval($_POST['id']);
    $name = $_POST['name'];
    $description = $_POST['description'];
    $block_number = $_POST['block_number'];

    $sql = "UPDATE blocks SET name = ?, description = ?, block_number = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssii", $name, $description, $block_number, $id); 

    if ($stmt->execute()) {
        $success = "Block with ID $id updated successfully.";
        $step = 3;
    } else {
        $error = "Error updating block: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Update Block</title>
  <!-- Corrected path to the CSS file -->
  <link rel="stylesheet" href="../../../public_html/styles/allupdate.css" />
</head>
<body>

<?php if ($error): ?>
  <p class="error"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<?php if ($success): ?>
  <p class="success"><?= htmlspecialchars($success) ?></p>
  <p style="text-align:center;"><a href="./update_block.php">Update another block</a></p>
<?php endif; ?>

<?php if ($step === 1): ?>
  <!-- STEP 1: Enter block ID -->
  <form method="POST">
    <h3>Enter Block ID to Update</h3>
    <input type="text" name="search_id" placeholder="Enter Block ID" required>
    <button type="submit">Search</button>
  </form>

<?php elseif ($step === 2 && $block): ?>
  <!-- STEP 2: Update form -->
  <form method="POST">
    <h3>Update Block ID <?= htmlspecialchars($block['id']) ?></h3>
    <input type="hidden" name="id" value="<?= htmlspecialchars($block['id']) ?>">
    <input type="text" name="name" value="<?= htmlspecialchars($block['name']) ?>" required>
    <textarea name="description" rows="4" required><?= htmlspecialchars($block['description']) ?></textarea>
    <input type="number" name="block_number" value="<?= htmlspecialchars($block['block_number']) ?>" required placeholder="Block Number">
    <button type="submit" name="update_block">Update Block</button>
  </form>
<?php endif; ?>

<!-- Corrected path to the back link -->
<a href="./blocks_crud.php">⬅️ Back</a>

</body>
</html>