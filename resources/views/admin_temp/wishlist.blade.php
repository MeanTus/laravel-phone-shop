@extends('layouts.admin')

@section('title','Danh sách yêu thích')

@section('sidebar1','Những sản phẩm được yêu thích của khách hàng')

@section('class4','active has-sub')

@section('search')
<form class="form-header" action="/" method="GET">
</form>
@endsection

@section('content1')
<br>
<div class="table-responsive table--no-card m-b-40">
                                    <table style="background-color: white" class="table table-hover">
                                      <thead class="thead-light">
                                        <tr>
                                          <th scope="col">ID SP</th>
                                          <th scope="col">Hình ảnh</th>
                                          <th scope="col">Tên sản phẩm</th>
                                          <th scope="col">Giá bán</th>
                                          <th scope="col">Lượt thích</th>
                                          <th scope="col">Ngày thêm</th>
                                          
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach($wish as $key => $wishes)
                                        <tr>
                                          <th scope="row">{{$wishes->id}}</th>
                                          <td><img src="/assets/uploads/product/{{$wishes->product_image}}" width='70px'/></td>
                                          <td>{{$wishes->product_name}}</td>
                                          <td>{{number_format($wishes->product_price)}} đ</td>
                                          <td>{{$wishes->total_sp}}</td>
                                          <td>{{ date('d-m-Y', strtotime($wishes->create_at)) }}</td>
                                        </tr>
                                        @endforeach
                                      </tbody>
                                    </table>
                                </div>
@endsection
