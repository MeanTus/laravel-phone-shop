<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Slider;
use App\Wish_List;
use DB;
use App\Comment;
use App\Contact;
use App\Order;
use App\Order_Detail;
use App\User;
use App\Product;
use App\Bill;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;



class AdminController extends Controller
{
    public function index()
    {
        $user = User::where('status',1)->count();
        $cmt = Comment::where('status',1)->count();
        $pro = Product::count();
        $cont = Contact::count();
        $order = Order::count();
        $total = Bill::sum('total');
        $bill = Bill::all();
        return view('admin_temp.homeadmin',['bill'=>$bill,'user'=>$user,'cmt'=>$cmt,'pro'=>$pro,'cont'=>$cont,'order'=>$order,'total'=>$total]);
    }

    // Slider
    public function all_slide()
    {
        $slide = Slider::all();
        return view('admin_temp.slide',['slide'=>$slide]); 
    }
    public function add_slide(Request $request)
    {   
        $slide = new Slider;
        $data = $request->all();
            $file_name = $data['image_slide']->getClientOriginalName();
            $slide->image = $file_name;
            $data['image_slide']->move('assets/user/images/slide',$file_name);
            $slide->status=1;
            $slide->created_at= now()->timezone('Asia/Ho_Chi_Minh');
             
        $slide->save();
        if ($slide) {
            alert()->success('Thành công', 'Đã thêm ảnh slide thành công');
        }
        else{
            alert()->error('Lỗi', 'Thêm ảnh slide thất bại');
        }
        return redirect('slide');
    }

    public function delete_slide($id)
    {
        $slide = Slider::find($id);
        if ($slide) {
            alert()->success('Thành công', 'Xóa ảnh slide thành công');
        }
        else{
            alert()->error('Lỗi', 'Xóa ảnh thương thất bại');
        }
        $slide->delete();
        return redirect('slide'); 
    }

    public function active_slide($id)
    {
        $slide = Slider::find($id);
        $slide->status=1;
        $slide->save();
        if ($slide) {
            alert()->success('Thành công', 'Ảnh slide đã được hiển thị');
        }
        else{
            alert()->error('Lỗi', 'Hiển thị ảnh slide thất bại');
        }
        return redirect('slide');
    }

    public function unactive_slide($id)
    {
        $slide = Slider::find($id);
        $slide->status=0;
        $slide->save();
        if ($slide) {
            alert()->success('Thành công', 'Ảnh slide đã được ẩn');
        }
        else{
            alert()->error('Lỗi', 'Ẩn ảnh slide thất bại');
        }
        return redirect('slide');
    }

    public function wish_list()
    {
        $add = DB::table('wishlist')->select('id','username','product_price','product_image','create_at');
        $wish = $add->addSelect('product_name',DB::raw('count(product_name) as total_sp'))->orderBy('create_at','desc')->groupBy('product_name','product_id')->get();
        
        return view('admin_temp.wishlist',['wish'=>$wish]);
    }

    public function comment(){
        $cmt = Comment::all();
        return view('admin_temp.comment',['cmt'=>$cmt]);
    }

    public function active_cmt($id){
        $cmt = Comment::find($id);
        $cmt->status=1;
        $cmt->updated_at = now()->timezone('Asia/Ho_Chi_Minh');
        $cmt->save();
        if ($cmt) {
            alert()->success('Thành công', 'Bình luận đã được duyệt');
        }
        else{
            alert()->error('Lỗi', 'Bình luận chưa được duyệt');
        }
        return redirect('comment');
    }

    public function delete_cmt($id){
        $cmt = Comment::find($id);
        $cmt->delete();
        if ($cmt) {
            alert()->success('Thành công', 'Bình luận đã được xóa');
        }
        else{
            alert()->error('Lỗi', 'Bình luận chưa được xóa');
        }
        return redirect('comment');
    }

    public function email(){
        $cont = Contact::all();
        return view('admin_temp.mail',['cont'=>$cont]);
    }

    public function active_mail($id){
        $cont = Contact::find($id);
        $cont->status=1;
        $cont->updated_at = now()->timezone('Asia/Ho_Chi_Minh');
        $cont->save();
        if ($cont) {
            alert()->success('Thành công', 'Mail đã được duyệt');
        }
        else{
            alert()->error('Lỗi', 'Mail chưa được duyệt');
        }
        return redirect('mail');
    }

    public function delete_mail($id){
        $cont = Contact::find($id);
        $cont->delete();
        if ($cont) {
            alert()->success('Thành công', 'Mail đã được xóa');
        }
        else{
            alert()->error('Lỗi', 'Mail chưa được xóa');
        }
        return redirect('mail');
    }

    public function user_order(){
        $order = Order::all();
        $or_detail = Order_Detail::all();
        $user = User::all();
        return view('admin_temp.order',['order'=>$order,'or_detail'=>$or_detail,'user'=>$user]);
    }

    public function active_order($id){
        $order = Order::find($id);
        $order->status = 1;
        $order->save();
        if ($order) {
            alert()->success('Thành công', 'Duyệt đơn hàng thành công');
        }
        else{
            alert()->error('Lỗi', 'Đơn hàng chưa được duyệt');
        }
        return redirect('order');
    }

    public function confirm_order($id){
        $order = Order::find($id);
        $order->status = 2;
        $order->save();
        $pro = Product::all();
        foreach ($pro as $pros) {
            $or_detail = Order_Detail::where('order_id',$id)->get();
            foreach ($or_detail as $or_details) {
                if($or_details->product_id == $pros->product_id){
                    $prod = Product::find($pros->product_id);
                    $prod->product_qty =$prod->product_qty - $or_details->product_qty;
                    $prod->save();   
                }
            }
        }
        $user = User::all();
        foreach ($user as $users) {
            $or_user = Order::where('id',$id)->where('user_id',$users->id)->get();
            foreach ($or_user as $or_users) {
                if($or_users->user_id == $users->id){
                    $bill = new Bill;
                    $bill->created_at = now()->timezone('Asia/Ho_Chi_Minh');
                    $bill->date = $or_users->created_at;
                    $bill->name = $users->name;
                    $bill->username = $users->username;
                    $bill->email = $users->email;
                    $bill->total = $or_users->total + $or_users->shipping;
                    $bill->save();   
                }
            }
        }
        if ($order) {
            alert()->success('Thành công', 'Cập nhật đơn hàng thành công');
        }
        else{
            alert()->error('Lỗi', 'Đơn hàng chưa được cập nhật');
        }
        return redirect('order');
    }

    public function delete_order($id){
        $order = Order::find($id);
        $order->delete();
        if ($order) {
            alert()->success('Thành công', 'Xóa đơn hàng thành công');
        }
        else{
            alert()->error('Lỗi', 'Đơn hàng chưa xóa được');
        }
        return redirect('order');
    }

    public function acc_search(Request $request){
        $data = $request->all();
        if($data['tk'] == 'user'){
            $account = User::where('username','like','%'.$data['search'].'%')->orWhere('email', 'like', '%'.$data['search'].'%')->get();
            return view('admin_temp.search_account',['account'=>$account]);
        }
    }

    public function pro_search(Request $request){
        $data = $request->all();
        if($data['tk'] == 'product'){
            $product = Product::where('product_name','like','%'.$data['search'].'%')->orWhere('product_describe', 'like', '%'.$data['search'].'%')->get();
            return view('admin_temp.search_product',['product'=>$product]);
        }
    }
}
