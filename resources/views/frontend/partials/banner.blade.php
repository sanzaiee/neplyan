<div class="nav-section">
    <!--<div class="container-fluid">-->
    <div class="row mr-0">
        
        <div class="col-lg-2 col-md-12">
            <nav>
    
    <!-- Menu Toggle btn-->
<div class="menu-toggle">
    <h3>Menu</h3>
    <button type="button" id="menu-btn">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
</div>

<ul id="respMenu" class="ace-responsive-menu scrollbar-new" data-menu-style="vertical" id="style-6">
    @forelse ($education as $edu)
    <li>
        <a href="javascript:;">
            <i class="fa fa-university" aria-hidden="true"></i>
            <span class="title">{{ $edu->name }}</span>
        </a>
        <!-- Level Two-->
        <ul>
            @forelse ($edu->material as $material)
                <li>
                    <a href="javascript:;">
                        <i class="fa fa-book" aria-hidden="true"></i>
                        {{ $material->name }}
                    </a>
                    <ul>
                        @forelse ($material->level as $level)
                            <li>
                                <a href="#"><i class="fa fa-graduation-cap" aria-hidden="true"></i>{{ $level->name }}</a>
                                <ul>
                                    @forelse ($level->semester as $semester)
                                        <li><a href="{{ route('semester.product.list',$semester->slug) }}"><i class="fa fa-list-alt" aria-hidden="true"></i>{{ $semester->name }}</a></li>
                                    @empty
                                    @endforelse
                                </ul>
                                </li>
                        @empty
                        @endforelse
                    </ul>
                </li>
            @empty
            @endforelse
            <li>
                <a href="{{ route('edu.notice.all',$edu->slug) }}">
                    <i class="fa fa-bell" aria-hidden="true"></i>
                    Notice
                </a>
            </li>
        </ul>
        </li>
    @empty
    @endforelse

    <li>
        <a href="javascript:;">
            <i class="fa fa-university" aria-hidden="true"></i>
            <span class="title">Others</span>
        </a>

            <ul>
                @forelse ($others as $item)
                    <li>
                        <a href="{{ route('other.product.list',$item->slug) }}">
                            <i class="fa fa-bell" aria-hidden="true"></i>
                            {{ $item->name }}
                        </a>
                    </li>
                @empty

                @endforelse

            </ul>
    </li>
</ul>
</nav>
        </div>
        <div class="col-lg-10 col-md-12 pr-0">
            <header>
    <div class="owl-carousel banner-slide owl-theme">
        @forelse ($banners as $item)
            <div class="item">
                <img src="{{ $item->image }}" alt="images not found">
                <div class="cover">
                    <div class="container">
                        <div class="header-content">
                            <h1>{{ $item->name }}</h1>
                            <h4>{!! $item->description !!}</h4>
                        </div>
                    </div>
                </div>
            </div>
        @empty
        @endforelse
    </div>
</header>
        </div>
    </div>

<!--</div>-->
</div>




@section('jsfornavbar')
    <script type="text/javascript">
    (function ($) {
        $.fn.aceResponsiveMenu = function (options) {
            //plugin's default options
            var defaults = {
                resizeWidth: '768',
                animationSpeed: 'fast',
                accoridonExpAll: false
            };
            //Variables
            var options = $.extend(defaults, options),
                opt = options,
                $resizeWidth = opt.resizeWidth,
                $animationSpeed = opt.animationSpeed,
                $expandAll = opt.accoridonExpAll,
                $aceMenu = $(this),
                $menuStyle = $(this).attr('data-menu-style');
            // Initilizing
            $aceMenu.find('ul').addClass("sub-menu");
            $aceMenu.find('ul').siblings('a').append('<span class="arrow "></span>');
            if ($menuStyle == 'accordion') { $(this).addClass('collapse'); }
            // Window resize on menu breakpoint
            if ($(window).innerWidth() <= $resizeWidth) {
                menuCollapse();
            }
            $(window).resize(function () {
                menuCollapse();
            });
            // Menu Toggle
            function menuCollapse() {
                var w = $(window).innerWidth();
                if (w <= $resizeWidth) {
                    $aceMenu.find('li.menu-active').removeClass('menu-active');
                    $aceMenu.find('ul.slide').removeClass('slide').removeAttr('style');
                    $aceMenu.addClass('collapse hide-menu');
                    $aceMenu.attr('data-menu-style', '');
                    $('.menu-toggle').show();
                } else {
                    $aceMenu.attr('data-menu-style', $menuStyle);
                    $aceMenu.removeClass('collapse hide-menu').removeAttr('style');
                    $('.menu-toggle').hide();
                    if ($aceMenu.attr('data-menu-style') == 'accordion') {
                        $aceMenu.addClass('collapse');
                        return;
                    }
                    $aceMenu.find('li.menu-active').removeClass('menu-active');
                    $aceMenu.find('ul.slide').removeClass('slide').removeAttr('style');
                }
            }
            //ToggleBtn Click
            $('#menu-btn').click(function () {
                $aceMenu.slideToggle().toggleClass('hide-menu');
            });
            // Main function
            return this.each(function () {
                // Function for Horizontal menu on mouseenter
                $aceMenu.on('mouseover', '> li a', function () {
                    if ($aceMenu.hasClass('collapse') === true) {
                        return false;
                    }
                    $(this).off('click', '> li a');
                    $(this).parent('li').siblings().children('.sub-menu').stop(true, true).slideUp($animationSpeed).removeClass('slide').removeAttr('style').stop();
                    $(this).parent().addClass('menu-active').children('.sub-menu').slideDown($animationSpeed).addClass('slide');
                    return;
                });
                $aceMenu.on('mouseleave', 'li', function () {
                    if ($aceMenu.hasClass('collapse') === true) {
                        return false;
                    }
                    $(this).off('click', '> li a');
                    $(this).removeClass('menu-active');
                    $(this).children('ul.sub-menu').stop(true, true).slideUp($animationSpeed).removeClass('slide').removeAttr('style');
                    return;
                });
                //End of Horizontal menu function
                // Function for Vertical/Responsive Menu on mouse click
                $aceMenu.on('click', '> li a', function () {
                    if ($aceMenu.hasClass('collapse') === false) {
                        //return false;
                    }
                    $(this).off('mouseover', '> li a');
                    if ($(this).parent().hasClass('menu-active')) {
                        $(this).parent().children('.sub-menu').slideUp().removeClass('slide');
                        $(this).parent().removeClass('menu-active');
                    } else {
                        if ($expandAll == true) {
                            $(this).parent().addClass('menu-active').children('.sub-menu').slideDown($animationSpeed).addClass('slide');
                            return;
                        }
                        $(this).parent().siblings().removeClass('menu-active');
                        $(this).parent('li').siblings().children('.sub-menu').slideUp().removeClass('slide');
                        $(this).parent().addClass('menu-active').children('.sub-menu').slideDown($animationSpeed).addClass('slide');
                    }
                });
                //End of responsive menu function
            });
            //End of Main function
        }
    })(jQuery);
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#respMenu").aceResponsiveMenu({
                resizeWidth: '768', // Set the same in Media query
                animationSpeed: 'fast', //slow, medium, fast
                accoridonExpAll: false //Expands all the accordion menu on click
            });
        });
    </script>
@endsection
