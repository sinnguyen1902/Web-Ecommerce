@extends('welcome')
@section('content')

<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Đăng nhập</h2>
						<form action="{{URL::to('/login-customer')}}" method = "POST">
						{{csrf_field()}}
							<input type="text" name="customer_email" placeholder="Email" />
							<input type="password" name="customer_password" placeholder="Mật khẩu" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Ghi nhớ đăng nhập
							</span>
							<button type="submit" class="btn btn-default">Đăng nhập</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Đăng ký tài khoản mới</h2>
						<form action="{{URL::to('/add-customer')}}" method="POST">
                            {{csrf_field()}}
							<input type="text" name="sign_name" placeholder="Họ Và Tên"/>
							<input type="email" name="sign_email" placeholder="Địa chỉ Emaill"/>
							<input type="password" name="sign_password" placeholder="Mật khẩu"/>
							<input type="text" name="sign_phone" placeholder="Số điện thoại"/>
							<button type="submit" class="btn btn-default">Đăng ký</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section>



@endsection 