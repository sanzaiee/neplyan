<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" type="image/x-icon" href="favicon.ico?v=2"  />

        <link rel="shortcut icon" type="image/png" href="{{asset($setting->fav ?? '')}}">
        @yield('facebookshare')
        
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
        <script src='https://www.google.com/recaptcha/api.js'></script>
        
        @yield('khalti')
    </head>
   <body>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5f3d00c004a48e20"></script>

        @include('frontend.partials.top-navbar')
        @include('frontend.partials.navbar')

        @yield('content')


        @include('frontend.partials.footer')
      <div class="copyright text-center">
         <h3>© Nepalyan Books {{ date('Y') }}. All Rights Reserved.</h3>
      </div>
        <div class="scroll-top not-visible">
    <i class="fa fa-angle-up"></i>
</div>
      <script src="http://code.jquery.com/jquery-3.2.1.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.js"></script>

      <script src="{{ asset('frontend') }}/js/jquery.min.js"></script>
      <script src="{{ asset('frontend') }}/js/bootstrap.min.js"></script>
      <script src="{{ asset('frontend') }}/js/jquery.filterizr.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.js"></script>
      <script src="{{ asset('frontend') }}/js/owl.carousel.min.js" type="text/javascript"></script>
      <script src="{{ asset('frontend') }}/js/custom.js"></script>

@yield('jsfornavbar')
@yield('esewaj')
      @yield('khaltiscript')
      <script type="text/javascript">
         $(".nav-link .same-nav").hover(function(){
         $(this).tab('show');
         });
      </script>
    <script>
        $('#success,#warning,#danger').delay(3000).fadeOut('slow');
    </script>

      <script type="text/javascript">
        //  $(document).ready(function () {


         $(document).ready(function() {
         $(".mega-menu").on("click", function(e) {
         e.stopPropagation();
         });
        //  });
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
<script>
   $(window).on('scroll', function() {
    if ($(this).scrollTop() > 600) {
        $('.scroll-top').removeClass('not-visible');
    } else {
        $('.scroll-top').addClass('not-visible');
    }
});
$('.scroll-top').on('click', function(event) {
    $('html,body').animate({
        scrollTop: 0
    }, 1000);
});
</script>
<script type="text/javascript">
     $('.moreless-button').click(function() {
  $('.moretext').slideToggle();
  if ($('.moreless-button').text() == "Show All University") {
    $(this).text("Show Less University")
  } else {
    $(this).text("Show All University")
  }
});
   </script>
   </body>
</html>
