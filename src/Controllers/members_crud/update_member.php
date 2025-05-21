<?php
require_once '../../Models/db_connect.php'; // Corrected path to db_connect.php

$step = 1;
$member = null;
$error = '';
$success = '';

// === Step 1: Admin submits ID ===
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search_id'])) {
    $id = intval($_POST['search_id']);
    $sql = "SELECT * FROM members WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $member = $result->fetch_assoc();
        $step = 2;
    } else {
        $error = "No member found with ID $id.";
    }
}

// === Step 2: Admin submits updated form ===
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_member'])) {
    $id = intval($_POST['id']);
    $name = $conn->real_escape_string($_POST['name']);
    $role = $conn->real_escape_string($_POST['role']);
    $linkedin = $conn->real_escape_string($_POST['linkedin']);
    $telegram = $conn->real_escape_string($_POST['telegram']);

    // Image handling
    if (!empty($_FILES['image']['name'])) {
        $image = basename($_FILES['image']['name']);
        $target = "../../assets/images/$image";

        if (!move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $error = "Error uploading image.";
        }
    } else {
        $image = $_POST['old_image'];
    }

    if (!$error) {
        $update = "UPDATE members 
                   SET name = ?, role = ?, image = ?, linkedin = ?, telegram = ? 
                   WHERE id = ?";
        $stmt = $conn->prepare($update);
        $stmt->bind_param("sssssi", $name, $role, $image, $linkedin, $telegram, $id);

        if ($stmt->execute()) {
            $success = "Member updated successfully.";
            header("Location: member_crud.php"); // Corrected redirection path
            exit;
        } else {
            $error = "Database error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Update Member</title>
  <!-- Corrected path to the CSS file -->
  <link rel="stylesheet" href="../../../public_html/styles/allupdate.css" />
</head>
<body>

<?php if ($error): ?>
  <p class="error"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<?php if ($success): ?>
  <p class="success"><?= htmlspecialchars($success) ?></p>
<?php endif; ?>

<?php if ($step === 1): ?>
  <!-- STEP 1: Ask for Member ID -->
  <form method="POST">
    <h3>Enter Member ID to Update</h3>
    <input type="text" name="search_id" placeholder="Enter Member ID" required>
    <button type="submit">Search</button>
  </form>

<?php elseif ($step === 2 && $member): ?>
  <!-- STEP 2: Show update form -->
  <form method="POST" enctype="multipart/form-data">
    <h3>Update Member ID <?= htmlspecialchars($member['id']) ?></h3>
    <input type="hidden" name="id" value="<?= htmlspecialchars($member['id']) ?>">
    <input type="hidden" name="old_image" value="<?= htmlspecialchars($member['image']) ?>">

    <input type="text" name="name" value="<?= htmlspecialchars($member['name']) ?>" required placeholder="Name">
    <input type="text" name="role" value="<?= htmlspecialchars($member['role']) ?>" required placeholder="Role">

    <img src="../../assets/images/<?= htmlspecialchars($member['image']) ?>" class="circle-img" alt="Profile Image">

    <input type="file" name="image" accept="image/*">

    <input type="text" name="linkedin" value="<?= htmlspecialchars($member['linkedin']) ?>" required placeholder="LinkedIn">
    <input type="text" name="telegram" value="<?= htmlspecialchars($member['telegram']) ?>" required placeholder="Telegram">

    <button type="submit" name="update_member">Update Member</button>
  </form>
<?php endif; ?>

<!-- Corrected path to the back link -->
<a href="./member_crud.php">⬅️ Back</a>

</body>
</html>
