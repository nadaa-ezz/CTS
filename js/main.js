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
