document.addEventListener("DOMContentLoaded", function () {
  const detailsBtns = document.querySelectorAll(".details-btn");

  detailsBtns.forEach((btn) => {
    btn.addEventListener("click", function () {
      const detailsContent = this.nextElementSibling;
      const isHidden = detailsContent.style.display === "none";

      // Toggle content
      detailsContent.style.display = isHidden ? "block" : "none";
      // Update button text
      this.textContent = isHidden ? "Show Less" : "Details";

      if (isHidden) {
        detailsContent.style.opacity = "0";
        setTimeout(() => {
          detailsContent.style.opacity = "1";
        }, 10);
      }
    });
  });

  // Show more offices functionality
  const showMoreBtn = document.getElementById("show-more-btn");
  const hiddenOffices = document.querySelectorAll(".hidden-office");
  let isShowingMore = false;

  // Initially hide extra offices
  hiddenOffices.forEach((office) => {
    office.style.display = "none";
    office.style.opacity = "0";
  });

  if (showMoreBtn) {
    showMoreBtn.addEventListener("click", function () {
      isShowingMore = !isShowingMore;

      hiddenOffices.forEach((office, index) => {
        if (isShowingMore) {
          office.style.display = "block";
          // Add slight delay for each office to create a cascade effect
          setTimeout(() => {
            office.style.opacity = "1";
            office.style.transform = "translateY(0)";
          }, index * 100);
        } else {
          office.style.opacity = "0";
          office.style.transform = "translateY(20px)";
          setTimeout(() => {
            office.style.display = "none";
          }, 300);
        }
      });

      showMoreBtn.textContent = isShowingMore
        ? "Show Less"
        : "Show More Offices";
    });
  }
});
