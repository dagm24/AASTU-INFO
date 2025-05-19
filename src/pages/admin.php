<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../styles/admin_panel.css">
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['admin_username'] ?? 'Admin'); ?>!</h1>

    <h2>Select an Option:</h2>
    <ul >
        <li><a href="view_inquiries.php" class="btn" >View Contact Us Inquiries</a></li>
        <li><a href="office_crud/offices_crud.php" class="btn">CRUD Operations on Offices</a></li>
        <li><a href="members_crud/member_crud.php" class="btn">CRUD Operations on members</a></li>
        <li><a href="block_crud/blocks_crud.php" class="btn">CRUD Operations on blocks</a></li>
        <li><a href="aboutus_crud/aboutus_cruds.php" class="btn">CRUD Operations on aboutus</a></li>

    </ul>

    <a href="logout.php">Logout</a>
</body>
</html>