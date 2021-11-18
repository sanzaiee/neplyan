<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- ============================================================== -->
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('user.dashboard') }}">
                <!-- Logo icon -->
                <b>
                    <!-- Light Logo icon -->
                    <img src="{{ $setting->image ?? '' }}" alt="homepage" class="light-logo" />
                </b>
                <!--End Logo icon -->
            </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"> <a class="nav-link nav-toggler d-block d-sm-none waves-effect waves-dark"
                        href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                <li class="nav-item"> <a
                        class="---nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark"
                        href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
            </ul>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <ul class="navbar-nav my-lg-0">
                <!-- ============================================================== -->
                <!-- Comment -->
                <!-- ============================================================== -->
                @if(auth()->user()->is_super_admin == 1)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"> <i class="ti-email"></i>
                        <div class="notify"> @if($contacts->count() != 0) <span class="heartbit"></span> <span class="point"></span> @endif</div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right mailbox scale-up">
                        <ul>
                            <li>
                                <div class="drop-title">Messages</div>
                            </li>
                            <li>
                                <div class="message-center">
                                    <!-- Message -->
                                    @forelse ($contacts as $item)
                                        <a href="{{ route('contact.admin.index') }}">
                                            <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                            <div class="mail-contnet">
                                                <h5>{{ $item->subject }}</h5> <span class="mail-desc">
                                                    by {{ $item->fullname }}</span> <span class="time">{{ $item->created_at->diffForHumans() }}</span>
                                            </div>
                                        </a>
                                    @empty
                                        <a href="{{ route('contact.admin.index') }}">
                                            <div class="btn btn-danger btn-circle"><i class="fa fa-envelope"></i></div>
                                            <div class="mail-contnet">
                                                <span class="mail-desc">no new messages!</span>
                                            </div>
                                        </a>
                                    @endforelse
                                </div>
                            </li>
                            <li>
                                <a class="nav-link text-center link" href="{{ route('contact.admin.index') }}"> <strong>Check
                                        all messages</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif
                @if(auth()->user()->is_super_admin == 0)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"> <i class="ti-email"></i>
                        <div class="notify"> @if(App\SellerMessage::where('seller_id',auth()->id())->where('status',0)->count() != 0) <span class="heartbit"></span> <span class="point"></span> @endif</div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right mailbox scale-up">
                        <ul>
                            <li>
                                <div class="drop-title">Admin Messages</div>
                            </li>
                            <li>
                                <div class="message-center">
                                    <!-- Message -->
                                    @forelse ($adminmessages ?? '' as $item)
                                        <a href="{{ route('email.list') }}">
                                            <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                            <div class="mail-contnet">
                                                <h5>{{ $item->subject }}</h5> <span class="mail-desc">
                                                    by Admin </span> <span class="time">{{ $item->created_at->diffForHumans() }}</span>
                                            </div>
                                        </a>
                                    @empty
                                        <a href="{{ route('email.list') }}">
                                            <div class="btn btn-danger btn-circle"><i class="fa fa-envelope"></i></div>
                                            <div class="mail-contnet">
                                                <span class="mail-desc">no new messages!</span>
                                            </div>
                                        </a>
                                    @endforelse
                                </div>
                            </li>
                            <li>
                                <a class="nav-link text-center link" href="{{ route('email.list') }}"> <strong>Check
                                        all messages</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif
                
                <!-- ============================================================== -->
                <!-- End Comment -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Messages -->
                <!-- ============================================================== -->
            
                <li class="nav-item dropdown u-pro dashboard-act">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     
                    @if (auth()->user() && auth()->user()->profile)
                       <img src="{{asset(auth()->user()->profile->image ?? 'dummy.jpg') }}" alt="user" class="img-circle">
                    @else
                        <img  src="{{ asset('dummy.jpg') }}" alt="user" class="">
                    @endif
                    
                    <span class="hidden-md-down">{{ Auth::user()->name }} &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                   
                    <div class="dropdown-menu dropdown-menu-right animated flipInY">
                        <!-- text-->
                        <a href="{{ route('admin.profile.create') }}" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                       
                        <div class="dropdown-divider"></div>
                        <!-- text-->
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <!-- text-->
                    </div>
                </li>
                <!-- ============================================================== -->
                <!-- End User Profile -->
                <!-- ============================================================== -->

            </ul>
        </div>
    </nav>
</header>
