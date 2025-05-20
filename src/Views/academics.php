<!-- filepath: c:\Users\Iyosiyas\Documents\DESKTOP\Acadamics\AASTU-INFO\src\Views\academics.php -->
<?php
session_start();
include '../Models/db_connect.php';

// Check if the user is an admin
$isAdmin = isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin';

// Handle CRUD operations
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $isAdmin) {
    $action = $_POST['action'] ?? '';
    $id = $_POST['id'] ?? null;
    $program_name = $_POST['program_name'] ?? '';
    $description = $_POST['description'] ?? '';
    $location = $_POST['location'] ?? '';
    $duration = $_POST['duration'] ?? '';

    if ($action === 'add') {
        $stmt = $conn->prepare("INSERT INTO academics (program_name, description, location, duration) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $program_name, $description, $location, $duration);
        $stmt->execute();
    } elseif ($action === 'edit' && $id) {
        $stmt = $conn->prepare("UPDATE academics SET program_name = ?, description = ?, location = ?, duration = ? WHERE id = ?");
        $stmt->bind_param("sssii", $program_name, $description, $location, $duration, $id);
        $stmt->execute();
    } elseif ($action === 'delete' && $id) {
        $stmt = $conn->prepare("DELETE FROM academics WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
}

// Fetch all academic programs
$result = $conn->query("SELECT * FROM academics");
$programs = $result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../public_html/assets/images/icons8-academy-30.png">
    <link rel="stylesheet" href="../../public_html/styles/academics.css">
    <title>Academics</title>
</head>
<body>
<header>
    <div class="navbar">
        <div class="container">
            <div class="content">
                <b class="aastu">
                    <span>AASTU</span>
                    <span class="info">INFO</span>
                </b>
            </div>
            <div class="column">
                <div class="nav-links">
                    <div class="nav-link"><a href="../../index.html">Home</a></div>
                    <div class="nav-link"><a href="./aboutus.php">About Us</a></div>
                    <div class="nav-link"><a href="./academics.php">Academics</a></div>
                    <div class="nav-link"><a href="./admission.php">Admission</a></div>
                    <div class="nav-link"><a href="./studentunion.php">Student Union</a></div>
                </div>
                <a class="contact-link" href="./contactUs.php">
                    <button class="contact-btn">Contact Us</button>
                </a>
            </div>
        </div>
    </div>
</header>
<main>
    <section class="academics-section">
        <h1>Academic Programs</h1>
        <div class="programs-container">
            <?php foreach ($programs as $program): ?>
                <div class="program-card">
                    <h2><?= htmlspecialchars($program['program_name']) ?></h2>
                    <p><?= htmlspecialchars($program['description']) ?></p>
                    <p><strong>Location:</strong> <?= htmlspecialchars($program['location']) ?></p>
                    <p><strong>Duration:</strong> <?= htmlspecialchars($program['duration']) ?> years</p>
                    <?php if ($isAdmin): ?>
                        <form method="POST" class="crud-form">
                            <input type="hidden" name="id" value="<?= $program['id'] ?>">
                            <button type="submit" name="action" value="edit">Edit</button>
                            <button type="submit" name="action" value="delete">Delete</button>
                        </form>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
        <?php if ($isAdmin): ?>
            <div class="add-program-form">
                <h2>Add New Program</h2>
                <form method="POST">
                    <input type="hidden" name="action" value="add">
                    <input type="text" name="program_name" placeholder="Program Name" required>
                    <textarea name="description" placeholder="Description" required></textarea>
                    <input type="text" name="location" placeholder="Location" required>
                    <input type="number" name="duration" placeholder="Duration (years)" required>
                    <button type="submit">Add Program</button>
                </form>
            </div>
        <?php endif; ?>
    </section>
</main>
<footer class="footer">
    <div class="footer-content">
        <div class="footer-links-section">
            <div class="brand">
                <b class="brand-name">
                    <span>AASTU</span>
                    <span class="brand-info">INFO</span>
                </b>
            </div>
            <nav class="footer-column">
                <h3 class="footer-title">Quick Links</h3>
                <ul class="footer-links">
                    <li><a href="../../index.html" class="footer-link">Home</a></li>
                    <li><a href="./aboutus.php" class="footer-link">About us</a></li>
                    <li><a href="./academics.php" class="footer-link">Academics</a></li>
                    <li><a href="./admission.php" class="footer-link">Admission</a></li>
                    <li><a href="./studentunion.php" class="footer-link">Student Union</a></li>
                </ul>
            </nav>
        </div>
    </div>
</footer>
</body>
</html>
<?php $conn->close(); ?>