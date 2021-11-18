{{-- <div class="navigation">
    <div class="container">
       <nav class="navbar navbar-expand-lg navbar-light navbar-online">
          <a class="navbar-brand navbar-logo" href="/">
          <img src="{{ $setting->image }}">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div id="navbarSupportedContent" class="collapse navbar-collapse menu-list-online">
             <ul class="menu navbar-nav ml-auto">
                <li class="nav-item">
                   <a class="nav-link" href="/">Home</a>
                </li>
                @forelse ($education  as $index => $edu)
                <li class="nav-item dropdown megamenu-li">
                   <a class="nav-link dropdown-toggle mega" href="#" id="mega-menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   {{ $edu->name }}
                   </a>
                   <div class="dropdown-menu mega-menu" aria-labelledby="mega-menu">
                      <div class="row">
                         <div class="col-md-4 p-r-1">
                            <div class="nav flex-column nav-pills dropright" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                               @forelse ($edu->material as $index => $material)
                               <a class="nav-link same-nav dropdown-toggle1 @if($index == 0)active @endif" id="v-pills-{{ $material->id }}-tab" data-toggle="pill" href="#v-pills-{{ $material->id }}" role="tab" aria-controls="v-pills-book">{{ $material->name }}</a>
                               @empty
                               @endforelse
                               <a class="nav-link same-nav" href="{{ route('edu.notice.all',$edu->slug) }}" aria-controls="v-pills-book">NOTICE</a>
                </div>
                </div>
                <div class="col-md-8">
                <div class="tab-content" id="v-pills-tabContent">
                @forelse ($edu->material as $index => $material)
                <div class="tab-pane fade @if($index == 0)show active @endif" id="v-pills-{{ $material->id }}" role="tabpanel" aria-labelledby="v-pills-{{ $material->id }}-tab">
                <div class="row">
                <div class="col-md-6 p-0 level-scroll">
                <div class="nav flex-column nav-pills dropright" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                @forelse ($material->level as $index => $level)
                <a class="nav-link same-nav dropdown-toggle1 @if($index==0) active @endif" id="v-pills-level-{{ $level->id }}-tab" data-toggle="pill" href="#v-pills-level-{{ $level->id }}" role="tab" aria-controls="v-pills-mbs" aria-selected="false">{{ $level->name }}</a>
                @empty
                @endforelse
                </div>
                </div>
                <div class="col-md-6 p-l-1">
                <div class="tab-content megamenu-sem-list" id="v-pills-tabContent">
                @forelse ($material->level as $index => $level)
                <div class="tab-pane fade  @if($index == 0)show active @endif " id="v-pills-level-{{ $level->id }}" role="tabpanel" aria-labelledby="v-pills-level-{{ $level->id }}-tab">
                <ul>
                @forelse ($level->semester as $semester)
                <li><a href="{{ route('semester.product.list',$semester->slug) }}">{{ $semester->name }}</a></li>
                @empty
                @endforelse
                </ul>
                </div>
                @empty
                @endforelse
                </div>
                </div>
                </div>
                </div>
                @empty
                @endforelse
                </div>
                </div>
                </div>
                </div>
                </li>
                @empty
                @endforelse
                <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Others </a>
                   <ul class="dropdown-menu online-submenu" aria-labelledby="navbarDropdownMenuLink">
                      @forelse ($others as $item)
                      <li><a class="dropdown-item sub" href="{{ route('other.product.list',$item->slug) }}">{{ $item->name }}</a></li>
                      @empty
                      @endforelse
                   </ul>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="{{ route('contact.index') }}">Contact</a>
                </li>
                <li class="nav-item search-icon">
                   <a class="nav-link" href="#" data-toggle="modal" data-target="#searchmodal">
                   <i class="fa fa-search"></i>
                   </a>
                </li>
             </ul>
          </div>
       </nav>
    </div>
 </div> --}}


 <div class="navigation d-flex">
    <div class="container">
        <div class="row align-self-center align-items-center">
            <div class="col-md-3">
                <a class="navbar-brand navbar-logo" href="/">
                    <img src="{{ $setting->image }}">
                </a>
            </div>
            <div class="col-md-7">
                <form action="{{ route('single.search') }}" method="get">
                    <div class="input-group search-input">
                        <input type="text" name="query" class="form-control" placeholder="Search here...">
                        <div class="input-group-append">
                            <button class="btn btn-secondary top-search-icon" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-2">
                <div class="image-app">
                   <a href="#"> <img src="{{ asset('frontend/image/app.png') }}" alt=""> </a>
                </div>
            </div>
        </div>
       {{-- <nav class="navbar navbar-expand-lg navbar-light navbar-online">
          <a class="navbar-brand navbar-logo" href="/">
          <img src="{{ $setting->image }}">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div id="navbarSupportedContent" class="collapse navbar-collapse menu-list-online">
             <ul class="menu navbar-nav ml-auto">
                <li class="nav-item">
                   <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('blog') }}">Blog</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('event') }}">Events</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('faq') }}">FAQ</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('notice') }}">Notice</a></li>

                <li class="nav-item">
                   <a class="nav-link" href="{{ route('contact.index') }}">Contact</a>
                </li>

                <li class="nav-item search-icon">
                   <a class="nav-link" href="#" data-toggle="modal" data-target="#searchmodal">
                   <i class="fa fa-search"></i>
                   </a>
                </li>
             </ul>
          </div>
       </nav> --}}
    </div>
 </div>
 <div class="modal fade" id="searchmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content search-overlay">
          <div class="modal-header search-head">
             <button type="button" class="close search-close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
          </div>
          <div class="modal-body">
             <div class="form-group m-t-10">
                <input class="form-control search-input" type="text" placeholder="Type & Search...">
                <p>Start typing & press "Enter" or "ESC" to close</p>
             </div>
          </div>
       </div>
    </div>
 </div>
