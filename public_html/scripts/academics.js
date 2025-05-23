onload = function () {
  window.alert("hello");
}

const lmbtn = document.getElementById("learnmore-button");
const lmcont = document.getElementById("learnmore-container");
const nextportion = document.getElementsByClassName("second-article")[0];
const viewall = document.getElementById("viewall-btn");
const engbtn = document.getElementById("engineering-btn");
const appbtn = document.getElementById("applied-btn");

const hiddenEng = document.getElementById("hidden-engineering");
const appliedDepts = document.getElementById("applied-departments");
const engineeringDepts = document.getElementById("engineering-departments");
const academicsContainer = document.getElementById("dynamic-academics"); // Placeholder for dynamic content

// Add initial state setup
window.onload = function () {
  // Set initial states for learn more
  if (lmcont) {
    lmcont.style.display = "none";
    lmbtn.textContent = "Learn More";
  }

  // Add event listeners
  if (lmbtn) {
    lmbtn.onclick = null;
    lmbtn.addEventListener("click", learnmore);
  }

  if (viewall) {
    viewall.onclick = null;
    viewall.addEventListener("click", viewalldept);
  }
  if(engbtn){
    engbtn.onclick = null;
    engbtn.addEventListener("click",viewengdept);
  }


  if(appbtn){
    appbtn.onclick = null;
    appbtn.addEventListener("click",viewappdept);
  }

  // Add event listeners for department buttons
  document.querySelectorAll(".nav2").forEach((button) => {
    button.addEventListener("click", function () {
      const target = this.getAttribute("data-target");
      showDepartments(target);
    });
  });

  // Load academic programs dynamically
  if (academicsContainer) {
    fetch("./acadamics.php")
      .then((response) => {
        if (!response.ok) {
          throw new Error("Failed to load academic programs.");
        }
        return response.text();
      })
      .then((data) => {
        academicsContainer.innerHTML = data;
      })
      .catch((error) => {
        console.error("Error loading academic programs:", error);
        academicsContainer.innerHTML =
          "<p>Failed to load academic programs. Please try again later.</p>";
      });
  };

function learnmore() {
  if (!lmcont) return;

  const isHidden = lmcont.style.display === "none" || !lmcont.style.display;

  if (isHidden) {
    lmcont.style.display = "block";
    lmbtn.textContent = "Show Less";
    if (nextportion) {
      nextportion.style.marginTop = `${lmcont.offsetHeight + 40}px`;
    }
  } else {
    lmcont.style.display = "none";
    lmbtn.textContent = "Learn More";
    if (nextportion) {
      nextportion.style.marginTop = "20px";
    }
  }
}

function showDepartments(target) {
  // Hide all departments first
  engineeringDepts.style.display = "none";
  hiddenEng.style.display = "none";
  appliedDepts.style.display = "none";

  if (target === "engineering") {
    engineeringDepts.style.display = "block";
    hiddenEng.style.display = "block";
  } else if (target === "applied") {
    appliedDepts.style.display = "block";
  }

  // Always reset view all button
  viewall.textContent = "View All";
}

function viewalldept() {
  if (!engineeringDepts || !appliedDepts || !hiddenEng) return;

  const isViewAll = viewall.textContent === "View All";

  if (isViewAll) {
    engineeringDepts.style.display = "block";
    hiddenEng.style.display = "block";
    appliedDepts.style.display = "block";
    viewall.textContent = "Show Less";
  } else {
    engineeringDepts.style.display = "block";
    hiddenEng.style.display = "none";
    appliedDepts.style.display = "none";
    viewall.textContent = "View All";
  }
}
}