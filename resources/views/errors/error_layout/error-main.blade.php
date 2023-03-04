@include('layout.header')
<!-- error area start -->
<div class="error-area ptb--100 text-center">
    <div class="container">
        @yield('error-main-section')
    </div>
</div>
<!-- error area end -->
@include('layout.footer')
