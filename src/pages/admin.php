<?php
session_start();
include 'db_connect.php';

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
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../styles/admin panel.css">

</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['admin_username'] ?? 'Admin'); ?>!</h1>
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

                    // Response Form
                    echo "<td>";
                    echo "<form action='send_response.php' method='post'>";
                    echo "<input type='hidden' name='user_id' value='" . htmlspecialchars($row["user_id"]) . "'>"; // Hidden field for user ID
                    echo "<input type='hidden' name='email' value='" . htmlspecialchars($row["E-mail"]) . "'>"; // Hidden field for user email
                    echo "<textarea name='response' rows='3' cols='30' placeholder='Enter your response here'></textarea><br>"; // Textarea for response
                    echo "<button type='submit'>Send Response</button>";
                    echo "</form>";
                    echo "</td>";

                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No inquiries found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="logout.php">Logout</a>
</body>
</html>

<?php
$conn->close();
?>