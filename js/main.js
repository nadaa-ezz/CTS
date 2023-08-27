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

var input = document.querySelector("#mobile_num"),
errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"],
result = document.querySelector("#result");

window.addEventListener("load", function () {
errorMsg = document.querySelector("#error-msg");
function getIp(callback) {
  fetch('https://ipinfo.io', { headers: { 'Accept': 'application/json' } })
    .then((resp) => resp.json())
    .catch(() => {
      return {
        country: '',
      };
    })
    .then((resp) => callback(resp.country));
}

var iti = window.intlTelInput(input, {
  hiddenInput: "full_number",
  nationalMode: false,
  formatOnDisplay: true,
  separateDialCode: true,
  autoHideDialCode: true,
  autoPlaceholder: "aggressive",
  initialCountry: "eg",
  placeholderNumberType: "MOBILE",
  preferredCountries: ['eg', 'su'],
  geoIpLookup: getIp,
  utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.15/js/utils.js",
});


input.addEventListener('keyup', formatIntlTelInput);
input.addEventListener('change', formatIntlTelInput);

function formatIntlTelInput() {
  if (typeof intlTelInputUtils !== 'undefined') { // utils are lazy loaded, so must check
    var currentText = iti.getNumber(intlTelInputUtils.numberFormat.E164);
    if (typeof currentText === 'string') { // sometimes the currentText is an object :)
      iti.setNumber(currentText); // will autoformat because of formatOnDisplay=true
    }
  }
}

input.addEventListener('keyup', function () {
  reset();
  if (input.value.trim()) {
    if (iti.isValidNumber()) {
      $(input).addClass('form-control is-valid');

    } else {
      $(input).addClass('form-control is-invalid');
      var errorCode = iti.getValidationError();
      errorMsg.innerHTML = errorMap[errorCode];
      $(errorMsg).show();
    }
  }
});
input.addEventListener('change', reset);
input.addEventListener('keyup', reset);

var reset = function () {
  $(input).removeClass('form-control is-invalid');
  errorMsg.innerHTML = "";
  $(errorMsg).hide();

};

});
