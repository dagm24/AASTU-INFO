
<?php
include 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="../assets/images/icons8-academy-30.png">
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&family=Roboto:wght@400;500;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../styles/academics.css">
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
                <div class="nav-link"><a href="./academics.php">Academics</a></div>
                <div class="nav-link"><a href="./admission.html">Admission</a></div>
                <div class="nav-link"><a href="./student union.html">Student Union</a></div>
                <div class="nav-link-dropdown">
                  <div class="nav-link">Student Life</div>
                  <img class="chevron-down-icon" alt="Dropdown Icon" src="../assets/images/chevron.png" />
                  <div class="dropdown-content">
                    <li class="dropdown-item"><a href="./club.html">Clubs</a></li>
                    <li class="dropdown-item"><a href="./blocks.html">Blocks</a></li>
                    <li class="dropdown-item"><a href="./religious.html">Religious Association</a></li>
                  </div>
                </div>
              </div>
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
  College of Engineering</pre></div>
            <div><pre><strong>4</strong></pre>
  College of Natural and Applied Science</div>
          </div>
          <button id="learnmore-button">Learn More</button>
          <div id="learnmore-container">
            Addis Ababa Science and Technology University (AASTU) is a prominent institution in Ethiopia, established in 2011. It is the first university in Ethiopia dedicated to science and technology, reflecting the country's commitment to technological advancement. The university offers a wide range of undergraduate, 
            postgraduate, and PhD programs across its five science and technology colleges.
          </div>
        </section>
        <section class="acadamics-image">
          <img src="../assets/images/academics.jfif" alt="image">
        </section>
      </article>

      <article class="second-article">
        <section class="academics-text">
          <strong>Explore</strong>
          <h1>Available Courses</h1>
          <p>Discover diverse undergraduate programs designed for your academic journey.</p>
        </section>

        <section class="degreeboxes-container">
          <nav class="second-nav">
            <button id="viewall-btn">View All</button>
            <button class="nav2" data-target="engineering">College of Engineering</button>
            <button class="nav2" data-target="applied">College of Applied Science</button>
          </nav>

          <!-- Fetch and display academic programs dynamically -->
          <div id="engineering-departments">
            <span id="collageofEngineering">College Of Engineering</span>
            <?php
            $sql = "SELECT * FROM academic_programs WHERE location = 'Engineering'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='bachelordegree-box'>";
                    echo "<h2>" . $row['program_name'] . " <span class='department-span'>Department</span></h2>";
                    echo "<p>" . $row['description'] . "</p>";
                    echo "<p><img src='../assets/images/icons8-location-50.png' alt='location of Campus' class='icons'> " . $row['location'] . " &nbsp;&nbsp;";
                    echo "<img src='../assets/images/icons8-time-50.png' alt='year to complete the field' class='icons'> " . $row['duration'] . " years</p>";
                    echo "</div>";
                }
            } else {
                echo "<p>No programs found in the College of Engineering.</p>";
            }
            ?>
          </div>

          <div id="applied-departments" style="display:none;">
            <span id="collageofApplied">College Of Applied Science</span>
            <?php
            $sql = "SELECT * FROM academic_programs WHERE location = 'Applied Science'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='bachelordegree-box'>";
                    echo "<h2>" . $row['program_name'] . " <span class='department-span'>Department</span></h2>";
                    echo "<p>" . $row['description'] . "</p>";
                    echo "<p><img src='../assets/images/icons8-location-50.png' alt='location of Campus' class='icons'> " . $row['location'] . " &nbsp;&nbsp;";
                    echo "<img src='../assets/images/icons8-time-50.png' alt='year to complete the field' class='icons'> " . $row['duration'] . " years</p>";
                    echo "</div>";
                }
            } else {
                echo "<p>No programs found in the College of Applied Science.</p>";
            }
            ?>
          </div>
        </section>
      </article>
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
              <li><a href="../pages/aboutus.html" class="footer-link">About us</a></li>
              <li><a href="../pages/academics.php" class="footer-link">Academics</a></li>
              <li><a href="../pages/admission.html" class="footer-link">Admission</a></li>
              <li><a href="../pages/student union.html" class="footer-link">Student union</a></li>
            </ul>
          </nav>
          <nav class="footer-column">
            <h3 class="footer-title">Student Life</h3>
            <ul class="footer-links">
              <li><a href="../pages/club.html" class="footer-link">Clubs</a></li>
              <li><a href="../pages/blocks.html" class="footer-link">Blocks</a></li>
              <li><a href="./src/pages/religious.html" class="footer-link">Religious Association</a></li>
            </ul>
          </nav>
        </div>
        <section class="newsletter">
          <h3 class="footer-title">Subscribe</h3>
          <p class="newsletter-text">
            Join our newsletter to stay up to date on features and releases.
          </p>
          <form class="newsletter-form">
            <input type="email" class="newsletter-input" placeholder="Enter your email" />
            <button type="submit" class="newsletter-button">Subscribe</button>
          </form>
          <p class="consent-text">
            By subscribing you agree to with our <span class="privacy-policy">Privacy Policy</span> and provide consent to receive updates from our company.
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
  </body>
</html>
<?php $conn->close(); ?>