@extends('layouts.user')

@section('title','Chi tiết sản phẩm')

@section('show','show-on-click')

@section('content')
	<!-- BREADCRUMB --> 
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="#">Trang chủ</a></li>
				<li><a href="#">Sản phẩm</a></li>
				<li class="active">{{ $pro->product_name }}</li>
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
				<!--  Product Details -->
				<div class="product product-details clearfix">
					<div class="col-md-6">
						<div id="product-main-view">
							@foreach($prod as $prods)
							<div class="product-view">
								<img src="/assets/uploads/product/{{ $prods->image_detail }}" alt="">
							</div>
							@endforeach
						</div>
						<div id="product-view">
							@foreach($prod as $prods)
							<div class="product-view">
								<img src="/assets/uploads/product/{{ $prods->image_detail }}" alt="">
							</div>
							@endforeach
						</div>
					</div>
					<div class="col-md-6">
						<div class="product-body">
							<form>
								@csrf
							<input class="cart_product_id" type="hidden" value="{{$pro->product_id}}">
							@if($pro->product_status == 1)
								<div class="product-label">
									<span>Hot</span>
									<span class="sale">SALE</span>
								</div>
							@else

							@endif 
							<h2 class="product-name">{{ $pro->product_name }}</h2>
							<h3 class="product-price">{{ number_format($pro->product_price) }} đ
							@if($pro->product_status == 1) 
								<del class="product-old-price">{{ number_format($pro->product_promotion) }} đ</del>
							@else

							@endif
							</h3>
							<div>
								<div class="product-rating">
									@for($i=0;$i<round($avg,0);$i++)
										<i class="fa fa-star"></i>
									@endfor
									@for($j=0;$j<5-round($avg,0);$j++)
										<i class="fa fa-star-o empty"></i>
									@endfor
								</div>
								<b>( {{$dem}} đánh giá )</b>
							</div>
							<p><strong>Tình trạng:</strong> 
							@if($pro->product_qty > 0)
								Còn hàng
							@else
								Hết hàng
							@endif
							</p>
							<p><strong>Thương hiệu:</strong>
								@foreach($brand as $brands)
									@if($brands->brand_id == $pro->brand_id)
										{{ $brands->brand_name }}
									@endif
								@endforeach
							</p>
							<p>{{ $pro->product_intro }}</p>
							<div class="product-options">
								<ul class="size-option">
									<li><span class="text-uppercase">Sản phẩm còn: </span></li>
									<li class="active">{{$pro->product_qty}}</li>
								</ul>
								<ul class="color-option">
									<li><span class="text-uppercase">Danh mục: </span></li>
									<li class="active">
									@foreach($cat as $cats)
										@if($cats->cat_id == $pro->cat_id)
											{{ $cats->cat_name }}
										@endif
									@endforeach
									</li>
								</ul>
							</div>

							<div class="product-btns">
								<div class="qty-input">
									<span class="text-uppercase">Số lượng: </span>
									<input id="num" class="input" name="cart_qty" type="number" min="1" value="1">
								</div>
								<button type="button" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
								<div class="pull-right">
									<button type="button" data-id_product="{{$pro->product_id}}" class="main-btn icon-btn add-t"><i class="fa fa-heart"></i></button>
									<a href="#" class="main-btn icon-btn"><i class="fa fa-share-alt"></i></a>
								</div>
							</div>
							</form>
						</div>
					
					</div>
					<div class="col-md-12">
						<div class="product-tab">
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Mô tả</a></li>
								<li><a data-toggle="tab" href="#tab2">Đánh giá</a></li>
							</ul>
							<div class="tab-content">
								<div id="tab1" class="tab-pane fade in active">
									<p>{{ $pro->product_describe }}</p>
								</div>
								<div id="tab2" class="tab-pane fade in">

									<div class="row">
										<div class="col-md-6">
											<div class="product-reviews">
												@foreach($cmt as $cmts)
												<div class="single-review">
													<div class="review-heading">
														<div><b><i class="fa fa-user-o"></i> {{$cmts->name}}</b></div>
														<div><span><i class="fa fa-clock-o"></i> {{ date('d-m-Y H:m:s', strtotime($cmts->created_at))}}</spa></div>
														<div class="review-rating pull-right">
															@for($i=0;$i<$cmts->rating;$i++)
															<i class="fa fa-star"></i>
															@endfor
															@for($j=0;$j<5-$cmts->rating;$j++)
															<i class="fa fa-star-o empty"></i>
															@endfor
														</div>
													</div>
													<div class="review-body">
														<p>{{$cmts->content}}</p>
													</div>
												</div>
												@endforeach

												{{-- <ul class="reviews-pages">
													<li class="active">1</li>
													<li><a href="#">2</a></li>
													<li><a href="#">3</a></li>
													<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
												</ul> --}}
											</div>
										</div>
										<div class="col-md-6">
											<h4 class="text-uppercase">Đánh giá của bạn</h4>
											<p>Email của bạn sẽ không công khai.</p>
											@if(Auth::check())
											<form class="review-form">
												@csrf
												<div class="form-group">
													<input id="name" class="input" type="text" placeholder="Tên của bạn" value="{{Auth::user()->name}}" required />
												</div>
												<div class="form-group">
													<input readonly class="input" type="email" value="{{Auth::user()->email}}" />
												</div>
												<div class="form-group">
													<textarea id="content" class="input" placeholder="Bình luận" required></textarea>
												</div>
												<div class="form-group">
													<div class="input-rating">
														<strong class="text-uppercase">Đánh giá sao: </strong>
														<div class="stars">
															<input class="rating" type="radio" id="star5" name="rating" value="5" /><label for="star5"></label>
															<input class="rating" type="radio" id="star4" name="rating" value="4" /><label for="star4"></label>
															<input class="rating" type="radio" id="star3" name="rating" value="3" /><label for="star3"></label>
															<input class="rating" type="radio" id="star2" name="rating" value="2" /><label for="star2"></label>
															<input class="rating" type="radio" id="star1" name="rating" value="1" /><label for="star1"></label>
														</div>
													</div>
												</div>
												<button type="button" data-id_product="{{$pro->product_id}}" class="primary-btn cmt">Đăng</button>
											</form>
											@else
												<a href="/login" class="primary-btn">Đăng nhập</a>
												<br/><br/>
												<h4>Bạn cần phải đăng nhập để sử dụng tính năng bình luận</h4>
											@endif
										</div>
									</div>



								</div>
							</div>
						</div>
					</div>

				</div>
				<!-- /Product Details -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
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
						<div class="product-thumb">
							<a href="/product-detail/{{ $pro2s->product_id }}">
							<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Xem chi tiết</button>
							</a>
							<img src="/assets/uploads/product/{{ $pro2s->product_image }}" alt="">
						</div>
						<div class="product-body">
							<h3 class="product-price">{{ number_format($pro2s->product_price) }} đ</h3>
							<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o empty"></i>
							</div>
							<h2 class="product-name"><a href="/product-detail/{{ $pro2s->product_id }}">{{ $pro2s->product_name }}</a></h2>
							<div class="product-btns">
								<a href="/product-detail/{{ $pro2s->product_id }}" class="primary-btn"><i class="fa fa-shopping-cart"></i> Xem ngay</a>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				<!-- /Product Single -->
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
				var id = $('.cart_product_id').val();
				var num = $('#num').val();
				var _token = $('input[name="_token"]').val();

				$.ajax({
                    url: '{{url('/add-multi')}}',
                    method: 'POST',
                    data:{id:id,num:num,_token:_token},
                    
                    success: function(data) {
                    	$('#cart').load(window.location.href + " #cart");
				        swal({
                                title: "Đã thêm sản phẩm vào giỏ hàng",
                                text: "Bạn có thể đi tới giỏ hàng để tiến hành thanh toán",
                                showCancelButton: true,
                                cancelButtonText: "Không",
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

		$('.cmt').click(function(){
				var id = $(this).data('id_product');
				var _token = $('input[name="_token"]').val();
				var name = $('#name').val();
				var content = $('#content').val();
				var star = $('.rating:checked').val();
				$.ajax({
                    url: '{{url('/add-cmt')}}',
                    method: 'POST',
                    data:{id:id,_token:_token,name:name,content:content,star:star},
                    
                    success: function(data) {
				        swal({
                                title: "Bình luận sản phẩm thành công!",
                                text: "Bình luận của bạn đang đợi Admin xét duyệt",
                                showCancelButton: false,
                                confirmButtonClass: "btn-primary",
                                confirmButtonText: "Xác nhận",
                                closeOnConfirm: false
                            });
				    }

				});
		});
	});
	</script>
@endsection