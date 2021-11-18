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

                    <li> <a class="waves-effect waves-dark" href="{{ route('user.dashboard')}}" aria-expanded="false"><i
                        class="icon-speedometer"></i><span class="hide-menu">Dashboard</span></a></li>

                @if (Auth::user()->is_super_admin == 1)

                    <!--<li> <a class="waves-effect waves-dark" href="{{ route('role.index')}}" aria-expanded="false"><i-->
                    <!--class="icon-user"></i><span class="hide-menu">Role Management</span></a></li>-->


                    <li> <a class="waves-effect waves-dark" href="{{ route('admin.index')}}" aria-expanded="false"><i
                    class="icon-user"></i><span class="hide-menu">User Management</span></a></li>
                    
                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false"><i class="fa fa-envelope"></i><span
                            class="hide-menu">Message</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="{{ route('email.client') }}"><i class="fa fa-plus-circle"></i> Compose</a>
                            </li>
                            
                        </ul>
                    </li>
                    
                     <li> <a class="waves-effect waves-dark" href="{{ route('support.index')}}" aria-expanded="false"><i
                        class="icon-envelope"></i><span class="hide-menu">Support messages</span></a></li>
                        
                  

                    <li class="nav-small-cap">--- Education ---</li>

                    <li> <a class="waves-effect waves-dark" href="{{ route('vendor.list') }}" aria-expanded="false"><i
                        class="fa fa-users"></i><span class="hide-menu"> User List </span></a></li>


              

                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                            aria-expanded="false"><i class="fa fa-university"></i><span
                                class="hide-menu">Education</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li>
                                    <a href="{{ route('education.create') }}">Educational Institute</a>
                                </li>
                                <li>
                                    <a href="{{ route('other.create') }}">Other Category</a>
                                </li>
                            </ul>
                        </li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                            aria-expanded="false"><i class="fa fa-product-hunt"></i><span
                                class="hide-menu">Product</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li>
                                    <a href="{{ route('product.all') }}">Create Educational Product</a>
                                </li>
                                <li>
                                    <a href="{{ route('other.product.create') }}">Create Other Product</a>
                                </li>
                            </ul>
                        </li>



           

                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false"><i class="fa fa-bell"></i><span
                            class="hide-menu">Notice</span></a>
                        <ul aria-expanded="false" class="collapse">
                            @forelse ($education as $item)
                                <li>
                                    <a href="{{ route('notice.edu.create',$item->slug) }}">{{ $item->name }}</a>
                                </li>
                            @empty
                            @endforelse
                        </ul>
                    </li>


                    <li> <a class="waves-effect waves-dark" href="{{ route('contact.admin.index') }}" aria-expanded="false"><i
                        class="fa fa-envelope"></i><span class="hide-menu"> Message</span></a></li>


                    <li class="nav-small-cap">--- My Products ---</li>
                        <li> <a class="waves-effect waves-dark" href="{{ route('myProd.view')}}" aria-expanded="false"><i
                        class="fa fa-product-hunt"></i><span class="hide-menu">My Products</span></a></li>
                        
                        <li> <a class="waves-effect waves-dark" href="{{ route('overview.user.product')}}" aria-expanded="false"><i
                        class="fa fa-book"></i><span class="hide-menu">Read</span></a></li>


                    <li class="nav-small-cap"> --- SETTINGS ---</li>


                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                            aria-expanded="false"><i class="ti-layout-accordion-merged"></i><span
                                class="hide-menu">About</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="{{ route('about.create') }}">Create</a>
                            </li>
                            <li>
                                <a href="{{ route('about.index') }}">List</a>
                            </li>
                        </ul>
                    </li>
                    
                     <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                            aria-expanded="false"><i class="ti-layout-accordion-merged"></i><span
                                class="hide-menu">Advertisement</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="{{ route('advertise.create') }}">Create</a>
                            </li>
                            <li>
                                <a href="{{ route('advertise.index') }}">List</a>
                            </li>
                        </ul>
                    </li>


                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                            aria-expanded="false"><i class="ti-package"></i><span class="hide-menu">
                                F&Q</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="{{ route('fnq.create') }}">Create</a>
                            </li>
                            <li>
                                <a href="{{ route('fnq.index') }}">List</a>
                            </li>
                        </ul>
                    </li>


                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false"><i class="fa fa-adn"></i><span class="hide-menu">Terms and Condition</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="{{ route('term.create') }}">Create</a>
                            </li>
                            <li>
                                <a href="{{ route('term.index') }}">List</a>
                            </li>
                        </ul>
                    </li>

                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                            aria-expanded="false"><i class="ti-flag-alt-2"></i><span
                                class="hide-menu">Banners</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="{{ route('banner.create') }}">Create</a>
                            </li>
                            <li>
                                <a href="{{ route('banner.index') }}">List</a>
                            </li>
                        </ul>
                    </li>

                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false"><i class="ti-flag-alt-2"></i><span
                            class="hide-menu">Testimonals</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="{{ route('testimonal.create') }}">Create</a>
                        </li>
                        <li>
                            <a href="{{ route('testimonal.index') }}">List</a>
                        </li>
                    </ul>
                </li>

                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false"><i class="fa fa-bell"></i><span
                            class="hide-menu">Notices</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="{{ route('notice.create') }}">Create</a>
                            </li>
                            <li>
                                <a href="{{ route('notice.index') }}">List</a>
                            </li>
                        </ul>
                    </li>

                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false"><i class="fa fa-calendar"></i><span
                            class="hide-menu">Event</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="{{ route('event.create') }}">Create</a>
                            </li>
                            <li>
                                <a href="{{ route('event.index') }}">List</a>
                            </li>
                        </ul>
                    </li>

                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false"><i class="fa fa-caret-square-o-up"></i><span
                            class="hide-menu">Guideline</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="{{ route('guideline.create') }}">Create</a>
                            </li>
                            <li>
                                <a href="{{ route('guideline.index') }}">List</a>
                            </li>
                        </ul>
                    </li>


                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false"><i class="fa fa-folder-open"></i><span
                            class="hide-menu">Tag</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="{{ route('tag.create') }}">Create</a>
                            </li>
                            <li>
                                <a href="{{ route('tag.index') }}">List</a>
                            </li>
                        </ul>
                    </li>

                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false"><i class="fa fa-folder-open"></i><span
                            class="hide-menu">Blog</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="{{ route('blog.create') }}">Create</a>
                            </li>
                            <li>
                                <a href="{{ route('blog.index') }}">List</a>
                            </li>
                        </ul>
                    </li>



                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false"><i class="fa fa-folder-open"></i><span
                            class="hide-menu">Random Content</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="{{ route('random.create') }}">Create</a>
                            </li>
                            <li>
                                <a href="{{ route('random.index') }}">List</a>
                            </li>
                        </ul>
                    </li>
                    
                         
                <li> <a class="waves-effect waves-dark" href="{{ route('order.index') }}" aria-expanded="false"><i
                    class="fa fa-cog"></i><span class="hide-menu"> Order Lists</span></a></li>
                    
                    
                <li> <a class="waves-effect waves-dark" href="{{ route('setting.create') }}" aria-expanded="false"><i
                    class="fa fa-cog"></i><span class="hide-menu"> Setting</span></a></li>

                <li> <a class="waves-effect waves-dark" href="{{ route('subscribe.index') }}" aria-expanded="false"><i
                    class="fa fa-users"></i><span class="hide-menu"> Subscribers</span></a></li>
                    
                 <li> <a class="waves-effect waves-dark" href="{{ route('all.client.index') }}" aria-expanded="false"><i
                        class="fa fa-users"></i><span class="hide-menu"> Clients</span></a></li>

                @endif
                <!--{{-- @if (Auth::user()->is_super_admin == 0) --}}-->
                @role('Employee')
                    <li> <a class="waves-effect waves-dark" href="{{ route('admin.profile.create') }}" aria-expanded="false"><i
                        class="fa fa-user"></i><span class="hide-menu">My Profile</span></a></li>

                    <li> <a class="waves-effect waves-dark" href="{{ route('myProd.view')}}" aria-expanded="false"><i
                        class="fa fa-product-hunt"></i><span class="hide-menu">My Products</span></a></li>

                    @can('read_product_employee')
                        <li> <a class="waves-effect waves-dark" href="{{ route('overview.user.product')}}" aria-expanded="false"><i
                        class="fa fa-book"></i><span class="hide-menu">Read</span></a></li>
                    @endcan
                    
                      <li> <a class="waves-effect waves-dark" href="{{ route('email.list') }}" aria-expanded="false"><i
                        class="fa fa-envelope"></i><span class="hide-menu">Messages</span></a></li>
                        
                         <li> <a class="waves-effect waves-dark" href="{{ route('message.from.admin') }}" aria-expanded="false"><i
                        class="fa fa-envelope"></i><div class="nep"><div class="notify1">@if(App\PrivateMessage::where('user_id',auth()->id())->where('status','0')->count() != 0)<span class="heartbit"></span><span class="point"></span>@endif</div><span>Direct Message</span></div></a></li>

                <!--{{-- <li> <a class="waves-effect waves-dark" href="{{ route('overview.product')}}" aria-expanded="false"><i-->
                    <!--class="fa fa-book"></i><span class="hide-menu">Read</span></a></li> --}}-->
                <!--{{-- @endif --}}-->
                @endrole

                <!--{{-- <li> <a class="waves-effect waves-dark" href="#" aria-expanded="false"><i-->
                    <!--class="fa fa-power-off"></i><span class="hide-menu"> Logout</span></a></li> --}}-->

                @role('Seller')

                    <li> <a class="waves-effect waves-dark" href="{{ route('total.sale') }}" aria-expanded="false"><i
                        class="fa fa-balance-scale"></i><span class="hide-menu">My Sales</span></a></li>

                    <!--<li> <a class="waves-effect waves-dark" href="{{ route('total.client') }}" aria-expanded="false"><i-->
                        <!--class="fa fa-users"></i><span class="hide-menu">My Clients</span></a></li>-->

                    <!--<li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"-->
                    <!--    aria-expanded="false"><i class="fa fa-envelope"></i><span-->
                    <!--        class="hide-menu">Message</span></a>-->
                    <!--    <ul aria-expanded="false" class="collapse">-->
                    <!--        <li>-->
                    <!--            <a href="{{ route('email.client') }}"><i class="fa fa-plus-circle"></i> Compose</a>-->
                    <!--        </li>-->
                    <!--        <li>-->
                    <!--            <a href="{{ route('email.outbox') }}"><i class="fa fa-paper-plane"></i> Sent</a>-->
                    <!--        </li>-->
                    <!--    </ul>-->
                    <!--</li>-->
                    
                     <li> <a class="waves-effect waves-dark" href="{{ route('email.list') }}" aria-expanded="false"><i class="fa fa-envelope"></i><span class="hide-menu">Messages</span></a></li>
                     <li> <a class="waves-effect waves-dark" href="{{ route('support.create') }}" aria-expanded="false"><i class="fa fa-envelope"></i><span class="hide-menu">Support</span></a></li>
                   <li> <a class="waves-effect waves-dark" href="{{ route('message.from.admin') }}" aria-expanded="false"><i
                        class="fa fa-envelope"></i><div class="nep"><div class="notify1">@if(App\PrivateMessage::where('user_id',auth()->id())->where('status','0')->count() != 0)<span class="heartbit"></span><span class="point"></span>@endif</div><span>Direct Message</span></div></a></li>

<!--{{---->
                    <!--<li> <a class="waves-effect waves-dark" href="{{ route('email.client') }}" aria-expanded="false"><i-->
                        <!--class="fa fa-plus"></i><span class="hide-menu">Compose Email</span></a></li>-->

                    <!--<li> <a class="waves-effect waves-dark" href="{{ route('email.outbox') }}" aria-expanded="false"><i-->
                        <!--class="fa fa-envelope"></i><span class="hide-menu">Sent</span></a></li> --}}-->

                @endrole

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
