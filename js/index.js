//add click function to the mobile navigation
let navButton = document.querySelector(".sitenav-items");
navButton.addEventListener("click", (event) => {
  if (
    event.target.id === "mobilenav" ||
    event.target.id === "navbutton-icon" ||
    event.target.id === "navbutton-description"
  ) {
    document.querySelector(".sitenav-items_ul").classList.toggle("menuhidden");
    document.querySelector(".hamburger").classList.toggle("is-active");
  }
});

//using jquery to auto close the menu if clicked on areas outside the mobile nav.
$(document).on("click", function (event) {
  if (!$(event.target).closest(".sitenav-items").length) {
    $(".sitenav-items_ul").removeClass("menuhidden");
    $(".hamburger").removeClass("is-active");
  }
});

function openTab(event, tabName) {
  // Hide all tab contents
  var tabContents = document.getElementsByClassName("tab-content");
  for (var i = 0; i < tabContents.length; i++) {
    tabContents[i].style.display = "none";
  }

  // Remove "active" class from all tab buttons
  var tabButtons = document.getElementsByClassName("tab-button");
  for (var i = 0; i < tabButtons.length; i++) {
    tabButtons[i].classList.remove("active");
  }

  // Show the selected tab content
  document.getElementById(tabName).style.display = "block";

  // Add "active" class to the clicked tab button
  event.currentTarget.classList.add("active");
}
