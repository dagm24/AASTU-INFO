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
    <link rel="stylesheet" href="../../public_html/styles/club.css">
    <title>Clubs</title>
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
                <div class="nav-link">
                  <a href="./aboutus.html">About Us</a>
                </div>
                <div class="nav-link">
                  <a href="./acadamics.html">Academics</a>
                </div>
                <div class="nav-link">
                  <a href="./admission.html">Admission</a>
                </div>
                <div class="nav-link">
                  <a href="./student union.html">Student Union</a>
                </div>
                <div class="nav-link-dropdown">
                  <div class="nav-link">Student Life</div>
                  <img
                    class="chevron-down-icon"
                    alt="Dropdown Icon"
                    src="../assets/images/chevron.png"
                  />
                  <div class="dropdown-content">
                    <div class="dropdown-item">
                      <a href="./club.html">Clubs</a>
                    </div>
                    <div class="dropdown-item">
                      <a href="./blocks.html">Blocks</a>
                    </div>
                    <div class="dropdown-item">
                      <a href="./religious.html"
                        >Religious Association</a
                      >
                    </div>
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
    <article id="article1">
         <section class="section1">
          <div class="header-container">
            <span>clubs</span>
            <h1 class="firstheader">
              <strong style="color: #a67a0f">Explore</strong> Our Diverse
              University Clubs
            </h1>
          </div>
          <p class="leftpara" style="font-size: 20px">
            At AASTU, we offer a vibrant array of clubs that cater to various
            interests and passions. Whether you're looking to enhance your
            academic journey, build your career, engage socially, or celebrate
            cultural diversity, there's a club for you. Join us in fostering
            connections and creating memorable experiences!
          </p>
        </section>
         <section class="section3">
          <div class="button-container">
            <a href="../pages/Join_form.html">
              <button class="upper-join-btn">Join</button>
            </a>
            <span id="learn-more">Learn More</span>
          </div>

          <div id="add-info">
            <h3>Discover Your Passion with Our University Clubs</h3>
            <p>
              At our university, we believe that learning extends beyond the
              classroom. Our diverse range of clubs offers students the
              opportunity to explore their interests, develop new skills, and
              connect with like-minded peers.
            </p>

            <h4>Why Join a Club?</h4>
            <ul>
              <li>
                <strong>Expand Your Network:</strong> Meet new friends and build
                connections with students who share your interests.
              </li>
              <li>
                <strong>Develop Skills:</strong> Gain valuable experience and
                enhance your resume with leadership roles and hands-on
                activities.
              </li>
              <li>
                <strong>Have Fun:</strong> Enjoy a variety of events, workshops,
                and social gatherings.
              </li>
            </ul>

            <h4>How to Join</h4>
            <ol>
              <li>
                Browse through our list of clubs to find one that matches your
                interests.
              </li>
              <li>
                Click on the club to learn more about their activities and
                requirements.
              </li>
              <li>
                Use the Join button to submit your membership application.
              </li>
            </ol>
          </div>
        </section>
    </article>

    <article id="article2">
        <section class="firstsec">
          <h1>Clubs</h1>
          <p>Origin and vibe print of University clubs and activities</p>
        </section>

    <section class="secondsec">
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

        <button id="viewall-btn">View All</button>
        
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
    </article>

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
              <li><a href="./aboutus.html" class="footer-link">About us</a></li>
              <li>
                <a href="./acadamics.html" class="footer-link"
                  >Academics</a
                >
              </li>
              <li><a href="./admission.html" class="footer-link">Admission</a></li>
              <li>
                <a href="./student union.html" class="footer-link"
                  >Student union</a
                >
              </li>
            </ul>
          </nav>

          <nav class="footer-column">
            <h3 class="footer-title">Student Life</h3>
            <ul class="footer-links">
              <li><a href="./club.html" class="footer-link">Clubs</a></li>
              <li><a href="./blocks.html" class="footer-link">Blocks</a></li>
              <li>
                <a href="./religious.html" class="footer-link"
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
  </main>
</body>
<script src="../../public_html/scripts/club.js"></script>
</html>
<?php $conn->close(); ?>