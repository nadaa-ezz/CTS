
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Core Technology Solutions</title>
    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="vendor/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/contact.css">
</head>
<body>
     <!--Navbar start-->
     <header>
        <!-- Sub Header -->
        <div class="sub-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-sm-8">
                        <div class="left-content">
                            <ul>
                                <li> <a class="bar-link" href="#">Contact: example@email.com</a> </li>
                                <li> <a class="bar-link" href="#"> (123) 456-7890</a> </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4">
                        <div class="right-icons">
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Main nav-->
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <div class="brand">
                    <a class="navbar-brand" href="#">
                        <img src="assets/Software-engineer-1.svg" alt="" width="30" height="24">
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav mx-auto">
                        <a class="nav-link" href="#">Home</a>
                        <a class="nav-link" href="#">About</a>
                        <a class="nav-link" href="#">Services</a>
                        <a class="nav-link" href="#">Portfolio</a>
                        <a class="nav-link" href="#">Partners</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!--Navbar end-->

<!-- end contact section -->
    <section class="contact_section layout_padding">
        <div class="container ">
          <div class="heading_container">
            <h2>
              Contact Us
            </h2>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <form action="">
                <div>
                  <input type="text" placeholder="Name" />
                </div>
                <div>
                  <input type="email" placeholder="Email" />
                </div>
                <div>
                  <input type="text" placeholder="Phone Number" />
                </div>
                <div>
                  <input type="text" class="message-box" placeholder="Message" />
                </div>
                <div class="d-flex ">
                  <button>
                    SEND
                  </button>
                </div>
              </form>
            </div>
            <div class="col-md-6">
              <div class="map_container">
                <div class="map-responsive">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3457.2638429735525!2d31.272599999999997!3d29.9430886!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145839abe9baf373%3A0xad1cc26abdc1b294!2sCore%20Technology%20Solutions!5e0!3m2!1sen!2seg!4v1692191222585!5m2!1sen!2seg" width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%" allowfullscreen></iframe>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    
      <!-- end contact section -->
    
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/js/bootstrap.js"></script>
</body>
</html>

<?php
// Define variables and set to empty values
$name = $email = $message = $phone_num = "";
$recipient_email = "nada.ezzdin@cts-egy.com"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $phone_num = test_input($_POST["phone_num"]);
    $message = test_input($_POST["message"]);

    // Validate and sanitize inputs
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // Send email
    $subject = "New Contact Form Submission";
    $headers = "From: $email\r\nReply-To: $email\r\n";
    $message = "Name: $name\nEmail: $email\n\n$message";

    if (mail($recipient_email, $subject, $message, $headers)) {
        echo "<p>Your message has been sent. Thank you!</p>";
    } else {
        echo "<p>Sorry, something went wrong. Please try again later.</p>";
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>