<?php
include 'db_connect.php';

$sql = "SELECT * FROM religious_associations";
$result = $conn->query($sql);


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['newsletter_email'])) {
    $email = filter_var(trim($_POST['newsletter_email']), FILTER_SANITIZE_EMAIL);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $stmt = $conn->prepare("INSERT INTO newsletter_subscribers (email) VALUES (?)");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->close();
        echo "<script>alert('Thank you for subscribing!');</script>";
    } else {
        echo "<script>alert('Invalid email address.');</script>";
    }
}

if (isset($_GET['click_id'])) {
    $id = intval($_GET['click_id']);
    $conn->query("INSERT INTO link_clicks (association_id) VALUES ($id)");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Religious Associations</title>
    <link rel="stylesheet" href="../styles/religious.css">
</head>
<body>
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
                    <div class="nav-link"><a href="../../index.php">Home</a></div>
                    <div class="nav-link"><a href="./aboutus.php">About Us</a></div>
                    <div class="nav-link"><a href="./academics.php">Academics</a></div>
                    <div class="nav-link"><a href="./admission.php">Admission</a></div>
                    <div class="nav-link"><a href="studentunion.php">Student Union</a></div>
                    <div class="nav-link-dropdown">
                        <div class="nav-link">Student Life</div>
                        <img class="chevron-down-icon" src="../assets/images/chevron.png" alt="Dropdown Icon" />
                        <div class="dropdown-content">
                            <div class="dropdown-item"><a href="./club.php">Clubs</a></div>
                            <div class="dropdown-item"><a href="./blocks.php">Blocks</a></div>
                            <div class="dropdown-item"><a href="./religious.php">Religious Association</a></div>
                        </div>
                    </div>
                </div>
                <a class="contact-link" href="contactUs.php">
                    <button class="contact-btn">Contact Us</button>
                </a>
            </div>
        </div>
    </div>
</header>

   <div class="body1">
        <div class="container1">
            <div class="container11">
        <div class="head1">
            <h3>Explore Our Diverse Religious Associations and Their Impact on Campus Life</h3>
        </div>
        <br>
        <div class="content">
            At AASTU, we celebrate a rich tapestry of religious associations that foster community and inclusivity. <br>
            These groups provide students with spiritual support and opportunities for engagement.
        </div> <br> <br>
        <ul class="ulstyl">
           <li>Join a community that shares your faith and values.</li>
           <li>Participate in events and activities throughout the year.</li>
           <li>Connect with like-minded individuals and grow spiritually.</li>
        </ul></div>
        <img src="../assets/images/Placeholder Image2.png" alt="" class="image1">
    </div></div>

    <div class="body2">
        <h2>Religious Associations</h2>
        <div class="container2">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="item card">
                    <img src="<?php echo htmlspecialchars($row['image_url']); ?>" class="listimg" />
                    <div class="carddescription">
                        <h3><?php echo htmlspecialchars($row['name']); ?></h3>
                        <p><?php echo htmlspecialchars($row['description']); ?></p>
                        <a href="<?php echo htmlspecialchars($row['telegram_link']); ?>" target="_blank" onclick="trackClick(<?php echo $row['id']; ?>)">
                            <img src="../assets/images/telegram.png" width="20px">
                        </a>
                          
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <script>
        function trackClick(id) {
            fetch(`religious.php?click_id=${id}`);
        }
    </script>

    <footer class="footer">
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
                        <li><a href="./acadamics.html" class="footer-link">Academics</a></li>
                        <li><a href="./admission.php" class="footer-link">Admission</a></li>
                        <li><a href="./student union.html" class="footer-link">Student union</a></li>
                    </ul>
                </nav>
                <nav class="footer-column">
                    <h3 class="footer-title">Student Life</h3>
                    <ul class="footer-links">
                        <li><a href="./club.html" class="footer-link">Clubs</a></li>
                        <li><a href="./blocks.html" class="footer-link">Blocks</a></li>
                        <li><a href="./religious.html" class="footer-link">Religious Association</a></li>
                    </ul>
                </nav>
            </div>
            <section class="newsletter">
                <h3 class="footer-title">Subscribe</h3>
                <p class="newsletter-text">Join our newsletter to stay up to date on features and releases.</p>
                <form class="newsletter-form">
                    <input type="email" class="newsletter-input" placeholder="Enter your email" />
                    <button type="submit" class="newsletter-button">Subscribe</button>
                </form>
                <p class="consent-text">By subscribing you agree to our <span class="privacy-policy">Privacy Policy</span> and provide consent to receive updates from our company.</p>
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
        <div class="newsletter">
            <form method="POST">
                <input type="email" name="newsletter_email" placeholder="Enter your email" required>
                <button type="submit">Subscribe</button>
            </form>
        </div>
    </footer>
</body>
</html>
