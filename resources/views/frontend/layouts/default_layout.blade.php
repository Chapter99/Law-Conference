<!DOCTYPE html>
<html>

<head>
    @include('frontend.includes.head_style')
</head>

<body>
    <!-- Site wrapper -->
    <div class="wrapper">

        <nav class="navbar fixed-top navbar-expand-sm navbar-dark navbar-custom">
            <div class="container">
                <a class="navbar-brand text-light" href="{{url('/')}}">การประชุมวิชาการระดับชาติทางนิติศาสตร์ ครั้งที่ 2</a>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse"
                    data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">

                    {{-- <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item {{ (Request::segment(1) == '') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('/') }}">หนัาหลัก </a>
                        </li>
                        <li class="nav-item {{ (Request::segment(1) == 'contact') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('contact') }}">ติดต่อเรา</a>
                        </li>
                    </ul> --}}

                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0 topnav">
                        {{-- <li class="nav-item {{ (Request::segment(1) == '/') ? 'active' : '' }}">
                            <a class="nav-link" href="{{url('/')}}">หน้าหลัก</a>
                        </li> --}}
                        <li class="nav-item {{ (Request::segment(1) == 'timeline') ? 'active' : '' }}">
                            <a class="nav-link" href="{{url('timeline')}}">กำหนดการ</a>
                        </li>
                        <li class="nav-item {{ (Request::segment(1) == 'register') ? 'active' : '' }}">
                            <a class="nav-link" href="{{url('register')}}">ลงทะเบียน</a>
                        </li>
                        <li class="nav-item {{ (Request::segment(1) == 'download') ? 'active' : '' }}">
                            <a class="nav-link" href="{{url('download')}}">ดาวน์โหลด</a>
                        </li>
                        <li class="nav-item {{ (Request::segment(1) == 'contact') ? 'active' : '' }}">
                            <a class="nav-link" href="{{url('contact')}}">ติดต่อเรา </a>
                        </li>
                    </ul>
                    <a class="btn navbar-btn mx-2 text-warning btn-outline-light"
                        href="{{ url('login/reviewer') }}">สำหรับ Reviewer</a>
                </div>
            </div>
        </nav>

        @yield('content')

    </div>
    <!-- ./wrapper -->

    @include('frontend.includes.foot_script')
</body>

</html>