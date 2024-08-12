<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>IU Concert E-ticketing: Streamlining Access to the June 2024 Kuala Lumpur Show</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Append
  * Template URL: https://bootstrapmade.com/append-bootstrap-website-template/
  * Updated: May 18 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">
<?php

session_start();
$user = $_SESSION["adminId"]; // Pass value from $_SESSION variable to $user to display
	      
if (isset($user)) 
{
?>
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

      <a href="#hero" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">iMe</h1><span>.</span>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="">Home</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#contact">Contact</a></li>         
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="logout.php" >Log Out</a>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <img src="tu.jpg" alt="" data-aos="fade-in">

      <div class="container">
        <div class="row">
          <div class="col-lg-10">
            <h2 data-aos="fade-up" data-aos-delay="100">Welcome, Admin!</h2>
      <p data-aos="fade-up" data-aos-delay="200">We are excited to announce the upcoming IU concert in Kuala Lumpur in 2024. Stay tuned for more details!</p>
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- Clients Section -->
    <section id="clients" class="clients section">

      <div class="container" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="client1.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="client2.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="client3.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="client4.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="client5.jpg" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="client6.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

        </div>

      </div>

    </section><!-- /Clients Section -->

   
<!-- Services Section -->
<section id="services" class="services section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Management Services</h2>
<p>Explore our comprehensive services designed to facilitate the management and organization of the IU H.E.R. World Tour Concert.</p>

  </div><!-- End Section Title -->

  <div class="container">

    <div class="row gy-4">

      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
        <div class="service-item d-flex">
          <div class="icon flex-shrink-0"><i class="bi bi-file-plus"></i></div>
          <div>
            <h4 class="title"><a href="add_category.php" class="stretched-link">Category Addition</a></h4>
            <p>Allow admins to add categories. Ensure at least one category is always present.</p>
          </div>
        </div>
      </div>
      <!-- End Service Item -->

      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
        <div class="service-item d-flex">
          <div class="icon flex-shrink-0"><i class="bi bi-person-lines-fill"></i></div>
          <div>
            <h4 class="title"><a href="view.php" class="stretched-link">View Participants</a></h4>
            <p>Enable admins to view details of registered participants, including the categories they have registered for.</p>
          </div>
        </div>
      </div><!-- End Service Item -->

      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
        <div class="service-item d-flex">
          <div class="icon flex-shrink-0"><i class="bi bi-trash"></i></div>
          <div>
            <h4 class="title"><a href="delete_form.php" class="stretched-link">Delete Participants</a></h4>
            <p>Provide the admin with the capability to delete registered users.</p>
          </div>
        </div>
      </div><!-- End Service Item -->

      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
        <div class="service-item d-flex">
          <div class="icon flex-shrink-0"><i class="bi bi-search"></i></div>
          <div>
            <h4 class="title"><a href="search.php" class="stretched-link">Participant's Information</a></h4>
            <p>Allow admin to find and retrieve registered users' information.</p>
          </div>
        </div>
      </div><!-- End Service Item -->

      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="500">
        <div class="service-item d-flex">
          <div class="icon flex-shrink-0"><i class="bi bi-grid-1x2-fill"></i></div>
          <div>
            <h4 class="title"><a href="admin_quota.php" class="stretched-link">Seating Quotas</a></h4>
            <p>Allow admin to set quotas for seating capacity for each category.</p>
          </div>
        </div>
      </div><!-- End Service Item -->

               
    </div>

  </div>

</section><!-- /Services Section -->


    




<!-- Contact Section -->
<section id="contact" class="contact section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Contact</h2>
    <p>If you have any inquiries or need assistance regarding the 2024 IU H.E.R. World Tour Concert in Kuala Lumpur, feel free to reach out to us.</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-4">

      <div class="col-lg-12 d-flex flex-wrap justify-content-between">

        <div class="info-item d-flex flex-column align-items-center" data-aos="fade" data-aos-delay="200">
          <i class="bi bi-geo-alt"></i>
          <h3>Address</h3>
          <p>East High Zone Office, Unit 38-02<br>
          Level 38, Q Sentral 2A, Jalan Stesen Sentral 2<br>
          Kuala Lumpur Sentral, 50470<br>
          Kuala Lumpur, Malaysia</p>
        </div><!-- End Info Item -->

        <div class="info-item d-flex flex-column align-items-center" data-aos="fade" data-aos-delay="300">
          <i class="bi bi-telephone"></i>
          <h3>Call Us</h3>
          <p>+60 12 345 6789</p>
          <p>Admin Tengku</p>
        </div><!-- End Info Item -->

        <div class="info-item d-flex flex-column align-items-center" data-aos="fade" data-aos-delay="400">
          <i class="bi bi-envelope"></i>
          <h3>Email Us</h3>
          <p>admin@kualalumpurconcerts.com</p>
        </div><!-- End Info Item -->

        <div class="info-item d-flex flex-column align-items-center" data-aos="fade" data-aos-delay="500">
          <i class="bi bi-clock"></i>
          <h3>Office Hours</h3>
          <p>Monday - Friday</p>
          <p>9:00 AM - 6:00 PM</p>
        </div><!-- End Info Item -->

      </div>

    </div>

  </div><!-- End Container -->

</section><!-- End Contact Section -->







  </main>

  <footer id="footer" class="footer position-relative">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
            <span class="sitename">iMe</span>
          </a>
                
      </div>
    </div>
</footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
<?php
      } 

      else {
           echo "No session exists or session has expired. Please log in again.";
      }
?>
</body>
</html>