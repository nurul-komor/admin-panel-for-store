<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Dashboard</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('dashboard.home') }}">Home</a></li>
                    <li><span>{{ $title }}</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            <div class="user-profile pull-right">
                <img class="avatar user-thumb" src="{{ asset('images/author/avatar.png') }}" alt="avatar">
                <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Kumkum Rai <i class="fa fa-angle-down"></i>
                </h4>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/chatify">Message</a>
                    <a class="dropdown-item" href="#">Settings</a>
                    <a class="dropdown-item">
                        <form action="/logout" method="post">@csrf<button class="btn">Log Out</button></form>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- page title area end -->
