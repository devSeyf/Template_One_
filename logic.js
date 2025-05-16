
var links = document.getElementById("menu");
var list = document.getElementById("menuList");

links.addEventListener("click", function() {
    
    list.classList.toggle("show");
});



let toggle = document.getElementById("toggle-theme");

if(localStorage.getItem("theme") === "dark") {
  document.body.classList.add("dark");
}

toggle.addEventListener("click", function() {
  document.body.classList.toggle("dark");

  
  if(document.body.classList.contains("dark")) {
    localStorage.setItem("theme", "dark");
  } else {
    localStorage.setItem("theme", "light");
  }
});







document.getElementById("contactForm").addEventListener("submit", function(e) {
    e.preventDefault(); // Prevent the default form submission (page reload)

    // Extract the form data into FormData object
    const formData = new FormData(this);

    // Send the form data to "send.php" using the Fetch API
    fetch("send.php", {
      method: "POST",
      body: formData
    })
    .then(response => response.text()) // Parse the response as plain text
    .then(data => {
      // Display the response from PHP inside the page
      document.getElementById("response").innerHTML = data;
      this.reset(); // Clear the form inputs after successful submission
    })
    .catch(error => {
      console.error("An error occurred:", error); // Log any errors to the console
    });
});

 