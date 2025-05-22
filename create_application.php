<?php
include '../db_connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $gpa = floatval($_POST['gpa']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);

    $sql = "INSERT INTO admission_applications (full_name, email, phone, gpa, department)
            VALUES ('$full_name', '$email', '$phone', '$gpa', '$department')";

    if ($conn->query($sql)) {
        header("Location: admin_applications_crud.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<form method="POST">
    <h2>Add New Application</h2>
    Full Name: <input type="text" name="full_name" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Phone: <input type="text" name="phone" required><br><br>
    GPA: <input type="number" step="0.01" name="gpa" required><br><br>
    Department:
    <select name="department" required>
        <option value="">-- Select --</option>
        <option value="Software Engineering">Software Engineering</option>
        <option value="Electrical Engineering">Electrical Engineering</option>
        <option value="Mechanical Engineering">Mechanical Engineering</option>
        <option value="Civil Engineering">Civil Engineering</option>
    </select><br><br>
    <button type="submit">Add Application</button>
</form>
