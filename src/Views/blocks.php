<?php
require_once '../Models/db_connect.php'; // Corrected path to db_connect.php
$sql = "SELECT * FROM blocks";
$result = $conn->query($sql);
$blocks = [];

if ($result && $result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $blocks[] = $row;
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="../../public_html/assets/images/building-favicon.png" />
  <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
  <title>Blocks</title>
  <!-- Corrected path to the CSS file -->
  <link rel="stylesheet" href="../../public_html/styles/blocks.css" />
</head>
<body>
<header>
  <div class="home">
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
            <div class="nav-link"><a href="../../public_html/index.html">Home</a></div>
            <div class="nav-link"><a href="./aboutus.php">About Us</a></div>
            <div class="nav-link"><a href="../../public_html/pages/academics.html">Academics</a></div>
            <div class="nav-link"><a href="../../public_html/pages/admission.html">Admission</a></div>
            <div class="nav-link"><a href="./studentunion.php">Student Union</a></div>
            <div class="nav-link-dropdown">
              <div class="nav-link">Student Life</div>
              <img class="chevron-down-icon" alt="Dropdown Icon" src="../../public_html/assets/images/chevron.png" />
              <div class="dropdown-content">
                <div class="dropdown-item"><a href="../../public_html/pages/club.html">Clubs</a></div>
                <div class="dropdown-item"><a href="./blocks.php">Blocks</a></div>
                <div class="dropdown-item"><a href="../../public_html/pages/religious.html">Religious Association</a></div>
              </div>
            </div>
          </div>
          <a class="contact-link" href="./contactUs.php">
            <button class="contact-btn">
              <span class="contact-btn-text">Contact Us</span>
            </button>
          </a>
        </div>
      </div>
    </div>
  </div>
</header><br><br><br>

<div class="explore-section">
  <div class="text-content">
    <h2>Explore Our Interactive Campus <br>Guide for Seamless Navigation <br>and Connectivity</h2><br><br>
    <p>Discover the key areas of our campus through our interactive <br> guide. Easily access information about facilities, services, and <br>contacts to enhance your experience at AASTU.</p>
  </div>
  <div class="image-content"><img src="../../public_html/assets/images/navigation.jpg" alt="Compass Icon"></div>
</div>
<br><br><br><br><br><br><br>

<div class="directory-section">
  <h3>Directory</h3>
  <p>Discover the guide to the university's blocks and buildings, providing essential information and <br>location details to help you navigate the campus.</p>

  <div class="filter-buttons">
    <button onclick="toggleView()" id="viewToggleBtn">View All</button>
    <button onclick="filterBlocks('admission')">Admission Office</button>
    <button onclick="filterBlocks('clinic')">Clinic</button>
    <button onclick="filterBlocks('dormitory')">Dormitory</button>
    <button onclick="filterBlocks('library')">Library</button>
  </div>
</div>

<div class="block-list" id="blockList">
  <?php foreach ($blocks as $index => $row): ?>
    <div class="block-item" data-name="<?= htmlspecialchars($row['name']) ?>" style="<?= $index > 1 ? 'display:none;' : '' ?>">
      <div class="block-header">
        <div class="block-title"><?= htmlspecialchars($row['name']) ?></div><br>
        <button class="toggle-btn" onclick="toggleDescription(this)">Details</button>
      </div>
      <div class="block-number">Block <?= htmlspecialchars($row['block_number']) ?></div>
      <div class="block-summary"><?= nl2br(htmlspecialchars($row['summary'])) ?></div>
      <div class="block-description"><?= nl2br(htmlspecialchars($row['description'])) ?></div>
    </div>
  <?php endforeach; ?>
</div>
<br><br><br>

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
          <li><a href="../../public_html/index.html" class="footer-link">Home</a></li>
          <li><a href="./aboutus.php" class="footer-link">About us</a></li>
          <li><a href="../../public_html/pages/academics.html" class="footer-link">Academics</a></li>
          <li><a href="../../public_html/pages/admission.html" class="footer-link">Admission</a></li>
          <li><a href="./studentunion.php" class="footer-link">Student Union</a></li>
        </ul>
      </nav>

      <nav class="footer-column">
        <h3 class="footer-title">Student Life</h3>
        <ul class="footer-links">
          <li><a href="../../public_html/pages/club.html" class="footer-link">Clubs</a></li>
          <li><a href="./blocks.php" class="footer-link">Blocks</a></li>
          <li><a href="../../public_html/pages/religious.html" class="footer-link">Religious Association</a></li>
        </ul>
      </nav>
    </div>

    <section class="newsletter">
      <h3 class="footer-title">Subscribe</h3>
      <p class="newsletter-text">Join our newsletter to stay up to date on features and releases.</p>
      <form class="newsletter-form" action="../../src/Controllers/subscribe.php" method="POST">
        <input type="email" class="newsletter-input" placeholder="Enter your email" name="email" required />
        <button type="submit" class="newsletter-button">Subscribe</button>
      </form>
      <p class="consent-text">By subscribing you agree to our <span class="privacy-policy">Privacy Policy</span> and provide consent to receive updates.</p>
    </section>
  </div>

  <div class="footer-credits">
    <div class="divider"></div>
    <div class="credits-row">
      <p class="copyright">© 2025 AASTU INFO. All rights reserved.</p>
      <nav class="policy-links">
        <a href="#" class="footer-link">Privacy Policy</a>
        <a href="#" class="footer-link">Terms of Service</a>
        <a href="#" class="footer-link">Cookies Settings</a>
      </nav>
      <div class="social-icons">
        <img src="../../public_html/assets/images/facebook.png" alt="Facebook" />
        <img src="../../public_html/assets/images/instagram.png" alt="Instagram" />
        <img src="../../public_html/assets/images/twitter.png" alt="X" />
        <img src="../../public_html/assets/images/linkedin.png" alt="LinkedIn" />
        <img src="../../public_html/assets/images/youtube.png" alt="YouTube" />
      </div>
    </div>
  </div>
</footer>
<script src="../../public_html/scripts/blocks.js"></script>
</body>
</html>
