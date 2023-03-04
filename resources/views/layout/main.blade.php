@include('layout.header')
<!-- page container area start -->
<div class="page-container">
    @include('layout.left-sidebar')
    <!-- main content area start -->
    <div class="main-content">
        @include('layout.navbar')
        @include('layout.page-title')
        <div class="main-content-inner">
            @yield('main-section')
        </div>
        @include('layout.copyright')
    </div>
    <!-- main content area end -->
</div>
<!-- page container area end -->
@include('layout.right-sidebar')
@include('layout.footer')
