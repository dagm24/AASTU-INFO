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
  <title>Choose CRUD Operation</title>
  <link rel="stylesheet" href="../../styles/all_crud.css" />

</head>
<body>
  <h1>Select an Operation</h1>
  <div class="crud-option">
    <a href="create_member.php"><button>Create member</button></a>
    <a href="../offices.php"><button>Read member</button></a>
    <a href="update_member.php"><button>Update member</button></a>
    <a href="delete_member.php"><button>Delete member</button></a>
  </div>
  <a href="../admin.php">⬅️ Back</a>
</body>
</html>
