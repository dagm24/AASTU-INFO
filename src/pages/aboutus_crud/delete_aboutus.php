<?php 
require_once '../db_connect.php';

$step = 1;
$member = null;
$error = '';
$success = '';

// === Step 1: Admin submits ID to search ===
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search_id'])) {
    $id = intval($_POST['search_id']);
    $sql = "SELECT * FROM leadership_team WHERE id = $id";
    $result = $conn->query($sql);
    
    if ($result && $result->num_rows > 0) {
        $member = $result->fetch_assoc();
        $step = 2;
    } else {
        $error = "No staff leader found with ID $id.";
    }
}

// === Step 2: Admin confirms deletion ===
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_delete'])) {
    $id = intval($_POST['id']);
    $image = $_POST['image'];

    // Delete image from uploads folder
    $image_path = "uploads/$image";
    if (file_exists($image_path)) {
        unlink($image_path); // Kill the file 🔪
    }

    // Delete from DB
    $delete = "DELETE FROM leadership_team WHERE id = $id";
    if ($conn->query($delete)) {
        $success = "Staff leader with ID $id deleted successfully.";
        $step = 1; // Reset
    } else {
        $error = "Database error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Delete Staff Leader</title>
  <link rel="stylesheet" href="../../styles/alldelete.css" />

</head>
<body>

<?php if ($error): ?>
  <p class="error"><?= $error ?></p>
<?php endif; ?>
<?php if ($success): ?>
  <p class="success"><?= $success ?></p>
<?php endif; ?>

<?php if ($step === 1): ?>
  <!-- STEP 1: Ask for Leader ID -->
  <form method="POST">
    <h3>Enter Staff Leader ID to Delete</h3>
    <input type="text" name="search_id" placeholder="Enter ID" required>
    <button type="submit">Find</button>
  </form>

<?php elseif ($step === 2 && $member): ?>
  <!-- STEP 2: Show deletion confirmation -->
  <form method="POST">
    <h3>Are you sure you want to delete this Staff Leader?</h3>
    <p><strong>Name:</strong> <?= htmlspecialchars($member['name']) ?></p>
    <p><strong>Role:</strong> <?= htmlspecialchars($member['role']) ?></p>
    <p><strong>Email:</strong> <?= htmlspecialchars($member['email']) ?></p>
    <img src="uploads/<?= htmlspecialchars($member['image']) ?>" class="circle-img" alt="Profile Image">

    <input type="hidden" name="id" value="<?= $member['id'] ?>">
    <input type="hidden" name="image" value="<?= htmlspecialchars($member['image']) ?>">

    <button type="submit" name="confirm_delete">Yes, Delete</button>
  </form>
<?php endif; ?>
<a href="aboutus_cruds.php">⬅️ Back</a>
</body>
</html>
