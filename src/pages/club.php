<?php
include 'db_connect.php';

// Fetch club information from the database
$sql = "SELECT * FROM clubs";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h1>University Clubs</h1>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>";
        echo "<h2>" . $row['club_name'] . "</h2>";
        echo "<p>" . $row['description'] . "</p>";
        echo "<p><strong>Location:</strong> " . $row['location'] . "</p>";
        echo "<p><strong>Members:</strong> " . $row['members_count'] . "</p>";
        echo "</li>";
    }
    echo "</ul>";
} else {
    echo "<p>No clubs found.</p>";
}

$conn->close();
?>


<!-- CREATE TABLE clubs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    club_name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    location VARCHAR(255) NOT NULL,
    members_count INT NOT NULL
); -->