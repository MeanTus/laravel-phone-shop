<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Order;
use App\Order_Detail;
use RealRashid\SweetAlert\Facades\Alert;
session_start();


class UserController extends Controller
{
    public function all_account()
    {
        $account = User::all(); 
        return view('admin_temp.account',['account'=>$account]);   
    }

    public function save_account(Request $request)
    {
        $mesg = array(
            'user_name.required'=>'Vui lòng điền đầy đủ họ tên',
            'user_name.min'=>'Họ tên phải có ít nhất 3 ký tự',
            'user_name.max'=>'Họ tên có nhiều nhất 32 ký tự',
            'user_account.required'=>'Vui lòng điền đầy đủ tài khoản',
            'user_account.unique'=>'Tài khoản đã tồn tại',
            'user_account.min'=>'Tài khoản phải có ít nhất 8 ký tự',
            'user_account.max'=>'Tài khoản có nhiều nhất 16 ký tự',
            'user_pass.required'=>'Vui lòng điền đầy đủ mật khẩu',
            'user_pass.min'=>'Mật khẩu phải có ít nhất 8 ký tự',
            'user_pass.max'=>'Mật khẩu có nhiều nhất 32 ký tự',
            'mail.required'=>'Vui lòng điền đầy đủ email',
            'mail.unique'=>'Email đã tồn tại',
            'phone_number.required'=>'Vui lòng điền đầy đủ số điện thoại',
            'in_phone'=>'Số điện thoại phải bắt đầu bằng 0 và 10 số',
            'birth_day.required'=>'Vui lòng điền đầy đủ ngày sinh',
            'birth_day'=>'Ngày sinh phải ít hơn năm hiện tại 15 năm',
            'user_image.required'=>'Vui lòng chọn ảnh đại diện'
        );
        $this->validate($request,[
            'user_name'=>'required|min:3|max:32',
            'user_account'=>'required|unique:users,username|min:8|max:16',
            'user_pass'=>'required|min:8|max:32',
            'mail'=>'required|unique:users,email',
            'phone_number'=>'required|in_phone',
            'birth_day'=>'required|birth_day',
            'user_image'=>'required',
        ],$mesg);
        $data=$request->all();
        $account = new User;
        $account->name=$data['user_name'];
        $account->username=$data['user_account'];
        $account->email=$data['mail'];
        $account->password=Hash::make($data['user_pass']);
        $account->gender=$data['gender'];
        $account->phone_number=$data['phone_number'];
        $account->birth_day=$data['birth_day'];
        $account->role=$data['role'];
        $account->status=1;
        $account->created_at = now()->timezone('Asia/Ho_Chi_Minh');
        if($request->hasFile('user_image')){
            $file_name = $request->file('user_image')->getClientOriginalName();
            $account->avatar= $file_name;
            $request->file('user_image')->move('assets/uploads/user',$file_name);
        }        
        $account->save();
        if ($account) {
            alert()->success('Thành công', 'Đã thêm tài khoản thành công');
        }
        else{
            alert()->error('Lỗi', 'Thêm tài khoản thất bại');
        }
        return redirect('add-account');
    }

    public function edit_account($id)
    {
        $account = User::find($id);
        return view('admin_temp.edit_account',['account'=>$account]);  
    }

    public function delete_account($id)
    {
        $account = User::find($id);
        if ($account) {
            alert()->success('Thành công', 'Xóa tài khoản thành công');
        }
        else{
            alert()->error('Lỗi', 'Xóa tài khoản thất bại');
        }
        $account->delete();
        return redirect('account'); 
    }

    public function update_account(Request $request,$id)
    {
        $mesg = array(
            'user_name.required'=>'Vui lòng điền đầy đủ họ tên',
            'user_name.min'=>'Họ tên phải có ít nhất 3 ký tự',
            'user_name.max'=>'Họ tên có nhiều nhất 32 ký tự',
            'phone_number.required'=>'Vui lòng điền đầy đủ số điện thoại',
            'in_phone'=>'Số điện thoại phải bắt đầu bằng 0 và 10 số',
            'birth_day.required'=>'Vui lòng điền đầy đủ ngày sinh',
            'birth_day'=>'Ngày sinh phải ít hơn năm hiện tại 15 năm',
        );
        $this->validate($request,[
            'user_name'=>'required|min:3|max:32',
            'phone_number'=>'required|in_phone',
            'birth_day'=>'required|birth_day',
        ],$mesg);
        $account = User::find($id);
        $data=$request->all();
        $account->name=$data['user_name'];
        $account->username=$data['user_account'];
        $account->email=$data['mail'];
            if($request->change_pass == 'on'){
                $mesg = array(
                'user_pass.required'=>'Vui lòng điền đầy đủ mật khẩu mới',
                'user_pass.min'=>'Mật khẩu phải có ít nhất 8 ký tự',
                'user_pass.max'=>'Mật khẩu có nhiều nhất 32 ký tự',
                'user_repass.required'=>'Vui lòng xác nhận mật khẩu',
                'user_repass.same'=>'Xác nhận mật khẩu sai'
            );
            $this->validate($request,[
                'user_pass'=>'required|min:8|max:32',
                'user_repass'=>'required|same:user_pass'
            ],$mesg);
                $account->password=Hash::make($data['user_pass']);
            }
        $account->gender=$data['gender'];
        $account->phone_number=$data['phone_number'];
        $account->birth_day=$data['birth_day'];
        $account->role=$data['role'];
        $account->updated_at = now()->timezone('Asia/Ho_Chi_Minh');
        if($request->hasFile('user_image')){
            $file_name = $request->file('user_image')->getClientOriginalName();
            $account->avatar= $file_name;
            $request->file('user_image')->move('assets/uploads/user',$file_name);
        }        
        $account->save();
        if ($account) {
            alert()->success('Thành công', 'Đã cập nhật tài khoản thành công');
        }
        else{
            alert()->error('Lỗi', 'Cập nhật tài khoản thất bại');
        }
        return redirect('account');
    }

    public function active_account($id)
    {
        $account = User::find($id);
        $account->status=1;
        $account->save();
        if ($account) {
            alert()->success('Thành công', 'Tài khoản đã được kích hoạt');
        }
        else{
            alert()->error('Lỗi', 'Kích hoạt tài khoản thất bại');
        }
        return redirect('account');
    }

    public function unactive_account($id)
    {
        $account = User::find($id);
        $account->status=0;
        $account->save();
        if ($account) {
            alert()->success('Thành công', 'Tài khoản đã được hủy kích khoạt');
        }
        else{
            alert()->error('Lỗi', 'Hủy kích hoạt tài khoản thất bại');
        }
        return redirect('account');
    }

    public function information(){
        $order = Order::where('status',0)->orWhere('status',1)->orWhere('status',2)->get();
        $or_detail = Order_Detail::all();
        return view('user_temp.info_user',['order'=>$order,'or_detail'=>$or_detail]);
    }

    public function cancel_order($id){
        $cal = Order::find($id);
        $cal->status = 3;
        $cal->save();
        if ($cal) {
            alert()->success('Thành công', 'Đơn hàng đã được hủy');
        }
        else{
            alert()->error('Lỗi', 'Hủy đơn hàng thất bại');
        }
        return redirect('info');
    }

    public function update_user(Request $request,$id){
        $mesg = array(
            'user_name.required'=>'Vui lòng điền đầy đủ họ tên',
            'user_name.min'=>'Họ tên phải có ít nhất 3 ký tự',
            'user_name.max'=>'Họ tên có nhiều nhất 32 ký tự',
            'phone_number.required'=>'Vui lòng điền đầy đủ số điện thoại',
            'in_phone'=>'Số điện thoại phải bắt đầu bằng 0 và 10 số',
            'birth_day.required'=>'Vui lòng điền đầy đủ ngày sinh',
            'birth_day'=>'Ngày sinh phải ít hơn năm hiện tại 15 năm',
        );
        $this->validate($request,[
            'user_name'=>'required|min:3|max:32',
            'phone_number'=>'required|in_phone',
            'birth_day'=>'required|birth_day',
        ],$mesg);
        $up_user = User::find($id);
        $data=$request->all();
        $up_user->name=$data['user_name'];
            if($request->change_pass == 'on'){
                $mesg = array(
                'user_pass.required'=>'Vui lòng điền đầy đủ mật khẩu mới',
                'user_pass.min'=>'Mật khẩu phải có ít nhất 8 ký tự',
                'user_pass.max'=>'Mật khẩu có nhiều nhất 32 ký tự',
                'user_repass.required'=>'Vui lòng xác nhận mật khẩu',
                'user_repass.same'=>'Xác nhận mật khẩu sai'
            );
            $this->validate($request,[
                'user_pass'=>'required|min:8|max:32',
                'user_repass'=>'required|same:user_pass'
            ],$mesg);
                $account->password=Hash::make($data['user_pass']);
            }
        $up_user->gender=$data['gender'];
        $up_user->phone_number=$data['phone_number'];
        $up_user->birth_day=$data['birth_day'];
        if($request->hasFile('user_image')){
            $file_name = $request->file('user_image')->getClientOriginalName();
            $up_user->avatar= $file_name;
            $request->file('user_image')->move('assets/uploads/user',$file_name);
        }        
        $up_user->save();
        if ($up_user) {
            alert()->success('Thành công', 'Đã cập nhật tài khoản thành công');
        }
        else{
            alert()->error('Lỗi', 'Cập nhật tài khoản thất bại');
        }
        return redirect('info');        
    }
}
