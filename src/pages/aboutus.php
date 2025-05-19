<?php include 'db_connect.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="../assets/images/about us.png" />
    <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
  <title>About Us</title>
  <link rel="stylesheet" href="../styles/aboutus.css">
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

<div class="body2">
    <div class="container2">
        <div>
            <div class="unique">Innovate</div>
            <br>
            <div class="title">Empowering Future Leaders <br>Through Education</div>
        </div>
        <div>
            <div class="content">
            At Addis Ababa Science and Technology University, our mission is to solve industry challenges, lead national research initiatives, and deliver world-class education, preparing graduates to contribute effectively to Ethiopia’s development and innovation goals.
            </div>
            <br>
            <div id="learnmore2" class="content" style="display:none;">
                <strong class="unique">Vision:</strong> The university has a vision to be “an internationally recognized and respected hub of science and technology with strong national commitment and significant continental repute by 2025”. <br><br>
                <strong class="unique">Mission:</strong> AASTU has a mission, to deliver the three pillars of higher education namely teaching, research and community services at the highest possible, cutting edge standards to the nation.
            </div>
            <button class="button1" id="learnmorebtn2">Learn More</button>
        </div>
    </div>
    <img src="../assets/images/image2about.png" alt="">
</div>

<div class="body3">
    <div class="container3">
        <div class="title">Image Gallery</div>
        <div class="unique">Explore our vibrant campus and community through images.</div>
        <br>
        <div class="containerimg" id="containerimg">
            <button class="button left" id="left">&#8249;</button>
            <div class="images" id="images">
                <img src="../assets/images/Placeholder Image 1.png" alt="">
                <img src="../assets/images/Placeholder Image 2.png" alt="">
                <img src="../assets/images/Placeholder Image 3.png" alt="">
                <img src="../assets/images/Placeholder Image 4.png" alt="">
                <img src="../assets/images/image 5.jpg" alt="">
                <img src="../assets/images/image 6.jpg" alt="">
                <img src="../assets/images/image 7.jpg" alt="">
            </div>
            <button class="button right" id="right">&#8250;</button>
        </div>
    </div>
</div>

<?php
$conn = new mysqli("localhost", "root", "", "aastuinfoadmin");
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
            <img src="aboutus_crud/uploads/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
            <h4><?php echo $row['name']; ?></h4>
            <p><?php echo $row['role']; ?></p>
            <p>email: <?php echo $row['email']; ?></p>
        </div>
    <?php endforeach; ?>
</div>

<?php if (count($staff) > 8): ?>
    <button id="toggleBtn">See More</button>
<?php endif; ?>

</div>

<div class="body5">
      <div class="container5">
            <div> <img src="../assets/images/derje.png" alt=""></div>
            <div>  <br><br><br><br><br>⭐⭐⭐⭐⭐
              <br> <br><br> "Your journey at AASTU is the foundation for a future of excellence and innovation. Embrace hard work, uphold integrity, and let this experience prepare you to make a lasting impact."
              <br><br>
              <div class="unique">Dr. Dereje Engida</div>
                    AASTU President
            </div>

      </div>
    </div>
    
    <div class="body6">
      <div class="container6">
        <div class="unique">Team</div>
        <div class="title">Our Team</div>
        <div class="content"> Meet the committed team of developers driiving the AASTU Info Website's success.</div>
          <br> <br> <div class="teams">
          <div > <img src="../assets/images/tbex.jpg" alt="" class="image">
            <div class="unique"> Dagmawit Tibebu</div>
            Full stack developer and ui/ux Designer
            <br>
            <a href="https://www.linkedin.com/in/dagmawit-tibebu-68aa302a1/"> <img src="LinkedIn.svg" alt=""></a>
          </div>
           <div > <img src="../assets/images/dagi y.jpg" alt="" class="image">
            <div class="unique"> Dagmawit Yoseph</div>
            Full stack developer
            <br>
            <a href="https://www.linkedin.com/in/dagmawit-yoseph-8041bb285//"> <img src="LinkedIn.svg" alt=""></a>
          </div>
           <div > <img src="../assets/images/Alex.jpg" alt="" class="image">
            <div class="unique"> Dagmawit Alemayehu</div>
            Full stack developer 
            <br>
            <a href="https://www.linkedin.com/in/dagmawit-alemayehu/"> <img src="LinkedIn.svg" alt=""></a>
          </div>
           <div > <img src="" alt="" class="image">
            <div class="unique"> Eyosiyas Gezahegn</div>
            Full stack developer
            <br>
            <a href="https://www.linkedin.com/in/eyosiyas-gezahegn-1b3699321?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app/"> <img src="LinkedIn.svg" alt=""></a>
          </div>
           <div > <img src="" alt="" class="image">
            <div class="unique"> Demissew Getachew </div>
            Full stack developer
            <br>
            <a href="https://www.linkedin.com/in/demis-gech/"> <img src="LinkedIn.svg" alt=""></a>
          </div>
          
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
                        <li><a href="./academics.php" class="footer-link">Academics</a></li>
                        <li><a href="./admission.php" class="footer-link">Admission</a></li>
                        <li><a href="studentunion.php" class="footer-link">Student Union</a></li>
                    </ul>
                </nav>

                <nav class="footer-column">
                    <h3 class="footer-title">Student Life</h3>
                    <ul class="footer-links">
                        <li><a href="./club.php" class="footer-link">Clubs</a></li>
                        <li><a href="./blocks.php" class="footer-link">Blocks</a></li>
                        <li><a href="./religious.php" class="footer-link">Religious Association</a></li>
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
                <p class="consent-text">By subscribing you agree to with our <span class="privacy-policy">Privacy Policy</span> and provide consent to receive updates from our company.</p>
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

    <script src="../scripts/aboutus.js"></script>
</body>
</html>
