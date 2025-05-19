const form = document.querySelector(".newsletter-form");
const messageBox = document.getElementById("form-message");

form.addEventListener("submit", function (e) {
  e.preventDefault(); // Stop form from refreshing the page

  const formData = new FormData(form);

  fetch("/src/Controllers/subscribe.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      return response.json(); // Parse JSON response
    })
    .then((data) => {
      // Update the message box based on the response
      messageBox.textContent = data.message;
      messageBox.style.color =
        data.status === "success"
          ? "green"
          : data.status === "warning"
          ? "#f0ad4e" // Orange for warnings
          : "red"; // Red for errors
    })
    .catch((error) => {
      // Handle network or other errors
      messageBox.textContent = "❌ Network error. Please try again later.";
      messageBox.style.color = "red";
    });
});
