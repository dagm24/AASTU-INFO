<?php
session_start();
include '../Models/db_connect.php'; // Corrected path to db_connect.php

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit;
}

$sql = "SELECT user_id, username, `E-mail`, inquiry FROM users ORDER BY user_id DESC";
$result = $conn->query($sql);

if ($result === false) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Inquiries</title>
    <!-- Corrected path to the CSS file -->
    <link rel="stylesheet" href="../../public_html/styles/view_inquiries.css">
</head>
<body>
    <h1>User Inquiries</h1>

    <table>
        <thead>
            <tr>
                <th>User ID</th>
                <th>Username</th>
                <th>E-mail</th>
                <th>Inquiry</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row["user_id"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["username"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["E-mail"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["inquiry"] ?? '') . "</td>";
                    echo "<td>
                            <form method='POST' action='send_response.php'>
                                <input type='hidden' name='user_id' value='" . htmlspecialchars($row['user_id']) . "'>
                                <input type='hidden' name='to' value='" . htmlspecialchars($row['E-mail']) . "'>
                                <input type='hidden' name='from' value='admin@example.com'>
                                <button type='submit'>Send Response</button>
                            </form>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No inquiries found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="admin.php">Back to Admin Panel</a><br><br>
    <a href="logout.php">Logout</a>
</body>
</html>

<?php
$conn->close();
?>