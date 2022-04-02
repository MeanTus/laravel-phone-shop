@extends('layouts.admin')

@section('title','Đơn hàng')

@section('sidebar1','Quản lý đơn hàng')

@section('class5','active has-sub')

@section('search')
<form class="form-header" action="/" method="GET">
</form>
@endsection

@section('content1')
<br>
<div class="table-responsive table--no-card m-b-40">
  <table style="background-color: white" class="table table-hover">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Mã HD</th>
        <th scope="col">Ngày lập</th>
        <th scope="col">Tên KH</th>
        <th scope="col">Địa chỉ</th>                          
        <th scope="col">Sản phẩm</th>
        <th scope="col">Tình trạng</th>
        <th scope="col">Tùy chọn</th>
      </tr>
    </thead>
    <tbody>
      @foreach($order as $orders)
      <tr>
        <td>{{$orders->id}}</td>
        <td>{{ date('d-m-Y H:m:s', strtotime($orders->created_at))}}</td>     
        <td>
          @foreach($user as $users)
            @if($orders->user_id == $users->id)
              {{$users->name}}
            @endif
          @endforeach
        </td>
        <td>{{$orders->address}}</td>                                 
        <td>
          @foreach($or_detail as $or_details)
          Tên SP: {{$or_details->product_name}} <br> 
          Giá: {{number_format($or_details->product_price)}} đ <br>
          Số lượng: {{$or_details->product_qty}}<br/><br/>
          @endforeach
          Phí ship: {{number_format($orders->shipping)}} đ <br/>
          <hr>
          Tổng tiền: {{number_format($orders->total + $orders->shipping)}} đ
        </td>
        <td>
          @if($orders->status == 0)
            <span class="status--denied">Chờ duyệt</span>
          @elseif($orders->status == 1)
            <span style="color: blue" class="status">Đang giao</span>
          @elseif($orders->status == 2)
            <span class="status--process">Đã giao</span>
          @else
            <b style="color: black" class="status">Đã hủy</b>
          @endif
        </td>
        <td>
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Cập nhật
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              @if($orders->status == 0)
              <a class="dropdown-item" href="/active-order/{{$orders->id}}"><i class="fa fa-truck"></i> Duyệt</a>
              <a class="dropdown-item" href="/delete-order/{{$orders->id}}"><i class="fa fa-trash"></i> Xóa</a>
              @elseif($orders->status == 1)
              <a class="dropdown-item" href="/confirm-order/{{$orders->id}}"><i class="fa fa-check"></i> Đã giao</a>
              <a class="dropdown-item" href="/delete-order/{{$orders->id}}"><i class="fa fa-trash"></i> Xóa</a>
              @else
              <a class="dropdown-item" href="/delete-order/{{$orders->id}}"><i class="fa fa-trash"></i> Xóa</a>
              @endif
            </div>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
