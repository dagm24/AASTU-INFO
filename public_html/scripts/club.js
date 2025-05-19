const hiddenCards = document.getElementById("hidden-cardssec");
const viewAllBtn = document.getElementById("viewall-btn");
const learnMoreBtn = document.getElementById("learn-more");
const additionalInfo = document.getElementById("add-info");

// Initialize state
window.onload = function () {
  if (hiddenCards) {
    hiddenCards.style.display = "none";
  }
  if (additionalInfo) {
    additionalInfo.style.display = "none";
  }
};

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
