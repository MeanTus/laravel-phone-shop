<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Brand;
use App\Catalog;
use App\Product;
use App\Product_Detail;
use RealRashid\SweetAlert\Facades\Alert;
session_start();

class ProductController extends Controller
{
    //Brand
    public function add_brand(Request $request)
    {
        $mesg = array(
            'brand_name.required'=>'Vui lòng điền đầy đủ tên thương hiệu',
            'brand_name.min'=>'Tên thương hiệu ít nhất phải 3 ký tự',
            'brand_describe.required'=>'Vui lòng điền đầy đủ mô tả thương hiệu');
        $this->validate($request,[
            'brand_name'=>'required',
            'brand_describe'=>'required',
        ],$mesg);
        $data=$request->all();
        $brand = new Brand;
        $brand->brand_name=$data['brand_name'];
        $brand->brand_describe=$data['brand_describe'];
        $brand->brand_status=$data['brand_status'];
        $brand->created_at = now()->timezone('Asia/Ho_Chi_Minh');
        $brand->save();
        if ($brand) {
            alert()->success('Thành công', 'Đã thêm thương hiệu thành công');
        }
        else{
            alert()->error('Lỗi', 'Thêm thương hiệu thất bại');
        }
        return redirect('add-brand');
    }

    public function all_brand()
    {
        $brand = Brand::all(); 
        $cat = Catalog::all();
        return view('admin_temp.brand_cat',['brand'=>$brand,'cat'=>$cat]);   
    }

    public function edit_brand($id)
    {
        $brand = Brand::find($id);
        return view('admin_temp.edit_brand',['brand'=>$brand]);  
    }

    public function delete_brand($id)
    {
        $brand = Brand::find($id);
        if ($brand) {
            alert()->success('Thành công', 'Xóa thương hiệu thành công');
        }
        else{
            alert()->error('Lỗi', 'Xóa thương hiệu thất bại');
        }
        $brand->delete();
        return redirect('brand-cat'); 
    }

    public function update_brand(Request $request,$id)
    {
        $mesg = array(
            'brand_name.required'=>'Vui lòng điền đầy đủ tên thương hiệu',
            'brand_name.min'=>'Tên thương hiệu ít nhất phải 3 ký tự',
            'brand_describe.required'=>'Vui lòng điền đầy đủ mô tả thương hiệu');
        $this->validate($request,[
            'brand_name'=>'required',
            'brand_describe'=>'required',
        ],$mesg);
        $brand = Brand::find($id);
        $data=$request->all();
        $brand->brand_name=$data['brand_name'];
        $brand->brand_describe=$data['brand_describe'];
        $brand->brand_status=$data['brand_status'];
        $brand->updated_at = now()->timezone('Asia/Ho_Chi_Minh');
        $brand->save();
        if ($brand) {
            alert()->success('Thành công', 'Đã cập nhật thương hiệu thành công');
        }
        else{
            alert()->error('Lỗi', 'Cập nhật thương hiệu thất bại');
        }
        return redirect('brand-cat');
    }

    public function active_brand($id)
    {
        $brand = Brand::find($id);
        $brand->brand_status=1;
        $brand->save();
        if ($brand) {
            alert()->success('Thành công', 'Thương hiệu đã được hiển thị');
        }
        else{
            alert()->error('Lỗi', 'Hiển thị thương hiệu thất bại');
        }
        return redirect('brand-cat');
    }

    public function unactive_brand($id)
    {
        $brand = Brand::find($id);
        $brand->brand_status=0;
        $brand->save();
        if ($brand) {
            alert()->success('Thành công', 'Thương hiệu đã được ẩn');
        }
        else{
            alert()->error('Lỗi', 'Ẩn thương hiệu thất bại');
        }
        return redirect('brand-cat');
    }

    // Category
    public function add_cat(Request $request)
    {
        $mesg = array(
            'cat_name.required'=>'Vui lòng điền đầy đủ tên danh mục',
            'cat_name.min'=>'Tên danh mục ít nhất phải 3 ký tự',
            'cat_describe.required'=>'Vui lòng điền đầy đủ mô tả danh mục');
        $this->validate($request,[
            'cat_name'=>'required|min:3',
            'cat_describe'=>'required',
        ],$mesg);
        $data=$request->all();
        $cat = new Catalog;
        $cat->cat_name=$data['cat_name'];
        $cat->cat_describe=$data['cat_describe'];
        $cat->cat_status=$data['cat_status'];
        $cat->created_at = now()->timezone('Asia/Ho_Chi_Minh');
        $cat->save();
        if ($cat) {
            alert()->success('Thành công', 'Đã thêm danh mục thành công');
        }
        else{
            alert()->error('Lỗi', 'Thêm danh mục thất bại');
        }
        return redirect('add-cat');
    }

    public function edit_cat($id)
    {
        $cat = Catalog::find($id);
        return view('admin_temp.edit_cat',['cat'=>$cat]);  
    }

    public function delete_cat($id)
    {
        $cat = Catalog::find($id);
        if ($cat) {
            alert()->success('Thành công', 'Xóa danh mục thành công');
        }
        else{
            alert()->error('Lỗi', 'Xóa danh mục thất bại');
        }
        $cat->delete();
        return redirect('brand-cat'); 
    }

    public function update_cat(Request $request,$id)
    {
        $mesg = array(
            'cat_name.required'=>'Vui lòng điền đầy đủ tên danh mục',
            'cat_name.min'=>'Tên danh mục ít nhất phải 3 ký tự',
            'cat_describe.required'=>'Vui lòng điền đầy đủ mô tả danh mục');
        $this->validate($request,[
            'cat_name'=>'required|min:3',
            'cat_describe'=>'required',
        ],$mesg);
        $cat = Catalog::find($id);
        $data=$request->all();
        $cat->cat_name=$data['cat_name'];
        $cat->cat_describe=$data['cat_describe'];
        $cat->cat_status=$data['cat_status'];
        $cat->updated_at = now()->timezone('Asia/Ho_Chi_Minh');
        $cat->save();
        if ($cat) {
            alert()->success('Thành công', 'Đã cập nhật danh mục thành công');
        }
        else{
            alert()->error('Lỗi', 'Cập nhật danh mục thất bại');
        }
        return redirect('brand-cat');
    }

    public function active_cat($id)
    {
        $cat = Catalog::find($id);
        $cat->cat_status=1;
        $cat->save();
        if ($cat) {
            alert()->success('Thành công', 'Danh mục đã được hiển thị');
        }
        else{
            alert()->error('Lỗi', 'Hiển thị danh mục thất bại');
        }
        return redirect('brand-cat');
    }

    public function unactive_cat($id)
    {
        $cat = Catalog::find($id);
        $cat->cat_status=0;
        $cat->save();
        if ($cat) {
            alert()->success('Thành công', 'Danh mục đã được ẩn');
        }
        else{
            alert()->error('Lỗi', 'Ẩn danh mục thất bại');
        }
        return redirect('brand-cat');
    }

    // Product
    public function add_product(){
        $cat = Catalog::where('cat_status',1)->orderBy('cat_id','desc')->get();
        $brand = Brand::where('brand_status',1)->orderBy('brand_id','desc')->get();
        return view('admin_temp.add_product',['brand'=>$brand,'cat'=>$cat]); 
    }

    public function save_product(Request $request)
    {
        $mesg = array(
            'product_name.required'=>'Vui lòng điền đầy đủ tên sản phẩm',
            'product_name.min'=>'Tên sản phẩm phải có ít nhất 8 ký tự',
            'product_qty.required'=>'Vui lòng điền đầy đủ số lượng sản phẩm',
            'product_price.required'=>'Vui lòng điền đầy đủ giá tiền của sản phẩm',
            'product_intro.required'=>'Vui lòng điền đầy đủ giới thiệu sản phẩm',
            'product_intro.min'=>'Giới thiệu sản phẩm ít nhất phải 32 ký tự',
            'product_desc.required'=>'Vui lòng điền đầy đủ mô tả sản phẩm',
            'product_desc.min'=>'Mô tả sản phẩm ít nhất phải 64 ký tự',
            'cat.required'=>'Vui lòng tạo hoặc kích hoạt danh mục',
            'brand.required'=>'Vui lòng tạo hoặc kích hoạt thương hiệu',
            'product_image.required'=>'Vui lòng chọn hình ảnh sản phẩm',
            'product_img.required'=>'Vui lòng chọn hình ảnh chi tiết sản phẩm',);
        $this->validate($request,[
            'product_name'=>'required|min:8',
            'product_qty'=>'required',
            'product_price'=>'required',
            'product_intro'=>'required|min:32',
            'product_desc'=>'required|min:64',
            'cat'=>'required',
            'brand'=>'required',
            'product_image'=>'required',
            'product_img'=>'required',
        ],$mesg);
        $data=$request->all();

        $product = new Product;
        $product->product_name=$data['product_name'];
        $product->product_qty=$data['product_qty'];
        $product->product_price=$data['product_price'];
        $product->product_status=$data['status'];
        $product->product_promotion=$data['pro_price'];
        $product->product_intro=$data['product_intro'];
        $product->product_describe=$data['product_desc'];
        $product->cat_id= $data['cat'];
        $product->brand_id= $data['brand'];
        $product->created_at = now()->timezone('Asia/Ho_Chi_Minh');
        if($request->hasFile('product_image')){
            $file_name = $request->file('product_image')->getClientOriginalName();
            $product->product_image= $file_name;
            $request->file('product_image')->move('assets/uploads/product',$file_name);
        } 
        if($request->hasfile('product_img'))
         {
            $product->save();
            foreach($request->file('product_img') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move('assets/uploads/product', $name);  
                Product_Detail::create([
                        'image_detail' => $name,
                        'product_id' => $product->product_id
                ]);
            }
         }
        $product->save();
        if ($product) {
            alert()->success('Thành công', 'Đã thêm sản phẩm thành công');
        }
        else{
            alert()->error('Lỗi', 'Thêm sản phẩm thất bại');
        }
        return redirect('add-product');
    }

    public function all_product()
    {
        $product = Product::paginate(5); 
        return view('admin_temp.product',['product'=>$product]);   
    }

    public function edit_product($id)
    {
        $product = Product::find($id);
        $brand = Brand::where('brand_status',1)->get(); 
        $cat = Catalog::where('cat_status',1)->get();
        $detail = Product_Detail::where('product_id',$id)->get();
        return view('admin_temp.edit_product',['product'=>$product,'brand'=>$brand,'cat'=>$cat,'detail'=>$detail]);  
    }

    public function delete_product($id)
    {
        $product = Product::find($id);
        if ($product) {
            alert()->success('Thành công', 'Xóa sản phẩm thành công');
        }
        else{
            alert()->error('Lỗi', 'Xóa sản phẩm thất bại');
        }
        $product->delete();
        return redirect('product'); 
    }

    public function update_product(Request $request,$id)
    {
        $mesg = array(
            'product_name.required'=>'Vui lòng điền đầy đủ tên sản phẩm',
            'product_name.min'=>'Tên sản phẩm phải có ít nhất 8 ký tự',
            'product_qty.required'=>'Vui lòng điền đầy đủ số lượng sản phẩm',
            'product_price.required'=>'Vui lòng điền đầy đủ giá tiền của sản phẩm',
            'product_intro.required'=>'Vui lòng điền đầy đủ giới thiệu sản phẩm',
            'product_intro.min'=>'Giới thiệu sản phẩm ít nhất phải 32 ký tự',
            'product_desc.required'=>'Vui lòng điền đầy đủ mô tả sản phẩm',
            'product_desc.min'=>'Mô tả sản phẩm ít nhất phải 64 ký tự');
        $this->validate($request,[
            'product_name'=>'required|min:8',
            'product_qty'=>'required',
            'product_price'=>'required',
            'product_intro'=>'required|min:32',
            'product_desc'=>'required|min:64'
        ],$mesg);
        $product = Product::find($id);
        $data=$request->all();
        $product->product_name=$data['product_name'];
        $product->gender=$data['gender'];
        $product->type=$data['product_type'];
        $product->product_qty=$data['product_qty'];
        $product->product_price=$data['product_price'];
        $product->product_status=$data['status'];
        $product->product_promotion=$data['pro_price'];
        $product->product_intro=$data['product_intro'];
        $product->product_describe=$data['product_desc'];
        $product->cat_id= $data['cat'];
        $product->brand_id= $data['brand'];
        $product->updated_at = now()->timezone('Asia/Ho_Chi_Minh');
        if($request->hasFile('product_image')){
            $file_name = $request->file('product_image')->getClientOriginalName();
            $product->product_image= $file_name;
            $request->file('product_image')->move('assets/uploads/product',$file_name);
        }        
        if($request->hasFile('product_img'))
         {
            $product->save();
            $detail = Product_Detail::where('product_id',$product->product_id)->delete();
            foreach($request->file('product_img') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move('assets/uploads/product', $name);  
                Product_Detail::create(
                [
                    'image_detail' => $name,
                    'product_id' => $product->product_id
                ]);
            }
         }
        $product->save();
        if ($product) {
            alert()->success('Thành công', 'Đã cập nhật sản phẩm thành công');
        }
        else{
            alert()->error('Lỗi', 'Cập nhật sản phẩm thất bại');
        }
        return redirect('product');
    }


    //Ware house
    public function all_warehouse()
    {
        $ware = Product::all(); 
        return view('admin_temp.warehouse',['ware'=>$ware]);   
    }
    public function save_warehouse(Request $request,$id)
    {   
        $ware = Product::find($id);
        $ware->product_qty = $ware->product_qty + $request->input('input_product');      
        $ware->save();
        if ($ware) {
            alert()->success('Thành công', 'Đã thêm số lượng sản phẩm thành công');
        }
        else{
            alert()->error('Lỗi', 'Thêm số lượng sản phẩm thất bại');
        }
        return redirect('warehouse');
    }
}
