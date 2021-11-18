<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

                <li> <a class="waves-effect waves-dark" href="/" aria-expanded="false"><i
                class="icon-speedometer"></i><span class="hide-menu">Visit Site</span></a></li>

                <li> <a class="waves-effect waves-dark" href="{{ route('user.dashboard')}}" aria-expanded="false"><i
                    class="icon-speedometer"></i><span class="hide-menu">Dashboard</span></a></li>

                @role('Seller')

                    <li> <a class="waves-effect waves-dark" href="{{ route('total.sale') }}" aria-expanded="false"><i
                        class="fa fa-balance-scale"></i><span class="hide-menu">My Sales</span></a></li>

                    <li> <a class="waves-effect waves-dark" href="{{ route('total.client') }}" aria-expanded="false"><i
                        class="fa fa-users"></i><span class="hide-menu">My Clients</span></a></li>

                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false"><i class="fa fa-envelope"></i><span
                            class="hide-menu">Message</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="{{ route('email.client') }}"><i class="fa fa-plus-circle"></i> Compose</a>
                            </li>
                            <li>
                                <a href="{{ route('email.outbox') }}"><i class="fa fa-paper-plane"></i> Sent</a>
                            </li>
                        </ul>
                    </li>
                @endrole
            </ul>
        </nav>
    </div>
</aside>
