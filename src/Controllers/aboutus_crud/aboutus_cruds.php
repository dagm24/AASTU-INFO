<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../admin_login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Choose About Us CRUD Operation</title>
  <!-- Updated path to the CSS file -->
  <link rel="stylesheet" href="../../../public_html/styles/all_crud.css" />
</head>
<body>
  <h1>About Us Management</h1>
  <div class="crud-option">
    <!-- Updated paths to CRUD operation files -->
    <a href="./create_aboutus.php"><button>Create About Us</button></a>
    <a href="../../Views/aboutus.php"><button>Read About Us</button></a>
    <a href="./update_aboutus.php"><button>Update About Us</button></a>
    <a href="./delete_aboutus.php"><button>Delete About Us</button></a>
  </div>
  <!-- Updated path to the admin page -->
  <a href="../admin.php">⬅️ Back</a>
</body>
</html>
