@extends('layouts.admin') 

@section('title','Chỉnh sửa sản phẩm')

@section('sidebar1','Chỉnh sửa thông tin sản phẩm')

@section('class3','active has-sub')

@section('search')
<form class="form-header" action="/" method="GET">
</form>
@endsection

@section('content1')
<br>
  @if (count($errors)>0) 
      @foreach($errors->all() as $errors)
      <div class="alert alert-danger">
        <strong>Cảnh báo! </strong>
          {{ $errors }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>
      @endforeach  
      <br/> 
  @endif
	<div class="table-responsive table m-b-40 block-email">
    <form style="margin: 0 auto" class="col-md-7" action="/update-product/{{ $product->product_id }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="text-center">
        <img class="rounded" src="/assets/uploads/product/{{ $product->product_image }}" width=150px>
      </div>
      <br/>
    Mã sản phẩm <input type="text" disabled id="materialLoginFormEmail" class="form-control" name="masp" value="{{ $product->product_id }}"/>
      <br/>
    Tên sản phẩm <input class="form-control" type="text" name="product_name" value="{{ $product->product_name }}">
      <br/>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="gioitinh">Giới Tính </label>
            <select class="form-control" name="gender">   
              @if($product->gender == 1) 
                <option value="1">Nam</option>
                <option value="0">Nữ</option>
              @else
                <option value="0">Nữ</option>
                <option value="1">Nam</option>
              @endif
            </select>
        </div>
        <div class="form-group col-md-6">
          <label for="gioitinh">Loại </label>
            <select class="form-control" name="product_type">
              @if($product->type == 0)        
                <option value="0">Dây da</option>
                <option value="1">Dây kim loại</option>
              @else
                <option value="1">Dây kim loại</option>
                <option value="0">Dây da</option>
              @endif
            </select>
        </div>
      </div>
        <br/>
        <div class="form-row">
        <div class="form-group col-md-6">
          <label for="cat">Danh mục </label>
            <select class="form-control" name="cat">   
              @foreach($cat as $cats)
                @if($product->cat_id == $cats->cat_id)
                  <option selected value="{{ $product->cat_id }}">{{ $cats->cat_name }}</option>
                @else
                  <option value="{{ $product->cat_id }}">{{ $cats->cat_name }}</option>
                @endif
              @endforeach
            </select>
        </div>
        <div class="form-group col-md-6">
          <label for="brand">Thương hiệu </label>
            <select class="form-control" name="brand">
              @foreach($brand as $brands)
                @if($product->brand_id == $brands->brand_id)
                  <option selected value="{{ $product->brand_id }}">{{ $brands->brand_name }}</option>
                @else
                  <option value="{{ $product->brand_id }}">{{ $brands->brand_name }}</option>
                @endif
              @endforeach
            </select>
        </div>
      </div>
        <br/>
      Số lượng <input class="form-control" type="text" name="product_qty" value="{{ $product->product_qty }}">
        <br/>
      Giá tiền <input class="form-control" type="text" name="product_price" value="{{ $product->product_price }}"><br/>
      <div class="form-group">
        <label for="price">Trạng thái </label>
          <select class="form-control price" name="status">
            @if($product->product_status ==0)   
              <option value="0">Không</option>
              <option id="promotion" value="1">Giảm giá</option>
              <option value="2">Hàng mới</option>
            @elseif($product->product_status ==1)
              <option id="promotion" value="1">Giảm giá</option>
              <option value="0">Không</option>
              <option value="2">Hàng mới</option>
            @else
              <option value="2">Hàng mới</option>
              <option value="0">Không</option>
              <option id="promotion" value="1">Giảm giá</option>
            @endif
          </select>
      </div>
        <br/>
      Giảm giá <input min="0" class="form-control pro_price" type="number" name="pro_price" readonly value="{{ $product->product_promotion }}"><br/>
      Giới thiệu <textarea class="form-control" rows="4" name="product_intro">{{ $product->product_intro }}</textarea>
        <br/>
      Mô tả <textarea class="form-control" rows="8" name="product_desc" id="mota">{{ $product->product_describe }}</textarea>
        <br/>
      <label>Hình ảnh chính</label>                 
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile" name="product_image">
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div><br/><br/>
          <label>Hình ảnh chi tiết</label>  
          <div class="custom-file">
            <input multiple type="file" class="custom-file-input" id="customFile" name="product_img[]">
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div><br/><br/>
          <div style="border: 2px dashed; background-color: white; padding: 10px 0px" class="row">
            @foreach( $detail as $details)
            <div class="col-md">
            <div class="text-center">
              <img class="rounded" src="/assets/uploads/product/{{ $details->image_detail }}" width=150px>
            </div>
            </div>
            @endforeach
          </div>
          <br/><br/>
        <input class="btn btn-primary btn-lg" type="submit" name="edit" value="Cập nhật">                  
    </form>
  </div>
@endsection

@section('script')
  <script type="text/javascript">
    $(document).ready(function(){
      $('select.price').change(function(){
        if ($(this).children('option:selected').val()==1) {
          $('.pro_price').removeAttr('readonly');
        }
        else{
          $('.pro_price').attr('readonly','');
          $('.pro_price').val(0);
        }
      });
    });
  </script>
@endsection
