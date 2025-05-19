document.addEventListener("DOMContentLoaded", () => {
  const container = document.getElementById("images");
  const scrollAmount = 200;

  document.getElementById("left").addEventListener("click", () => {
    container.scrollLeft -= scrollAmount;
  });

  document.getElementById("right").addEventListener("click", () => {
    container.scrollLeft += scrollAmount;
  });

  const learnMoreBtn = document.getElementById("learnmorebtn");
  const moreContent = document.getElementById("learnmore");

  learnMoreBtn.addEventListener("click", function () {
    if (
      moreContent.style.display === "none" ||
      moreContent.style.display === ""
    ) {
      moreContent.style.display = "block";
      learnMoreBtn.textContent = "Learn Less";
    } else {
      moreContent.style.display = "none";
      learnMoreBtn.textContent = "Learn More";
    }
  });

  const learnMoreBtn2 = document.getElementById("learnmorebtn2");
  const moreContent2 = document.getElementById("learnmore2");

  learnMoreBtn2.addEventListener("click", function () {
    if (
      moreContent2.style.display === "none" ||
      moreContent2.style.display === ""
    ) {
      moreContent2.style.display = "block";
      learnMoreBtn2.textContent = "Learn Less";
    } else {
      moreContent2.style.display = "none";
      learnMoreBtn2.textContent = "Learn More";
    }
  });
});

const toggleBtn = document.getElementById("toggleBtn");
const extraStaff = document.querySelectorAll(".extra-staff");
let isExpanded = false;

toggleBtn.addEventListener("click", () => {
  extraStaff.forEach((card) => card.classList.toggle("hidden"));
  isExpanded = !isExpanded;
  toggleBtn.textContent = isExpanded ? "See Less" : "See More";
});
