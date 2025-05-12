const hiddenCards = document.getElementById("hidden-cardssec");
const viewAllBtn = document.getElementById("viewall-btn");
const learnMoreBtn = document.getElementById("learn-more");
const additionalInfo = document.getElementById("add-info");
const clubsContainer = document.getElementById("dynamic-clubs"); // Placeholder for dynamic content

// Initialize state
window.onload = function () {
  // Hide hidden sections initially
  if (hiddenCards) {
    hiddenCards.style.display = "none";
  }
  if (additionalInfo) {
    additionalInfo.style.display = "none";
  }

  // Load club information dynamically
  if (clubsContainer) {
    fetch("./club.php")
      .then((response) => {
        if (!response.ok) {
          throw new Error("Failed to load club information.");
        }
        return response.text();
      })
      .then((data) => {
        clubsContainer.innerHTML = data;
      })
      .catch((error) => {
        console.error("Error loading club information:", error);
        clubsContainer.innerHTML =
          "<p>Failed to load club information. Please try again later.</p>";
      });
  }
};

// Function to toggle hidden cards
function hiddenshow() {
  if (!hiddenCards) return;

  if (hiddenCards.style.display === "none" || !hiddenCards.style.display) {
    hiddenCards.style.display = "flex";
    viewAllBtn.textContent = "Show Less";
  } else {
    hiddenCards.style.display = "none";
    viewAllBtn.textContent = "View All";
  }
}

// Function to toggle additional information
function learn_more() {
  if (!additionalInfo) return;

  if (
    additionalInfo.style.display === "none" ||
    !additionalInfo.style.display
  ) {
    additionalInfo.style.display = "block";
    learnMoreBtn.textContent = "Show Less";
  } else {
    additionalInfo.style.display = "none";
    learnMoreBtn.textContent = "Learn More";
  }
}

// Add event listeners
if (viewAllBtn) {
  viewAllBtn.addEventListener("click", hiddenshow);
}

if (learnMoreBtn) {
  learnMoreBtn.addEventListener("click", learn_more);
}
