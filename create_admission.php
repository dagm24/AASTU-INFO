<?php
include '../db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['section_title'];
    $content = $_POST['content'];

    $stmt = $conn->prepare("INSERT INTO admission (section_title, content) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $content);

    if ($stmt->execute()) {
        header("Location: admission_crud.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Admission Section</title>
</head>
<body>
    <h2>Add Admission Content</h2>
    <form method="POST">
        <label>Section Title:</label><br>
        <input type="text" name="section_title" required><br><br>

        <label>Content:</label><br>
        <textarea name="content" rows="6" cols="50" required></textarea><br><br>

        <button type="submit">Add</button>
        <a href="admission_crud.php">Cancel</a>
    </form>
</body>
</html>
