@extends('layouts.admin')

@section('title','Bình luận')

@section('sidebar1','Quản lý bình luận')

@section('class6','active has-sub')
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
          <th scope="col">ID</th>
          <th scope="col">Tên KH</th>
          <th scope="col">Tài khoản KH</th>
          <th scope="col">Mã SP</th>
          <th scope="col">Ngày đăng</th>
          <th scope="col">Nội dung</th>
          <th scope="col">Tình trạng</th>
          <th scope="col">Tùy chọn</th>
        </tr>
      </thead>
      <tbody>
        @foreach($cmt as $cmts)
          <tr>
            <td>{{$cmts->id}}</td>
            <td>{{$cmts->name}}</td>
            <td>{{$cmts->username}}</td>
            <td>{{$cmts->product_id}}</td>
            <td>{{ date('d-m-Y H:m:s', strtotime($cmts->created_at))}}</td>
            <td>{{$cmts->content}}</td>
            <td>
              @if($cmts->status == 1)
                <span class="status--process"> Đã duyệt </span>
              @else
                <span class="status--denied"> Chờ duyệt </span>
              @endif
            </td>
            <td>
              @if($cmts->status == 0)
                <a href="/active-cmt/{{$cmts->id}}" class="btn btn-success" type="button"><i class="fa fa-check"></i></a>
              @else

              @endif
                <a href="/delete-cmt/{{$cmts->id}}" class="btn btn-danger" type="button"><i class="fa fa-trash"></i></a>
            </td> 
          </tr>
        @endforeach
      </tbody>
  </table>
</div>
@endsection
