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
            'name.required'=>'Vui l??ng ??i???n ?????y ????? h??? t??n',
            'name.min'=>'H??? t??n ph???i c?? ??t nh???t 3 k?? t???',
            'name.max'=>'H??? t??n c?? nhi???u nh???t 32 k?? t???',
            'email.required'=>'Vui l??ng ??i???n ?????y ????? email',
            'title.required'=>'Vui l??ng ??i???n ?????y ????? ti??u ?????',
            'title.min'=>'Ti??u ????? email ??t nh???t ph???i c?? 16 k?? t???',
            'content.required'=>'Vui l??ng ??i???n ?????y ????? n???i dung',
            'content.min'=>'N???i dung email ??t nh???t ph???i 32 k?? t???'
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
            $message->subject('Mail ph???n h???i c???a WATCHSHOP');
            $message->priority(1);
        });
        Alert::success('Th??nh c??ng', 'G???i mail th??nh c??ng');
        return redirect()->back();
    }

    public function save_checkout(Request $request){
        $mesg = array(
            'name.required'=>'Vui l??ng ??i???n ?????y ????? h??? t??n',
            'name.min'=>'H??? t??n ph???i c?? ??t nh???t l?? 3 k?? t???',
            'name.max'=>'H??? t??n c?? nhi???u nh???t l?? 32 k?? t???',
            'address.required'=>'Vui l??ng ??i???n ?????y ????? ?????a ch??? nh???n h??ng',
            'phone.required'=>'Vui l??ng ??i???n ?????y ????? s??? ??i???n tho???i',
            'in_phone'=>'S??? ??i???n tho???i ph???i b???t ?????u b???ng 0 v?? 10 s???',
            'shipping.required'=>'Vui l??ng ch???n ph????ng th???c giao h??ng'
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
            alert()->success('?????t h??ng th??nh c??ng', 'S???n ph???m s??? ???????c giao trong v??ng 3 ng??y');
        }
        else{
            alert()->error('L???i', 'Thanh to??n th???t b???i');
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
