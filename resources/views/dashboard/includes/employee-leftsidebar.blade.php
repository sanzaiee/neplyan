<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li> <a class="waves-effect waves-dark" href="/" aria-expanded="false"><i
                    class="icon-speedometer"></i><span class="hide-menu">Visit Site</span></a></li>
                <li> <a class="waves-effect waves-dark" href="{{ route('user.dashboard')}}" aria-expanded="false"><i
                    class="icon-speedometer"></i><span class="hide-menu">Dashboard</span></a></li>
                @role('Employee')
                    <li> <a class="waves-effect waves-dark" href="{{ route('myProd.view')}}" aria-expanded="false"><i
                        class="fa fa-product-hunt"></i><span class="hide-menu">My Products</span></a></li>

                    @can('read_product_employee')
                        <li> <a class="waves-effect waves-dark" href="{{ route('overview.user.product')}}" aria-expanded="false"><i
                        class="fa fa-book"></i><span class="hide-menu">Read</span></a></li>
                    @endcan
                @endrole
            </ul>
        </nav>
    </div>
</aside>
