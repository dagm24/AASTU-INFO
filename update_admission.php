<?php
include '../db_connect.php';

$id = $_GET['id'];
$sql = "SELECT * FROM admission WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['section_title'];
    $content = $_POST['content'];

    $stmt = $conn->prepare("UPDATE admission SET section_title=?, content=? WHERE id=?");
    $stmt->bind_param("ssi", $title, $content, $id);

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
    <title>Edit Admission Section</title>
</head>
<body>
    <h2>Edit Admission Content</h2>
    <form method="POST">
        <label>Section Title:</label><br>
        <input type="text" name="section_title" value="<?= htmlspecialchars($row['section_title']) ?>" required><br><br>

        <label>Content:</label><br>
        <textarea name="content" rows="6" cols="50" required><?= htmlspecialchars($row['content']) ?></textarea><br><br>

        <button type="submit">Update</button>
        <a href="admission_crud.php">Cancel</a>
    </form>
</body>
</html>
