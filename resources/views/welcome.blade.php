<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home</title>
    <link href="{{asset('public/fontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="css/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>
<!--/head-->

<body>

    <header id="header">
        <!--header-->
        <div class="header_top">
            <!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> 0796998523</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i>CeoNhuNgoc@gmail.com.vn</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header_top-->

        <div class="header-middle">
            <!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="logo pull-left">
                            <a style="color: #FE980F;font-family: abel; font-size: 20px; font-weight: bold;"
                                href="{{URL::to('/trangchu')}}">NƯỚC HOA CHÍNH
                                HÃNG
                                <!-- <img style=" width: 45px;" src="{{asset('public/fontend/images/logo2.jpg')}}" alt="" /> -->
                            </a>
                        </div>
                        <!-- <div class="btn-group pull-right">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									USA
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canada</a></li>
									<li><a href="#">UK</a></li>
								</ul>
							</div>
							
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									DOLLAR
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canadian Dollar</a></li>
									<li><a href="#">Pound</a></li>
								</ul>
							</div>
						</div> -->
                    </div>
                    <div class="col-sm-10">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <?php
								$customer_id = Session::get('customer_id');
								
								if($customer_id != NULL){
									

								?>
                                <li><a style="color: #FE980F;" href="{{URL::to('/profile/'.$customer_id)}}"><span
                                            class="glyphicon glyphicon-user"></span>
                                        <?php
								$name = Session::get('customer_name');
								if($name){
								echo $name;
								}
				
								?> </a></li>
                                <?php
								}
								?>
                                <?php
								$customer_id = Session::get('customer_id');
								
								if($customer_id != NULL){
									

								?>
                                <li><a href="{{URL::to('/show-whistlist/'.$customer_id)}}"><i class="fa fa-star"></i>
                                        Yêu thích</a></li>

                                <?php
								}
								?>




                                <li><a href="{{URL::to('/show-cart')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a>
                                </li>

                                <?php
									$customer_id = Session::get('customer_id');
									$shipping_id = Session::get('shipping_id');
									if($customer_id != NULL && $shipping_id == NULL){

											
								?>
                                <li><a href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a>
                                </li>


                                <?php
									}elseif($customer_id != NULL && $shipping_id != NULL){
								?>
                                <li><a href="{{URL::to('/payment')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a>
                                </li>
                                <?php 
								}else{
								?>
                                <li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-crosshairs"></i> Thanh
                                        toán</a></li>
                                <?php
								}
							?>
                                <?php
								$customer_id = Session::get('customer_id');
								
								if($customer_id != NULL){
									

								?>
                                <li><a href="{{URL::to('/history/'.$customer_id)}}"><i class="fa fa-star"></i> Lịch sử
                                        mua hàng</a></li>

                                <?php
								}
								?>

                                <!-- <li><a href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li> -->




                                <?php
									$customer_id = Session::get('customer_id');
									if($customer_id == NULL){

											
								?>
                                <li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-lock"></i> Đăng nhập </a>
                                </li>
                                <li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-lock"></i> Đăng ký</a></li>


                                <?php
									}else{
								?>

                                <li><a href="{{URL::to('/logout-checkout')}}"><i class="fa fa-lock"></i> Đăng xuất</a>
                                </li>
                                <?php
									}
							?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-middle-->

        <div class="header-bottom">
            <!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{URL::to('trangchu')}}" class="active">Trang chủ</a></li>
                                <li class="dropdown"><a href="">Menu<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        @foreach ($category as $key => $cate)
                                        <li><a
                                                href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a>
                                        </li>

                                        @endforeach

                                    </ul>
                                </li>
                                <li class="dropdown"><a href="">Tin tức<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}">Khuyến
                                                mãi</a></li>
                                    </ul>
                                </li>
                                <!-- <li><a href="404.html">Giỏ hàng</a></li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="search_box pull-right">
                            <form action="{{URL::to('/search')}}" method="POST">
                                {{csrf_field()}}
                                <input type="text" style="font-size: 17px; width: 200px;" name="keywords_submit"
                                    placeholder="Tìm kiếm sản phẩm" />
                                <input class="btn btn-primary btn-sm" style="margin-top: -4px;
    					color: white; font-size: 17px;  " type="submit" value="Tìm" name="send_oder">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-bottom-->
    </header>
    <!--/header-->

    <section id="slider">
        <!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>

                        <div class="carousel-inner">

                            <div class="item active">
                                <div class="col-sm-6">

                                    <h1><span>NƯỚC HOA CHÍNH
                                            HÃNG</span></h1>
                                    <h2>Nước hoa nữ Yves Saint Laurent Black Opium EDP</h2>
                                    <p>Nước hoa nữ Yves Saint Laurent Black Opium EDP là hương nước hoa mang phong vị
                                        vanilla phương Đông, đó là thống nhất các hương phương đông với các hương có vị
                                        ngọt, chứ không chỉ có va-ni.</p>
                                    <button type="button" class="btn btn-default get">Xem chi tiết</button>
                                </div>
                                <div class="col-sm-6">
                                    <img style="max-width: 500px;height: 300px;"
                                        src="{{asset('public/fontend/images/hinh1.webp')}}" class="girl img-responsive"
                                        alt="" />
                                    <!-- <img src="{{('public/fontend/images/pricing.png')}}" class="pricing" alt="" /> -->
                                </div>
                            </div>

                            <div class="item ">
                                <div class="col-sm-6">
                                    <h1><span>NƯỚC HOA CHÍNH
                                            HÃNG</span></h1>
                                    <h2>Nước hoa nữ Burberry Her London Dream Eau de Parfum</h2>
                                    <p>Đặc trưng Mùi hương của cô ấy phát triển thành Giấc mơ London của Cô ấy với
                                        hương đầu chín của chanh và gừng tươi, hoa hồng lãng mạn và trái tim hoa mẫu
                                        đơn. Sáng sủa và hấp dẫn, Her London Dream là hiện thân của phong cách thoải
                                        mái và trẻ trung.</p>
                                    <button type="button" class="btn btn-default get">Xem chi tiết</button>
                                </div>
                                <div class="col-sm-6">
                                    <img style="max-width: 500px;height: 300px;"
                                        src="{{asset('public/fontend/images/hinh2.webp')}}" class="girl img-responsive"
                                        alt="" />
                                    <!-- <img src="{{('public/fontend/images/pricing.png')}}" class="pricing" alt="" /> -->
                                </div>
                            </div>

                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>NƯỚC HOA CHÍNH
                                            HÃNG</span></h1>
                                    <h2>Nước hoa nữ Chanel Chance Eau Tendre Eau de Toilette</h2>
                                    <p>Mùi hương tinh tế mang đậm chất thơ. Với hương thơm trái cây hòa quyện với hương
                                        hoa thanh khiết, tuy nhẹ nhàng nhưng vẫn toát lên được vẻ sống động như những
                                        làn sóng xanh êm dịu.</p>
                                    <button type="button" class="btn btn-default get">Xem chi tiết</button>
                                </div>
                                <div class="col-sm-6">
                                    <img style="max-width: 500px;height: 300px;"
                                        src="{{asset('public/fontend/images/hinh3.webp')}}" class="girl img-responsive"
                                        alt="" />
                                    <!-- <img src="{{('public/fontend/images/pricing.png')}}" class="pricing" alt="" /> -->
                                </div>
                            </div>

                        </div>

                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--/slider-->

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2 style="margin: 4px auto 30px;">Danh mục sản phẩm</h2>
                        <div class="panel-group category-products" id="accordian">
                            <!--category-productsr-->
                            @foreach ($category as $key => $cate)

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a
                                            href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a>
                                    </h4>
                                </div>
                            </div>




                            @endforeach
                        </div>
                        <!--/category-products-->

                        <div class="brands_products">
                            <!--brands_products-->
                            <h2>Thương hiệu sản phẩm</h2>
                            <div class="brands-name">
                                @foreach($brand as $key => $brand)
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="{{URL::to('/thuong-hieu-san-pham/'.$brand->brand_id)}}"> <span
                                                class="pull-right"></span>{{$brand->brand_name}}</a></li>

                                </ul>
                                @endforeach
                            </div>
                        </div>
                        <!--/brands_products-->

                        <!-- <div class="shipping text-center"> -->
                        <!--shipping-->
                        <!-- <img src="{{('public/fontenf/images/shipping.jpg')}}" alt="" />
						</div> -->
                        <!--/shipping-->

                    </div>
                </div>

                <div class="col-sm-9 padding-right">

                    @yield('content')



                </div>
            </div>
        </div>
    </section>

    <footer id="footer">
        <!--Footer-->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="companyinfo">
                            <h2><span>Nước Hoa Chính Hãng</span></h2>
                            <p>HOTLINE: 0796998523</p>
                            <p>ADdress: 35 PHẠM NGŨ LÃO, TP. CẦN THƠ</p>
                        </div>
                    </div>
                    <div class="col-sm-7">

                        @foreach($all_product->take(4) as $key => $product)
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img style="height: 59px;width: 130px;"
                                            src="{{URL::to('public/uploads/'.$product->product_image)}}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>

                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-sm-3">
                        <div class="address">
                            <img src="{{('public/fontend/images/map.png')}}" alt="" />
                            <!-- <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Online Help</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Order Status</a></li>
								<li><a href="#">Change Location</a></li>
								<li><a href="#">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quock Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">T-Shirt</a></li>
								<li><a href="#">Mens</a></li>
								<li><a href="#">Womens</a></li>
								<li><a href="#">Gift Cards</a></li>
								<li><a href="#">Shoes</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Terms of Use</a></li>
								<li><a href="#">Privecy Policy</a></li>
								<li><a href="#">Refund Policy</a></li>
								<li><a href="#">Billing System</a></li>
								<li><a href="#">Ticket System</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Company Information</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">Store Location</a></li>
								<li><a href="#">Affillate Program</a></li>
								<li><a href="#">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>
-->

    </footer>
    <!--/Footer-->



    <script src="{{asset('public/fontend/js/jquery.js')}}"></script>
    <script src="{{asset('public/fontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/fontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('public/fontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/fontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/fontend/js/main.js')}}"></script>
</body>

</html>