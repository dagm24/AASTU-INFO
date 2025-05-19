<?php
require_once '../../Models/db_connect.php'; // Corrected path to db_connect.php

$step = 1;
$member = null;
$error = '';
$success = '';

// Step 1: Admin submits ID to find member
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search_id'])) {
    $id = intval($_POST['search_id']);
    $sql = "SELECT * FROM members WHERE id = $id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $member = $result->fetch_assoc();
        $step = 2;
    } else {
        $error = "No member found with ID $id.";
    }
}

// Step 2: Admin confirms deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_member'])) {
    $id = intval($_POST['id']);
    $image = $member['image'];

    // Delete image from uploads folder
    $image_path = "../../assets/images/" . $image;
    if (file_exists($image_path)) {
        unlink($image_path); // Delete the file
    }

    $sql = "DELETE FROM members WHERE id = $id";
    if ($conn->query($sql)) {
        $success = "Member with ID $id deleted successfully.";
        $step = 3; // Done
    } else {
        $error = "Error deleting member: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Delete Member</title>
  <!-- Corrected path to the CSS file -->
  <link rel="stylesheet" href="../../../public_html/styles/alldelete.css" />
</head>
<body>

<?php if ($error): ?>
  <p class="error"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<?php if ($success): ?>
  <p class="success"><?= htmlspecialchars($success) ?></p>
  <p><a href="./delete_member.php">Delete another member</a></p>
<?php endif; ?>

<?php if ($step === 1): ?>
  <!-- STEP 1: Enter member ID -->
  <form method="POST">
    <h3>Enter Member ID to Delete</h3>
    <input type="text" name="search_id" placeholder="Enter Member ID" required>
    <button type="submit">Search</button>
  </form>

<?php elseif ($step === 2 && $member): ?>
  <!-- STEP 2: Confirm deletion -->
  <form method="POST">
    <h3>Confirm Deletion of Member ID <?= htmlspecialchars($member['id']) ?></h3>
    <img src="../../assets/images/<?= htmlspecialchars($member['image']) ?>" class="circle-img" alt="Profile Image">

    <div class="member-info">
      <p><strong>Name:</strong> <?= htmlspecialchars($member['name']) ?></p>
      <p><strong>Role:</strong> <?= htmlspecialchars($member['role']) ?></p>
      <p><strong>LinkedIn:</strong> <?= htmlspecialchars($member['linkedin']) ?></p>
      <p><strong>Telegram:</strong> <?= htmlspecialchars($member['telegram']) ?></p>
    </div>

    <input type="hidden" name="id" value="<?= htmlspecialchars($member['id']) ?>">
    <button type="submit" name="delete_member" onclick="return confirm('Are you sure you want to delete this member?')">Delete Member</button>
  </form>
<?php endif; ?>

<!-- Corrected path to the back link -->
<a href="./member_crud.php">⬅️ Back</a>

</body>
</html>
