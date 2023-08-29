 <!--Navbar start-->
 <header>
     <!-- Sub Header -->
     <div class="sub-header">
         <div class="container">
             <div class="row">
                 <div class="col-lg-8 col-sm-8">
                     <div class="left-content">
                         <ul>
                             <li><a class="custom-a" href="https://api.whatsapp.com/send?phone=0201201117955"> <img src="images/Egypt-Flag.webp" alt="" style="height: 25px; width: 30px;"><span> (+20) 1201117955</span> </a></li>
                             <li><a class="custom-a" href="https://api.whatsapp.com/send?phone=966540038724"> <img src="images/Flag_of_Saudi_Arabia.svg.png" alt="" style="height: 20px; width: 35px;"> (+966) 540038724 </a></li>
                             <li><i class="fas fa-phone-alt"></i> (+20) 227634002 </li>
                         </ul>
                     </div>
                 </div>
                 <div class="col-lg-4 col-sm-4">
                     <div class="right-icons mx-auto">
                         <ul>
                             <li><a href="https://www.facebook.com/CoreTechnologySolutions022"><i class="fab fa-facebook-f"></i></a></li>
                             <li><a href="https://www.linkedin.com/company/cts-eg"><i class="fab fa-linkedin-in"></i></a></li>
                             <li><a href="https://api.whatsapp.com/send?phone=0201201117955"><i class="fab fa-whatsapp"></i></a></li>
                         </ul>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!--Main nav-->
     <nav id="navbar_top" class="navbar navbar-expand-lg shadow sticky-top p-3">
         <a href="#" class="navbar-brand d-flex align-items-center text-center py-0 px-2 px-lg-4">
             <img src="images/logo-cts.svg" alt="" width="180px" height="70px" />
         </a>
         <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarCollapse">
             <div class="navbar-nav m-auto p-5 p-lg-0" id="link-ul">
                 <a href="index.php" class="nav-link <?php if($page=='Home' ) echo 'active' ?>">Home</a>
                 <a href="about.php" class="nav-link <?php if($page=='About' ) echo 'active' ?>">About</a>
                 <a href="<?php echo ($page =='Contact' || $page =='About') ? 'index.php#services' : '#services';?>" class="nav-link">Services</a>
                 <a href="<?php echo ($page =='Contact' || $page =='About') ? 'index.php#portfolio' : '#portfolio' ;?>" class="nav-link">Portfolio</a>
             </div>
             <a id="navBtn" class="btn rounded-pill <?php if($page=='Contact') echo 'active' ?>" href="contact.php"  role="button" > Request Quote </a>
         </div>
     </nav>
 </header>
 <!--Navbar end-->