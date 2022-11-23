@extends('welcome')
@section('content')


<div class="features_items">
    <!--features_items-->
    <h2 style="margin: 4px 15px;" class="title text-center">Sản phẩm khuyễn mãi</h2>
    @foreach($all_product as $key => $product)
    @if(!empty($product->promotion))
    <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img style="width: 205px; height: 200px"
                            src="{{URL::to('public/uploads/'.$product->product_image)}}" alt="" />
                        <h2 style="text-decoration: line-through">{{number_format($product->product_price).' '.'VND'}}
                        </h2>

                        <h2>{{number_format($product->promotion).' '.'VND'}}</h2>


                        <p>
                            @if (strlen($product->product_name) > 40)

                            {{substr($product->product_name, 0, 40) . '...';}}
                            @else
                            {{$product->product_name . '...';}}
                            @endif
                        </p>



                        <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}"
                            class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Mua ngay</a>

                    </div>


                </div>
                <div class="choose">
                    <?php
									$customer_id = Session::get('customer_id');		
								?>
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="{{URL::to('/whistlist/'.$product->product_id)}}"><i
                                    class="fa fa-plus-square"></i>Thêm yêu thích</a></li>
                        <li><a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}"><i
                                    class="fa fa-plus-square"></i>Bình luận</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </a>
    @endif
    @endforeach


</div>
<div class="features_items">
    <!--features_items-->
    <h2 style="margin: 4px 15px;" class="title text-center">Sản phẩm mới</h2>
    @foreach($all_product as $key => $product)
    @if(empty($product->promotion))
    <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img style="width: 205px; height: 200px"
                            src="{{URL::to('public/uploads/'.$product->product_image)}}" alt="" />
                        <h2>{{number_format($product->product_price).' '.'VND'}}</h2>
                        <p>@if (strlen($product->product_name) > 20)

                            {{substr($product->product_name, 0, 20) . '...';}}
                            @else
                            {{$product->product_name . '...';}}
                            @endif</p>
                        <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}"
                            class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Mua ngay</a>

                    </div>


                </div>
                <div class="choose">
                    <?php
									$customer_id = Session::get('customer_id');		
								?>
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="{{URL::to('/whistlist/'.$product->product_id)}}"><i
                                    class="fa fa-plus-square"></i>Thêm yêu thích</a></li>
                        <li><a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}"><i
                                    class="fa fa-plus-square"></i>Bình luận</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </a>
    @endif
    @endforeach


</div>
<!--features_items-->



<div class="category-tab">
    <!--category-tab-->
    <!--	<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tshirt" data-toggle="tab">T-Shirt</a></li>

							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="tshirt" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{('public/fontend/images/gallery1.jpg')}}" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
								
							</div>
						</div>-->
</div>
<!--/category-tab-->


<div class="recommended_items">
    <!--recommended_items-->
    <!--
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{('public/fontend/images/recommend1.jpg')}}" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
                                                <img src="{{('public/fontend/images/recommend1.jpg')}}" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
                                                <img src="{{('public/fontend/images/recommend1.jpg')}}" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
								</div>
								<div class="item">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
                                                <img src="{{('public/fontend/images/recommend1.jpg')}}" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
                                                <img src="{{('public/fontend/images/recommend1.jpg')}}" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
                                                <img src="{{('public/fontend/images/recommend1.jpg')}}" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>-->
</div>
<!--/recommended_items-->

@endsection