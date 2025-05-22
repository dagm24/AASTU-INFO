<?php
include '../db_connect.php';

// Fetch subscribers
$sql = "SELECT * FROM religious_subscribers ORDER BY id DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Religious Subscribers</title>
    <link rel="stylesheet" href="../styles/admin.css"> <!-- Optional admin styling -->
</head>
<body>
    <h2>Subscribed Emails (Religious)</h2>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Subscribed At</th>
            <th>Action</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo htmlspecialchars($row['email']); ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td>
                <a href="delete_subscriber.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this subscriber?');">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
