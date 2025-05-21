<?php
session_start();
include '../Models/db_connect.php'; // Corrected path to db_connect.php

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <!-- Corrected path to the CSS file -->
    <link rel="stylesheet" href="../../public_html/styles/admin_panel.css">
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username'] ?? 'Admin'); ?>!</h1>

    <h2>Select an Option:</h2>
    <ul>
        <li><a href="view_inquiries.php" class="btn">View Contact Us Inquiries</a></li>
        <li><a href="office_crud/offices_crud.php" class="btn">CRUD Operations on Offices</a></li>
        <li><a href="members_crud/member_crud.php" class="btn">CRUD Operations on Members</a></li>
        <li><a href="block_crud/blocks_crud.php" class="btn">CRUD Operations on Blocks</a></li>
        <li><a href="aboutus_crud/aboutus_cruds.php" class="btn">CRUD Operations on About Us</a></li>
    </ul>

    <a href="logout.php">Logout</a>
</body>
</html>