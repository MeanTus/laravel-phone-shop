@extends('layouts.admin')

@section('title','Sửa thương hiệu')

@section('sidebar1','Chỉnh sửa thương hiệu sản phẩm')

@section('class8','active has-sub')

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
      <form style="margin: 0 auto" class="col-md-7" action="/update-brand/{{ $brand->brand_id }}" method="post" enctype="multipart/form-data">
        @csrf
    <br/>
    Tên thương hiệu <input class="form-control" type="text" name="brand_name" value="{{ $brand->brand_name }}">
    <br/>
    Mô tả <textarea class="form-control" rows="5" name="brand_describe" id="mota">{{ $brand->brand_describe }}</textarea>
    <br/>
    <div class="form-group">
    <label for="gioitinh">Trạng thái </label>
    <select class="form-control" name="brand_status">
      @if($brand->brand_status == 0)
        <option value="0">Ẩn</option>   
        <option value="1">Hiện</option>
      @else
        <option value="1">Hiện</option>
        <option value="0">Ẩn</option> 
      @endif
    </select>
      </div>
  <br/><br/>
    <input class="btn btn-primary btn-lg" type="submit" name="edit" value="Sửa">
  </form>
</div>
@endsection