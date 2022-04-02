@extends('layouts.user')

@section('title','Trang chủ')

@section('content')
	<div id="home">
		<!-- container -->
		<div class="container">
			<!-- home wrap -->
			<div class="home-wrap">
				<!-- home slick -->
				<div id="home-slick">
					<!-- banner -->

					@foreach($slide as $slides)
					<div class="banner banner-1">
						<img src="/assets/user/images/slide/{{ $slides->image }}" alt="">
						
						<div class="banner-caption">
							<button class="primary-btn">Xem ngay</button>
						</div>
					</div>
					@endforeach
				</div>
				<!-- /home slick -->
			</div>
			<!-- /home wrap -->
		</div>
		<!-- /container -->
	</div>
	
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- banner -->
				<div class="col-md-4 col-sm-6">
					<a class="banner banner-1 banner-head" href="#">
						<img src="/assets/user/images/iphone.jpg" alt="">
						<div class="banner-caption text-center">
							<h2 class="white-color">IPHONE</h2>
						</div>
					</a>
				</div>
				<!-- /banner -->

				<!-- banner -->
				<div class="col-md-4 col-sm-6">
					<a class="banner banner-1 banner-head" href="#">
						<img src="/assets/user/images/samsung.jpg" alt="">
						<div class="banner-caption text-center">
							<h2 class="white-color">SAMSUNG</h2>
						</div>
					</a>
				</div>
				<!-- /banner -->

				<!-- banner -->
				<div class="col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-3">
					<a class="banner banner-1 banner-head" href="#">
						<img src="/assets/user/images/oppo.jpg" alt="">
						<div class="banner-caption text-center">
							<h2 class="white-color">OPPO</h2>
						</div>
					</a>
				</div>
				<!-- /banner -->

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section-title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Hàng mới giảm giá</h2>
						<div class="pull-right">
							<div class="product-slick-dots-1 custom-dots"></div>
						</div>
					</div>
				</div>
				<!-- /section-title -->

				<!-- banner -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="banner banner-2">
						<img style="opacity: 0.7" src="/assets/user/images/ippp.png" alt="">
						<div class="banner-caption">
							<h2 style="color: orangered">Hàng<br>nhập khẩu</h2>
							<button class="primary-btn">Xem ngay</button>
						</div>
					</div>
				</div>
				<!-- /banner -->

				<!-- Product Slick -->
				<div class="col-md-9 col-sm-6 col-xs-6">
					<div class="row">
						<div id="product-slick-1" class="product-slick">
							<!-- Product Single -->
							@foreach($pro1 as $pro1s)
							<div class="product product-single">
								<form>
									@csrf
								<div class="product-thumb">
									<div class="product-label">
										<span>HOT</span>
										<span class="sale">SALE</span>
									</div>
									<ul class="product-countdown">
										<li><span>30 H</span></li>
										<li><span>00 M</span></li>
										<li><span>00 S</span></li>
									</ul>
									<a class="main-btn quick-view" href="/product-detail/{{ $pro1s->product_id }}">
									<i class="fa fa-search-plus"></i> Xem chi tiết</a>
									<img src="/assets/uploads/product/{{ $pro1s->product_image }}" alt="">
								</div>
								<div class="product-body">
									@if($pro1s->product_status ==1)
										<h3 class="product-price">{{ number_format($pro1s->product_promotion) }} đ
										<del class="product-old-price">{{ number_format($pro1s->product_price) }} đ</del>
										</h3>
									@else
										<h3 class="product-price">{{ number_format($pro1s->product_price) }} đ 
										</h3>
									@endif
									
									<h2 class="product-name"><a href="/product-detail/{{ $pro1s->product_id }}">{{ $pro1s->product_name }}</a></h2>
									<div class="product-btns">
										<button type="button" data-id_product="{{$pro1s->product_id}}" class="main-btn icon-btn add-t"><i class="fa fa-heart"></i></button>
										
										<button type="button" data-id_product="{{$pro1s->product_id}}" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
									</div>
								</div>
								</form>
							</div>
							@endforeach
							<!-- /Product Single -->
						</div>
					</div>
				</div>
				<!-- /Product Slick -->
			</div>
			<!-- /row -->

			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Giảm giá siêu khủng</h2>
						<div class="pull-right">
							<div class="product-slick-dots-2 custom-dots">
							</div>
						</div>
					</div>
				</div>
				<!-- section title -->

				<!-- Product Single -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="product product-single product-hot">
						<div class="product-thumb">
							<div class="product-label">
								<span class="sale">-20%</span>
							</div>
							<ul class="product-countdown">
								<li><span>40 H</span></li>
								<li><span>00 M</span></li>
								<li><span>00 S</span></li>
							</ul>
							<a class="main-btn quick-view" href="/product-type">
							<i class="fa fa-search-plus"></i> Xem chi tiết
							</a>
							<img src="/assets/user/images/dh6_1.jpg" alt="">
						</div>
						<div class="product-body">
							<h3 class="product-price">9.000.000 đ <del class="product-old-price">12.000.000 đ</del></h3>
							
							<h2 class="product-name"><a href="#">IPHONE XS MAX</a></h2>
							<div class="product-btns">
								<a href="/product-type" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Xem ngay</a>
							</div>
						</div>
					</div>
				</div>
				<!-- /Product Single -->

				<!-- Product Slick -->
				<div class="col-md-9 col-sm-6 col-xs-6">
					<div class="row">
						<div id="product-slick-2" class="product-slick">
							<!-- Product Single -->
							@foreach($pro1 as $pro1s)
							<div class="product product-single">
								<form>
									@csrf
								<div class="product-thumb">
									<div class="product-label">
										<span>HOT</span>
										<span class="sale">SALE</span>
									</div>
									<ul class="product-countdown">
										<li><span>30 H</span></li>
										<li><span>00 M</span></li>
										<li><span>00 S</span></li>
									</ul>
									<a class="main-btn quick-view" href="/product-detail/{{ $pro1s->product_id }}">
									<i class="fa fa-search-plus"></i> Xem chi tiết</a>
									<img src="/assets/uploads/product/{{ $pro1s->product_image }}" alt="">
								</div>
								<div class="product-body">
									@if($pro1s->product_status ==1)
										<h3 class="product-price">{{ number_format($pro1s->product_promotion) }} đ
										<del class="product-old-price">{{ number_format($pro1s->product_price) }} đ</del>
										</h3>
									@else
										<h3 class="product-price">{{ number_format($pro1s->product_price) }} đ 
										</h3>
									@endif
									
									<h2 class="product-name"><a href="/product-detail/{{ $pro1s->product_id }}">{{ $pro1s->product_name }}</a></h2>
									<div class="product-btns">
										<button type="button" data-id_product="{{$pro1s->product_id}}" class="main-btn icon-btn add-t"><i class="fa fa-heart"></i></button>
										
										<button type="button" data-id_product="{{$pro1s->product_id}}" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
									</div>
								</div>
							</form>
							</div>
							@endforeach
							<!-- /Product Single -->

						</div>
					</div>
				</div>
				<!-- /Product Slick -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	
	<div class="section section-grey">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- banner -->
				<div class="col-md-8">
					<div class="banner banner-1 banner-head">
						<img src="/assets/user/images/ss1.jpg" alt="">
						<div class="banner-caption text-center">
							<h1 class="primary-color"><br><span style="color: #FE2E2E" class=" font-weak"></span></h1>
							
						</div>
					</div>
				</div>
				<!-- /banner -->

				<!-- banner -->
				<div class="col-md-4 col-sm-6">
					<a class="banner banner-1" href="#">
						<img src="/assets/user/images/ss2.jpg" alt="">
						<div class="banner-caption text-center">
							<h2 class="white-color"></h2>
						</div>
					</a>
				</div>
				<!-- /banner -->

				<!-- banner -->
				<div class="col-md-4 col-sm-6">
					<a class="banner banner-1" href="#">
						<img src="/assets/user/images/ss3.jpg" alt="">
						<div class="banner-caption text-center">
							<h2 class="white-color"></h2>
						</div>
					</a>
				</div>
				<!-- /banner -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>

	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Sản phẩm mới</h2>
					</div>
				</div>
				<!-- section title -->

				<!-- Product Single -->
				@foreach($pro2 as $pro2s)
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="product product-single">
						<form>
							@csrf
						<div class="product-thumb">
							<a class="main-btn quick-view" href="/product-detail/{{ $pro2s->product_id }}">
							<i class="fa fa-search-plus"></i> Xem chi tiết</a>
							<img src="/assets/uploads/product/{{ $pro2s->product_image }}" alt="">
						</div>
						<div class="product-body">
								<h3 class="product-price">{{ number_format($pro2s->product_price) }} đ
								</h3>
							
							<h2 class="product-name"><a href="/product-detail/{{ $pro2s->product_id }}">{{ $pro2s->product_name }}</a></h2>
							<div class="product-btns">
								<button type="button" data-id_product="{{$pro2s->product_id}}" class="main-btn icon-btn add-t"><i class="fa fa-heart"></i></button>
								
								<button type="button" data-id_product="{{$pro2s->product_id}}" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
							</div>
						</div>
					</form>
					</div>
				</div>
				@endforeach
				<!-- /Product Single -->
			</div>
			<!-- /row -->

			<!-- row -->
			<div class="row">
				<!-- banner -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="banner banner-2">
						<img src="/assets/user/images/banner15.jpg" alt="">
						<div class="banner-caption">
							<h2 class="white-color">Hàng mới được <br> nhập khẩu</h2>
							<button class="primary-btn">Xem ngay</button>
						</div>
					</div>
				</div>
				<!-- /banner -->

				<!-- Product Single -->
				@foreach($pro3 as $pro3s)
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="product product-single">
						<form>
							@csrf
						<div class="product-thumb">
							<a class="main-btn quick-view" href="/product-detail/{{ $pro3s->product_id }}">
							<i class="fa fa-search-plus"></i> Xem chi tiết
							</a>
							<img src="/assets/uploads/product/{{ $pro3s->product_image }}" alt="">
						</div>
						<div class="product-body">
							<h3 class="product-price">{{ number_format($pro3s->product_price) }} đ</h3>
							
							<h2 class="product-name"><a href="/product-detail/{{ $pro3s->product_id }}">{{ $pro3s->product_name }}</a></h2>
							<div class="product-btns">
								<button type="button" data-id_product="{{$pro3s->product_id}}" class="main-btn icon-btn add-t"><i class="fa fa-heart"></i></button>
								
								<button type="button" data-id_product="{{$pro3s->product_id}}" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
							</div>
						</div>
					</form>
					</div>
				</div>
				@endforeach
				<!-- /Product Single -->
			</div>
			<!-- /row -->

			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Gợi ý cho bạn</h2>
					</div>
				</div>
				<!-- section title -->

				<!-- Product Single -->
				@foreach($pro2 as $pro2s)
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="product product-single">
						<form>
							@csrf
						<div class="product-thumb">
							<a class="main-btn quick-view" href="/product-detail/{{ $pro2s->product_id }}">
							<i class="fa fa-search-plus"></i> Xem chi tiết
							</a>
							<img src="/assets/uploads/product/{{ $pro2s->product_image }}" alt="">
						</div>
						<div class="product-body">
							<h3 class="product-price">{{ number_format($pro2s->product_price) }} đ</h3>
							
							<h2 class="product-name"><a href="/product-detail/{{ $pro2s->product_id }}">{{ $pro2s->product_name }}</a></h2>
							<div class="product-btns">
								<button type="button" data-id_product="{{$pro2s->product_id}}" class="main-btn icon-btn add-t"><i class="fa fa-heart"></i></button>
								
								<button type="button" data-id_product="{{$pro2s->product_id}}" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
							</div>
						</div>
					</form>
					</div>
				</div>
				@endforeach
				<!-- /Product Single -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
@endsection
@section('script')
	<script type="text/javascript">
		$(document).ready(function(){
			$('.add-to-cart').click(function(){
				var id = $(this).data('id_product');
				var _token = $('input[name="_token"]').val();

				$.ajax({
                    url: '{{url('/add-cart')}}',
                    method: 'POST',
                    data:{id:id,_token:_token},
                    
                    success: function(data) {
                    	$('#cart').load(window.location.href + " #cart");
				        swal({
                                title: "Đã thêm sản phẩm vào giỏ hàng",
                                text: "Bạn có thể đi tới giỏ hàng để tiến hành thanh toán",
                                showCancelButton: true,
                                cancelButtonText: "Xem tiếp",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "Đi đến giỏ hàng",
                                closeOnConfirm: false
                            },
                            function() {
                                window.location.href = "{{url('/cart')}}";
                            });
				    }

				});
		});
			$('.add-t').click(function(){
				var id = $(this).data('id_product');
				var _token = $('input[name="_token"]').val();
				$.ajax({
                    url: '{{url('/add-list')}}',
                    method: 'POST',
                    data:{id:id,_token:_token},
                    
                    success: function(data) {
				        swal({
                                title: "Đã thêm sản phẩm vào danh sách yêu thích",
                                text: "Bạn có thể xem danh sách yêu thích",
                                showCancelButton: true,
                                cancelButtonText: "Không",
                                confirmButtonClass: "btn-primary",
                                confirmButtonText: "Danh sách yêu thích",
                                closeOnConfirm: false
                            },
                            function() {
                                window.location.href = "{{url('/wishlist-detail')}}";
                            });
				    }

				});
		});
	});
</script>
@endsection