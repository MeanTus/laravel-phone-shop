@extends('layouts.app')
@section('title','Đăng nhập')
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
                            <form action="{{ url('/loginuser') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Tài khoản hoặc Email</label>
                                    <input class="au-input au-input--full @error('email') is-invalid @enderror" type="text" name="email" placeholder="Tài khoản hoặc Email" required>
                                @error('email')
                                    <span class="help-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input class="au-input au-input--full @error('password') is-invalid @enderror" type="password" name="password" placeholder="Mật khẩu" required>
                                @error('email')
                                    <span class="help-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>{{ __('Ghi nhớ đăng nhập') }}
                                    </label>
                                    <label>
                                        @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Quên mật khẩu?') }}
                                    </a>
                                    @endif
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Đăng nhập</button>
                            </form>
                            <div class="register-link">
                                <p>
                                    Bạn chưa có tài khoản?
                                    <a href="{{ route('register') }}">Tạo tài khoản mới</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
