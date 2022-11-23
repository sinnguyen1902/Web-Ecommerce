@extends('welcome')
@section('content')

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/trangchu')}}">Trang chủ</a></li>
				  <li style="background: #FE980F; color: #FFFFFF;padding: 3px 7px;border-radius: 3px;" class="active">Thông tin vận chuyển</li>
				</ol>
			</div><!--/breadcrums-->


			<div class="register-req">
				<p>Đăng ký hoặc đăng nhập để thanh toán giỏ hàng và xem lại lịch sử mua hàng</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Bill To</p>
							<div class="form-one" >
								<form action="{{URL::to('/save-checkout-customer')}}" method="POST">
									{{csrf_field()}}
									<input type="text" name="shipping_name" placeholder="Họ tên">
									<input type="text" name="shipping_email" placeholder="Email">
									
									<input type="text" name="shipping_phone" placeholder="Số điện thoại">
									<input type="text" name="shipping_address" placeholder="Địa chỉ">
									<textarea  name="shipping_notes"  placeholder="Ghi chú đơn hàng của bạn" rows="8"></textarea>
									<input style=" margin-bottom: 58px;" class="btn btn-primary btn-sm" type="submit" value="Gửi" name="send_oder">
									
								</form>
							</div>
							
						</div>
					</div>
					<!-- <div class="col-sm-4">
						<div class="order-message">
							<p>Ghi chứ đơn hàng</p>
							<textarea name="message"  placeholder="Ghi chú đơn hàng của bạn" rows="16"></textarea>
							
						</div>	
					</div> -->					
				</div>
			</div>
			<!-- <div class="review-payment">
				<h2>Xem lại giỏ hàng</h2>
			</div>

			
			<div class="payment-options">
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span>
				</div> -->
		</div>
	</section>

    
@endsection 