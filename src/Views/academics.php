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
              <div class="nav-link"><a href="../../index.html">Home</a></div>
              <div class="nav-link"><a href="./aboutus.html">About Us</a></div>
              <div class="nav-link"><a href="./acadamics.html">Academics</a></div>
              <div class="nav-link"><a href="./admission.html">Admission</a></div>
              <div class="nav-link"><a href="./student union.html">Student Union</a></div>
              <div class="nav-link-dropdown">
                <div class="nav-link">Student Life</div>
                <img class="chevron-down-icon" alt="Dropdown Icon" src="../assets/images/chevron.png" />
                <div class="dropdown-content">
                   <li class="dropdown-item"><a href="./club.html">Clubs</a></li>
                  <li class="dropdown-item"><a href="./blocks.html">Blocks</a></li>
                  <li class="dropdown-item"><a href="./religious.html">Religious Asscociation</a></li>
                </div>
              </div>
            </div>
            <!-- Contact Us Button inside the navbar -->
            <a class="contact-link" href="./contactUs.html">
              <button class="contact-btn">
                <span class="contact-btn-text">Contact Us</span>
              </button>
              </a>
          </div>
        </div>
      </div>
    </div>
  </header>
<main>
     <article class="first-article">
        <section class="acadamics-text">
          <strong>Explore</strong>
          <h1>Discover <strong>Undergraduate</strong> Programs</h1>
          <p class="first-paragraph">
            AASTU provides diverse undergraduate programs in the college of
            Natural and Applied Sciences. These 
            programs are crafted to develop critical thinking, 
            encourage innovation and emphasize practical
            applications, preparing students for successful careers
            in their fields.
          </p>
          <div class="noof-engandapp">
<div><pre><strong>8</strong> 
  Collage of engineering</pre></div>
<div><pre><strong>4</strong></pre>
  Collage of Natural and Applied Science</div>
          </div>
          <button id="learnmore-button">Learn More</button>
          <div id ="learnmore-container"  >
            Addis Ababa Science and Technology University (AASTU) is a prominent institution in Ethiopia, established in 2011. It is the first university in Ethiopia dedicated to science and technology, reflecting the country's commitment to technological advancement. The university offers a wide range of undergraduate, 
            postgraduate, and PhD programs across its five science and technology colleges1
AASTU's academic programs are designed to meet both national and continental demands, with a
 strong emphasis on research and innovation. The university has established eight centers of
  excellence, aiming to become a research epicenter1. The academic calendar is structured to
   provide a comprehensive education, with a focus on practical applications and 
   sustainable practices.
The university's vision is to be an internationally recognized hub of science and technology 
by 2025. It is accountable to the Ethiopian Ministry of Science and Technology, 
highlighting its strategic importance in the country's development1. 
AASTU's mission includes delivering high standards in teaching, research, 
and community services
For more detailed information, you can visit the AASTU website.
             </div>

        </section>
        <section class="acadamics-image">
          <img src="../../public_html/assets/images/academics.jfif " alt="image">
        </section>
      </article>

     <article class="second-article">
        <section class="academics-text">
       <strong>Explore</strong>
       <h1>Availabel Courses</h1>
       <p>Discover diverse undergraduate programs designed for your academic journey.</p>
        </section>

    <section class="degreeboxes-container">
        <nav class="second-nav">
  <button id="viewall-btn">View All</button>
  <button class="nav2" data-target="engineering">College of Engineering</button>
  <button class="nav2" data-target="applied">College of Applied Science</button>
</nav>

        <div id="engineering-departments">
  <span id="collageofEngineering">College Of Engineering</span>

            <?php foreach ($programs as $program): ?>
                <div class="bachelordegree-box">
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
    </article>
</main>

  <footer class="footer"></footer>
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
              <li><a href="../pages/aboutus.html" class="footer-link">About us</a></li>
              <li>
                <a href="../pages/acadamics.html" class="footer-link"
                  >Academics</a
                >
              </li>
              <li><a href="../pages/admission.html" class="footer-link">Admission</a></li>
              <li>
                <a href="../pages/student union.html" class="footer-link"
                  >Student union</a
                >
              </li>
            </ul>
          </nav>

          <nav class="footer-column">
            <h3 class="footer-title">Student Life</h3>
            <ul class="footer-links">
              <li><a href="../pages/club.html" class="footer-link">Clubs</a></li>
              <li><a href="../pages/blocks.html" class="footer-link">Blocks</a></li>
              <li>
                <a href="./src/pages/religious.html" class="footer-link"
                  >Religious Association</a
                >
              </li>
            </ul>
          </nav>
        </div>

        <section class="newsletter">
          <h3 class="footer-title">Subscribe</h3>
          <p class="newsletter-text">
            Join our newsletter to stay up to date on features and releases.
          </p>
          <form class="newsletter-form">
            <input
              type="email"
              class="newsletter-input"
              placeholder="Enter your email"
            />
            <button type="submit" class="newsletter-button">Subscribe</button>
          </form>
          <p class="consent-text">
            By subscribing you agree to with our
            <span class="privacy-policy">Privacy Policy</span> and provide
            consent to receive updates from our company.
          </p>
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
            <img src="../assets/images/facebook.png" alt="Facebook" />
            <img src="../assets/images/instagram.png" alt="Instagram" />
            <img src="../assets/images/twitter.png" alt="X" />
            <img src="../assets/images/linkedin.png" alt="LinkedIn" />
            <img src="../assets/images/youtube.png" alt="YouTube" />
          </div>
        </div>
      </div>
    </footer>
 <script src="../../public_html/scripts/academics.js"></script>
</body>
</html>
<?php $conn->close(); ?>