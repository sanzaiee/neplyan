<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{route('home')}}">
                <b>
                    <img src="{{ $setting->image }}" alt="homepage" class="light-logo" />
                </b>
            </a>
        </div>
        
        <div class="navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"> <a class="nav-link nav-toggler d-block d-sm-none waves-effect waves-dark"
                        href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                <li class="nav-item"> <a
                        class="---nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark"
                        href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
            
            </ul>
         
            <ul class="navbar-nav my-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                            class="fa fa-envelope"></i>
                        <div class="notify">@if(count($mesgs) != 0) <span class="heartbit"></span> <span class="point"></span>@endif </div>
                    </a>
                    <div class="dropdown-menu mailbox dropdown-menu-right scale-up" aria-labelledby="2">
                        <ul>
                            <li>
                                <div class="drop-title">You have {{ count($mesgs) }} new messages</div>
                            </li>

                            @forelse ($mesgs as $item)
                                <li>
                                    <div class="message-center">
                                        <a href="{{ route('client.message.seller') }}">
                                            <div class="mail-contnet">
                                                <h5>{{ $item->subject }}</h5><span class="time">{{ $item->created_at->diffForHumans()}}</span>
                                            </div>
                                        </a>
                                    </div>
                                </li>
                            @empty
                                <li>
                                    <div class="message-center">
                                        <a href="{{ route('client.message.seller') }}">
                                            <div class="mail-contnet">
                                                <span class="time">no messages...</span>
                                            </div>
                                        </a>
                                    </div>
                                </li>
                            @endforelse
                            <li>
                                <a class="nav-link text-center link" href="{{ route('client.message.seller') }}"> <strong>See all
                                Messages</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                            
                        </ul>
                    </div>
                </li>


                <li class="nav-item dropdown u-pro">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href=""
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if (auth()->guard('client'))
                         <img src="{{asset(auth()->guard('client')->user()->profile->image ?? 'dummy.jpg') }}" alt="user" class="img-circle">
                    @else
                        <img  src="{{ asset('dummy.jpg') }}" alt="user" class="">
                    @endif
                    <span class="hidden-md-down">{{ Auth::guard('client')->user()->name }} &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                    <div class="dropdown-menu dropdown-menu-right animated flipInY">
                        
                    <a href="{{ route('profile.create') }}" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                    
                    <div class="dropdown-divider"></div>
                        <a href="{{ route('client.logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>

                        <form id="logout-form" action="{{ route('client.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
