// Start Model Script
const container = document.querySelector(".model-content");
const button = document.querySelector(".button");
const closeButton = document.querySelector(".close-button");

function togglecontainer() {
    container.classList.toggle("show-container");
}
function windowOnClick(event) {
    if (event.target === container) {
        togglecontainer();
    }}
button.addEventListener("click", togglecontainer);
closeButton.addEventListener("click", togglecontainer);
window.addEventListener("click", windowOnClick);
// End Model Script