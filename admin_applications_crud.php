<?php
include '../db_connect.php'; 


if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM admission_applications WHERE id = $id");
    header("Location: admin_applications_crud.php");
    exit();
}

$sql = "SELECT * FROM admission_applications ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Applications</title>
    <style>
        table, th, td { border: 1px solid black; border-collapse: collapse; padding: 10px; }
        a { margin: 0 5px; }
    </style>
</head>
<body>
    <h1>Submitted Admission Applications</h1>
    <a href="create_application.php">+ Add New</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>GPA</th>
            <th>Department</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['full_name']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['phone']) ?></td>
            <td><?= $row['gpa'] ?></td>
            <td><?= htmlspecialchars($row['department']) ?></td>
            <td>
                <a href="edit_application.php?id=<?= $row['id'] ?>">Edit</a>
                <a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Delete this application?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php $conn->close(); ?>
