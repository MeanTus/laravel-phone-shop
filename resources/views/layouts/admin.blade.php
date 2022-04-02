<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>@yield('title')</title>

    <!-- Fontfaces CSS-->
    <link href="/assets/admin/css/font-face.css" rel="stylesheet" media="all">
    <link href="/assets/admin/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="/assets/admin/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="/assets/admin/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="/assets/admin/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="/assets/admin/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="/assets/admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="/assets/admin/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="/assets/admin/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="/assets/admin/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="/assets/admin/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="/assets/admin/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="/assets/admin/css/theme.css" rel="stylesheet" media="all">
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="#">
                            <img src="/assets/admin/images/logo.png" alt="PHONESHOP" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="active has-sub">
                            <a class="js-arrow" href="/admin">
                                <i class="fas fa-tachometer-alt"></i>Trang chủ</a>
                            
                        </li>
                        <li>
                            <a href="/account">
                                <i class="fa fa-user-circle"></i>Tài khoản</a>
                        </li>
                        <li>
                            <a href="/mail">
                                <i class="fa fa-address-book"></i>Ý kiến khách hàng</a>
                        </li>
                        <li>
                            <a href="/product">
                                <i class="fa fa-shopping-bag"></i>Sản phẩm</a>
                        </li>
                        <li>
                            <a href="/wishlist">
                                <i class="fas fa-calendar-alt"></i>Danh sách yêu thích</a>
                        </li>
                        <li>
                            <a href="/order">
                                <i class="fa fa-shopping-cart"></i>Đơn hàng</a>
                        </li>
                        <li>
                            <a href="/comment">
                                <i class="fa fa-comments"></i>Bình luận</a>
                        </li>
                        <li>
                            <a href="/warehouse">
                                <i class="fa fa-home"></i>Kho hàng</a>
                        </li>
                        <li>
                            <a href="/brand-cat">
                                <i class="fa fa-cc"></i>Danh mục và thương hiệu</a>
                        </li>
                        <li>
                            <a href="/slide">
                                <i class="fa fa-image"></i>Slide Show</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="/admin">
                    <img src="/assets/admin/images/logo.png" alt="WATCHSHOP" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="@yield('class')">
                            <a class="js-arrow" href="/admin">
                                <i class="fas fa-tachometer-alt"></i>Trang chủ</a>
                            
                        </li>
                        <li class="@yield('class1')">
                            <a href="/account">
                                <i class="fa fa-user-circle"></i>Tài khoản</a>
                        </li>
                        <li class="@yield('class2')">
                            <a href="/mail">
                                <i class="fa fa-address-book"></i>Ý kiến khách hàng</a>
                        </li>
                        <li class="@yield('class3')">
                            <a href="/product">
                                <i class="fa fa-shopping-bag"></i>Sản phẩm</a>
                        </li>
                        <li class="@yield('class4')">
                            <a href="/wishlist">
                                <i class="fas fa-calendar-alt"></i>Danh sách yêu thích</a>
                        </li>
                        <li class="@yield('class5')">
                            <a href="/order">
                                <i class="fa fa-shopping-cart"></i>Đơn hàng</a>
                        </li>
                        <li class="@yield('class6')">
                            <a href="/comment">
                                <i class="fa fa-comments"></i>Bình luận</a>
                        </li>
                        <li class="@yield('class7')">
                            <a href="/warehouse">
                                <i class="fa fa-home"></i>Kho hàng</a>
                        </li>
                        <li class="@yield('class8')">
                            <a href="/brand-cat">
                                <i class="fa fa-cc"></i>Danh mục-Thương hiệu</a>
                        </li>
                        <li class="@yield('class9')">
                            <a href="/slide">
                                <i class="fa fa-image"></i>Silde Show</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                                @yield('search')
                            <div class="header-button">
                                <div class="noti-wrap">   
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="/assets/uploads/user/avatar-01.jpg" alt="Admin" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">Admin</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="/assets/uploads/user/avatar-01.jpg" alt="Admin" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class='name'><a href='/account'>{{ Auth::user()->name }}</a></h5>
                                                    <span class='email'>{{ Auth::user()->email }}</span>
                                                </div>
                                            </div>
                                            
                                            <div class="account-dropdown__footer">
                                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    <i class="zmdi zmdi-power"></i>Đăng xuất
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->
            
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">@yield('sidebar1')</h2>
                                </div>
                            </div>
                        </div>
                        
                        @section('content1')
                            
                        @show
                        
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="title-1 m-b-25">@yield('sidebar2')</h2>
                                @section('content2')
                            
                                @show

                            </div>
                            
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2020 WATCHSHOP. All rights reserved. Designed by <a href="#">Trung Thành</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="/assets/admin/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="/assets/admin/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="/assets/admin/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="/assets/admin/vendor/slick/slick.min.js">
    </script>
    <script src="/assets/admin/vendor/wow/wow.min.js"></script>
    <script src="/assets/admin/vendor/animsition/animsition.min.js"></script>
    <script src="/assets/admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="/assets/admin/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="/assets/admin/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="/assets/admin/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="/assets/admin/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/assets/admin/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="/assets/admin/vendor/select2/select2.min.js">
    </script>
    @yield('script')
    <!-- Main JS-->
    <script src="/assets/admin/js/main.js"></script>
    @include('sweetalert::alert')
</body>

</html>
<!-- end document-->
