<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Wish_List;
use Session;
session_start();

class CartController extends Controller
{
    public function save_cart(Request $request){
        $data = $request->all();
        $cart = Session::get('cart');
        $id = $data['id'];
        $pro = Product::find($id);
        if($pro->product_status == 1){
            if($cart){
                if(array_key_exists($id, $cart)){
                    $cart[$id] = array(
                    'product_name' => $pro->product_name,
                    'product_id' => $pro->product_id,
                    'product_image' => $pro->product_image,
                    'product_qty' => (int)$cart[$id]['product_qty'] + 1,
                    'product_price' => $pro->product_promotion,
                    );
                    Session::put('cart',$cart);
                }
                else{
                    $cart[$id] = array(
                    'product_name' => $pro->product_name,
                    'product_id' => $pro->product_id,
                    'product_image' => $pro->product_image,
                    'product_qty' => 1,
                    'product_price' => $pro->product_promotion,
                    );
                    Session::put('cart',$cart);   
                }
            }
            else{
                $cart[$id] = array(
                    'product_name' => $pro->product_name,
                    'product_id' => $pro->product_id,
                    'product_image' => $pro->product_image,
                    'product_qty' => 1,
                    'product_price' => $pro->product_promotion,
                    );
                    Session::put('cart',$cart);
            }
        }
        else{
            if($cart){
                if(array_key_exists($id, $cart)){
                    $cart[$id] = array(
                    'product_name' => $pro->product_name,
                    'product_id' => $pro->product_id,
                    'product_image' => $pro->product_image,
                    'product_qty' => (int)$cart[$id]['product_qty'] + 1,
                    'product_price' => $pro->product_price,
                    );
                    Session::put('cart',$cart);
                }
                else{
                    $cart[$id] = array(
                    'product_name' => $pro->product_name,
                    'product_id' => $pro->product_id,
                    'product_image' => $pro->product_image,
                    'product_qty' => 1,
                    'product_price' => $pro->product_price,
                    );
                    Session::put('cart',$cart);   
                }
            }
            else{
                $cart[$id] = array(
                    'product_name' => $pro->product_name,
                    'product_id' => $pro->product_id,
                    'product_image' => $pro->product_image,
                    'product_qty' => 1,
                    'product_price' => $pro->product_price,
                    );
                    Session::put('cart',$cart);
            }
        }
        Session::save();
    }

    public function save_wish(Request $request){
        $data = $request->all();
        $cart = Session::get('cart');
        $id = $data['id'];
        $pro = Product::find($id);
        $wish = Wish_List::where('username',Auth::user()->username)->where('product_id',$id)->delete();
    if($wish){
        if($pro->product_status == 1){
            if($cart){
                if(array_key_exists($id, $cart)){
                    $cart[$id] = array(
                    'product_name' => $pro->product_name,
                    'product_id' => $pro->product_id,
                    'product_image' => $pro->product_image,
                    'product_qty' => (int)$cart[$id]['product_qty'] + 1,
                    'product_price' => $pro->product_promotion,
                    );
                    Session::put('cart',$cart);
                }
                else{
                    $cart[$id] = array(
                    'product_name' => $pro->product_name,
                    'product_id' => $pro->product_id,
                    'product_image' => $pro->product_image,
                    'product_qty' => 1,
                    'product_price' => $pro->product_promotion,
                    );
                    Session::put('cart',$cart);   
                }
            }
            else{
                $cart[$id] = array(
                    'product_name' => $pro->product_name,
                    'product_id' => $pro->product_id,
                    'product_image' => $pro->product_image,
                    'product_qty' => 1,
                    'product_price' => $pro->product_promotion,
                    );
                    Session::put('cart',$cart);
            }
        }
        else{
            if($cart){
                if(array_key_exists($id, $cart)){
                    $cart[$id] = array(
                    'product_name' => $pro->product_name,
                    'product_id' => $pro->product_id,
                    'product_image' => $pro->product_image,
                    'product_qty' => (int)$cart[$id]['product_qty'] + 1,
                    'product_price' => $pro->product_price,
                    );
                    Session::put('cart',$cart);
                }
                else{
                    $cart[$id] = array(
                    'product_name' => $pro->product_name,
                    'product_id' => $pro->product_id,
                    'product_image' => $pro->product_image,
                    'product_qty' => 1,
                    'product_price' => $pro->product_price,
                    );
                    Session::put('cart',$cart);   
                }
            }
            else{
                $cart[$id] = array(
                    'product_name' => $pro->product_name,
                    'product_id' => $pro->product_id,
                    'product_image' => $pro->product_image,
                    'product_qty' => 1,
                    'product_price' => $pro->product_price,
                    );
                    Session::put('cart',$cart);
            }
        }
        Session::save();
    }
    }

    public function add_cart($id){
    	$cart=Session::get('cart');
    	if($cart){
    		if (array_key_exists($id,$cart)) {
    				$cart[$id]['product_qty'] ++;
    		}
    		Session::put('cart',$cart);
            //Session::put('total',$total);
            return redirect()->back();
    	}
    	else{
    		return redirect()->back();
    	}
    	
    	}

    public function remove_cart($id){
    	$cart=Session::get('cart');
    	if($cart){
    		if (array_key_exists($id,$cart)) {
    				$cart[$id]['product_qty']--;
    			}
    		Session::put('cart',$cart);
    		return redirect()->back();
    	}
    	else{
    		return redirect()->back();
        }
	}


    public function delete_cart($id){
        $cart=Session::get('cart');
        if($cart){
            if (array_key_exists($id,$cart)) {
                unset($cart[$id]);
            }
            Session::put('cart',$cart);
            return redirect()->back();
        }
        else{
            return redirect()->back();
        }
    }

    public function cart_multi(Request $request){
        $data = $request->all();
        $cart = Session::get('cart');
        $num = $data['num'];
        $id = $data['id'];
        $pro = Product::find($id);
        if($pro->product_status == 1){
            if($cart){
                if(array_key_exists($id, $cart)){
                    $cart[$id] = array(
                    'product_name' => $pro->product_name,
                    'product_id' => $pro->product_id,
                    'product_image' => $pro->product_image,
                    'product_qty' => (int)$cart[$id]['product_qty'] + $num,
                    'product_price' => $pro->product_promotion,
                    );
                    Session::put('cart',$cart);
                }
                else{
                    $cart[$id] = array(
                    'product_name' => $pro->product_name,
                    'product_id' => $pro->product_id,
                    'product_image' => $pro->product_image,
                    'product_qty' => $num,
                    'product_price' => $pro->product_promotion,
                    );
                    Session::put('cart',$cart);   
                }
            }
            else{
                $cart[$id] = array(
                    'product_name' => $pro->product_name,
                    'product_id' => $pro->product_id,
                    'product_image' => $pro->product_image,
                    'product_qty' => $num,
                    'product_price' => $pro->product_promotion,
                    );
                    Session::put('cart',$cart);
            }
        }
        else{
            if($cart){
                if(array_key_exists($id, $cart)){
                    $cart[$id] = array(
                    'product_name' => $pro->product_name,
                    'product_id' => $pro->product_id,
                    'product_image' => $pro->product_image,
                    'product_qty' => (int)$cart[$id]['product_qty'] + $num,
                    'product_price' => $pro->product_price,
                    );
                    Session::put('cart',$cart);
                }
                else{
                    $cart[$id] = array(
                    'product_name' => $pro->product_name,
                    'product_id' => $pro->product_id,
                    'product_image' => $pro->product_image,
                    'product_qty' => $num,
                    'product_price' => $pro->product_price,
                    );
                    Session::put('cart',$cart);   
                }
            }
            else{
                $cart[$id] = array(
                    'product_name' => $pro->product_name,
                    'product_id' => $pro->product_id,
                    'product_image' => $pro->product_image,
                    'product_qty' => $num,
                    'product_price' => $pro->product_price,
                    );
                    Session::put('cart',$cart);
            }
        }
        Session::save();
    }

    public function wishlist_detail(){
        $like = Wish_List::where('username',Auth::user()->username)->get();
        return view('user_temp.wishlist',['like'=>$like]);
    }

    public function wish_list(Request $request){
        $data = $request->all();
        $wish = Session::get('wish');
        $id = $data['id'];
        $pro = Product::find($id);
        if($pro->product_status == 1){
            if($wish){
                Session::put('wish',$wish);   
            }
            else{
                $wish[$id] = array(
                    'product_name' => $pro->product_name,
                    'product_id' => $pro->product_id,
                    'product_image' => $pro->product_image,
                    'product_price' => $pro->product_promotion,
                    );
                    Session::put('wish',$wish);
            }
        }
        else{
            if($wish){
                Session::put('wish',$wish);
            }
            else{
                $wish[$id] = array(
                    'product_name' => $pro->product_name,
                    'product_id' => $pro->product_id,
                    'product_image' => $pro->product_image,
                    'product_price' => $pro->product_price,
                    );
                    Session::put('wish',$wish);
            }
        }
        Session::save();
        $kt = Wish_List::where('username',Auth::user()->username)->where('product_id',$id)->get();
        if(count($kt)>0){

        }else{
            $list = new Wish_List;
            $list->username = Auth::user()->username;
            $list->product_name = $pro->product_name;
            if($pro->product_status == 1){
                $list->product_price = $pro->product_promotion;
            }else{
                $list->product_price = $pro->product_price;
            }
            $list->product_image = $pro->product_image;
            $list->product_id = $pro->product_id;
            $list->create_at = now()->timezone('Asia/Ho_Chi_Minh');
            $list->save();
        }
    }

    public function delete_list($pro_id){
        $del = Wish_List::where('username',Auth::user()->username)->where('product_id',$pro_id)->delete();
        return redirect()->back();
    }
}
