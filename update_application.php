<?php
include '../db_connect.php';

$id = intval($_GET['id']);
$result = $conn->query("SELECT * FROM admission_applications WHERE id = $id");
$data = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $gpa = floatval($_POST['gpa']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);

    $sql = "UPDATE admission_applications 
            SET full_name='$full_name', email='$email', phone='$phone', gpa='$gpa', department='$department'
            WHERE id=$id";

    if ($conn->query($sql)) {
        header("Location: admin_applications_crud.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<form method="POST">
    <h2>Edit Application</h2>
    Full Name: <input type="text" name="full_name" value="<?= htmlspecialchars($data['full_name']) ?>" required><br><br>
    Email: <input type="email" name="email" value="<?= htmlspecialchars($data['email']) ?>" required><br><br>
    Phone: <input type="text" name="phone" value="<?= htmlspecialchars($data['phone']) ?>" required><br><br>
    GPA: <input type="number" step="0.01" name="gpa" value="<?= $data['gpa'] ?>" required><br><br>
    Department:
    <select name="department" required>
        <option value="">-- Select --</option>
        <?php
        $departments = ["Software Engineering", "Electrical Engineering", "Mechanical Engineering", "Civil Engineering"];
        foreach ($departments as $dept) {
            $selected = $data['department'] == $dept ? 'selected' : '';
            echo "<option value='$dept' $selected>$dept</option>";
        }
        ?>
    </select><br><br>
    <button type="submit">Update Application</button>
</form>
