<?php
include 'db_connect.php';

// Fetch academic programs from the database
$sql = "SELECT * FROM academic_programs";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h1>Academic Programs</h1>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>";
        echo "<h2>" . $row['program_name'] . "</h2>";
        echo "<p>" . $row['description'] . "</p>";
        echo "<p><strong>Location:</strong> " . $row['location'] . "</p>";
        echo "<p><strong>Duration:</strong> " . $row['duration'] . " years</p>";
        echo "</li>";
    }
    echo "</ul>";
} else {
    echo "<p>No academic programs found.</p>";
}

$conn->close();
?>


<!-- CREATE TABLE academic_programs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    program_name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    location VARCHAR(255) NOT NULL,
    duration INT NOT NULL
); -->