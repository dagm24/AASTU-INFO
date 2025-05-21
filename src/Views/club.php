<!-- filepath: c:\Users\Iyosiyas\Documents\DESKTOP\Acadamics\AASTU-INFO\src\Views\club.php -->
<?php
session_start();
include '../Models/db_connect.php';

// Check if the user is an admin
$isAdmin = isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin';

// Handle CRUD operations
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $isAdmin) {
    $action = $_POST['action'] ?? '';
    $id = $_POST['id'] ?? null;
    $club_name = $_POST['club_name'] ?? '';
    $description = $_POST['description'] ?? '';
    $location = $_POST['location'] ?? '';
    $members_count = $_POST['members_count'] ?? 0;
    $image_path = $_POST['image_path'] ?? '';
    $telegram_link = $_POST['telegram_link'] ?? '';

    if ($action === 'add') {
        $stmt = $conn->prepare("INSERT INTO clubs (club_name, description, location, members_count, image_path, telegram_link) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssiss", $club_name, $description, $location, $members_count, $image_path, $telegram_link);
        $stmt->execute();
    } elseif ($action === 'edit' && $id) {
        $stmt = $conn->prepare("UPDATE clubs SET club_name = ?, description = ?, location = ?, members_count = ?, image_path = ?, telegram_link = ? WHERE id = ?");
        $stmt->bind_param("sssissi", $club_name, $description, $location, $members_count, $image_path, $telegram_link, $id);
        $stmt->execute();
    } elseif ($action === 'delete' && $id) {
        $stmt = $conn->prepare("DELETE FROM clubs WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
}

// Fetch all clubs
$result = $conn->query("SELECT * FROM clubs");
$clubs = $result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/images/club-favicon.png">
    <link rel="stylesheet" href="../styles/club.css">
    <title>Clubs</title>
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
    <section class="clubs-section">
        <h1>University Clubs</h1>
        <div class="cardssec">
            <?php foreach ($clubs as $club): ?>
                <div class="card">
                    <img src="../assets/images/<?= htmlspecialchars($club['image_path']) ?>" alt="Image of <?= htmlspecialchars($club['club_name']) ?>">
                    <div class="carddescription">
                        <div class="card-info">
                            <img class="discimg" src="../assets/images/icons8-location-50.png" alt="location">
                            <span><?= htmlspecialchars($club['location']) ?></span>
                            <a href="<?= htmlspecialchars($club['telegram_link']) ?>" class="telegram-link">
                                <img class="discimg" src="../assets/images/telegram.png" alt="telegram">
                            </a>
                        </div>
                        <h3><?= htmlspecialchars($club['club_name']) ?></h3>
                        <p><?= htmlspecialchars($club['description']) ?></p>
                        <button class="join-btn" onclick="window.location.href='../pages/Join_form.html'">Join Now</button>
                        <?php if ($isAdmin): ?>
                            <form method="POST" class="crud-form">
                                <input type="hidden" name="id" value="<?= $club['id'] ?>">
                                <button type="submit" name="action" value="edit">Edit</button>
                                <button type="submit" name="action" value="delete">Delete</button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php if ($isAdmin): ?>
            <div class="add-club-form">
                <h2>Add New Club</h2>
                <form method="POST">
                    <input type="hidden" name="action" value="add">
                    <input type="text" name="club_name" placeholder="Club Name" required>
                    <textarea name="description" placeholder="Description" required></textarea>
                    <input type="text" name="location" placeholder="Location" required>
                    <input type="number" name="members_count" placeholder="Members Count" required>
                    <input type="text" name="image_path" placeholder="Image Path" required>
                    <input type="text" name="telegram_link" placeholder="Telegram Link" required>
                    <button type="submit">Add Club</button>
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