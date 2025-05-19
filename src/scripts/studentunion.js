document.addEventListener("DOMContentLoaded", function () {
  const exploreBtn = document.querySelector(".explore-btn");

  if (exploreBtn) {
    exploreBtn.addEventListener("click", function () {
      window.location.href = "../pages/offices.php";
    });
  }
});
