@extends('layouts.admin')

@section('title','Thêm tài khoản')

@section('sidebar1','Thêm tài khoản mới')

@section('class1','active has-sub')

@section('search')
<form class="form-header" action="/" method="GET">
</form>
@endsection

@section('content1')
<br>
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
	<div class="table-responsive table m-b-40 block-email">
    <form style="margin: 0 auto" class="col-md-7" action="/save-account" method="post" enctype="multipart/form-data">
      @csrf
    <br/>
    Tên khách hàng <input class="form-control" type="text" name="user_name" />
    <br/>
    <div class="form-row">
      <div class="form-group col-md-6">
        Tài khoản <input class="form-control" type="text" name="user_account" ><br/>
      </div>
      <div class="form-group col-md-6">
        Mật khẩu <input class="form-control" type="text" name="user_pass" ><br/>
      </div>
    </div>
        Email <input class="form-control" type="email" name="mail" />
    <br/>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="gender">Giới Tính </label>
          <select class="form-control" name="gender">
            <option value="1">Nam</option>
            <option value="0">Nữ</option>
          </select>
      </div>
                                            
     <div class="form-group col-md-6">
       <label for="role">Chức vụ </label>
          <select class="form-control" name="role">    
            <option value="User" selected>User</option>
            <option value="Member">Thành viên</option>
            <option value="VIP">VIP</option>
          </select>
      </div>
    </div>
    <br/>
    <div class="form-row">
      <div class="form-group col-md-6">
        Số điện thoại <input class="form-control" type="number" name="phone_number" ><br/>
      </div>                    
      <div class="form-group col-md-6">
        Ngày sinh <input class="form-control" type="date" name="birth_day" /><br/>
      </div>
    </div>
    <div class="custom-file">
      Hình <input type="file" class="custom-file-input" id="customFile" name="user_image">
      <label class="custom-file-label" for="customFile">Choose file</label>
    </div><br/><br/>
      <input class="btn btn-primary btn-lg" type="submit" name="add" value="Thêm">
    </form>
  </div>
@endsection
