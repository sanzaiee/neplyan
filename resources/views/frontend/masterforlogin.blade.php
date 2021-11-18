<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="shortcut icon" type="image/x-icon" href="{{$setting->image}}">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="{{ asset('frontend') }}/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/animate.css">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Playball&display=swap" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
      <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/style.css">
      <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/responsive.css">
      <title>Nepalyan Books</title>
   </head>
   <body>
    @include('frontend.partials.top-navbar')
            @yield('content')


      <div class="copyright text-center">
         <h3>© Online Course 2020. All Rights Reserved. Developed By <a href="#" target="blank">SoftBenz Infosys</a></h3>
      </div>
      <script src="{{ asset('frontend') }}/js/jquery.min.js"></script>
      <script src="{{ asset('frontend') }}/js/bootstrap.min.js"></script>
      <script src="{{ asset('frontend') }}/js/jquery.filterizr.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.js"></script>
      <script src="{{ asset('frontend') }}/js/owl.carousel.min.js" type="text/javascript"></script>
      <script src="{{ asset('frontend') }}/js/custom.js"></script>
      <script type="text/javascript">
         $(".nav-link .same-nav").hover(function(){
         $(this).tab('show');
         });
      </script>
      <script type="text/javascript">
         $(document).ready(function () {


         $(document).ready(function() {
         $(".mega-menu").on("click", function(e) {
         e.stopPropagation();
         });
         });
      </script>
      <script type="text/javascript">
         $(document).ready(function() {
         $(".navbar-nav .megamenu-li a.mega").click(function() {
         return false;
         });
         });
      </script>
      <script type="text/javascript">
         (function(){
         $(document).click(function() {
         var $item = $(".shopping-cart");
         if ($item.hasClass("active")) {
         $item.removeClass("active");
         }
         });

         $('.shopping-cart').each(function() {
         var delay = $(this).index() * 50 + 'ms';
         $(this).css({
         '-webkit-transition-delay': delay,
         '-moz-transition-delay': delay,
         '-o-transition-delay': delay,
         'transition-delay': delay
         });
         });
         $('#cart').click(function(e) {
         e.stopPropagation();
         $(".shopping-cart").toggleClass("active");
         });

         $('#addtocart').click(function(e) {
         e.stopPropagation();
         $(".shopping-cart").toggleClass("active");
         });



         })();
      </script>
   </body>
</html>
