// scripts.js
function toggleEditMode() {
  const inputs = document.querySelectorAll("input", "textarea");
  inputs.forEach((element) => {
    element.readOnly = !element.readOnly;
  });

  const editButton = document.getElementById("editButton");
  const updateButton = document.getElementById("updateButton");

  if (editButton.style.display === "none") {
    editButton.style.display = "block";
    updateButton.style.display = "none";
  } else {
    editButton.style.display = "none";
    updateButton.style.display = "block";
  }
}
