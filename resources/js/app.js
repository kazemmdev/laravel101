import "./bootstrap";

document.addEventListener("DOMContentLoaded", function () {
    let dropper = document.getElementById("dropper");
    let dropdown = document.getElementById("dropdown");

    dropper?.addEventListener("click", function () {
        dropdown?.classList.toggle("hidden");
    });
});
