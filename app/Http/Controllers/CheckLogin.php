<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
class CheckLogin extends Controller
{
    public function checkAdmin(Request $request){
    	$data = [
    		'username'=>$request->email,
    		'password'=>$request->password,
    	];
    	$data1 = [
    		'email'=>$request->email,
    		'password'=>$request->password,
    	];
  
	    	if (Auth::attempt($data) || Auth::attempt($data1)) {
	    		if(Auth::user()->role==="Admin"){
	    			alert()->success('Thành công', 'Đăng nhập trang quản trị thành công');
	    			return redirect('admin');
	    		}
	    		elseif(Auth::user()->role!=="Admin" && Auth::user()->status == 1){
	    			alert()->success('Thành công', 'Đăng nhập tài khoản thành công');
	    			return redirect('/');
	    		}
	    		else{
	    			alert()->error('Lỗi', 'Đăng nhập thất bại');
	    			Auth::logout();
	    			return redirect('/login');
	    		}
	    	}
	    	else{
	    		alert()->error('Lỗi', 'Tài khoản hoặc mật khẩu sai ');
	    		return redirect('/login');
	    	}
    }
}
