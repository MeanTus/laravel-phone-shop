@extends('layouts.user')

@section('title','Liên hệ')

@section('show','show-on-click')

@section('content')

<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="#">Trang chủ</a></li>
				<li class="active">Danh sách yêu thích</li>
			</ul>
		</div>
	</div>
	<br/><br/>
	<h1 align="center">Danh sách yêu thích</h1>
	<br>
	<div class="container">
	<div id="nd" class="table-responsive text-center">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width:10%">Mã SP</th>
                                    <th style="width:30%">Tên sản phẩm</th>
                                    <th style="width:20%">Hình ảnh</th>
                                    <th style="width:15%">Giá tiền</th>
                                    <th style="width:10%">Ngày thêm</th>
                                    <th style="width:15%">Cập nhật</th>
                                </tr>
                               
                            </thead>
                            <tbody>
                                
                                @foreach($like as $likes)
                                <tr> 
                                    <form>
                                        @csrf
                                    <td>{{ $likes->product_id }}</td>
                                    <td>{{ $likes->product_name }}</td>
                                    <td align="center"><img src="/assets/uploads/product/{{ $likes->product_image }}" alt="" class="img-responsive" width="100"></td>
                                    <td>{{ number_format($likes->product_price) }} đ</td>
                                    <td>{{ date('d-m-Y', strtotime($likes->create_at)) }}</td>
                                    <td class="text-center">
                                    	<button type="button" data-id_product="{{$likes->product_id}}" class='btn btn-success btn-lg nut'><i class="fa fa-shopping-cart"></i></button>
                                    	<a href="delete-list/{{$likes->product_id}}" class='btn btn-danger btn-lg xoa'><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </form>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
        <button class="primary-btn"><a href="/">Trở về trang chủ</a></button>
        <br><br>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.nut').click(function(){
                var id = $(this).data('id_product');
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: '{{url('/add-wish')}}',
                    method: 'POST',
                    data:{id:id,_token:_token},
                    
                    success: function(data) {
                        swal({
                                title: "Đã thêm sản phẩm vào giỏ hàng",
                                text: "Bạn có thể đi tới giỏ hàng để tiến hành thanh toán",
                                showCancelButton: false,
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "Đi đến giỏ hàng",
                                closeOnConfirm: false
                            },
                            function() {
                                window.location.href = "{{url('/cart')}}";
                            });
                    }

                });
        });
    });
</script>
@endsection