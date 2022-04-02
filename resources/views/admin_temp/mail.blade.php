@extends('layouts.admin')

@section('title','Ý kiến khách hàng')

@section('sidebar1','Quản lý phản hồi khách hàng')

@section('class2','active has-sub')

@section('search')
<form class="form-header" action="/" method="GET">
</form>
@endsection

@section('content1')
<br>
<div class="table-responsive table-responsive-data2">
    <table class="table table-data2 responsive">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên KH</th>
                <th>Email</th>
                <th>Tiêu đề</th>
                <th>Nội dung</th>
                <th>Trạng thái</th>
                <th>Tùy chọn</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cont as $conts)
            <tr class="tr-shadow">
                <td>{{$conts->id}}</td>
                <td class="desc">{{$conts->name}}</td>                         
                <td>
                    <span class="block-email">{{$conts->email}}</span>
                </td>
                
                <td>{{$conts->title}}</td>
                <td class="block-email">{{$conts->content}}</td>
                <td>
                    @if($conts->status == 1)
                        <span class="status--process"> Đã duyệt </span>
                    @else
                        <span class="status--denied"> Chờ duyệt </span>
                    @endif
                </td>
                                            
                <td>
                    <div class="table-data-feature">
                    @if($conts->status == 0)
                        <a type="button" href='/active-mail/{{$conts->id}}' class="btn btn-primary btn-sm"><i class="fa fa-check"></i></a>
                    @else
                    @endif
                              
                    <a href='/delete-mail/{{$conts->id}}' class="btn btn-danger btn-sm"><i class="fa fa-close"></i></a>
                    </div>
                </td>
                </tr>
                <tr class="spacer"></tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
