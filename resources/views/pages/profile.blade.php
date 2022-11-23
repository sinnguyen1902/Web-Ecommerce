@extends('welcome')
@section('content')

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/trangchu')}}">Home</a></li>
				  <li style="background: #FE980F; color: #FFFFFF;padding: 3px 7px;border-radius: 3px;" class="active">Thông tin của bạn</li>
				</ol>
			</div><!--/breadcrums-->


			

			<div class="shopper-informations">
				<div class="row">
					
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Thông tin</p>
							
							<div class="form-one" >
								<form action="{{URL::to('/edit-customer/'.$info_customer->customer_id)}}" method="POST">
								
									{{csrf_field()}}
									
									
								
									<input type="text" readonly="readonly" value="{{$info_customer->customer_name}}" name="" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
									<input type="text" readonly="readonly" value="{{$info_customer->customer_email}}" name="" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
									<input type="text" readonly="readonly" value="{{$info_customer->customer_phone}}" name="" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
									
									 
									<!-- <textarea name="shipping_notes"  placeholder="Ghi chú đơn hàng của bạn" rows="16"></textarea> -->
									<input class="btn btn-primary btn-sm" type="submit" value="Cập nhập" name="send_oder">
									
								</form>
							</div>
							
						</div>
					</div>
										
				</div>
			</div>
			

			
			
		</div>
	</section>

    
@endsection 