<?php
include '../db_connect.php';

$sql = "SELECT * FROM admission ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Admission Content</title>
    <link rel="stylesheet" href="../../styles/admin.css">
</head>
<body>
    <h2>Admission Content Management</h2>
    <a href="add_admission.php">+ Add New Admission Section</a><br><br>
    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Section Title</th>
            <th>Content</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) : ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['section_title']) ?></td>
            <td><?= nl2br(htmlspecialchars($row['content'])) ?></td>
            <td>
                <a href="edit_admission.php?id=<?= $row['id'] ?>">Edit</a> |
                <a href="delete_admission.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this section?');">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
<?php $conn->close(); ?>
