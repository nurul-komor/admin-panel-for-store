<!-- sidebar menu area start -->
<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="text-center ">
            <a href="{{ route('dashboard.home') }}" class="text-light">
                <h3>Mobile Shop</h3>
            </a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i
                                class="ti-dashboard"></i><span>dashboard</span></a>
                        <ul class="collapse">
                            <li><a href="{{ route('dashboard.home') }}">ICO dashboard</a></li>
                            <li><a href="">Ecommerce dashboard</a></li>
                            <li><a href="">SEO dashboard</a></li>
                        </ul>
                    </li>
                    <li class="">
                        {{-- <a href="javascript:void(0)" aria-expanded="true"></a>
                        <ul class="collapse">
                            <li class=""> --}}
                        <a href="{{ route('dashboard.customers.index') }}"><i class="icofont-users-alt-6"></i><span>
                            </span>All Customers</a>
                    </li>
                    {{-- <li><a href="{{ route('dashboard.customers.create') }}">Add Customer</a></li> --}}
                    {{-- </ul>
                    </li> --}}
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="icofont-tag"></i><span>Brands
                            </span></a>
                        <ul class="collapse">
                            <li><a href="{{ route('dashboard.brands.index') }}">All Brands</a></li>
                            <li><a href="{{ route('dashboard.brands.create') }}">Add Brand</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dropbox-alt"></i><span>Products
                            </span></a>
                        <ul class="collapse">
                            <li><a href="{{ route('dashboard.products.index') }}">All Products</a></li>
                            <li><a href="{{ route('dashboard.products.create') }}">Add Products</a></li>
                        </ul>
                    </li>
                    {{-- <li>
                        <a href="javascript:void(0)" aria-expanded="true"><span>Payments
                            </span></a>
                        <ul class="collapse"> --}}
                    <li><a href="{{ route('dashboard.payments.index') }}">
                            <i class="fa fa-credit-card-alt" aria-hidden="true"></i><span></span>Payments
                        </a></li>
                    {{-- <li><a href="{{ route('dashboard.payments.create') }}">Add Payment</a></li> --}}
                    {{-- </ul>
                    </li> --}}
                    {{-- <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-usd"></i><span>Purchases
                            </span></a>
                        <ul class="collapse"> --}}
                    <li><a href="{{ route('dashboard.purchases.index') }}"><i class="fa fa-usd"></i><span></span>All
                            Purchases</a></li>
                    {{-- <li><a href="{{ route('dashboard.purchases.create') }}">Add Purchases</a></li> --}}
                    {{-- </ul>
                    </li> --}}

                    {{-- <li>
                        <a href="javascript:void(0)" aria-expanded="true">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Sales
                            </span></a>
                        <ul class="collapse"> --}}
                    <li><a href="{{ route('dashboard.sales.index') }}"><i class="fa fa-shopping-cart"
                                aria-hidden="true"></i><span></span>All sales</a></li>
                    {{-- <li><a href="{{ route('dashboard.sales.create') }}">Add sales</a></li> --}}
                    {{-- </ul>
                    </li> --}}
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i
                                class="icofont-user-suited"></i><span>Salesman
                            </span></a>
                        <ul class="collapse">
                            <li><a href="{{ route('dashboard.salesman.index') }}">All salesman</a></li>
                            <li><a href="{{ route('dashboard.salesman.create') }}">Add salesman</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i style="font-size:22px"
                                class="icofont-fast-delivery"></i><span>Suppliers
                            </span></a>
                        <ul class="collapse">
                            <li><a href="{{ route('dashboard.suppliers.index') }}">All suppliers</a></li>
                            <li><a href="{{ route('dashboard.suppliers.create') }}">Add suppliers</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layers-alt"></i>
                            <span>Pages</span></a>
                        <ul class="collapse">
                            <li><a href="login.html">Login</a></li>
                            <li><a href="login2.html">Login 2</a></li>
                            <li><a href="login3.html">Login 3</a></li>
                            <li><a href="register.html">Register</a></li>
                            <li><a href="register2.html">Register 2</a></li>
                            <li><a href="register3.html">Register 3</a></li>
                            <li><a href="register4.html">Register 4</a></li>
                            <li><a href="screenlock.html">Lock Screen</a></li>
                            <li><a href="screenlock2.html">Lock Screen 2</a></li>
                            <li><a href="reset-pass.html">reset password</a></li>
                            <li><a href="pricing.html">Pricing</a></li>
                        </ul>
                    </li>

                    {{-- <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-align-left"></i>
                            <span>Multi
                                level menu</span></a>
                        <ul class="collapse">
                            <li><a href="#">Item level (1)</a></li>
                            <li><a href="#">Item level (1)</a></li>
                            <li><a href="#" aria-expanded="true">Item level (1)</a>
                                <ul class="collapse">
                                    <li><a href="#">Item level (2)</a></li>
                                    <li><a href="#">Item level (2)</a></li>
                                    <li><a href="#">Item level (2)</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Item level (1)</a></li>
                        </ul>
                    </li> --}}
                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- sidebar menu area end -->
