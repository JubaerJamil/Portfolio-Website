<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Jubaer Jamil</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('img/faviconjjjjj_.png') }}" rel="icon">
  <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <!-- toastify css -->
<link rel="stylesheet" href="{{ asset('css/toastify.min.css') }}">
<!-- Loader css -->
<link rel="stylesheet" href="{{ asset('css/progress.css') }}">

  <!-- jQuert-->
{{-- <script src="{{ asset('js/jquery.min.js') }}"></script> --}}
  <!-- Axios file -->
<script src="{{asset('js/axios.min.js')}}"></script>
<!-- toastify js -->
<script src="{{asset('js/toastify-js.js')}}"></script>
<!-- config js -->
<script src="{{asset('js/config.js')}}"></script>



</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="{{ asset('img/jubaer_jamil.png') }}" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><a href="/">Jubaer Jamil</a></h1>
        <div class="social-links mt-3 text-center">
            <a href="https://www.facebook.com/jubaer.jamil1971" target="blank" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="https://www.linkedin.com/in/jubaerjamil" target="blank" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            <a href="https://github.com/JubaerJamil" target="blank" class="github"><i class='bx bxl-github'></i></a>
            <a href="https://www.instagram.com/jubaer_jamil/" target="blank" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="https://twitter.com/MDJubaerJamil" target="blank" class="twitter"><i class="bx bxl-twitter"></i></a>
          {{-- <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a> --}}

        </div>
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="#about" class="nav-link scrollto"><i class="bx bx-user"></i> <span>About</span></a></li>
          <li><a href="#resume" class="nav-link scrollto"><i class='bx bx-book-open'></i> <span>Resume</span></a></li>
          <li><a href="#portfolio" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Portfolio</span></a></li>
          <li><a href="#services" class="nav-link scrollto"><i class="bx bx-server"></i> <span>Services</span></a></li>
          <li><a href="#testimonials" class="nav-link scrollto"><i class='bx bx-detail'></i> <span>Certificate</span></a></li>
          <li><a href="#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Contact</span></a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section start ======= -->

  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">

    <div class="hero-container" data-aos="fade-in">
        <h3 class="text-white fs-1 text-left fw-bolder">Hello, This Is</h3>
        <h1>Jubaer Jamil</h1>
        <p>I'm Expert In <span class="typed" data-typed-items="PhP, Laravel, JavaScript, MySQL, HTML, CSS, BootStrap"></span></p>
      </div>

  </section>

  <!-- ======= Hero Section end ======= -->

  <main id="main">

@include('components.loader')
<div id="content-div">

    @yield('content')

</div>

  </main>
    <!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Jubaer Jamil</span></strong>
      </div>
      <div class="credits">
        Designed by <a target="blank" href="http://jubaerjamil.com/">Jubaer Jamil</a>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  <!-- Vendor JS Files -->
  {{-- <script src="{{ asset('vendor/purecounter/purecounter_vanilla.js') }}"></script> --}}
  <script src="{{ asset('vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/typed.js/typed.umd.js') }}"></script>
  <script src="{{ asset('vendor/waypoints/noframework.waypoints.js') }}"></script>
  {{-- <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script> --}}

  <!-- Template Main JS File -->
  <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
