<?php
include 'db_connect.php';
// Fetching data from the admission table
$sql = "SELECT section_title, content FROM admission ORDER BY id ASC";
$result = $conn->query($sql);

$admission_data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $admission_data[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="icon" href="../assets/images/admission-favicon.png"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"/>
    <title>Admission</title>
    <link rel="stylesheet" href="../styles/admission.css" />
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
            <div>
                <span class="head1">
                    <h2>A Guide to Understanding <br><span class="admission Processes">Admissions Processes</span></h2>
                </span>
                <div id="morecontent">
                    <div class="subtitle">Admissions</div><br>
                    <ul>
                        <li>Undergraduate</li>
                        <li>Graduate & Professional Studies</li>
                        <li>Continuing Education & Summer Studies</li>
                    </ul><br>
                    <a href="http://demo.wpzoom.com/academica-pro-3/contact/">Apply Today!</a><br><br>
                    <div class="application-form-section">
    <h2 class="subtitle"> Apply Online </h2>
    <form action="submit_application.php" method="POST" class="application-form">
        <label for="full_name">Full Name:</label>
        <input type="text" name="full_name" id="full_name" required> <br><br>

        <label for="email">Email Address:</label>
        <input type="email" name="email" id="email" required> <br><br>

        <label for="phone">Phone Number:</label>
        <input type="text" name="phone" id="phone" required> <br><br>

        <label for="gpa">High School GPA:</label>
        <input type="number" name="gpa" id="gpa" min="0" max="4" step="0.01" required> <br><br>

        <label for="department">Department of Interest:</label>
        <select name="department" id="department" required>
            <option value="">-- Select Department --</option>
            <option value="Software Engineering">Software Engineering</option>
            <option value="Electrical Engineering">Electrical Engineering</option>
            <option value="Mechanical Engineering">Mechanical Engineering</option>
            <option value="Civil Engineering">Civil Engineering</option>
        </select> <br><br>

        <button type="submit" class="submit-btn">Submit Application</button>
    </form>
</div>

                </div>
                <button class="Explore" id="explore">Explore &#8250;</button>
            </div>

            <div>
               
            <div class="subtitle" >Regular Program Admission</div> <br>
            <div class="content"> Complete high school education. Achieve necessary pass marks in the Ethiopian Higher Education Entrance Examination (EHEE) or an equivalent examination.
                 <br> Meet any additional criteria set by the Ministry of Education (MOE) or AASTU.</div>
                <div class="subtitle">Continuing Education Program Admission</div><br>
             <div class="content">programs are managed through academic units, in coordination with the university registrar and Continuing Education Program (CEP), according to MOE policies.. </div>  
                     <div class="subtitle">Other Admission Cases</div><br>
            <div class="content">AASTU may admit students in collaboration with affiliated universities or institutes, with processing allowed at any time during the academic calendar.</div>
                <div class="subtitle">Readmission</div> <br>
           <div class="content"> Students withdrawing officially can request readmission:
                    Applications are accepted for the same program only.
                    Academic dismissals meeting cut-off points are eligible.
                    Readmission is subject to space and budget availability.</span>
           </div>
                
            </div>
        </div>
    </div>

    <div class="body2">
        <div class="container2">
            <div class="lists">
                <ul class="ulsty">
                    <li>
                        <span class="subtitle"><h3>Course Regular Registration</h3></span>
                        <span class="content">Students withdrawing officially can request readmission:<br>
                            Applications are accepted for the same program only.<br>
                            Academic dismissals meeting cut-off points are eligible.<br>
                            Readmission is subject to space and budget availability.
                        </span>
                    </li>
                    <li>
                        <span class="subtitle"><h3>Late Registration</h3></span>
                        <span class="content">A one-day late registration period is available after regular registration closes, subject to a penalty.</span>
                    </li>
                </ul>
            </div>
            <img src="../assets/images/Amission.jpg" alt="Admission Image" class="image">
        </div>
    </div>

    <div class="body3">
        <div class="container3">
            <div class="section1">
                <span class="head2"><h3>Add and Drop</h3></span>
                <span class="content2">Students can add or drop courses during specified times:<br><br>
                    Forms must be submitted to the Registrar office.<br>
                    Registered courses receive grades; not submitted grades count as F.<br><br>
                     <?php if (!empty($admission_data)) : ?>
    <div class="subtitle"><?php echo htmlspecialchars($admission_data[0]['section_title']); ?></div><br>
    <div class="content"><?php echo nl2br(htmlspecialchars($admission_data[0]['content'])); ?></div>
<?php endif; ?>
                    <div id="seemore1">
                        <a href="http://www.aastu.edu.et/registrar/wp-content/uploads/sites/6/2024/04/002-Course-Add-Drop-Form-OF.pdf">The form For Add And Drop</a>
                    </div><br><br>
                    <button class="Button" id="button1">See More</button>
                </span>
            </div>

            <div class="section2">
                <span class="head2"><h3>Withdraw</h3></span>
                <span class="content2">Students wishing to withdraw must:<br>
                    Consult academic advisors and explain reasons.<br>
                    Complete a withdrawal form on time.<br>
                    Complete clearance procedures to receive transcripts or recommendations.<br><br>
                   <?php if (isset($admission_data[1])) : ?>
    <div class="subtitle"><?php echo htmlspecialchars($admission_data[1]['section_title']); ?></div><br>
    <div class="content"><?php echo nl2br(htmlspecialchars($admission_data[1]['content'])); ?></div>
<?php endif; ?>
                    <div id="seemore2">
                        <ol>
                            <li>Complete the withdrawal form</li>
                            <li>Attach supporting documents</li>
                            <li>Get the form signed by the appropriate offices</li>
                            <li>Submit the form to the registrar's office</li>
                            <li>Keep a copy of the form</li>
                            <a href="http://www.aastu.edu.et/registrar/wp-content/uploads/sites/6/2024/04/007-Clearance-Form-Regular-Undergraduate-Program.pdf">
                                The form For withdrawal
                            </a>
                        </ol>
                    </div>
                    <button class="Button" id="button2">See More</button>
                </span>
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
    <script src="../scripts/admission.js"></script>
</body>
</html>

<?php $conn->close(); ?>


