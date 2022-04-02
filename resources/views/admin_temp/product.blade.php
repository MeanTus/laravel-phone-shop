@extends('layouts.admin')

@section('title','Sản phẩm')

@section('sidebar1','Quản lý sản phẩm')

@section('class3','active has-sub')

@section('search')
<form class="form-header" action="/pro-search" method="GET">
    <input class="au-input au-input--xl" type="text" name="search" placeholder="Tìm kiếm..." />
    <input type="hidden" name="tk" value="product">
    <button class="au-btn--submit" type="submit">
    <i class="zmdi zmdi-search"></i>
    </button>
</form>
@endsection

@section('content1')
<br>
<div class="table-data__tool">
    <div class="table-data__tool-right">
        <a style='color: white' href='/add-product'>
            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                <i class="zmdi zmdi-plus"></i>Thêm sản phẩm mới</button>
        </a>
                                        
    </div>
</div>
<div class="table-responsive m-b-40">
    <table class="table table-borderless table-data3">
        <thead>
            <tr>
                <th>Mã SP</th>                               
                <th>Hình ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Trạng thái</th>
                <th>Tùy chọn</th>
            </tr>
        </thead>
        <tbody>
            @foreach($product as $products)
            <tr>
                <td>{{ $products->product_id }}</td>
                <td><img src="/assets/uploads/product/{{ $products->product_image }}" width="70px"></td>
                <td>{{ $products->product_name }}</td>
                <!-- <td>
                    @if($products->gender == 1)
                        Nam
                    @else
                        Nữ
                    @endif
                </td>
                <td>
                    @if($products->type == 0)
                        Dây da
                    @else
                        Dây kim loại
                    @endif -->
                </td>
                <td>{{ number_format($products->product_price) }} đ</td>
                <td>
                    @if($products->product_status == 1)
                        <p class='role admin'>Giảm giá</p>
                    @elseif($products->product_status == 2)
                        <p class='role member'>Hàng mới</p>
                    @else
                        <p class='role user'>Không</p>
                    @endif
                </td>
                <td>
                    <div class="table-data-feature">
                    <a style='color: white' href='/edit-product/{{ $products->product_id }}'>
                        <button class="btn btn-secondary btn-sm"><i class="fa fa-edit"></i></button>
                    </a>
                                                    
                    <a style='color: white' href='/delete-product/{{ $products->product_id }}'><button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                    </a>
                    </div>
                </td>
            </tr>
            @endforeach                                        
        </tbody>
    </table>
    <br/>
    {{ $product->links() }}
</div>
@endsection
