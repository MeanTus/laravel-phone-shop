@extends('layouts.admin')

@section('title','Sửa danh mục')

@section('sidebar1','Chỉnh sửa danh mục sản phẩm')

@section('class8','active has-sub')

@section('search')
<form class="form-header" action="/" method="GET">
</form>
@endsection

@section('content1')
<br>
  <div class="table-responsive table m-b-40 block-email">
      <form style="margin: 0 auto" class="col-md-7" action="/update-cat/{{ $cat->cat_id }}" method="post" enctype="multipart/form-data">
        @csrf
    <br/>
    Tên danh mục <input class="form-control" type="text" name="cat_name" value="{{ $cat->cat_name }}" required>
    <br/>
    Mô tả <textarea class="form-control" rows="5" name="cat_describe" id="mota" required>{{ $cat->cat_describe }}</textarea>
    <br/>
    <div class="form-group">
    <label for="gioitinh">Trạng thái </label>
    <select class="form-control" name="cat_status">
      @if($cat->cat_status == 0)
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