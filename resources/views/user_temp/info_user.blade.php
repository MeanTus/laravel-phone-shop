@extends('layouts.user')

@section('title','Thông tin cá nhân')

@section('css')
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 25%;
  border-radius: 5px;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

img {
  border-radius: 5px 5px 0 0;
}

.name {
  padding: 7px 16px;
}
@endsection

@section('show','show-on-click')

@section('content')

<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="#">Trang chủ</a></li>
				<li class="active">Tài khoản</li>
			</ul>
		</div>
	</div>
	<br/><br/>
<div class="container">
        <h1>Thông tin tài khoản</h1>
        <br/>
        <div class="">
            <center>
            <div class="card">
              <img src="/assets/uploads/user/{{Auth::user()->avatar}}" alt="Avatar" style="width:100%">
              <div class="name">
                <h3><b>{{Auth::user()->name}}</b></h3> 
                <div style="width:30%;background:aqua;color: white;border-radius: 5px;font-size: 22px;font-weight: bolder">{{Auth::user()->role}}</div> 
              </div>
            </div>
        </center>
        </div>
        <br/><br/>
        <ul class="nav nav-pills nav-justified">
      <li class="nav-item active">
        <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home">Thông tin tài khoản</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile">Thông tin đơn hàng</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="col-md-3">
            <div class="section-title">
                <h3 class="title">Thông tin</h3>
            </div>
        </div>
        <div class="col-md-6">
            <form id="checkout-form" class="clearfix" action="/save-user/{{Auth::id()}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <div class="billing-details">
                            <br><br><br><br>

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
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Họ tên: </label>
                                <input class="input" type="text" name="user_name" placeholder="Nhập họ tên" value="{{Auth::user()->name}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Tài khoản: </label>
                                <input disabled class="input" type="text" name="account" placeholder="Tài khoản" value="{{Auth::user()->username}}">
                            </div>
                        </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Email: </label>
                                <input disabled class="input" type="email" name="email" placeholder="Nhập Email" value="{{Auth::user()->email}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Số điện thoại</label>
                                <input class="input" type="text" name="phone_number" placeholder="Nhập số điện thoại" value="{{Auth::user()->phone_number}}">
                            </div>
                            </div>
                            <br><br><br>
                            <div class="form-group col-md-12">
                            <input type="checkbox" name="change_pass" id="change">
                            <label for="change">Thay đổi mật khẩu</label>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Mật khẩu: </label>
                            <input disabled class="input mk" type="text" name="user_pass"><br/>
                            </div>
                            <div class="form-group col-md-6">
                              <label>Xác nhận mật khẩu:</label>
                               <input disabled class="input mk" type="text" name="user_repass"><br/>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="gender">Giới Tính: </label>
                                <select class="input" name="gender"> 
                                  @if(Auth::user()->gender == 1)   
                                    <option value="1">Nam</option>
                                    <option value="0">Nữ</option>
                                  @else
                                    <option value="0">Nữ</option>
                                    <option value="1">Nam</option>
                                  @endif
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="gender">Ngày sinh: </label>
                                <input type="date" class="input" name="birth_day" value="{{Auth::user()->birth_day}}">
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="custom-file-label" for="customFile">Hình ảnh</label>
                        <input type="file" class="custom-file-input" id="customFile" name="user_image">
        
                    </div>
                    </div>
                    </div>
                    <br><br>
                    <div class="pull">
                        <button type="submit" class="primary-btn">Cập nhật</button>
                    </div>
                </form>
        </div>
        <div class="col-md-3"></div>
    </div>
      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="col-md-12">
            <div class="section-title pull-right">
                <h3 class="title">Đơn hàng</h3>
            </div>
            <br><br>
            <table class="table table-bordered">
              <thead>
                <tr class="bg-info">
                  <th class="col-sm-1">Mã HD</th>
                  <th class="col-sm-2">Ngày lập</th>
                  <th class="col-sm-3">Địa chỉ</th>
                  <th class="col-sm-4">Sản phẩm</th>
                  <th class="col-sm-1">Trạng thái</th>
                  <th class="col-sm-1">Tùy chọn</th>
                </tr>
              </thead>
              <tbody>
                @foreach($order as $orders)
                <tr>
                <th scope="row">{{$orders->id}}</th>
                <td>{{ date('d-m-Y H:m:s', strtotime($orders->created_at))}}</td>
                <td>{{$orders->address}}</td>
                <td>
                @foreach($or_detail as $or_details)
                    @if($or_details->order_id == $orders->id)
                      Tên SP: {{$or_details->product_name}} <br> 
                      Giá: {{number_format($or_details->product_price)}} đ <br>
                      Số lượng: {{$or_details->product_qty}}<br/><br/>
                    @endif
                    @endforeach
                      Phí ship: {{number_format($orders->shipping)}} đ <br/>
                      <hr>
                      Tổng tiền: {{number_format($orders->total + $orders->shipping)}} đ
                </td>
                <td>
                    @if($orders->status == 0)
                        <b style="color: red">Chờ duyệt</b>
                    @elseif($orders->status == 1)
                        <b style="color: blue">Đang giao</b>
                    @else
                        <b style="color: green">Đã giao</b>
                    @endif
                </td>
                <td>
                    @if($orders->status == 0)
                        <a href="/cancel/{{$orders->id}}" class="btn btn-danger">Hủy HĐ</a>
                    @elseif($orders->status == 1)
                        <button disabled class="btn btn-primary">Đang giao</button>
                    @else
                        <button disabled class="btn btn-success">Đã giao</button>
                    @endif
                </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
      </div>
    </div>
</div>
<br><br><br><br><br><br>
@endsection
@section('script')
  <script type="text/javascript">
    $(document).ready(function(){
      $('#change').change(function(){
        if ($(this).is(':checked')) {
          $('.mk').removeAttr('disabled');
        }
        else{
          $('.mk').attr('disabled','');
        }
      });
    });
  </script>
@endsection