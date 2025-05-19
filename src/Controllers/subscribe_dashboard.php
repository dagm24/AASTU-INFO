<?php
session_start();
if (!isset($_SESSION["admin_logged_in"])) {
    header("Location: subscribe_login.php"); // Corrected path to the login page
    exit;
}

require '../Models/db_connect.php'; // Corrected path to the database connection file

$result = $conn->query("SELECT * FROM subscribers ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Subscriber Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f6fa;
            display: flex;
            justify-content: center;
            padding: 40px;
        }

        .dashboard-container {
            width: 100%;
            max-width: 1000px;
            background: #fff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        .actions {
            text-align: center;
            margin-bottom: 25px;
        }

        .actions a {
            text-decoration: none;
            background-color: #ff8c42;
            color: white;
            padding: 10px 18px;
            margin: 0 10px;
            border-radius: 10px;
            transition: background-color 0.3s ease;
        }

        .actions a:hover {
            background-color: #e6732e;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        th, td {
            padding: 14px 16px;
        }

        th {
            background-color: #ff8c42;
            color: white;
            position: sticky;
            top: 0;
            z-index: 2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        td {
            color: #333;
        }
    </style>
</head>
<body>

<div class="dashboard-container">
    <h2>📬 Subscriber Dashboard</h2>

    <div class="actions">
        <a href="subscription_email_sender.php">📤 Send Email</a> <!-- Corrected path to email sender -->
        <a href="subscribe_logout.php">🚪 Logout</a> <!-- Corrected path to logout -->
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Subscribed At</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= $row['created_at'] ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

</body>
</html>
