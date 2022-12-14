{{--<html>--}}
{{--<head>--}}
{{--    <title> Master Page Layout </title>--}}
{{--</head>--}}
{{--<body>--}}
{{--<div class="container">--}}
{{--    @yield('content')--}}
{{--    parent content--}}
{{--    @show--}}
{{--</div>--}}
{{--@yield('footer')--}}
{{--</body>--}}
{{--</html>--}}
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8"/>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description"/>
    <meta content="Themesbrand" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('css/app.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="{{ asset('css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="{{ asset('css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css"/>

    @yield('extra_style')
</head>

<body data-sidebar="dark">

<!-- Begin page -->
<div id="layout-wrapper">
    @yield('topbar')
    <header id="page-topbar">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="#" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="" alt="" height="22">
                                </span>
                        <span class="logo-lg">
                                    <img src="" alt="" height="17">
                                </span>
                    </a>

                    <a href="#" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="" alt="" height="22">
                                </span>
                        <span class="logo-lg">
                                    <img src="" alt="" height="19">
                                </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect"
                        id="vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>

            </div>

            <div class="d-flex">

                <div class="dropdown d-none d-lg-inline-block ml-1">
                    <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                        <i class="bx bx-fullscreen"></i>
                    </button>
                </div>


                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             @if (Auth::user()->profile_pic != '')
                                                <img src="{{ asset('assets/users/'.Auth::user()->profile_pic) }}" alt=""
                                                    class="rounded-circle header-profile-user" alt="Header Avatar">
                                            @else
                                                <img src="{{ asset('assets/users/profile.png') }}" alt=""
                                                    class="rounded-circle header-profile-user" alt="Header Avatar">
                                            @endif
                        <span class="d-none d-xl-inline-block ml-1">{{ Auth::user()->name }}</span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- item-->
                        <a class="dropdown-item" href="#"><i class="bx bx-user font-size-16 align-middle mr-1"></i>
                            Profile</a>

                        <a class="dropdown-item d-block" href="#"><span
                                class="badge badge-success float-right">11</span><i
                                class="bx bx-wrench font-size-16 align-middle mr-1"></i> Settings</a>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="#">
                            <i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> Logout</a>
                    </div>
                </div>

            </div>
        </div>
    </header>
    @show
    @yield('sidebar')
    <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">

        <div data-simplebar class="h-100">

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li><a href="{{ route('project_dashboard') }}" class="waves-effect">
                            <i class="bx bxs-dashboard"></i>
                            <span>Dashboard</span>
                        </a></li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-layout"></i>
                            <span>Projects</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('view_all_projects') }}">All Projects</a></li>
                            <li><a href="#">New Project</a></li>
                            <li><a href="{{ route('view_all_tasks') }}">Tasks</a></li>
                            <li><a href="{{ route('view_all_goals') }}">Goals</a></li>
                            <li><a href="{{ route('my_points') }}">My Points</a></li>
                            <li><a href="#">Leaders</a></li>

                        </ul>
                    </li>

                </ul>
            </div>
            <!-- Sidebar -->
        </div>
    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        @yield('content')


        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>document.write(new Date().getFullYear())</script>
                        © MyTask.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-right d-none d-sm-block">
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->


<!-- JAVASCRIPT -->
<script src="{{ asset('libs/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{ asset('libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{ asset('libs/node-waves/waves.min.js')}}"></script>

<!-- apexcharts -->
<script src="{{ asset('libs/apexcharts/apexcharts.min.js')}}"></script>

<!-- Saas dashboard init -->
<script src="{{ asset('js/pages/saas-dashboard.init.js')}}"></script>

<script src="{{ asset('js/app.js')}}"></script>
<script src="{{ asset('js/pages/form-validation.init.js')}}"></script>


@yield('extra_scripts')
</body>
</html>
