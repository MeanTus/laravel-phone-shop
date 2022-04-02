<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Product;
use App\Product_Detail;
use App\Catalog;
use App\Brand;
use App\Comment;
use DB;
use App\Contact;
use App\Order;
use App\Order_Detail;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Session;


class PageController extends Controller
{
    public function index()
    {
    	$pro1 = Product::where('product_status',1)->get();
    	$pro2 = Product::where('product_status',0)->take(4)->get();
    	$pro3 = Product::where('product_status',0)->take(3)->get();
        $slide=Slider::where('status',1)->get();
        return view('user_temp.homeuser',['slide'=>$slide,'pro1'=>$pro1,'pro2'=>$pro2,'pro3'=>$pro3]);
    }

    public function show()
    {
    	$pro = Product::paginate(6);
    	return view('user_temp.product',['pro'=>$pro]);
    }

    public function rating(Request $request){
        $data = $request->all();

        $cmt = new Comment;
        $cmt->name = $data['name'];
        $cmt->username = Auth::user()->username;
        $cmt->email = Auth::user()->email;
        $cmt->content = $data['content'];
        $cmt->product_id = $data['id'];
        $cmt->rating = $data['star'];
        $cmt->status = 0;
        $cmt->created_at = now()->timezone('Asia/Ho_Chi_Minh');
        $cmt->save();        
    }

    public function detail($id)
    {
        $cat = Catalog::all();
        $brand = Brand::all();
        $dem = Comment::where('product_id',$id)->where('status',1)->count();
        $cmt = Comment::where('product_id',$id)->where('status',1)->get();
        $avg = Comment::select('rating')->where('product_id',$id)->where('status',1)->avg('rating');
        $prod = Product_Detail::where('product_id',$id)->get();
    	$pro = Product::find($id);
        $pro2 = Product::where('product_status',0)->take(4)->get();
    	return view('user_temp.product_detail',['pro'=>$pro,'prod'=>$prod,'cat'=>$cat,'brand'=>$brand,'pro2'=>$pro2,'cmt'=>$cmt,'dem'=>$dem,'avg'=>$avg]);
    }

    public function send_mail(Request $request){
        $mesg = array(
            'name.required'=>'Vui lòng điền đầy đủ họ tên',
            'name.min'=>'Họ tên phải có ít nhất 3 ký tự',
            'name.max'=>'Họ tên có nhiều nhất 32 ký tự',
            'email.required'=>'Vui lòng điền đầy đủ email',
            'title.required'=>'Vui lòng điền đầy đủ tiêu đề',
            'title.min'=>'Tiêu đề email ít nhất phải có 16 kí tự',
            'content.required'=>'Vui lòng điền đầy đủ nội dung',
            'content.min'=>'Nội dung email ít nhất phải 32 ký tự'
        );
        $this->validate($request,[
            'name'=>'required|min:3|max:32',
            'email'=>'required',
            'title'=>'required|min:16',
            'content'=>'required|min:32',
        ],$mesg);
        $data = $request->all();
        $mail = new Contact;
        $mail->name = $data['name'];
        $mail->email = $data['email'];
        $mail->title = $data['title'];
        $mail->content = $data['content'];
        $mail->status = 0;
        $mail->created_at = now()->timezone('Asia/Ho_Chi_Minh');
        $mail->save();

        Mail::send('layouts.mail', ['email'=>$data], function ($message) use ($data) {
            $message->from('thanhbtpc00329@fpt.edu.vn', 'WATCHSHOP');
            $message->sender('thanhbtpc00329@fpt.edu.vn', 'WATCHSHOP');
            $message->to($data['email'],$data['name']);
            $message->subject('Mail phản hồi của WATCHSHOP');
            $message->priority(1);
        });
        Alert::success('Thành công', 'Gửi mail thành công');
        return redirect()->back();
    }

    public function save_checkout(Request $request){
        $mesg = array(
            'name.required'=>'Vui lòng điền đầy đủ họ tên',
            'name.min'=>'Họ tên phải có ít nhất là 3 ký tự',
            'name.max'=>'Họ tên có nhiều nhất là 32 ký tự',
            'address.required'=>'Vui lòng điền đầy đủ địa chỉ nhận hàng',
            'phone.required'=>'Vui lòng điền đầy đủ số điện thoại',
            'in_phone'=>'Số điện thoại phải bắt đầu bằng 0 và 10 số',
            'shipping.required'=>'Vui lòng chọn phương thức giao hàng'
        );
        $this->validate($request,[
            'name'=>'required|min:3|max:32',
            'phone'=>'required|in_phone',
            'address'=>'required',
            'shipping'=>'required'
        ],$mesg);

        $data = $request->all();
        $order = new Order;
        $order->user_id = Auth::user()->id;
        $order->address = $data['address'];
        $order->shipping = $data['shipping'];
        $order->total = $data['total'];
        $order->status = 0;
        $order->created_at = now()->timezone('Asia/Ho_Chi_Minh');
        $order->save();

        foreach (Session::get('cart') as $key => $cart) {
            $or_detail = new Order_Detail;
            $or_detail->product_id = $cart['product_id'];
            $or_detail->product_name = $cart['product_name'];
            $or_detail->product_price = $cart['product_price'];
            $or_detail->product_qty = $cart['product_qty'];
            $or_detail->order_id = $order->id;
            $or_detail->created_at = now()->timezone('Asia/Ho_Chi_Minh');
            $or_detail->save();
        }

        Session::forget('cart');
        if ($order && $or_detail) {
            alert()->success('Đặt hàng thành công', 'Sản phẩm sẽ được giao trong vòng 3 ngày');
        }
        else{
            alert()->error('Lỗi', 'Thanh toán thất bại');
        }
        return redirect('/checkout');
    }

    public function search(Request $request){
        $data = $request->all();
        if($data['price'] == 1){
            $pro = Product::where('product_price','>',2000000)->where('product_name','like','%'.$data['key'].'%')->orWhere('product_price',$data['key'])->get();
        }
        elseif($data['price']==2){
            $pro = Product::where('product_price','>',5000000)->where('product_name','like','%'.$data['key'].'%')->orWhere('product_price',$data['key'])->get();
        }
        else{
            $pro = Product::where('product_name','like','%'.$data['key'].'%')->orWhere('product_price',$data['key'])->get();
        }
        return view('user_temp.search',['pro'=>$pro]);
    }
}
