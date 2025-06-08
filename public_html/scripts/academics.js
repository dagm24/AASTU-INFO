document.addEventListener("DOMContentLoaded", function () {
  const engBtn = document.getElementById("engineering-btn");
  const appBtn = document.getElementById("applied-btn");
  const viewAllBtn = document.getElementById("viewall-btn");
  const engineeringDepts = document.getElementById("engineering-departments");
  const hiddenEng = document.getElementById("hidden-engineering");
  const appliedDepts = document.getElementById("applied-departments");

  // Initial state: show engineering, hide applied and hidden
  if (engineeringDepts) engineeringDepts.style.display = "block";
  if (hiddenEng) hiddenEng.style.display = "none";
  if (appliedDepts) appliedDepts.style.display = "none";
  if (viewAllBtn) viewAllBtn.textContent = "View All";

  // Show only engineering departments
  if (engBtn) {
    engBtn.addEventListener("click", function () {
      if (engineeringDepts) engineeringDepts.style.display = "block";
      if (hiddenEng) hiddenEng.style.display = "block";
      if (appliedDepts) appliedDepts.style.display = "none";
      if (viewAllBtn) viewAllBtn.textContent = "View All";
    });
  }

  // Show only applied departments
  if (appBtn) {
    appBtn.addEventListener("click", function () {
      if (engineeringDepts) engineeringDepts.style.display = "none";
      if (hiddenEng) hiddenEng.style.display = "none";
      if (appliedDepts) appliedDepts.style.display = "block";
      if (viewAllBtn) viewAllBtn.textContent = "View All";
    });
  }

  // Show all departments
  if (viewAllBtn) {
    viewAllBtn.addEventListener("click", function () {
      const isViewAll = viewAllBtn.textContent === "View All";
      if (isViewAll) {
        if (engineeringDepts) engineeringDepts.style.display = "block";
        if (hiddenEng) hiddenEng.style.display = "block";
        if (appliedDepts) appliedDepts.style.display = "block";
        viewAllBtn.textContent = "Show Less";
      } else {
        if (engineeringDepts) engineeringDepts.style.display = "block";
        if (hiddenEng) hiddenEng.style.display = "none";
        if (appliedDepts) appliedDepts.style.display = "none";
        viewAllBtn.textContent = "View All";
      }
    });
  }
// // Toggle learn more section
  const learnMoreBtn = document.getElementById("learnmore-button");
  const learnMoreContainer = document.getElementById("learnmore-container");

  if (learnMoreBtn && learnMoreContainer) {
    learnMoreBtn.addEventListener("click", function () {
      if (
        learnMoreContainer.style.display === "none" ||
        learnMoreContainer.style.display === ""
      ) {
        learnMoreContainer.style.display = "block";
        learnMoreBtn.textContent = "Show Less";
      } else {
        learnMoreContainer.style.display = "none";
        learnMoreBtn.textContent = "Learn More";
      }
    });
  }
});