<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::REGISTER;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $meg = [
            'name.required'=>'Vui lòng điền đầy đủ họ tên',
            'name.string'=>'Họ tên phải là chữ',
            'name.min'=>'Họ tên phải có ít nhất là 3 ký tự',
            'name.max'=>'Họ tên có nhiều nhất là 32 ký tự',
            'username.required'=>'Vui lòng điền đầu đủ tên tài khoản',
            'username.unique'=>'Tài khoản đã tồn tại',
            'username.min'=>'Tài khoản phải có ít nhất 8 ký tự',
            'username.max'=>'Tài khoản có nhiều nhất 16 ký tự',
            'password.required'=>'Vui lòng điền đầy đủ mật khẩu',
            'password.min'=>'Mật khẩu phải có ít nhất 8 ký tự',
            'password.max'=>'Mật khẩu có nhiều nhất 32 ký tự',
            'password_confirmation.required'=>'Vui lòng xác nhận lại mật khẩu',
            'password_confirmation.same'=>'Xác nhận lại mật khẩu không đúng',
            'email.required'=>'Vui lòng điền đầy đủ email',
            'email.unique'=>'Email đã tồn tại',
            'phone_number.required'=>'Vui lòng điền đầy đủ số điện thoại',
            'in_phone'=>'Số điện thoại phải bắt đầu bằng 0 và 10 số',
            'birth_day.required'=>'Vui lòng điền đầy đủ ngày sinh',
            'birth_day'=>'Ngày sinh phải ít hơn năm hiện tại 15 năm',
            ];
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:32', 'min:3'],
            'username' => ['required', 'min:8', 'max:16', 'unique:users,username'],
            'email' => ['required','unique:users,email'],
            'password' => ['required', 'min:8', 'max:32'],
            'password_confirmation' => ['required', 'same:password'],
            'phone_number' => ['required', 'in_phone'],
            'birth_day' => ['required','birth_day'],
        ],$meg);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'gender' => $data['gender'],
            'phone_number' => $data['phone_number'],
            'birth_day' => $data['birth_day'],
            'role' => 'User',
            'status' => 1,
            'created_at'=>now()->timezone('Asia/Ho_Chi_Minh')
        ]);
    }
}
