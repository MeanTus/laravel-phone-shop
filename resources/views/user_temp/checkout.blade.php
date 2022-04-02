@extends('layouts.user')

@section('title','Liên hệ')

@section('show','show-on-click')

@section('content')

<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="#">Trang chủ</a></li>
				<li class="active">Thanh toán</li>
			</ul>
		</div>
	</div>
	<br/><br/>
	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<form id="checkout-form" class="clearfix" action="/save-checkout" method="post">
					@csrf
					<div class="col-md-6">
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Thông tin thanh toán</h3>
							</div>

							@if (count($errors)>0) 
						      @foreach($errors->all() as $errors)
						      <div class="alert alert-danger">
						        <strong>Cảnh báo! </strong>
						          {{ $errors }}
						      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						        <span aria-hidden="true">&times;</span>
						      </button>
						      </div>
						      @endforeach  
						      <br/> 
						  	@endif

							<div class="form-group">
								<label>Họ tên: </label>
								<input class="input" type="text" name="name" placeholder="Nhập họ tên" value="{{Auth::user()->name}}">
							</div>
							<div class="form-group">
								<label>Email: </label>
								<input readonly class="input" type="email" name="email" placeholder="Nhập Email" value="{{Auth::user()->email}}">
							</div>
							<div class="form-group">
								<label>Địa chỉ: </label>
								<input class="input" type="text" name="address" placeholder="Nhập địa chỉ">
							</div>
							<div class="form-group">
								<label>Số điện thoại</label>
								<input class="input" type="text" name="phone" placeholder="Nhập số điện thoại" value="{{Auth::user()->phone_number}}">
							</div>
						</div>
					</div>

					<div class="col-md-6">
						<div class="shiping-methods">
							<div class="section-title">
								<h4 class="title">Phương thức giao hàng</h4>
							</div>
							<div class="input-checkbox">
								<input type="radio" class="ship" name="shipping" id="shipping-1" value="30000">
								<label for="shipping-1">Ship thường - 30.000 đ</label>
								<div class="caption">
									<p>Chúng tôi sẽ chuyển hàng cho bạn từ 2-3 ngày tùy địa điểm.<p>
								</div>
							</div>
							<div class="input-checkbox">
								<input type="radio" class="ship" name="shipping" id="shipping-2" value="100000">
								<label for="shipping-2">Ship siêu tốc - 100.000 đ</label>
								<div class="caption">
									<p>Chúng tôi sẽ chuyển hàng cho bạn trong vòng 24h kể từ khi đặt hàng thành công.<p>
								</div>
							</div>
						</div>

						<div class="payments-methods">
							<div class="section-title">
								<h4 class="title">Phương thức thanh toán</h4>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="payments" id="payments-1" checked>
								<label for="payments-1">Tiền mặt</label>
								<div class="caption">
									<p>Trả tiền mặt khi nhận được hàng.<p>
								</div>
							</div>
							<div class="input-checkbox">
								<input disabled type="radio" name="payments" id="payments-2">
								<label for="payments-2"><del>Chuyển khoản</del></label>
							</div>
							<div class="input-checkbox">
								<input disabled type="radio" name="payments" id="payments-3">
								<label for="payments-3"><del>ATM</del></label>
							</div>
						</div>
					</div>

					<div class="col-md-12">
						<div class="order-summary clearfix">
							<div class="section-title">
								<h3 class="title">Chi tiết giỏ hàng</h3>
							</div>
							<table class="shopping-cart-table table">
								<thead>
									<tr>
										
										<th>Sản phẩm</th>
										<th></th>
										<th class="text-center">Giá tiền</th>
										<th class="text-center">Số lượng</th>
										<th class="text-center">Thành tiền</th>
										<th class="text-right"></th>
									</tr>
								</thead>
								<tbody>
									<?php $total=0; ?>
									@if(Session::has('cart'))
									@foreach(Session::get('cart') as $key => $cart)
									<?php 
									$subtotal=$cart['product_price']*$cart['product_qty'];
									$total += $subtotal; 
									?>
									<tr>
										<input type="hidden" name="product_id" value="{{ $cart['product_id'] }}">
										<td><img src="/assets/uploads/product/{{ $cart['product_image'] }}" width="100px"></td>
										<td class="details">
											<input type="hidden" name="product_name" value="{{ $cart['product_name'] }}">
											<h4>{{ $cart['product_name'] }}</h4>
										</td>
										<td class="price text-center">
											<input type="hidden" name="product_price" value="{{ $cart['product_price'] }}">
											<strong>{{ number_format($cart['product_price']) }} đ</strong>
										</td>
										<td class="qty text-center">
											<input readonly class="input text-center" name="product_qty" type="number" value="{{ $cart['product_qty'] }}">
										</td>
										<td class="total text-center"><strong class="primary-color">{{number_format($subtotal)}} đ</strong></td>
										<td class="text-right"><a href="{{ url('delete-cart/'.$cart['product_id']) }}" class="main-btn icon-btn"><i class="fa fa-close"></i></a></td>
									</tr>
									@endforeach
									@else
									<tr>
										<td colspan="7" align="center">
											<h4>Bạn chưa có sản phẩm nào trong giỏ hàng</h4>
										</td>
									</tr>
									@endif
								</tbody>
								<tfoot>
									<tr>
										<th class="empty" colspan="3"></th>
										<th>THÀNH TIỀN</th>
										<th colspan="2" class="sub-total">{{ number_format($total) }} đ</th>
										<input type="hidden" id="sub-total" name="total" value="{{$total}}">
									</tr>
									<tr>
										<th class="empty" colspan="3"></th>
										<th>SHIPPING</th>
										<td colspan="2" id="fee">Ship thường</td>
									</tr>
									<tr>
										<th class="empty" colspan="3"></th>
										<th>TỔNG TIỀN</th>
										<th colspan="2" class="total" id="total">{{ number_format($total) }} đ</th>
									</tr>
								</tfoot>
							</table>
							<div class="pull-right">
								<button type="submit" class="primary-btn">Thanh toán</button>
							</div>
						</div>

					</div>
				</form>
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
			$('.ship').change(function(){
				if ($(this).is(':checked')) {
		          $(this).attr('checked');
		        }
		        else{
		          $(this).removeAttr('checked');
		        }
			var ship = $(this).val();
			var sub_total = $('#sub-total').val();
			var total = parseInt(ship) + parseInt(sub_total);
			total = total.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
			if(ship == 30000){
				document.getElementById("fee").innerHTML = "Ship thường";
				document.getElementById('total').innerText = total; 
			}
			else{
				document.getElementById("fee").innerHTML = "Ship siêu tốc";
				document.getElementById('total').innerText = total; 
			}
		});
	});
</script>
@endsection
