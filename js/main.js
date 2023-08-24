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
    background: "rgba(45,111,145)"
    
});
}); 


// Start Servises Script 
document.addEventListener("DOMContentLoaded", function () {
    "use strict";

    var portfolioIsotope = new Isotope('.portfolio-container', {
        itemSelector: '.portfolio-item',
        layoutMode: 'fitRows'
    });

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
// End Servises Script 

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

// Start Test Script
$(document).ready(function () {

    $('.client-single').on('click', function (event) {
       event.preventDefault();

       var active = $(this).hasClass('active');

       var parent = $(this).parents('.testi-wrap');

       if (!active) {
           var activeBlock = parent.find('.client-single.active');

           var currentPos = $(this).attr('data-position');

           var newPos = activeBlock.attr('data-position');

           activeBlock.removeClass('active').removeClass(newPos).addClass('inactive').addClass(currentPos);
           activeBlock.attr('data-position', currentPos);

           $(this).addClass('active').removeClass('inactive').removeClass(currentPos).addClass(newPos);
           $(this).attr('data-position', newPos);

       }
   });

}(jQuery));

// Logo Slider

document.getElementById("whatsapp-link").addEventListener("click", function(event) {
    event.preventDefault();
    openWhatsAppChat();
});

function openWhatsAppChat() {
    var numbers = "0201201117955,966540038724"; 

    var url = "https://api.whatsapp.com/send?phone=" + numbers;
    window.open(url, "_blank");
}

document.getElementById("contact").addEventListener("submit", function(event) {
    var name = document.getElementById("name").value;
    var mobile = document.getElementById("mobile").value;

    // Mobile number validation (numeric, length)
    if (!/^[0-9]+$/.test(mobile)) {
        alert("Mobile number must contain only numbers");
        event.preventDefault(); // Prevent form submission
        return;
    }
    if (mobile.length !== 10) {
        alert("Mobile number must be 10 digits long");
        event.preventDefault(); // Prevent form submission
        return;
    }
});




