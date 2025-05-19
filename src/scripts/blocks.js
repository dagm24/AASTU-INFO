const blockItems = document.querySelectorAll(".block-item");
let isExpanded = false;

function toggleDescription(button) {
  const desc = button
    .closest(".block-item")
    .querySelector(".block-description");
  desc.style.display = desc.style.display === "block" ? "none" : "block";
  button.textContent = desc.style.display === "block" ? "Hide" : "Details";
}

function toggleView() {
  isExpanded = !isExpanded;
  blockItems.forEach((item, index) => {
    item.style.display = isExpanded ? "block" : index <= 1 ? "block" : "none";
  });
  document.getElementById("viewToggleBtn").textContent = isExpanded
    ? "View Less"
    : "View All";
}

function filterBlocks(category) {
  const match = {
    admission: [
      "College of Civil and Architectural Engineering",
      "College of Electrical and Mechanical Engineering",
      "College of Environmental and Chemical Engineering",
      "College of Applied Sciences",
    ],
    clinic: ["Clinic"],
    dormitory: ["Female Students' Dormitories", "Male Students' Dormitories"],
    library: ["Engineering Library", "Digital Library"],
    all: [],
  };

  blockItems.forEach((item) => {
    const name = item.dataset.name;
    if (category === "all") {
      item.style.display = isExpanded ? "block" : "none";
    } else {
      item.style.display = match[category].includes(name) ? "block" : "none";
    }
  });

  if (category !== "all") {
    document.getElementById("viewToggleBtn").textContent = "View All";
    isExpanded = false;
  }
}
