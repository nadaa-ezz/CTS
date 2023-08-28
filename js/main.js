// $("html").niceScroll({
//     mousescrollstep: 38,
//     cursorwidth: 8,
//     cursorborder: "2px solid #eee",
//     cursorcolor: '#2D6F91',
//     horizrailenabled: false,
//     autohidemode: false, // Show the scrollbars always
//     zindex: 9999 // Set a high z-index value
// });
$(document).ready(function () {
	"use strict";
$("body").niceScroll({
    cursorcolor:"#d9d9e3",
    cursorwidth:"9px",
    cursorborder:"0px solid rgba(45,111,145, 0.1)",
    autohidemode: false,
    preservenativescrolling:true,
    zindex: 9999,
    background: "rgb(47,112,144)",
    horizrailenabled: false
});
}); 


// Start portfolio Script 
document.addEventListener("DOMContentLoaded", function () {
    "use strict";

    var portfolioIsotope = new Isotope('.portfolio-container', {
        itemSelector: '.portfolio-item',
        layoutMode: 'fitRows'
    });

    // Set the initial filter to "first" (Web Development)
    portfolioIsotope.arrange({ filter: '.first' });

    var filters = document.querySelectorAll('#portfolio-flters li');
    filters.forEach(function (filter) {
        filter.addEventListener('click', function () {
            filters.forEach(function (f) {
                f.classList.remove('active');
            });
            this.classList.add('active');

            var filterValue = this.getAttribute('data-filter');
            portfolioIsotope.arrange({ filter: filterValue });
        });
    });
});
// End portfolio Script 


// Start Fixed Nav Script
const navbar = document.getElementById("navbar_top");

    window.addEventListener("scroll", function () {
        if (window.scrollY > 100) {
            navbar.classList.add("fixed-navbar", "fixed-navbar-padding");
        } else {
            navbar.classList.remove("fixed-navbar", "fixed-navbar-padding");
        }
    });
// End Fixed Nav Script


// Logo Slider

document.getElementById("redirect-get-qoute").addEventListener("click", function() {
    window.location.href = "get-qoute.html";
});