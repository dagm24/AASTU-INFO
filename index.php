<?php
// Start the session
session_start();

// Include database connection
require_once './src/Models/db_connect.php';

// Redirect to the homepage or dashboard
header("Location: ./public_html/index.html");
exit();
?>