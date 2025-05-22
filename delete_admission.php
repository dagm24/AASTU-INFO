<?php
include '../db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM admission WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: admission_crud.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>
