@extends('layouts.admin')

@section('title','Trang quản trị')

@section('sidebar1','Thống kê')

@section('sidebar2','Hóa đơn')

@section('class','active has-sub')

@section('search')
<form class="form-header" action="/" method="GET">
</form>
@endsection

@section('content1')
	<div class="row m-t-25">
                            <div class="col-sm-7 col-lg-4">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h3 class="counter" data-stop="{{$user}}">{{$user}}</h3>
                                                <span>tài khoản</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart1"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-7 col-lg-4">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fa fa-comments"></i>
                                            </div>
                                            <div class="text">
                                                <h3 class="counter" data-stop="{{$cmt}}">{{$cmt}}</h3>
                                                <span>bình luận</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas width="390" height="195" class="chartjs-render-monitor" id="sales-chart" style="width: 390px; height: 195px; display: block;"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-7 col-lg-4">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fa fa-shopping-bag"></i>
                                            </div>
                                            <div class="text">
                                                <h3 class="counter" data-stop="{{$pro}}">{{$pro}}</h3>
                                                <span>sản phẩm</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart2"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-7 col-lg-4">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fa fa-group"></i>
                                            </div>
                                            <div class="text">
                                                <h3 class="counter" data-stop="{{$cont}}">{{$cont}}</h3>
                                                <span>phản hồi</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart3"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-7 col-lg-4">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-shopping-cart"></i>
                                            </div>
                                            <div class="text">
                                                <h3 class="counter" data-stop="{{$order}}">{{$order}}</h3>
                                                <span>đơn hàng</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart5" style="height: 111px;display: block;width: 270px;" height="220" width="270" class="chartjs-render-monitor"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-7 col-lg-4">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-money"></i>
                                            </div>
                                            <div class="text">
                                                <h4><span style="color: #333333" class="counter" data-stop="{{$total}}">{{number_format($total)}}</span> đ</h4>
                                                <span>doanh thu</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart4"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
@endsection

@section('content2')
	<div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Ngày lập HD</th>
                                                <th>Ngày mua hàng</th>
                                                <th>Tài khoản</th>
                                                {{-- <th>Email</th> --}}
                                                <th>Tổng tiền</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($bill as $bills)
                                            <tr>
                                                <td>{{$bills->id}}</td>
                                                <td>{{ date('d-m-Y', strtotime($bills->date))}}</td>
                                                <td>{{ date('d-m-Y', strtotime($bills->created_at))}}</td>
                                                <td>{{$bills->username}}</td>
                                                {{--<td>{{$bills->email}}</td> --}}
                                                <td>{{number_format($bills->total)}} đ</td>                                                
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
@endsection
