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
  <title>Choose aboutus CRUD Operation</title>
  <link rel="stylesheet" href="../../styles/all_crud.css" />
</head>
<body>
  <h1>Aboutus Management</h1>
  <div class="crud-option">
    <a href="create_aboutus.php"><button>Create aboutus</button></a>
    <a href="../aboutus.php"><button>Read aboutus</button></a>
    <a href="update_aboutus.php"><button>Update aboutus</button></a>
    <a href="delete_aboutus.php"><button>Delete aboutus</button></a>
  </div>
  <a href="../admin.php">⬅️ Back</a>
</body>
</html>
