// Function to enable dark mode
function enableDarkMode() {
    var body = document.body;
    body.classList.add("dark-mode"); // Add the "dark-mode" class to the <body> element
    localStorage.setItem("darkMode", true); // Save the dark mode preference in localStorage
  }
  
  // Function to disable dark mode
  function disableDarkMode() {
    var body = document.body;
    body.classList.remove("dark-mode"); // Remove the "dark-mode" class from the <body> element
    localStorage.setItem("darkMode", false); // Save the dark mode preference in localStorage
  }
  
  // Function to toggle dark mode
  function toggleDarkMode() {
    var body = document.body;
    body.classList.toggle("dark-mode"); // Toggle the "dark-mode" class on the <body> element
  
    // Store the dark mode preference in localStorage
    var isDarkMode = body.classList.contains("dark-mode");
    localStorage.setItem("darkMode", isDarkMode);
  }
  
  // Check the dark mode preference in localStorage on page load
  document.addEventListener("DOMContentLoaded", function() {
    var isDarkMode = localStorage.getItem("darkMode");
    if (isDarkMode === "true") {
      enableDarkMode(); // Enable dark mode if the preference is set to true
    } else {
      disableDarkMode(); // Otherwise, disable dark mode
    }
  });
  