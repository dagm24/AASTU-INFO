<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="../assets/images/student-union-favicon.png" />

    <title>Student Union</title>
    <link rel="stylesheet" href="../styles/student union.css" />
     <!-- Dialogflow Messenger for Chatbot -->
    <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&family=Roboto:wght@400;500;700&display=swap"
      rel="stylesheet"
    />
</head>
<body>
    <div class="home"></div>
      <nav class="navbar">
        <div class="container">
          <div class="logo">
            <h1 class="aastu">
              <span>AASTU</span>
              <span class="info">INFO</span>
            </h1>
          </div>


          <div class="column">
            <ul class="nav-links">
              <li class="nav-link"><a href="../../index.php">Home</a></li>
              <li class="nav-link"><a href="aboutus.php">About Us</a></li>
              <li class="nav-link"><a href=".acadamics.php">Academics</a></li>
              <li class="nav-link"><a href="./admission.php">Admission</a></li>
              <li class="nav-link"><a href="studentunion.php">Student Union</a></li>
              <li class="nav-link-dropdown">
                <a href="#">Student Life</a>
                <img
                  class="chevron-down-icon"
                  alt="Dropdown Icon"
                  src="../assets/images/chevron.png"
                />
                <ul class="dropdown-content">
                  <li class="dropdown-item"><a href="../pages/club.php">Clubs</a></li>
                  <li class="dropdown-item"><a href="blocks.php">Blocks</a></li>
                  <li class="dropdown-item"><a href="../pages/religious.php">Religious Association</a></li>
                </ul>
              </li>
            </ul>

            <a class="contact-link" href="contactUs.php">
              <button class="contact-btn">
                <span class="contact-btn-text">Contact Us</span>
              </button>
              </a>
          </div>
        </div>
      </nav>
    </div>

        <div class="content-container">
            <div class="header">
                <h1>
                    Empowering Students
                    <div>Through the <span class="studentUnion">Student Union</span></div>
                </h1>
                <p>
                    The student union is dedicated to enhancing the student experience at AASTU. With 12 specialized offices, it provides essential services ranging from academic support to health services. Our goal is to ensure every student has access to the resources they need for success.
                </p>
            </div>

            <div class="button-container">
                <a href="offices.php"><button class="explore-btn">Explore Offices</button></a>

            </div>

            <img src="../assets/images/student union.jpeg" alt="Student Union" />
        </div>
    </div>

    <script src="../scripts/studentunion.js"></script>
</body>
</html>