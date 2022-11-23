@extends('welcome')
@section('content')

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/trangchu')}}">Home</a></li>
				  <li style="background: #FE980F; color: #FFFFFF;padding: 3px 7px;border-radius: 3px;" class="active">Lịch sử mua hàng</li>
				</ol>
			</div>
            
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="description">Tên</td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="status">Trạng thái</td>
						</tr>
					</thead>
					<tbody>
						@foreach($history as $key => $history)
						<tr>
						<td>{{$history->product_name}}</td>	 
						<td>{{$history->product_price}}</td>
						<td>{{$history->product_sales_quantity}}</td>	
                        @if($history->order_status == 1) 
						<td>Đang xử lý</td>	 
                        @elseif($history->order_status == 2)
                        <td>Đang giao hàng</td>
                        @else($history->order_status == 3)
                        <td style="color: #FF8C00;">Đã nhận hàng </td>
						</tr>
					    @endif
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</section>


	

@endsection 