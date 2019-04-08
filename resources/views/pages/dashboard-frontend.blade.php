<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>PARTO - PartTime-Job</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Favicons -->
  <link href="{{ asset('assets/FrontEnd/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/FrontEnd/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{ asset('assets/FrontEnd/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{ asset('assets/FrontEnd/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/FrontEnd/lib/animate/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/FrontEnd/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/FrontEnd/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/FrontEnd/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{ asset('assets/FrontEnd/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
    Theme Name: Rapid
    Theme URL: https://bootstrapmade.com/rapid-multipurpose-bootstrap-business-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

@yield('konten')

@include('layouts.footer-fronend')

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- JavaScript Libraries -->
  <script src="{{ asset('assets/FrontEnd/lib/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/FrontEnd/lib/jquery/jquery-migrate.min.js') }}"></script>
  <script src="{{ asset('assets/FrontEnd/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/FrontEnd/lib/easing/easing.min.js') }}"></script>
  <script src="{{ asset('assets/FrontEnd/lib/mobile-nav/mobile-nav.js') }}"></script>
  <script src="{{ asset('assets/FrontEnd/lib/wow/wow.min.js') }}"></script>
  <script src="{{ asset('assets/FrontEnd/lib/waypoints/waypoints.min.js') }}"></script>
  <script src="{{ asset('assets/FrontEnd/lib/counterup/counterup.min.js') }}"></script>
  <script src="{{ asset('assets/FrontEnd/lib/owlcarousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('assets/FrontEnd/lib/isotope/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/FrontEnd/lib/lightbox/js/lightbox.min.js') }}"></script>
  <!-- Contact Form JavaScript File -->
  <script src="{{ asset('assets/FrontEnd/contactform/contactform.js') }}"></script>

  <!-- Template Main Javascript File -->
  <script src="{{ asset('assets/FrontEnd/js/main.js') }}"></script>

</body>
</html>
