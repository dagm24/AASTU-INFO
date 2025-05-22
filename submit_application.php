<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $gpa = floatval($_POST['gpa']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);

    $sql = "INSERT INTO admission_applications (full_name, email, phone, gpa, department)
            VALUES ('$full_name', '$email', '$phone', '$gpa', '$department')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Application submitted successfully!'); window.location.href='admission.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
