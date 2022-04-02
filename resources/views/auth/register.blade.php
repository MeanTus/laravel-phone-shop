@extends('layouts.app')
@section('title','Đăng ký')
@section('content')
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="/assets/admin/images/logo.png" alt="WATCHSHOP" />
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="{{ route('register') }}" method="post">
                                @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Họ tên</label>
                                    <input class="au-input au-input--full @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" placeholder="Họ và tên">
                                    @error('name')
                                        <span class="help-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="gender">Giới Tính </label>
                                      <select style="height: 45px" class="form-control" name="gender">
                                        <option value="1">Nam</option>
                                        <option value="0">Nữ</option>
                                      </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Tên tài khoản</label>
                                    <input class="au-input au-input--full @error('email') is-invalid @enderror" name="username" value="{{ old('username') }}" type="text" placeholder="Tài khoản">
                                    @error('username')
                                        <span class="help-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror                                    
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Email</label>
                                    <input class="au-input au-input--full @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" type="email" placeholder="Địa chỉ Email">
                                    @error('email')
                                        <span class="help-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Mật khẩu</label>
                                    <input class="au-input au-input--full @error('password') is-invalid @enderror" name="password" type="password" placeholder="Mật khẩu">
                                    @error('password')
                                        <span class="help-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Xác nhận mật khẩu</label>
                                    <input class="au-input au-input--full @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" placeholder="Xác nhận lại mật khẩu">
                                    @error('password_confirmation')
                                        <span class="help-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Số điện thoại</label>
                                    <input class="au-input au-input--full @error('phone_number') is-invalid @enderror" name="phone_number" type="text" placeholder="Số điện thoại">
                                    @error('phone_number')
                                        <span class="help-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Ngày sinh</label>
                                    <input style="height: 45px" class="au-input au-input--full @error('birth_day') is-invalid @enderror" type="date" name="birth_day" placeholder="Ngày sinh">
                                    @error('birth_day')
                                        <span class="help-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                                
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Đăng ký</button>
                            </form>
                            <div class="register-link">
                                <p>
                                    Bạn đã có tài khoản rồi?
                                    <a href="{{ route('login') }}">Đăng nhập</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
