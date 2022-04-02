@extends('layouts.user')

@section('title','Hệ thống cửa hàng')

@section('show','show-on-click')

@section('content')

<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="#">Trang chủ</a></li>
				<li class="active">Hệ thống cửa hàng</li>
			</ul>
		</div>
	</div>
	<br/><br/>
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- MAIN -->
				<h1>Hệ thống cơ sở chính</h1>
				<div id="main" class="col-md-7">
					<!-- STORE -->
					<div id="store">
						<!-- row -->
						<div class="row">
							<div class="col">
							<h3>HỒ CHÍ MINH</h3>
							<p>PHONE SHOP Lê Văn Việt</p>
							<p>Địa chỉ: L4-19, Vincom Plaza Lê Văn Việt, số 50 Lê Văn Việt, quận 9, tp.Hồ Chí Minh</p>
							<p>Điện thoại: 028 3730 5373 —</p>
						<img src="/assets/user/images/ht11.jpg" width="90%">
						</div>
							<br/><br/>
						<div class="col">
							<h3>Cần Thơ</h3>
							<p>PHONE SHOP Nguyễn Văn Linh</p>
							<p>Địa chỉ: số 288 Nguyễn Văn Linh, phường An Khánh,quận Ninh Kiều, tp.Cần Thơ</p>
							<p>Điện thoại: 028 3456 8765 —</p>
						<img src="/assets/user/images/ht22.jpg" width="90%">
						</div>
						</div>
						<!-- /row -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /MAIN -->
				<!-- ASIDE -->
				<h1>Hệ thống cửa hàng</h1>
				<hr>
				<div id="aside" class="col-md-5">
					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Huế:</h3>
						<div id="ht">
							<p>PHONE SHOP Huế</p>
							<p>Địa chỉ: 86 Mai Thúc Loan, p.Thuận Lộc, tp.Huế, tỉnh Thừa Thiên Huế</p>
							<p>Điện thoại: 028 5674 9876 —</p>
						</div>
					</div>
					<!-- /aside widget -->

					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Hà Nội:</h3>
						<div id="ht">
							<p>PHONE SHOP Hà Nội</p>
							<p>Địa chỉ: Số 55 Trần Đăng Ninh, q.Cầu Giấy, tp.Hà Nội</p>
							<p>Điện thoại: 028 7466 5368 —</p>
						</div>
					</div>
					<!-- aside widget -->

					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Đà Nẵng:</h3>
						<div id="ht">
							<p>PHONE SHOP Đà Nẵng</p>
							<p>Địa chỉ: 36 Hoàng Hoa Thám, p.Tân Chính, q.Thanh Khê, tp.Đà Nẵng</p>
							<p>Điện thoại: 028 5574 6578 —</p>
						</div>
					</div>
					<!-- /aside widget -->

					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Hải Phòng:</h3>
						<div id="ht">
							<p>PHONE SHOP Hải Phòng</p>
							<p>Địa chỉ: 199 Trần Nguyên Hãn, p.Lê Chân, tỉnh Hải Phòng</p>
							<p>Điện thoại: 028 4546 7565 —</p>
						</div>
					</div>
					<!-- /aside widget -->

					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Quảng Ninh:</h3>
						<div id='ht'>
							<p>PHONE SHOP Quảng Ninh</p>
							<p>Địa chỉ: số 40 Trần Hưng Đạo, tp.Hạ Long, tỉnh Quảng Ninh</p>
							<p>Điện thoại: 028 5657 3437 —</p>
						</div>
					</div>
					<!-- /aside widget -->
				</div>
				<!-- /ASIDE -->
			</div>
			<!-- /row -->
			<br/><br/>
			<hr>
 		<h2 align="center">Cám ơn quý khách đã tin tưởng và ủng hộ chúng tôi</h2>
 		<br/>
		<button class="primary-btn"><a href="/">Trở lại trang chủ</a></button>
		</div>
		<!-- /container -->
	</div>
@endsection