<?php
$pageTitle = "Request qoute";
$page = 'Contact';
include('./include/header.php');
?>

<?php include('./include/navbar.php'); ?>



<!-- ======= Start contact ======== -->
<section class="contact-us" id="contact">
    <div class="container">
        <form id="contact-form" method="post" action="email.php" class="mx-auto">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-8">
                    <h2 class="text-center">Let Us Call You for a Special Quote</h2>
                </div>
                <div class="col-lg-12">
                    <fieldset>
                        <input name="name" type="text" id="name" placeholder="YOUR NAME...*" autocomplete="name" required>
                    </fieldset>
                </div>
                <div class="col-lg-12 mb-3">
                    <input name="mobile_num[main]" type="text" id="mobile_num" maxlength="15" autocomplete="phone" required>
                    <br>
                    <span id="error-msg" class="hide text-danger d-block mt-2 mx-4"></span>
                    <p id="result"></p>
                </div>
                <div class="col-lg-12">
                    <fieldset>
                        <input name="email" type="email" id="email" placeholder="YOUR EMAIL...*" autocomplete="email" required>
                    </fieldset>
                </div>
                <div class="col-lg-12">
                    <select id="dropdown" name="subject" id="subject" class="form-select form-control" aria-label="Select service" required>
                        <option selected>SELECT SERVICE</option>
                        <option value="WEB DESIGN AND DEVELOPMENT">WEB DESIGN AND DEVELOPMENT</option>
                        <option value="BRANDING DESIGN">BRANDING DESIGN</option>
                        <option value="IT INFRASTRUCTURE SERVICE">IT INFRASTRUCTURE SERVICE</option>
                        <option value="IT HARDWARE SERVICE">IT HARDWARE SERVICE</option>
                        <option value="OTHER">OTHER</option>
                    </select>

                </div>
                <div class="col-lg-12">
                    <fieldset>
                        <textarea name="message" type="text" class="form-control" id="message" placeholder="YOUR MESSAGE..." required></textarea>
                    </fieldset>
                </div>
                <div class="col-lg-12 d-flex justify-content-center">
                    <button type="submit" value="Submit" id="form-submit" class="button btn-lg">Submit</button>
                </div>
                <div id="response-message" class="text-center"></div>
            </div>
        </form>
    </div>
</section>

<!-- ======= end contact ======== -->

<?php
include('./include/footer.php');
?>

<script>
    var input = document.querySelector("#mobile_num"),
        errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"],
        result = document.querySelector("#result");

    window.addEventListener("load", function() {
        errorMsg = document.querySelector("#error-msg");

        function getIp(callback) {
            fetch('https://ipinfo.io', {
                    headers: {
                        'Accept': 'application/json'
                    }
                })
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
            utilsScript: "vendor/teleInput/build/js/utils.js",
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

        input.addEventListener('keyup', function() {
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

        var reset = function() {
            $(input).removeClass('form-control is-invalid');
            errorMsg.innerHTML = "";
            $(errorMsg).hide();

        };

    });

    $(document).ready(function() {
        $("#contact-form").submit(function(event) {
            event.preventDefault();

            $("#form-submit").prop("disabled", true);
            $("#response-message").html('<p text-center">Please wait... </p>');

            var formData = $(this).serialize();

            $.ajax({
                type: "POST",
                url: "email.php",
                data: formData,
                success: function(response) {
                    $("#response-message").html('<p class="text-success text-center">' + response + '</p>');
                    $("#contact-form")[0].reset();
                    $("#form-submit").prop("disabled", false)
                },
                error: function() {
                    $("#form-submit").prop("disabled", false);
                    $("#response-message").html('<p class="text-danger text-center">' + response + '</p>');
                }
            });
        });
    });
</script>