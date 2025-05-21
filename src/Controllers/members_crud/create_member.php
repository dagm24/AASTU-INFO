<?php
require_once '../../Models/db_connect.php'; // Corrected path to db_connect.php

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $role = $_POST['role'];
  $linkedin = $_POST['linkedin'];
  $telegram = $_POST['telegram'];

  // Check and upload image
  if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
    $imageName = basename($_FILES['image']['name']);
    $targetPath = "../../assets/images/" . $imageName; // Corrected path for image upload
    $imageType = strtolower(pathinfo($targetPath, PATHINFO_EXTENSION));
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

    if (in_array($imageType, $allowedTypes)) {
      if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
        // Insert into database
        $sql = "INSERT INTO members (name, role, image, linkedin, telegram)
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $name, $role, $imageName, $linkedin, $telegram);
        if ($stmt->execute()) {
          header("Location: members_crud.php"); // Corrected redirection path
          exit;
        } else {
          $error = "Database error: " . $conn->error;
        }
      } else {
        $error = "Failed to move uploaded image.";
      }
    } else {
      $error = "Unsupported image type. Allowed: jpg, jpeg, png, gif, webp.";
    }
  } else {
    $error = "Please upload an image.";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Member</title>
  <!-- Corrected path to the CSS file -->
  <link rel="stylesheet" href="../../../public_html/styles/allcreate.css" />
</head>
<body>

<?php if ($error): ?>
  <p class="error"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form method="POST" enctype="multipart/form-data">
  <h2>Add Member</h2>
  <input type="text" name="name" placeholder="Name" required>
  <input type="text" name="role" placeholder="Role" required>
  <input type="file" name="image" accept="image/*" required>
  <input type="text" name="linkedin" placeholder="LinkedIn account" required>
  <input type="text" name="telegram" placeholder="Telegram account" required>
  <button type="submit">Add Member</button>
</form>

<!-- Corrected path to the back link -->
<a href="./member_crud.php">⬅️ Back</a>

</body>
</html>
