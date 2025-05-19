<?php 
require_once '../db_connect.php';

$step = 1;
$leader = null;
$error = '';
$success = '';

// === Step 1: Admin submits ID ===
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search_id'])) {
    $id = intval($_POST['search_id']);
    $sql = "SELECT * FROM leadership_team WHERE id = $id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $leader = $result->fetch_assoc();
        $step = 2;
    } else {
        $error = "No leader found with ID $id.";
    }
}

// === Step 2: Admin submits updated form ===
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_leader'])) {
    $id = intval($_POST['id']);
    $name = $conn->real_escape_string($_POST['name']);
    $role = $conn->real_escape_string($_POST['role']);
    $email = $conn->real_escape_string($_POST['email']);

    // Image handling
    if (!empty($_FILES['image']['name'])) {
        $image = basename($_FILES['image']['name']);
        $target = "uploads/$image";

        if (!move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $error = "Error uploading image.";
        }
    } else {
        $image = $_POST['old_image'];
    }

    if (!$error) {
        $update = "UPDATE leadership_team 
                   SET name='$name', role='$role', email='$email', image='$image' 
                   WHERE id=$id";

        if ($conn->query($update)) {
            $success = "Leader updated successfully.";
            header("Location: leadership_team.php");
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
  <title>Update Leader</title>

      <link rel="stylesheet" href="../../styles/allupdate.css" />

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
    <h3>Enter Leader ID to Update</h3>
    <input type="text" name="search_id" placeholder="Enter Leader ID" required>
    <button type="submit">Search</button>
  </form>

<?php elseif ($step === 2 && $leader): ?>
  <!-- STEP 2: Show update form -->
  <form method="POST" enctype="multipart/form-data">
    <h3>Update Leader ID <?= $leader['id'] ?></h3>
    <input type="hidden" name="id" value="<?= $leader['id'] ?>">
    <input type="hidden" name="old_image" value="<?= htmlspecialchars($leader['image']) ?>">

    <input type="text" name="name" value="<?= htmlspecialchars($leader['name']) ?>" required placeholder="Name">
    <input type="text" name="role" value="<?= htmlspecialchars($leader['role']) ?>" required placeholder="Role">
    <input type="email" name="email" value="<?= htmlspecialchars($leader['email']) ?>" required placeholder="Email">

    <img src="uploads/<?= htmlspecialchars($leader['image']) ?>" class="circle-img" alt="Profile Image">

    <input type="file" name="image" accept="image/*">

    <button type="submit" name="update_leader">Update Leader</button>
  </form>
<?php endif; ?>

<a href="aboutus_cruds.php">⬅️ Back</a>
</body>
</html>