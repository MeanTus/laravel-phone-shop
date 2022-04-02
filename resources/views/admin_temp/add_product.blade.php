@extends('layouts.admin')

@section('title','Thêm sản phẩm')

@section('sidebar1','Thêm sản phẩm mới')

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
      <form style="margin: 0 auto" class="col-md-7" action="/save-product" method="post" enctype="multipart/form-data">
        @csrf
        <br/>
        Tên sản phẩm <input class="form-control" type="text" name="product_name">
        <br/>
        <!-- <div class="form-row">
          <div class="form-group col-md-6">
            <label for="gioitinh">Giới Tính </label>
              <select class="form-control" name="gender">   
                <option value="1">Nam</option>
                <option value="0">Nữ</option>
              </select>
            </div>
                
            <div class="form-group col-md-6">
              <label for="type">Loại </label>
                <select class="form-control" name="product_type">      
                    <option value="0">Dây da</option>
                    <option value="1">Dây kim loại</option>
                </select>
              </div>
            </div> -->
            <div class="form-row">
          <div class="form-group col-md-6">
            <label for="categoroy">Danh mục</label>
              <select class="form-control" name="cat"> 
              @foreach($cat as $cats)  
                <option value="{{ $cats->cat_id }}">{{ $cats->cat_name }}</option>
              @endforeach
              </select>
            </div>
                
            <div class="form-group col-md-6">
              <label for="brand">Thương hiệu </label>
                <select class="form-control" name="brand">      
                  @foreach($brand as $brands)  
                    <option value="{{ $brands->brand_id }}">{{ $brands->brand_name }}</option>
                  @endforeach
                </select>
                </div>
            </div>
            <br>
            Số lượng <input min="1" class="form-control" type="number" name="product_qty"><br/>
            <br/>
            Giá tiền <input min="100000" class="form-control" type="number" name="product_price"><br/>
            <br/>
            <div class="form-group">
            <label for="price">Trạng thái </label>
              <select class="form-control price" name="status">   
                <option value="0">Không</option>
                <option id="promotion" value="1">Giảm giá</option>
                <option value="2">Hàng mới</option>
              </select>
            </div>
            <br/>
            Giảm giá (%) <input min="1" class="form-control pro_price" type="number" name="pro_price" readonly value="0"><br/>
            Giới thiệu <textarea class="form-control" rows="4" name="product_intro"></textarea>
            <br/>
            Mô tả <textarea class="form-control" rows="8" name="product_desc" id="mota"></textarea>
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
          </div>

          <br/><br/>
          <input class="btn btn-primary btn-lg" type="submit" name="add" value="Thêm">         
      </form>
  </div>
@endsection

@section('script')
  <script type="text/javascript">
    $(document).ready(function(){
      $('select.price').change(function(){
        if ($(this).children('option:selected').val()==1) {
          $('.pro_price').removeAttr('readonly');
          $('.pro_price').val(1);
        }
        else{
          $('.pro_price').attr('readonly','');
          $('.pro_price').val(0);
        }
      });
    });
  </script>
@endsection
