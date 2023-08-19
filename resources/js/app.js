import "./bootstrap";

var dropper = document.getElementById("dropper");
var dropdown = document.getElementById("dropdown");

dropper.addEventListener("click", function () {
    dropdown.classList.toggle("hidden");
});
