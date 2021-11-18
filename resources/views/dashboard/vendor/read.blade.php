<html>
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
        <!-- viewport -->
        <meta content="width=device-width,initial-scale=1" name="viewport">
        
        
        <link rel="shortcut icon" type="image/png" href="http://nepalyanbooks.com/settting/1628147830Untitled-1.png">
        <!-- title -->
        <title>Nepalyan Book Reader</title>
        <!-- add css style -->
        <link type="text/css" href="{{ asset('readbook') }}/css/style.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
        <!-- <link type="text/css" rel="stylesheet" href="../css.css?family=Play:400,700"> -->
        <link type="text/css" href="{{ asset('readbook') }}/css/font-awesome.min.css" rel="stylesheet">
        <!-- add js code -->
        <script src="{{ asset('readbook') }}/js/jquery.js"></script>
        <script src="{{ asset('readbook') }}/js/jquery_no_conflict.js"></script>
        <script src="{{ asset('readbook') }}/js/turn.js"></script>
        <script src="{{ asset('readbook') }}/js/wait.js"></script>
        <script src="{{ asset('readbook') }}/js/jquery.mousewheel.js"></script>
        <script src="{{ asset('readbook') }}/js/jquery.fullscreen.js"></script>
        <script src="{{ asset('readbook') }}/js/jquery.address-1.6.min.js"></script>
        <script src="{{ asset('readbook') }}/js/pdf.js"></script>
        <script src="{{ asset('readbook') }}/js/onload.js"></script>

      
        <style>
            html, body {
                margin: 0;
                padding: 0;
                overflow:auto !important;
                font-family: 'Lato', sans-serif;
            }
            
            section#page-new {
                height: 100% !important;
            }
            
            #subchapter p {
                padding-left: 60px !important;
                font-size: 13px;
            }
            
            ::marker {
                font-size: 26px;
                color: #000;
                font-weight: 700;
            }
            
            #fb5 .fb5-page-book {
                padding-right: 2rem;
            }
            
            .heading-part span {
                top: -1px;
            }
        </style>
      
   </head>
   <body>
      <!-- begin flipbook  -->
      <div id="fb5-ajax" data-cat="Computer" data-template="true">
         <!-- BACKGROUND FLIPBOOK -->
         <div class="fb5-bcg-book"></div>
         <!-- BEGIN PRELOADER -->
         <div class="fb5-preloader"></div>
         <!-- END PRELOADER -->
         <!-- BEGIN STRUCTURE HTML FLIPBOOK -->
         <div class="fb5" id="fb5">
            <!-- CONFIGURATION BOOK -->
            <section id="config">
               <ul>
                  <li key="page_width">1400</li>
                  <!-- width for page -->
                  <li key="page_height">1400</li>
                  <!-- height for page -->
                  <li key="gotopage_width">25</li>
                  <!-- width for field input goto page -->
                  <li key="zoom_double_click">1</li>
                  <!-- value zoom after double click -->
                  <li key="zoom_step">0.06</li>
                  <!-- zoom step ( if click icon zoomIn or zoomOut -->
                  <li key="toolbar_visible">true</li>
                  <!-- enabled/disabled toolbar -->
                  <li key="tooltip_visible">true</li>
                  <!-- enabled/disabled tooltip for icon -->
                  <li key="deeplinking_enabled">true</li>
                  <!-- enabled/disabled deeplinking -->
                  <li key="lazy_loading_pages">false</li>
                  <!-- enabled/disabled lazy loading for pages in flipbook -->
                  <li key="lazy_loading_thumbs">false</li>
                  <!-- enabled/disabled lazdy loading for thumbs -->
                  <li key="double_click_enabled">true</li>
                  <!-- enabled/disabled double click mouse for flipbook -->
                  <li key="rtl">false</li>
                  <!-- enabled/disabled 'right to left' for eastern countries -->
                  <li key="pdf_url"></li>
                  <!-- pathway to a pdf file ( the file will be read live ) -->
                  <li key="pdf_scale">1</li>
                  <!-- to live a pdf file (if you want to have a strong zoom - increase the value) -->
                  <li key="page_mode">single</li>
                  <!-- value to 'single', 'double', or 'auto' -->
                  <li key="sound_sheet"></li>
                  <!-- sound for sheet -->
               </ul>
            </section>
            <!-- BEGIN BACK BUTTON -->
            <!--  <a href="http://www.page-flip.info/newspaper_wp" id="fb5-button-back">&lt; Back </a> -->
            <!-- END BACK BUTTON -->
            <!-- BEGIN CONTAINER BOOK -->
            <div id="fb5-container-book">
               <!-- BEGIN deep linking -->
               <section id="fb5-deeplinking">
                  <ul>
                      
                    @forelse ($product->topic as $index=>$topic)
                     <li data-address="page{{++$index}}" data-page="{{++$index}}"></li>
                  
                    @empty
                    
                    @endforelse

                  </ul>
               </section>
               <!-- END deep linking -->
               <!-- BEGIN ABOUT -->
               <section id="fb5-about">
               </section>
               <!-- END ABOUT -->
               <!-- BEGIN LINKS -->
               <section id="links">
               </section>
               <!-- END LINKS -->

               <!-- BEGIN PAGES -->
               <div id="fb5-book">
                  <!-- begin page 2 -->
                  
                 @php
                        $page = 1;
                    @endphp
                   @forelse ($product->topic as $index=>$topic)
                   
                    <div data-background-image="">
                     <!-- container page book -->
                     <div class="fb5-cont-page-book">
                        <!-- gradient for page -->
                        <div class="fb5-gradient-page"></div>
                        <!-- PDF.js -->
                        <canvas id="canv2"></canvas>
                        <!-- description for page -->
                        <div class="fb5-page-book">
                          <div class="heading-part">
                            <h3>{{$topic->title}}</h3>
                            
                            @if($topic->page_status == 1)
                                @if($page <= $pagecount)
                                <span class="page-number">Page {{$page }} </span>
                                    @php
                                        $page = $page + 1;
                                    @endphp
                                @endif
                            @endif
                          </div>
                            {!! $topic->description !!}
                        </div>
                     </div>
                     <!-- end container page book -->
                  </div>
                  
                  
					@empty
					@endforelse


                  
                  
                 
                  <!-- end page 2 -->
                  <!-- begin page 3 -->
                
                  <!-- end page 3 -->
               </div>
            
            </div>
            <!-- END CONTAINER BOOK -->
            <!-- BEGIN FOOTER -->

            <!-- END FOOTER -->
            <!-- BEGIN ALL PAGES -->
                <div id="fb5-all-pages" class="fb5-overlay">
               <section class="fb5-container-pages scrollbar-new" id="page-new">
                  <div id="fb5-menu-holder">
                     <!--<ul id="fb5-slider" class="">-->
                     <ul class="list list-unstyled list-product-nav" id="fb5-slider">

                        <!-- thumb 1 -->
                        <h3>Quick Links</h3>
                        
                   @forelse ($product->topic as $index=>$topic)
                        @if($topic->is_chapter == 1)
                             @if($topic->heading && $topic->title)
                                <li class="{{++$index}}">
                                   <p>{{$topic->heading}} : {{$topic->title}}</p>
                                </li>
                            @endif    
                        @elseif($topic->is_chapter == 0)
                            @if($topic->heading && $topic->title)
                                <li class="{{++$index}}" id="subchapter">
                                   <p>{{$topic->heading}} : {{$topic->title}}</p>
                                </li>
                            @endif
                        
                        @endif
                    @empty
                    @endforelse
                     
                     </ul>
                  </div>
               </section>
            </div>
            <!-- END ALL PAGES -->
            <!-- BEGIN SOUND FOR SHEET  -->
            <audio preload="auto" id="sound_sheet"></audio>
            <!-- END SOUND FOR SHEET -->
            <!-- BEGIN CLOSE LIGHTBOX  -->
            <div id="fb5-close-lightbox">
               <i class="fa fa-times pull-right"></i>
            </div>
            <div class="left-right text-center">
               <div class="list-part">
                  <a title="HomePage" class="fb5-home"><!-- <i class="fa fa-home"></i> -->Home</a>
                 <a title="Previous" class="fb5-arrow-left left-part"><i class="fa fa-chevron-left"></i></a>
                 <span class="fb5-goto">
                                <label for="fb5-page-number" id="fb5-label-page-number"></label>
                                <input type="text" id="fb5-page-number" style="width: 25px;">
                                <span id="fb5-page-number-two"></span>
                                
                              </span>
               <a title="Next" class="fb5-arrow-right right-part"><i class="fa fa-chevron-right"></i>
               </a>
               <a title="zoom in" class="fb5-zoom-in"><i class="fa fa-search-plus"></i></a>
               <a title="zoom out" class="fb5-zoom-out"><i class="fa fa-search-minus"></i></a>
                <a title="Table of Content" class="fb5-show-all"><i class="fa fa-list"></i></a>
                <a class="fb5-fullscreen" data-normal="fulll screen" data-full="normal screen"><i class="fa fa-expand" data-full="fa fa-compress" data-normal="fa fa-expand"></i></a>
               </div>
            </div>
            <!-- END CLOSE LIGHTBOX -->
         </div>
         <!-- END STRUCTURE HTML FLIPBOOK -->
      </div>
      <!-- end flipbook -->
      
         <!--@include('client.includes.restrictjs')-->
    
  <script type="text/javascript">
       $('.list-product-nav .list-product-cat').click(function(e) {
       e.preventDefault();
       $('.list-product-nav .list-product-subnav').slideUp(), $(this).next().is(":visible") || $(this).next().slideDown(),
       e.stopPropagation();
       var span = $(this).find('.glyphicon');
       span.toggleClass('glyphicon-menu-up glyphicon-menu-down');
       });
    </script>
   </body>
</html>







