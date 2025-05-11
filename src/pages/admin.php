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
    <link rel="stylesheet" href="../styles/admin panel.css">
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['admin_username'] ?? 'Admin'); ?>!</h1>

    <h2>Select an Option:</h2>
    <ul>
        <li><a href="view_inquiries.php">View Contact Us Inquiries</a></li>
        <li><a href="offices_crud.php">CRUD Operations on Offices</a></li>
    </ul>

    <a href="logout.php">Logout</a>
</body>
</html>