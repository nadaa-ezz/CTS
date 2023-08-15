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