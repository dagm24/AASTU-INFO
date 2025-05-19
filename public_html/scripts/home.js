const form = document.getElementById("newsletter-form");
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
      return response.json();
    })
    .then((data) => {
      if (data.status === "success") {
        // Show success message
        messageBox.textContent = data.message;
        messageBox.style.color = "green";
      } else {
        // Show error or warning message
        messageBox.textContent = data.message;
        messageBox.style.color = data.status === "error" ? "red" : "#f0ad4e"; // red for error, orange for warning
      }
    })
    .catch((error) => {
      // Handle network or other errors
      messageBox.textContent = "❌ Network error. Please try again later.";
      messageBox.style.color = "red";
    });
});
