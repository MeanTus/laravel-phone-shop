@extends('layouts.admin')

@section('title','Tài khoản')

@section('sidebar1','Quản lý tài khoản')

@section('class1','active has-sub')

@section('search')
<form class="form-header" action="/acc-search" method="GET">
</form>
@endsection

@section('content1')
<br>
    <div class="table-responsive table-responsive-data2">
        <table class="table table-data2 responsive">
            <thead>
                <tr>
                    <th>Hình ảnh</th>
                    <th>Email</th>
                    <th>Tài khoản</th>
                    <th>Giới tính</th>
                    <th>Tên</th>
                    <th>Số điện thoại</th>
                    <th>Trang thái</th>
                    <th>Chức vụ</th>
                    <th>Tùy chọn</th>
                </tr>
            </thead>
            <tbody>
                @foreach($account as $accounts)
                <tr class="tr-shadow">
                    <td><img src="/assets/uploads/user/{{ $accounts->avatar }}"></td>
                    <td>
                        <span class="block-email">{{ $accounts->email }}</span>
                    </td>
                    <td class="desc">{{ $accounts->username }}</td>
                    <td>
                        @if($accounts->gender === 0)
                            Nữ
                        @else
                            Nam 
                        @endif
                    </td>
                    <td>{{ $accounts->name }}</td>
                    <td>{{ $accounts->phone_number }}</td>
                    <td>
                        @if($accounts->status==0)
                            <a href="/active-account/{{ $accounts->id }}">
                                <label class="switch">
                                    <input type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </a>
                        @else
                            <a href="/unactive-account/{{ $accounts->id }}">
                                <label class="switch">
                                    <input type="checkbox" checked>
                                    <span class="slider round"></span>
                                </label>
                            </a>
                        @endif
                        <!--@{{ date('d-m-Y', strtotime($accounts->birth_day))}}-->
                    </td>
                    <td><span 
                        @if($accounts->role ==="Admin")
                            class="role admin"
                        @else
                            class="role user" 
                        @endif
                        >{{ $accounts->role }}</span></td>            
                    <td>
                        <div class="table-data-feature">
                            <a style='color: white' href='/edit-account/{{ $accounts->id }}'><button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                <i class="zmdi zmdi-edit"></i></button>
                            </a>
                            <a style='color: white' href='/delete-account/{{ $accounts->id }}'><button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                <i class="zmdi zmdi-delete"></i></button>
                            </a>
                        </div>
                    </td>
                </tr>
                <tr class="spacer"></tr>
                @endforeach                                       
            </tbody>
        </table>
    </div>
@endsection
