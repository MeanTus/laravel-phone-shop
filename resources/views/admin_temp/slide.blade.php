@extends('layouts.admin')

@section('title','Quản lý slider')

@section('sidebar1','Quản lý slide show hình ảnh')

@section('class9','active has-sub')

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
        <form action="/add-slide" method="post" enctype="multipart/form-data">
            @csrf
            <div class="custom-file">
                Hình ảnh<input type="file" class="custom-file-input" id="customFile" name="image_slide" required>
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div><br/>
            <input class="btn btn-primary btn-md" type="submit" name="add" value="Thêm">
        </form>
    </div>
    </div>
</div>
</div>
<div class="table-responsive m-b-40">
    <table style="background-color: white" class="table table-bordered text-center">
        <thead>
            <th style="width: 10%">ID</th>
            <th style="width: 65%">Hình ảnh</th>
            <th style="width: 15%">Trạng thái</th>
            <th style="width: 10%">Tùy chọn</th>
        </thead>
        <tbody>
            @foreach($slide as $slides)
            <tr>
                <td>{{ $slides->id }}</td>
                <td><img src="/assets/user/images/slide/{{ $slides->image }}" width="90%" /></td>
                <td align="center" class="toggle">
                    @if($slides->status==0)
                        <label class="switch">                          
                            <input type="checkbox">
                                <a class="slider round" href="/active-slide/{{ $slides->id }}"></a>
                        </label>
                    @else
                        <label class="switch">
                            <input type="checkbox" checked>
                                <a class="slider round" href="/unactive-slide/{{ $slides->id }}"></a>
                        </label>
                    @endif
                </td>
                <td>
                    <a href="/delete-slide/{{ $slides->id }}">
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
@endsection
