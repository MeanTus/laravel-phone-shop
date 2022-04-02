@extends('layouts.user')

@section('title','Giới thiệu')

@section('show','show-on-click')

@section('content')

<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="#">Trang chủ</a></li>
				<li class="active">Giới thiệu</li>
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
				<!-- MAIN -->
				<div id="main">

					<!-- STORE -->
					<div id="store">
						<!-- row -->
						<h1>Cửa hàng điện thoại</h1>
						<div class="row">
							
							<div class="col-sm-8">
								<p>Khởi đầu kinh doanh từ năm 2005, Công ty TNHH MTV ABC bắt đầu xây dựng chuỗi hệ thống cửa hàng trưng bày và giới thiệu các sản phẩm điện thoại chính hãng tại thị trường Việt Nam. Cửa hàng PHONE STORE được công ty chúng tôi phát triển và đã chính thức đăng ký bảo hộ thương hiệu với Cục Sở Hữu Trí Tuệ, mục tiêu kinh doanh của PHONE STORE là cung cấp tới Khách hàng các sản phẩm Đồng hồ tốt chính hãng. Với tiêu trí kinh doanh bền vững, xây dựng uy tín dài lâu. WATCH SHOP cam kết, tất cả đồng hồ được bán trực tiếp tại hệ thống các cửa hàng của chúng tôi và bán Online đều là hàng chính hãng 100%, chất lượng mới 100% được nhập khẩu nguyên chiếc từ bản hãng, có xuất xứ kèm theo, có đầy đủ phụ kiện, có Thẻ/Sổ bảo hành Quốc tế đảm bảo đầy đủ quyền lợi bảo hành được qui định bởi bản hãng.</p>
							</div>
							<div style="border: solid 2px" class="col-sm-4">
								<img src="/assets/user/images/logo.png" height="100px" width="100%">
							</div>							
						</div>
						<!-- /row -->
						<br><br><br><br>
						<!-- row -->
						<h1 align="right">Đối tác chình thức</h1>
						<div class="row">
							<div class="col-sm-4">
								<img src="assets/user/images/logo.png" height="100px" width="100%">

							</div>
							<div class="col-sm-8">
								<p>Chúng tôi tự hào được các dòng điện thoại cũng như các nhà Phân phối uỷ quyền là đối tác chính thức tại Việt Nam của nhiều dòng điện thoại cao cấp, điện thoại quốc tế uy tín như: IPHONE, OPPO, SAMSUNG, vv...</p>
							</div>
							</div>

											
							
							<br><br><br><br>
						<!-- row -->
						<h1 align="center">Bán hàng Online</h1>
						<div class="row">
							<p>Bên cạch chuỗi các cửa hàng trên, chúng tôi phát triển Website bán hàng trực tuyến tại địa chỉ: www.phonestore.com.vn nhằm mang đến cho khách hàng thêm một lựa chọn mua sắm tiện ích, tiết kiệm thời gian, dễ dàng chọn lựa khi có nhu cầu tìm mua một chiếc điện thoại tốt chính hãng. Trang web www.phonestore.com.vn được xây dựng với giao diện sang trọng thể hiện chất lượng của sản phẩm đang bán cũng như tiêu chí kinh doanh chuẩn mực, với tính năng đặt hàng online được tích hợp sẵn cho từng sản phẩm, khách hàng sẽ nhận được phản hồi nhanh chóng từ chúng tôi khi gửi cho chúng tôi "Đơn đặt hàng" trực tiếp từ website.</p>
						</div>
						<!-- /row -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /MAIN -->
			</div>
			<br/><br/><br><br>
 		<h2 align="center">Cám ơn quý khách đã tin tưởng và ủng hộ chúng tôi</h2>
 		<br/>
		<button class="primary-btn"><a href="/">Trở lại trang chủ</a></button>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
	<div class="container">
    <div class="view-account">
        <section class="module">
            <div class="module-inner">
                <div class="side-bar">
                    <div class="user-info">
                        <img class="img-profile img-circle img-responsive center-block" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                        <ul class="meta list list-unstyled">
                            <li class="name">Rebecca Sanders
                                <label class="label label-info">UX Designer</label>
                            </li>
                            <li class="email"><a href="#">Rebecca.S@website.com</a></li>
                            <li class="activity">Last logged in: Today at 2:18pm</li>
                        </ul>
                    </div>
            		<nav class="side-menu">
        				<ul class="nav">
        					<li class="active"><a href="#"><span class="fa fa-user"></span> Profile</a></li>
        					<li><a href="#"><span class="fa fa-cog"></span> Settings</a></li>
        					<li><a href="#"><span class="fa fa-credit-card"></span> Billing</a></li>
        					<li><a href="#"><span class="fa fa-envelope"></span> Messages</a></li>
        					
        					<li><a href="user-drive.html"><span class="fa fa-th"></span> Drive</a></li>
        					<li><a href="#"><span class="fa fa-clock-o"></span> Reminders</a></li>
        				</ul>
        			</nav>
                </div>
                <div class="content-panel">
                    <h2 class="title">Profile<span class="pro-label label label-warning">PRO</span></h2>
                    <form class="form-horizontal">
                        <fieldset class="fieldset">
                            <h3 class="fieldset-title">Personal Info</h3>
                            <div class="form-group avatar">
                                <figure class="figure col-md-2 col-sm-3 col-xs-12">
                                    <img class="img-rounded img-responsive" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                                </figure>
                                <div class="form-inline col-md-10 col-sm-9 col-xs-12">
                                    <input type="file" class="file-uploader pull-left">
                                    <button type="submit" class="btn btn-sm btn-default-alt pull-left">Update Image</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">User Name</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" value="Rebecca">
                                </div>
                            </div>
        
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">First Name</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" value="Rebecca">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">Last Name</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" value="Sanders">
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="fieldset">
                            <h3 class="fieldset-title">Contact Info</h3>
                            <div class="form-group">
                                <label class="col-md-2  col-sm-3 col-xs-12 control-label">Email</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="email" class="form-control" value="Rebecca@website.com">
                                    <p class="help-block">This is the email </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2  col-sm-3 col-xs-12 control-label">Twitter</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" value="SpeedyBecky">
                                    <p class="help-block">Your twitter username</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2  col-sm-3 col-xs-12 control-label">Linkedin</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="url" class="form-control" value="https://www.linkedin.com/in/manh">
                                    <p class="help-block">eg. https://www.linkedin.com/in/yourname</p>
                                </div>
                            </div>
                        </fieldset>
                        <hr>
                        <div class="form-group">
                            <div class="col-md-10 col-sm-9 col-xs-12 col-md-push-2 col-sm-push-3 col-xs-push-0">
                                <input class="btn btn-primary" type="submit" value="Update Profile">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection