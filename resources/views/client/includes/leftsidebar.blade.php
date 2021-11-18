<style>
.notify1 {
    top: 0px;
    right: 100% !important;
    position: relative;
}
.notify1 .heartbit {
    position: absolute;
    top: -10px;
    right: -4px;
    height: 25px;
    width: 25px;
    z-index: 10;
    border: 5px solid #DC143C;
    border-radius: 70px;
    -moz-animation: heartbit 1s ease-out;
    -moz-animation-iteration-count: infinite;
    -o-animation: heartbit 1s ease-out;
    -o-animation-iteration-count: infinite;
    -webkit-animation: heartbit 1s ease-out;
    -webkit-animation-iteration-count: infinite;
    animation-iteration-count: infinite;
}
.notify1 .point {
    width: 6px;
    height: 6px;
    -webkit-border-radius: 30px;
    -moz-border-radius: 30px;
    border-radius: 30px;
    background-color: #DC143C;
    position: absolute;
    right: 6px;
    top: -1px;
}
.nep {
    display: inline-block !important;
}
</style>
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li> <a class="waves-effect waves-dark" href="/" aria-expanded="false"><i
                    class="icon-speedometer"></i><span class="hide-menu">Visit Site</span></a></li>

                <li> <a class="waves-effect waves-dark" href="{{ route('client.dashboard')}}" aria-expanded="false"><i
                    class="icon-speedometer"></i><span class="hide-menu">Dashboard</span></a></li>

                <li> <a class=" waves-effect waves-dark" href="{{ route('profile.create') }}"
                    aria-expanded="false"><i class="fa fa-user"></i><span
                        class="hide-menu">My Profile</span></a>
                </li>
                
                <li> <a class=" waves-effect waves-dark" href="{{ route('course.list') }}"
                        aria-expanded="false"><i class="icon-book-open"></i><span
                            class="hide-menu">My Books</span></a>
                </li>

                <!--<li> <a class=" waves-effect waves-dark" href="{{ route('user.faq') }}"-->
                <!--        aria-expanded="false"><i class="ti-package"></i><span-->
                <!--            class="hide-menu">FAQs</span></a>-->
                <!--</li>-->

                <li> <a class=" waves-effect waves-dark" href="{{ route('client.comment') }}"
                        aria-expanded="false"><i class="fa fa-folder-open"></i><span
                            class="hide-menu">My Comments</span></a>
                </li>

                <li> <a class=" waves-effect waves-dark" href="{{ route('client.message.seller') }}"
                    aria-expanded="false"><i class="fa fa-envelope"></i><span
                        class="hide-menu">Messages</span></a>
                </li>
                
                 <li> <a class=" waves-effect waves-dark" href="{{ route('support.create') }}"
                    aria-expanded="false"><i class="fa fa-envelope"></i><span
                        class="hide-menu">Support</span></a>
                </li>
                
                 <li> <a class="waves-effect waves-dark" href="{{ route('message.from.admin') }}" aria-expanded="false"><i
                        class="fa fa-envelope"></i><div class="nep"><div class="notify1">@if(App\PrivateMessage::where('user_id',auth()->id())->where('status','0')->count() != 0)<span class="heartbit"></span><span class="point"></span>@endif</div><span>Direct Message</span></div></a></li>
                                        
                {{-- <li> <a class=" waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false"><i class="fa fa-power-off"></i><span
                            class="hide-menu">Logout</span></a>
                </li> --}}
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
