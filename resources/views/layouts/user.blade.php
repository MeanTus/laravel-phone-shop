<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PHONE SHOP</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="/assets/user/css/bootstrap.min.css" />
		<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="/assets/user/css/slick.css" />
	<link type="text/css" rel="stylesheet" href="/assets/user/css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="/assets/user/css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="/assets/user/css/font-awesome.min.css">
	<link rel="stylesheet" href="/assets/user/css/sweetalert.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="/assets/user/css/style.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<style type="text/css">@yield('css')</style>
</head>

<body>
	<!-- HEADER -->
	<header>
		<!-- top Header -->
		<div id="top-header">
			<div class="container">
				<div class="pull-left">
					<span>Chào mừng đến với PHONESHOP!</span>
				</div>
				<div class="pull-right">
					<ul class="header-top-links">
						<li>Cao cấp</li>
						<li>Sang trọng</li>
						<li>Thời trang</li>
						<li><h4><u>Gọi ngay:</u><a href="#"> 0123 456 789</a></h4></li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /top Header -->

		<!-- header -->
		<div id="header">
			<div class="container">
				<div class="pull-left">
					<!-- Logo -->
					<div class="header-logo">
						<a class="logo" href="#">
							<img src="/assets/user/images/logo.png" alt="">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Search -->
					<div class="header-search">
						<form action="/search" method="get">
							<input class="input search-input" type="text" placeholder="Nhập từ khóa cần tìm" name="key">
							<select class="input search-categories" name="price">
								<option value="0">Giá tiền</option>
								<option value="1">Sản phẩm từ 2 triệu - 10 triệu</option>
								<option value="2">Sản phẩm trên 10 triệu</option>
							</select>
							<button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
						</form>
					</div>
					<!-- /Search -->
				</div>
				<div class="pull-right">
					<ul class="header-btns">
						<!-- Account -->
						<li class="header-account dropdown default-dropdown">
							<div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-user-o"></i>
								</div>
								<strong class="text-uppercase">Tài khoản <i class="fa fa-caret-down"></i></strong>
							</div>
							@if(Auth::check())
								<a href="#">{{ Auth::user()->name }}</a>
							<ul class="custom-menu">
								<li><a href="/info"><i class="fa fa-user-o"></i> Tài khoản của tôi</a></li>
								<li><a href="/wishlist-detail"><i class="fa fa-heart-o"></i> Danh sách yêu thích</a></li>
								<li><a href="/checkout"><i class="fa fa-calendar-check-o"></i> Thanh toán</a></li>
								<li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    <i class="fa fa-sign-in"></i>Đăng xuất
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                                </a>
                                            </li>
							</ul>
							@else
								<a href="/login" class="text-uppercase">Đăng nhập</a>
							<ul class="custom-menu">
								<li><a href="/register"><i class="fa fa-edit"></i> Đăng ký</a></li>
							</ul>
							@endif
							
						</li>
						<!-- /Account -->

						<!-- Cart -->
						<li id="cart" class="header-cart dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
								@if(Session::has('cart'))
								<?php $total=0; ?>
								<div class="header-btns-icon">
									<i class="fa fa-shopping-cart"></i>
									<span class="qty">{{ count(Session::get('cart')) }}</span>
								</div>
								<strong class="text-uppercase">Giỏ hàng:</strong>
								<br>
								@foreach(Session::get('cart') as $key => $cart)
							    <?php 
							      $subtotal=$cart['product_price']*$cart['product_qty'];
							      $total += $subtotal; 
							    ?>
							    @endforeach
								<span style="font-size: 12px">{{number_format($total)}} đ</span>

							</a>
							<div class="custom-menu">
								<div id="shopping-cart">
									<div class="shopping-cart-list">

							    @foreach(Session::get('cart') as $key => $cart)
							    <?php 
							      $subtotal=$cart['product_price']*$cart['product_qty'];
							      $total += $subtotal; 
							    ?>
										<div class="product product-widget">
											<div class="product-thumb">
												<img src="/assets/uploads/product/{{ $cart['product_image'] }}" alt="">
											</div>
											<div class="product-body">
												<h3 class="product-price">{{ number_format($cart['product_price']) }} đ
												<span class="qty"> x{{$cart['product_qty']}}</span></h3>
												<h2 class="product-name"><a href="/product-detail/{{$cart['product_id']}}">{{$cart['product_name']}}</a></h2>
											</div>
										</div>
										@endforeach
										@else
										<div class="header-btns-icon">
									<i class="fa fa-shopping-cart"></i>
									<span class="qty">0</span>
								</div>
								<strong class="text-uppercase">Giỏ hàng:</strong>
								<br>
								<span>0 đ</span>
							</a>
							<div class="custom-menu">
								<div id="shopping-cart">
										@endif
									</div>
									<div class="shopping-cart-btns">
										<a href="/cart">
											<button class="main-btn">Xem giỏ hàng</button>
										</a>
										<a href="/checkout">
											<button class="primary-btn">Thanh toán <i class="fa fa-arrow-circle-right"></i></button>
										</a>
									</div>
								</div>
							</div>
						</li>
						<!-- /Cart -->

						<!-- Mobile nav toggle-->
						<li class="nav-toggle">
							<button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
						</li>
						<!-- / Mobile nav toggle -->
					</ul>
				</div>
			</div>
			<!-- header -->
		</div>
		<!-- container -->
	</header>
	<!-- /HEADER -->

	<!-- NAVIGATION -->
	<div id="navigation">
		<!-- container -->
		<div class="container">
			<div id="responsive-nav">
				<!-- category nav -->
				<div class="category-nav @yield('show')">
					<span class="category-header">Danh mục <i class="fa fa-list"></i></span>
					<ul class="category-list">
						@foreach($cat as $cats)
						<li>
							<a href="#">{{ $cats->cat_name }}</a>					
						</li>
						@endforeach
						
					</ul>
				</div>
				<!-- /category nav -->

				<!-- menu nav -->
				<div class="menu-nav">
					<span class="menu-header">Menu <i class="fa fa-bars"></i></span>
					<ul class="menu-list">
						<li><a href="/">Trang chủ</a></li>
						<li><a href="/about">Giới thiệu</li>
						<li><a href="/product-type">Sản phẩm</li>
						<li><a href="/store">Hệ thống</a></li>
						<li><a href="/contact">Liên hệ</a></li>
					</ul>
				</div>
				<!-- menu nav -->
			</div>
		</div>
		<!-- /container -->
	</div>
	
	@section('content')

	@show

	<!-- FOOTER -->
	<footer id="footer" class="section section-grey">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<!-- footer logo -->
						<div class="footer-logo">
							<a class="logo" href="#">
		            <img src="/assets/user/images/logo.png" alt="">
		          </a>
						</div>
						<!-- /footer logo -->

						<p>Nhãn hiệu thương mại WATCH SHOP đã được đăng ký bản quyền Quyền bảo vệ sở hữu trí tuệ & bản quyền nhãn hiệu thuộc: CÔNG TY TNHH MTV THƯƠNG MẠI & DỊCH VỤ TIMES</p>

						<!-- footer social -->
						<ul class="footer-social">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
						</ul>
						<!-- /footer social -->
					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Thông tin liên hệ</h3>
						<ul class="list-links">
							VPGD: số 180 Cao Lỗ, phường 4, quận 8, thành phố Hồ Chí Minh
						</ul>
					</div>
				</div>
				<!-- /footer widget -->

				<div class="clearfix visible-sm visible-xs"></div>

				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Chính sách khách hàng</h3>
						<ul class="list-links">
							<li><a href="#">Chính sách đổi trả</a></li>
							<li><a href="#">Chính sách bảo mật</a></li>
							<li><a href="#">Chính sách bải hành</a></li>
							<li><a href="#">Hỗ trợ khách hàng</a></li>
						</ul>
					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer subscribe -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Theo dõi</h3>
						<p>Để lại email của bạn để có thể nhận được nhiều ưu đãi hơn từ PHONESHOP.</p>
						<form>
							<div class="form-group">
								<input class="input" placeholder="Nhập Email của bạn">
							</div>
							<button class="primary-btn">Theo dõi</button>
						</form>
					</div>
				</div>
				<!-- /footer subscribe -->
			</div>
			<!-- /row -->
			<hr>
			<!-- row -->
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<!-- footer copyright -->
					<div class="footer-copyright">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy; 2020 All rights reserved | Designed <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#" target="_blank">ABC</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</div>
					<!-- /footer copyright -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</footer>
	<!-- /FOOTER -->

	<!-- jQuery Plugins -->
	<script src="/assets/user/js/jquery.min.js"></script>
	<script src="/assets/user/js/bootstrap.min.js"></script>
	<script src="/assets/user/js/slick.min.js"></script>
	<script src="/assets/user/js/nouislider.min.js"></script>
	<script src="/assets/user/js/jquery.zoom.min.js"></script>
	<script src="/assets/user/js/main.js"></script>
	<script src="/assets/user/js/sweetalert.js"></script>
	@include('sweetalert::alert')
	@yield('script')
</body>

</html>
