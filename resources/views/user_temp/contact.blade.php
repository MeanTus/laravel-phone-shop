@extends('layouts.user')

@section('title','Liên hệ')

@section('show','show-on-click')

@section('content')

<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="#">Trang chủ</a></li>
				<li class="active">Liên hệ</li>
			</ul>
		</div>
	</div>
	<br/><br/>
	<div class="container">
		<div class="col-md-6">
			<h3>Vui lòng điền đầy đủ thông tin và nhập câu hỏi để gửi về PHONE SHOP</h3>
			<p>Hệ thống bán sỉ & lẻ điện thoai cao cấp, chính hãng là đơn vị chuyên cung cấp và phân phối các dòng điện thoại. Tại đây bạn có thể dễ dàng mua những chiếc điện thoại sang trọng, đẳng cấp, chất lượng cao, chính hãng... </p>
			<br><br>
			<div class="address1">
				<h3>Địa chỉ: </h3>
				<i><b>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; 180 Cao Lỗ, Phường 4, Quận 8, TPHCM</b></i>
			</div>
			<br><br>
			<div class="address1">
				<h3>Số điện thoại: <h3>
					<i><p style="color: red">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; 0949900608 - 0778850147</p></i>
			</div>
			<br><br>					
			<div class="address1">
				<h3>Email:</h3>
					<i><b>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; phammanh2508@gmail.com</b></i>
				</div>
			<br><br>
			<div class="address1">
				<h3>Giờ mở cửa: </h3>
					<i><b>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Từ 8giờ - 21giờ</b></i>
			</div>		
		</div>
		<form action="/send-mail" id="checkout-form" class="clearfix" method="post">
			@csrf
			<div class="col-md-6">
						<div class="billing-details">
							<div class="section-title">
								<h4 class="title">Hãy gửi cho chúng tôi những ý kiến đóng góp!</h4>
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
								<input class="form-control" type="text" name="name" placeholder="Họ tên">
							</div>
							<div class="form-group">
								<label>Email: </label>
								<input class="form-control" type="email" name="email" placeholder="Email">
							</div>
							<div class="form-group">
								<label>Tiêu đề: </label>
								<input class="form-control" type="text" name="title" placeholder="Tiêu đề">
							</div>
							<div class="form-group">
								<label>Nội dung: </label>
								<textarea name="content" rows="6" class="form-control" placeholder="Nội dung"></textarea>
							</div>
							
							<input class="primary-btn" type="submit" name="send" value="Gửi">
						</div>
				</div>
		</form>
		<br><br>
		<hr>
		<div>
			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15715.516809643479!2d105.75735300000001!3d10.026826!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a088476bb00027%3A0xd3c02747d1cbc8c6!2zMjg4IMSQxrDhu51uZyBOZ3V54buFbiBWxINuIExpbmgsIEjGsG5nIEzhu6NpLCBOaW5oIEtp4buBdSwgQ-G6p24gVGjGoSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2sus!4v1591976831100!5m2!1svi!2sus" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
		</div>
		<br>
	</div>
@endsection