<?php include '../Models/db_connect.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="../../public_html/assets/images/about us.png" />
  <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
  <title>About Us</title>
  <!-- Corrected path to the CSS file -->
  <link rel="stylesheet" href="../../public_html/styles/aboutus.css" />
</head>
<body>

<header>
    <!-- Navigation Bar -->
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
                    <div class="nav-link"><a href="./academics.html">Academics</a></div>
                    <div class="nav-link"><a href="./admission.html">Admission</a></div>
                    <div class="nav-link"><a href="./studentunion.php">Student Union</a></div>
                    <div class="nav-link-dropdown">
                        <div class="nav-link">Student Life</div>
                        <img class="chevron-down-icon" src="../../public_html/assets/images/chevron.png" alt="Dropdown Icon" />
                        <div class="dropdown-content">
                            <div class="dropdown-item"><a href="./club.html">Clubs</a></div>
                            <div class="dropdown-item"><a href="./blocks.php">Blocks</a></div>
                            <div class="dropdown-item"><a href="./religious.html">Religious Association</a></div>
                        </div>
                    </div>
                </div>
                <a class="contact-link" href="./contactUs.php">
                    <button class="contact-btn">Contact Us</button>
                </a>
            </div>
        </div>
    </div>
</header>

<!-- Body Section -->
<div class="body1">
    <div class="container1">
        <div>
            <div class="title">The Journey of <span class="unique">AASTU</span>: <br> A Historical Overview</div>
            <div class="content">
                Addis Ababa Science and Technology University (AASTU) is a premier public university established in 2011 to drive technological advancement and economic growth in Ethiopia. Partnering closely with industries, AASTU offers accredited, quality-driven programs designed to meet national and international standards in engineering and applied sciences.
            </div>
            <br>
            <div class="content" id="learnmore" style="display:none;">
                Established in 2011, Addis Ababa Science and Technology University (AASTU) has rapidly emerged as Ethiopia’s premier institution for science and technology education. It is dedicated to promoting innovation, applied research, and driving industrial development in the country. As one of the science and technology universities, AASTU offers programs, with a primary focus on engineering, applied sciences, technology, and ICT fields. Meticulously tailored to align with the nation’s developmental agenda, the university provides 13 undergraduate, 43 master’s, and 41 doctoral programs. These programs empower students to excel as specialists and trailblazers in their respective fields. AASTU embraces a collaborative ethos and actively forges partnerships with over 175 international and 127 national entities. These partnerships enrich the academic fabric of the university and expand its global impact. By fostering collaboration, AASTU ensures that it remains at the forefront of scientific and technological advancements. With an unwavering commitment to excellence and a keen focus on industry relevance, AASTU plays a pivotal role in shaping the trajectory of Ethiopia’s scientific and technological landscape. The university is dedicated to ensuring a brighter and more innovative future for generations to come.
            </div>
            <button class="button1" id="learnmorebtn">Learn More</button>
        </div>
        <div>
            <img src="../assets/images/Placeholder Image.png" alt="">
        </div>
    </div>
</div>

<!-- Leadership Section -->
<?php
$result = $conn->query("SELECT * FROM leadership_team");
$staff = [];
while ($row = $result->fetch_assoc()) {
    $staff[] = $row;
}
?>
<div class="staffs">
    <h5 style="text-align: center; font-size: 16px; color: #a67a0f;">Leadership</h5>
    <h2 style="text-align: center; font-weight: bold; font-size: 40px;">Staff leaders</h2><br><br>
    <p style="text-align: center; font-weight: bold; font-size: 16px;">Meet the dedicated leaders of AASTU.</p>

    <div class="staff-container" id="staffContainer">
        <?php foreach ($staff as $index => $row): ?>
            <div class="staff-card <?php echo $index >= 8 ? 'extra-staff hidden' : ''; ?>">
                <img src="../Controllers/aboutus_crud/uploads/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
                <h4><?php echo $row['name']; ?></h4>
                <p><?php echo $row['role']; ?></p>
                <p>Email: <?php echo $row['email']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <?php if (count($staff) > 8): ?>
        <button id="toggleBtn">See More</button>
    <?php endif; ?>
</div>

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
                    <li><a href="./academics.html" class="footer-link">Academics</a></li>
                    <li><a href="./admission.html" class="footer-link">Admission</a></li>
                    <li><a href="./studentunion.php" class="footer-link">Student Union</a></li>
                </ul>
            </nav>
            <nav class="footer-column">
                <h3 class="footer-title">Student Life</h3>
                <ul class="footer-links">
                    <li><a href="./club.html" class="footer-link">Clubs</a></li>
                    <li><a href="./blocks.php" class="footer-link">Blocks</a></li>
                    <li><a href="./religious.html" class="footer-link">Religious Association</a></li>
                </ul>
            </nav>
        </div>
    </div>
</footer>

<script src="../../public_html/scripts/aboutus.js"></script>
</body>
</html>
