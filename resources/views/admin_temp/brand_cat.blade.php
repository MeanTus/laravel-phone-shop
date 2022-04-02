@extends('layouts.admin')

@section('title','Danh mục và thương hiệu sản phẩm')

@section('sidebar1','Quản lý danh mục và thương hiệu')

@section('class8','active has-sub')
@section('search')
<form class="form-header" action="/" method="GET">
</form>
@endsection

@section('content1')
<br>
<div class="row">
    <div class="col-lg-6">
        <div class="table-data__tool">
        <div class="table-data__tool-right">
        <a style='color: white' href='/add-cat'><button class="au-btn au-btn-icon au-btn--green au-btn--small">
        <i class="zmdi zmdi-plus"></i>Thêm danh mục mới</button></a>
        </div>
    </div>
    </div>
    <div class="col-lg-6">
        <div class="table-data__tool">
        <div class="table-data__tool-right">
        <a style='color: white' href='/add-brand'><button class="au-btn au-btn-icon au-btn--green au-btn--small">
        <i class="zmdi zmdi-plus"></i>Thêm thương hiệu mới</button></a>
        </div>
    </div>
    </div>
</div>
	
    <div class="row">
        <div class="col-lg-6">
                                <!-- TOP CAMPAIGN-->
                                <div class="top-campaign">
                                    <h3 class="title-3 m-b-30">danh mục sản phẩm</h3>
                                    <div class="table-responsive">
                                        <table class="table table-top-campaign">
                                            <thead>
                                                <th>Tên</th>
                                                <th>Trạng thái</th>
                                                <th>Tùy chọn</th>
                                            </thead>
                                            <tbody>
                                                @foreach($cat as $cats)
                                                <tr>
                                                    <td>{{ $cats->cat_name }}</td>
                                                    <td>
                                                        <div style="margin-right: 45px" class="table-data-feature">
                                                        @if($cats->cat_status==1)
                                                            <a style='color: white' href='/active-cat/{{ $cats->cat_id }}'><button class="item" data-toggle="tooltip" data-placement="top" title="Hiện">
                                                            <i class="fa fa-eye"></i></button>
                                                            </a>
                                                        @else
                                                            <a style='color: white' href='/unactive-cat/{{ $cats->cat_id }}'><button class="item" data-toggle="tooltip" data-placement="top" title="Ẩn">
                                                            <i class="fa fa-eye-slash"></i></button>
                                                            </a>
                                                        @endif
                                                    </div>
                                                    </td>
                                                    <td>
                                                        <a href="/edit-cat/{{ $cats->cat_id }}">
                                                            <button class="btn btn-secondary btn-sm">
                                                            <i class="fa fa-edit"></i>
                                                            </button>
                                                        </a>
                                                        <a href="/delete-cat/{{ $cats->cat_id }}">
                                                            <button class="btn btn-danger btn-sm">
                                                            <i class="fa fa-trash"></i>
                                                            </button>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--  END TOP CAMPAIGN-->
        </div>  
        <div class="col-lg-6">
                                <!-- TOP CAMPAIGN-->
                                <div class="top-campaign">
                                    <h3 class="title-3 m-b-30">thương hiệu sản phẩm</h3>
                                    <div class="table-responsive">
                                        <table class="table table-top-campaign">
                                            <thead align="center">
                                                <th>Tên</th>
                                                <th>Trạng thái</th>
                                                <th>Tùy chọn</th>
                                            </thead>
                                            <tbody>
                                                @foreach($brand as $brands)
                                                <tr>
                                                    <td>{{ $brands->brand_name }}</td>
                                                    <td>
                                                        <div style="margin-right: 45px" class="table-data-feature">
                                                        @if($brands->brand_status==1)
                                                            <a style='color: white' href='/active-brand/{{ $brands->brand_id }}'><button class="item" data-toggle="tooltip" data-placement="top" title="Hiện">
                                                            <i class="fa fa-eye"></i></button>
                                                            </a>
                                                        @else
                                                            <a style='color: white' href='/unactive-brand/{{ $brands->brand_id }}'><button class="item" data-toggle="tooltip" data-placement="top" title="Ẩn">
                                                            <i class="fa fa-eye-slash"></i></button>
                                                            </a>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="/edit-brand/{{ $brands->brand_id }}">
                                                            <button class="btn btn-secondary btn-sm">
                                                            <i class="fa fa-edit"></i>
                                                            </button>
                                                        </a>
                                                        <a href="/delete-brand/{{ $brands->brand_id }}">
                                                            <button class="btn btn-danger btn-sm">
                                                            <i class="fa fa-trash"></i>
                                                            </button>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--  END TOP CAMPAIGN-->
        </div>                                    
    </div>
@endsection
