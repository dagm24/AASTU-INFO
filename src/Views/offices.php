<?php
require_once '../Models/db_connect.php'; // Corrected path to db_connect.php

// === FETCH OFFICES ===
$offices = [];
$office_sql = "SELECT title, summary, details FROM offices ORDER BY id ASC";
$office_result = $conn->query($office_sql);
if ($office_result && $office_result->num_rows > 0) {
  while ($row = $office_result->fetch_assoc()) {
    $offices[] = [
      'title' => $row['title'],
      'summary' => $row['summary'],
      'details' => $row['details']
    ];
  }
}

// === FETCH MEMBERS ===
$members = [];
$member_sql = "SELECT name, role, image, linkedin, telegram FROM members";
$member_result = $conn->query($member_sql);
if ($member_result && $member_result->num_rows > 0) {
  while ($row = $member_result->fetch_assoc()) {
    $members[] = $row;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Student Union Offices</title>
  <link rel="icon" href="../../public_html/assets/images/offices.png" />
  <link rel="stylesheet" href="../../public_html/styles/offices.css" />
</head>
<body>
  

  <h1>Offices</h1>
  <p class="title">Discover the diverse range of office roles tailored to various skills and interests.</p>

  <div class="container offices-container">
    <?php foreach ($offices as $index => $office): ?>
      <div class="box <?= $index >= 6 ? 'hidden-office' : '' ?>">
        <h2><?= htmlspecialchars($office['title']) ?></h2>
        <p><?= htmlspecialchars($office['summary']) ?></p>
        <button class="details-btn">Details</button>
        <div class="details-content" style="display: none;">
          <p><?= htmlspecialchars($office['details']) ?></p>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <button id="show-more-btn" class="show-more-btn">Show More Offices</button>

  <div class="container">
    <div class="members-container">
      <h1>Union Members</h1>
      <?php foreach ($members as $member): ?>
        <div class="member-card">
          <img src="../../public_html/assets/images/<?= htmlspecialchars($member['image']) ?>" alt="Member Image" />
          <h3><?= htmlspecialchars($member['name']) ?></h3>
          <p><?= htmlspecialchars($member['role']) ?></p>
          <div class="social-icons">
            <a href="https://www.linkedin.com/in/<?= htmlspecialchars($member['linkedin']) ?>" target="_blank">
              <img src="../../public_html/assets/images/linkedin.png" alt="linkedin" />
            </a>
            <a href="https://t.me/<?= htmlspecialchars($member['telegram']) ?>" target="_blank">
              <img src="../../public_html/assets/images/telegram.png" alt="telegram" />
            </a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
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

  <script src="../../public_html/scripts/offices.js"></script>
</body>
</html>
