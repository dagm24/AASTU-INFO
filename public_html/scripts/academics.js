const lmbtn = document.getElementById("learnmore-button");
const lmcont = document.getElementById("learnmore-container");
const nextportion = document.getElementsByClassName("second-article")[0];
const viewall = document.getElementById("viewall-btn");
const hiddenEng = document.getElementById("hidden-engineering");
const appliedDepts = document.getElementById("applied-departments");
const engineeringDepts = document.getElementById("engineering-departments");

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

  // Add event listeners for department buttons
  document.querySelectorAll(".nav2").forEach((button) => {
    button.addEventListener("click", function () {
      const target = this.getAttribute("data-target");
      showDepartments(target);
    });
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

function viewalldept() {
  if (!hiddenEng || !appliedDepts) return;

  const isHidden =
    hiddenEng.style.display === "none" || !hiddenEng.style.display;

  if (isHidden) {
    hiddenEng.style.display = "block";
    appliedDepts.style.display = "block";
    viewall.textContent = "Show Less";
  } else {
    hiddenEng.style.display = "none";
    appliedDepts.style.display = "none";
    viewall.textContent = "View All";
  }
}

function showDepartments(target) {
  // Hide all departments first
  hiddenEng.style.display = "none";
  appliedDepts.style.display = "none";

  if (target === "engineering") {
    engineeringDepts.style.display = "block";
    appliedDepts.style.display = "none";
    hiddenEng.style.display = "block";
  } else if (target === "applied") {
    engineeringDepts.style.display = "none";
    appliedDepts.style.display = "block";
  }

  // Reset view all button
  viewall.textContent = "View All";
}
