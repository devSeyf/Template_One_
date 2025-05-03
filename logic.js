
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



