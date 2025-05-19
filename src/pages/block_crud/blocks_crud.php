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
  <title>Choose Block CRUD Operation</title>
  <link rel="stylesheet" href="../../styles/all_crud.css" />
</head>
<body>
  <h1>Block Management</h1>
  <div class="crud-option">
    <a href="create_block.php"><button>Create Block</button></a>
    <a href="../blocks.php"><button>Read Block</button></a>
    <a href="update_block.php"><button>Update Block</button></a>
    <a href="delete_block.php"><button>Delete Block</button></a>
  </div>
  <a href="../admin.php">⬅️ Back</a>
</body>
</html>
