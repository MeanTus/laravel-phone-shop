@extends('layouts.user')

@section('title','Liên hệ')

@section('show','show-on-click')

@section('content')

<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="#">Trang chủ</a></li>
				<li class="active">Giỏ hàng</li>
			</ul>
		</div>
	</div>
	<br/><br/>
	<h1 align="center">Giỏ hàng của bạn</h1>
	<br>
	<div class="table-responsive container"> 
 <table id="cart" class="table table-hover table-condensed"> 
  <thead> 
   <tr> 
    <th style="width:36%">Tên sản phẩm</th> 
    <th style="width:16%">Giá</th> 
    <th style="width:3%"></th>
    <th style="width:12%">Số lượng</th> 
    <th style="width:3%"></th>
    <th style="width:25%" class="text-center">Thành tiền</th> 
    <th style="width:5%">Cập nhật</th> 
   </tr> 
  </thead> 
  <tbody style="color: black !important">
    <?php $total=0; ?>
    @if(Session::has('cart'))
    @foreach(Session::get('cart') as $key => $cart)
    <?php 
      $subtotal=$cart['product_price']*$cart['product_qty'];
      $total += $subtotal; 
    ?>
  	<tr> 
   <td data-th="Product"> 
    <div class="row"> 
     <div class="col-sm-2 hidden-xs"><img src="/assets/uploads/product/{{ $cart['product_image'] }}" alt="" class="img-responsive" width="100">
     </div> 
     <div class="col-sm-10"> 
      <h4 class="nomargin">{{ $cart['product_name'] }}</h4>  
     </div> 
    </div> 
   </td> 
   <td data-th="Price">{{ number_format($cart['product_price']) }} đ</td> 
   <form action="/remove-cart/{{$cart['product_id']}}" method="post">
    @csrf
   <td><button 

          @if($cart['product_qty'] > 1)

          @else
            disabled
          @endif
          class="btn btn-danger btn-md" type="submit"><i class="fa fa-minus"></i></button></td>
 </form>
   <td data-th="Qualitys">  
   	<input class="form-control text-center" name="cart_qty[{{$cart['product_id']}}]" min="1" value="{{ $cart['product_qty'] }}" type="number" disabled>
	</td>
  
    <form action="/add-cart/{{$cart['product_id']}}" method="post">
      @csrf
  	<td><button type="submit" class="btn btn-info btn-md"><i class="fa fa-plus"></i></button></td>
    </form>
   <td data-th="Subtotal" class="text-center">{{number_format($subtotal)}} đ</td> 
   <td class="actions" data-th="">
    <center><a class="delete-confirm" style='color: white' href='{{ url('delete-cart/'.$cart['product_id']) }}'><button class="btn btn-danger btn-md"><i class="fa fa-trash-o"></i>
    </button></a></center>
   </td> 
  </tr> 
    @endforeach
    @else
    <td align="center" colspan="7"><i><h4>Bạn chưa thêm sản phẩm vào giỏ hàng</h4></i></td>
    @endif
   <tr> 
    <td><a href="/" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a>
    </td> 
    <td colspan="4" class="hidden-sm"> </td> 
    <td class="hidden-sm text-center"><strong><h4 style="font-size: 19px">Tổng tiền: {{ number_format($total) }} đ</h4></strong>
    </td> 
    <td><a href="/checkout" class="btn btn-success btn-block">Thanh toán <i class="fa fa-angle-right"></i></a>
    </td> 
   </tr> 
  </tbody> 
 </table>
</div>
@endsection
