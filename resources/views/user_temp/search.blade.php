@extends('layouts.user')

@section('title','Sản phẩm')

@section('show','show-on-click')

@section('content')
	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="#">Trang chủ</a></li>
				<li class="active">Sản phẩm</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- ASIDE -->
				<div id="aside" class="col-md-3">
					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Bộ lọc:</h3>
						<ul class="filter-list">
							<li><span class="text-uppercase">màu:</span></li>
							<li><a href="#" style="color:#FFF; background-color:#8A2454;">Hồng đậm</a></li>
							<li><a href="#" style="color:#FFF; background-color:#475984;">Xanh đậm</a></li>
							<li><a href="#" style="color:#FFF; background-color:#BF6989;">Hồng nhạt</a></li>
							<li><a href="#" style="color:#FFF; background-color:#9A54D8;">Tím</a></li>
						</ul>

						<ul class="filter-list">
							<li><span class="text-uppercase">Size:</span></li>
							<li><a href="#">M</a></li>
							<li><a href="#">X</a></li>
							<li><a href="#">XL</a></li>
						</ul>

						<ul class="filter-list">
							<li><span class="text-uppercase">Giá:</li>
							<li><a href="#">Trên: 1.000.000 đ</a></li>
						</ul>

						<ul class="filter-list">
							<li><span class="text-uppercase">Giới tính:</span></li>
							<li><a href="#">Nam</a></li>
							<li><a href="#">Nữ</a></li>
						</ul>

						<button class="primary-btn">Xóa bộ lọc</button>
					</div>
					<!-- /aside widget -->

					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Lọc theo giá</h3>
						<div id="price-slider"></div>
					</div>
					<!-- aside widget -->

					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Lọc theo màu:</h3>
						<ul class="color-option">
							<li><a href="#" style="background-color:#475984;"></a></li>
							<li><a href="#" style="background-color:#8A2454;"></a></li>
							<li class="active"><a href="#" style="background-color:#BF6989;"></a></li>
							<li><a href="#" style="background-color:#9A54D8;"></a></li>
							<li><a href="#" style="background-color:#675F52;"></a></li>
							<li><a href="#" style="background-color:#050505;"></a></li>
							<li><a href="#" style="background-color:#D5B47B;"></a></li>
						</ul>
					</div>
					<!-- /aside widget -->

					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Lọc theo size:</h3>
						<ul class="size-option">
							<li class="active"><a href="#">S</a></li>
							<li class="active"><a href="#">M</a></li>
							<li><a href="#">L</a></li>
							<li><a href="#">XL</a></li>
						</ul>
					</div>
					<!-- /aside widget -->

					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Lọc theo hiệu:</h3>
						<ul class="list-links">
							<li><a href="#">Tissot</a></li>
							<li><a href="#">Casio</a></li>
							<li><a href="#">Calvin Klein</a></li>
							<li><a href="#">Citizen</a></li>
						</ul>
					</div>
					<!-- /aside widget -->

					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Lọc theo giới tính:</h3>
						<ul class="list-links">
							<li class="active"><a href="#">Nam</a></li>
							<li><a href="#">Nữ</a></li>
						</ul>
					</div>
					<!-- /aside widget -->

					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Top sản phẩm:</h3>
						<!-- widget product -->
						<div class="product product-widget">
							<div class="product-thumb">
								<img src="assets/user/images/dh10_1.jpg" alt="">
							</div>
							<div class="product-body">
								<h2 class="product-name"><a href="#">Đồng hồ Casio</a></h2>
								<h3 class="product-price">2,500,000 đ<del class="product-old-price">5,000,000 đ</del></h3>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o empty"></i>
								</div>
							</div>
						</div>
						<!-- /widget product -->

						<!-- widget product -->
						<div class="product product-widget">
							<div class="product-thumb">
								<img src="assets/user/images/dh11_1.jpg" alt="">
							</div>
							<div class="product-body">
								<h2 class="product-name"><a href="#">Đồng hồ Seiko</a></h2>
								<h3 class="product-price">3,250,000 đ</h3>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o empty"></i>
								</div>
							</div>
						</div>
						<!-- /widget product -->
					</div>
					<!-- /aside widget -->
				</div>
				<!-- /ASIDE -->

				<!-- MAIN -->
				<div id="main" class="col-md-9">
					<!-- store top filter -->
					<div class="store-filter clearfix">
						<div class="pull-left">
							<div class="row-filter">
								<a href="#"><i class="fa fa-th-large"></i></a>
								<a href="#" class="active"><i class="fa fa-bars"></i></a>
							</div>
							<div class="sort-filter">
								<span class="text-uppercase">Sắp xếp theo:</span>
								<select class="input">
										<option value="0">Sản phẩm mới</option>
										<option value="0">Giá tiền</option>
										<option value="0">Đánh giá</option>
									</select>
								<a href="#" class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></a>
							</div>
						</div>
						<div class="pull-right">
							<div class="page-filter">
								<span class="text-uppercase">Hiển thị:</span>
								<select class="input">
										<option value="0">10</option>
										<option value="1">20</option>
										<option value="2">30</option>
									</select>
							</div>
							<ul class="store-pages">
								<li><span class="text-uppercase">Trang:</span></li>
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
							</ul>
						</div>
					</div>
					<!-- /store top filter -->

					<!-- STORE -->
					<div id="store">
						<!-- row -->
						<div class="row">
							<!-- Product Single -->
							@foreach($pro as $pros)
							<div class="col-md-4 col-sm-6 col-xs-6">
								<div class="product product-single">
									<form>
										@csrf
									<div class="product-thumb">
										@if($pros->product_status ==1)
											<div class="product-label">
												<span>Hot</span>
												<span class="sale">-20%</span>
											</div>
										@else
										@endif
										<a class="main-btn quick-view" href="/product-detail/{{ $pros->product_id }}">
										<i class="fa fa-search-plus"></i> Xem chi tiết
										</a>
										<img src="assets/uploads/product/{{ $pros->product_image }}" alt="">
									</div>
									<div class="product-body">
									@if($pros->product_status ==1)
										<h3 class="product-price">{{ number_format($pros->product_promotion) }} đ
										<del class="product-old-price">{{ number_format($pros->product_price) }} đ</del>
										</h3>
									@else
										<h3 class="product-price">{{ number_format($pros->product_price) }} đ 
										</h3>
									@endif
										
										<h2 class="product-name"><a href="/product-detail/{{ $pros->product_id }}">{{ $pros->product_name }}</a></h2>
										<div class="product-btns">
											<button type="button" data-id_product="{{$pros->product_id}}" class="main-btn icon-btn add-t"><i class="fa fa-heart"></i></button>
											
											<button type="button" class="primary-btn add-to-cart" data-id_product="{{$pros->product_id}}"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
										</div>
									</form>
									</div>
								</div>
							</div>
							<!-- /Product Single -->

							<div class="clearfix visible-sm visible-xs"></div>
							@endforeach
						</div>
						<!-- /row -->
					</div>
					<!-- /STORE -->

					<!-- store bottom filter -->
					<div class="store-filter clearfix">
						<div class="pull-left">
							<div class="row-filter">
								<a href="#"><i class="fa fa-th-large"></i></a>
								<a href="#" class="active"><i class="fa fa-bars"></i></a>
							</div>
							<div class="sort-filter">
								<span class="text-uppercase">Sắp xếp theo:</span>
								<select class="input">
										<option value="0">Sản phẩm mới</option>
										<option value="0">Giá tiền</option>
										<option value="0">Đánh giá</option>
									</select>
								<a href="#" class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></a>
							</div>
						</div>
						<div class="pull-right">
							<div class="page-filter">
								<span class="text-uppercase">Hiển thị:</span>
								<select class="input">
										<option value="0">10</option>
										<option value="1">20</option>
										<option value="2">30</option>
									</select>
							</div>
							<ul class="store-pages">
								<li><span class="text-uppercase">Trang:</span></li>
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
							</ul>
						</div>
					</div>
					<!-- /store bottom filter -->
				</div>
				<!-- /MAIN -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
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
