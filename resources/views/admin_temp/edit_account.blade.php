@extends('layouts.admin')

@section('title','Chỉnh sửa tài khoản')

@section('sidebar1','Chỉnh sửa thông tin tài khoản')

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
    <form style="margin: 0 auto" class="col-md-7" action="/update-account/{{ $account->id }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="text-center">
        <img class="rounded" src="/assets/uploads/user/{{ $account->avatar }}" width=150px>
      </div>
      <br/>
      <div class="form-row">
        <div class="form-group col-md-6">
          Mã khách hàng <input type="text" disabled id="materialLoginFormEmail" class="form-control" name="makh" value="{{ $account->id }}"/>
      <br/>
        </div>
        <div class="form-group col-md-6">
          Tên khách hàng <input class="form-control" type="text" name="user_name" value='{{ $account->name }}'>
      <br/>
        </div>
      </div>
      
        <div class="form-group">
          Tài khoản <input class="form-control" type="text" name="user_account" value='{{ $account->username }}'><br/>
        </div>
        <input type="checkbox" name="change_pass" id="change"> Thay đổi mật khẩu
        <div class="form-row">
        <div class="form-group col-md-6">
          Mật khẩu <input disabled class="form-control mk" type="text" name="user_pass"><br/>
        </div>
        <div class="form-group col-md-6">
          Xác nhận mật khẩu <input disabled class="form-control mk" type="text" name="user_repass"><br/>
        </div>
      </div>
        Email <input class="form-control" type="text" name="mail" value='{{ $account->email }}'>
      <br/>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="gender">Giới Tính </label>
            <select class="form-control" name="gender"> 
              @if($account->gender == 1)   
                <option value="1">Nam</option>
                <option value="0">Nữ</option>
              @else
                <option value="0">Nữ</option>
                <option value="1">Nam</option>
              @endif
            </select>
        </div>
        <div class="form-group col-md-6">
          <label for="role">Chức vụ </label>
            <select class="form-control" name="role">  
              @if($account->role ==="Admin")     
                <option value="Admin" selected>Admin</option>
                <option value="User">User</option>
                <option value="VIP">VIP</option>
                <option value="Member">Member</option>
              @elseif($account->role ==="Member")
                <option value="Member" selected>Member</option>
                <option value="Admin">Admin</option>
                <option value="User">User</option>
                <option value="VIP">VIP</option>
              @elseif($account->role ==="User")
                <option value="User" selected>User</option>
                <option value="Member">Member</option>
                <option value="Admin">Admin</option>
                <option value="VIP">VIP</option>
              @else
                <option value="VIP" selected>VIP</option>
                <option value="User">User</option>
                <option value="Member">Member</option>
                <option value="Admin">Admin</option>
              @endif
            </select>
        </div>
      </div>
        <br/>
      <div class="form-row">
        <div class="form-group col-md-6">
          Số điện thoại <input class="form-control" type="number" name="phone_number" value='{{ $account->phone_number }}'><br/>
        </div>
        <div class="form-group col-md-6">
          Ngày sinh <input class="form-control" type="date" name="birth_day" value='{{ $account->birth_day }}'><br/>
        </div>
      </div>
      <div class="custom-file">
        Hình <input type="file" class="custom-file-input" id="customFile" name="user_image">
        <label class="custom-file-label" for="customFile">Choose file</label>
      </div><br/><br/>
      <input class="btn btn-primary btn-lg" type="submit" name="edit" value="Cập nhật">
    </form>
  </div>
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

