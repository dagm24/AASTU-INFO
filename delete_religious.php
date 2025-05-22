<?php
include '../db_connect.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM religious_subscribers WHERE id = $id";
    $conn->query($sql);
}

header("Location: religious_subscribers.php");
exit();
?>


