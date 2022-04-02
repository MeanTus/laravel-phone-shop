@extends('layouts.admin')

@section('title','Kho hàng')

@section('sidebar1','Quản lý kho hàng')

@section('class7','active has-sub')

@section('search')
<form class="form-header" action="/" method="GET">
</form>
@endsection

@section('search')
    <input class="au-input au-input--xl" type="text" name="search" placeholder="Tìm kiếm..." />
    <button class="au-btn--submit" type="submit" name="tk" value="user">
    <i class="zmdi zmdi-search"></i>
    </button>
@endsection

@section('content1')
<br>
	<div class="table-data__tool">
        <div class="table-data__tool-right">
            <a style='color: white' href='/add-product'><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                <i class="zmdi zmdi-plus"></i>Thêm hàng mới</button>
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
                    <th>Số lượng</th>
                    <th>Tình trạng</th>
                    <th>Nhập hàng</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ware as $wares)
                <tr>
                    <td>{{ $wares->product_id }}</td>
                    <td><img src="/assets/uploads/product/{{ $wares->product_image }}" width="70px"></td>
                    <td>{{ $wares->product_name }}</td>
                    <td>{{ number_format($wares->product_price) }} đ</td>
                    <td>{{ $wares->product_qty }}</td>
                    <td>
                        @if($wares->product_qty == 0)
                            <p class='role admin'>Hết hàng</p>
                        @elseif($wares->product_qty < 10 && $wares->product_qty > 0)
                            <p class='role member'>Gần hết hàng</p>
                        @else
                            <p class='role user'>Còn hàng</p>
                        @endif
                    </td>
                    <td>
                        <div class="table-data-feature">
                            <form action="/save-warehouse/{{ $wares->product_id }}" method="post">
                                @csrf
                                <input min="1" class="form-control" type="number" name="input_product">
                                <input type="submit" name="input" class="btn btn-success btn-xl" value="Nhập hàng">
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
