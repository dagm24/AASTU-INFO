<?php
include 'db_connect.php';

// Initialize variables and error arrays
$fullName = $email = $inquiry = "";
$errors = array();

// Function to sanitize and validate data
function validateFormData($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate Full Name
    if (empty($_POST["FullName"])) {
        $errors["FullName"] = "Full Name is required";
    } else {
        $fullName = validateFormData($_POST["FullName"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$fullName)) {
            $errors["FullName"] = "Only letters and white space allowed";
        }
    }

    // Validate Email
    if (empty($_POST["Email"])) {
        $errors["Email"] = "Email is required";
    } else {
        $email = validateFormData($_POST["Email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors["Email"] = "Invalid email format";
        }
    }

    // Validate Inquiry
    if (empty($_POST["Inquiry"])) {
        $errors["Inquiry"] = "Inquiry is required";
    } else {
        $inquiry = validateFormData($_POST["Inquiry"]);
    }

    // If no errors, save to database
    if (empty($errors)) {
        // Use prepared statements to prevent SQL injection
        $sql = "INSERT INTO users (Username, `E-mail`, inquiry) VALUES (?, ?, ?)"; // Changed to users table, adjusted column names
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            // Bind parameters
            $stmt->bind_param("sss", $fullName, $email, $inquiry); // Assuming FullName is used as username

            if ($stmt->execute()) {
                // Send confirmation email (basic example)
                $to = $email;
                $subject = "Thank you for contacting us!";
                $message = "Dear " . $fullName . ",\n\nThank you for your inquiry. We will get back to you soon.\n\nSincerely,\nAASTU INFO";
                $headers = "From: webmaster@example.com"; // Replace with your email

                // Suppress the warning by checking if mail function is enabled
                if (ini_get('sendmail_path')) {
                    mail($to, $subject, $message, $headers);
                    echo "<script>alert('Message sent successfully! Check your email for confirmation.');</script>";
                } else {
                    echo "<script>alert('Message sent successfully! Email sending is disabled on this server.');</script>";
                }

                // Clear the form
                $fullName = $email = $inquiry = "";

            } else {
                echo "<script>alert('Error saving to database: " . $stmt->error . "');</script>";
            }

            $stmt->close();
        } else {
            echo "<script>alert('Error preparing statement: " . $conn->error . "');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="../assets/images/contact-us-favicon.png" />
     <!-- Dialogflow Messenger for Chatbot -->
    <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
    <title>Contact Us</title>
    <link rel="stylesheet" href="../styles/contact us.css" />
    <style>
      .error {
        color: red;
      }
    </style>
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
                <div class="nav-link"><a href="../../index.php">Home</a></div>
                <div class="nav-link">
                  <a href="./aboutus.php">About Us</a>
                </div>
                <div class="nav-link">
                  <a href="./academics.php">Academics</a>
                </div>
                <div class="nav-link">
                  <a href="./admission.php">Admission</a>
                </div>
                <div class="nav-link">
                  <a href="./studentunion.php">Student Union</a>
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
                      <a href="./club.php">Clubs</a>
                    </div>
                    <div class="dropdown-item">
                      <a href="./blocks.php">Blocks</a>
                    </div>
                    <div class="dropdown-item">
                      <a href="./religious.php">Religious Association</a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Contact Us Button inside the navbar -->
              <a class="contact-link" href="#contact">
                <button class="contact-btn">
                  <span class="contact-btn-text">Contact Us</span>
                </button>
              </a>
            </div>
          </div>
        </div>
      </div>
    </header>

    <div class="main-container">
      <div class="container-contact">
        <div class="contact-map-section">
          <div class="contact">
            <h1>Get in Touch</h1>
            <p>
              We’re here to assist you with any inquiries or support you may
              need.
            </p>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
              <label for="FullName">Full Name</label>
              <input type="text" id="FullName" name="FullName" placeholder="Name" required value="<?php echo htmlspecialchars($fullName); ?>">
              <span class="error"><?php echo isset($errors["FullName"]) ? $errors["FullName"] : ''; ?></span>

              <label for="Email">Email</label>
              <input
                type="email"
                id="Email"
                name="Email"
                placeholder="UserName@gmail.com"
                required
                pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}"
                value="<?php echo htmlspecialchars($email); ?>"
              />
              <span class="error"><?php echo isset($errors["Email"]) ? $errors["Email"] : ''; ?></span>

              <label for="Inquiry">Inquiry</label>
              <textarea
                id="Inquiry"
                name="Inquiry"
                placeholder="Write Your message..."
                required
              ><?php echo htmlspecialchars($inquiry); ?></textarea>
              <span class="error"><?php echo isset($errors["Inquiry"]) ? $errors["Inquiry"] : ''; ?></span>

              <button type="submit">Send</button>
            </form>
          </div>
          <div class="image-container">
            <img
              src="https://cdni.iconscout.com/illustration/premium/thumb/contactenos-3483604-2912020.png?f=webp"
              alt="Contact Image"
            />
          </div>
        </div>

        <div class="map">
          <h2>Our Location</h2>
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3941.9400581280725!2d38.80524728885496!3d8.885165400000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x164b82a7e392203f%3A0xb05f440eacc98f9f!2sAddis%20Ababa%20Science%20and%20Technology%20University!5e0!3m2!1sen!2set!4v1737045016431!5m2!1sen!2set"
            width="1100"
            height="450"
            style="border: 0"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
          ></iframe>
        </div>
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
              <li><a href="../../index.php" class="footer-link">Home</a></li>
              <li><a href="aboutus.php" class="footer-link">About us</a></li>
              <li>
                <a href="./academics.php" class="footer-link">Academics</a>
              </li>
              <li>
                <a href="./admission.php" class="footer-link">Admission</a>
              </li>
              <li>
                <a href="./studentunion.php" class="footer-link">Student Union</a>
              </li>
            </ul>
          </nav>

          <nav class="footer-column">
            <h3 class="footer-title" class="footer-link">Student Life</h3>
            <ul class="footer-links">
              <li><a href="./club.php" class="footer-link">Clubs</a></li>
              <li><a href="./blocks.php" class="footer-link">Blocks</a></li>
              <li>
                <a href="./religious.php" class="footer-link">Religious Association</a>
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
  </body>
</html>
<?php $conn->close(); ?>
