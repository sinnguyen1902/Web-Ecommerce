@extends('welcome')
@section('content')

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/trangchu')}}">Home</a></li>
				  <li style="background: #FE980F; color: #FFFFFF;padding: 3px 7px;border-radius: 3px;" class="active">Sản phẩm yêu thích</li>
				</ol>
			</div>
            
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình ảnh</td>
							<td class="description">Mô tả</td>
							<td class="price">Giá</td>
							<td class="price"></td>
						</tr>
					</thead>
					<tbody>
						@foreach($show_whistlist as $key => $whistlist1)
						<tr>
							 <td class="cart_product">
								<a href=""><img src="{{URL::to('public/uploads/'.$whistlist1->product_image)}}" width="50" height="50"alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$whistlist1->product_name}}</a></h4>
								
							</td>
							<td class="cart_price">
								<p>{{number_format($whistlist1->product_price).' '.'VND'}}</p>
							</td> 

                            
							
				
							 <td class="cart_delete">
								<a class="whistlist_delete" href="{{URL::to('/delete-whistlist/'.$whistlist1->product_id)}}"><i class="fa fa-times"></i></a>
							</td> 
						</tr>
					@endforeach
						
					</tbody>
				</table>
			</div>
		</div>
	</section>


	

@endsection 