<div class="top-navbar-online">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <ul class="nav">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">About Us</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('blog') }}">Blog</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact.index') }}">Contact Us</a>
                  </li>
                </ul>
                </div>
            <div class="col-md-6">
                <ul class="nav d-flex justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link1 text-white" href="tel:{{ $setting->phone ?? '' }}"><i class="fa fa-mobile"></i> {{ $setting->phone ?? '' }}</a><span class="text-white comma"> , </span><a class="nav-link1 text-white" href="tel:{{ $setting->mobile ?? '' }}">{{ $setting->mobile ?? '' }}</a>
                    </li>
            
                    @if(Auth::guard('client')->check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('client.dashboard') }}"><i class="fa fa-user"></i><span>{{auth()->guard('client')->user()->name }}</span></a>
                        </li>
                    @elseif(Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.dashboard') }}"><i class="fa fa-user"></i><span>{{Auth::user()->name}}</span></a>
                        </li>
                        <li class="nav-item">
                            <a a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Logout</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('client.login') }}"><i class="fa fa-sign-in"></i><span>Login/SignUp</span></a>
                        </li>
            
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.login') }}"><i class="fa fa-user"></i><span>Admin</span> </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
       
    </div>
 </div>

 <div class="top-navbar-online">
    @include('message')
 </div>
