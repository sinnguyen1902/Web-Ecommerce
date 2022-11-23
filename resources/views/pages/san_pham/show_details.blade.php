@extends('welcome')
@section('content')



<div class="product-details">
    <!--product-details-->
    @foreach($details_product as $key => $value)


    <?php 
	Session::put('product_id',$value->product_id);
?>
    <div class="col-sm-5">
        <div class="view-product">
            <img src="{{URL::to('public/uploads/'.$value->product_image)}}" alt="" />
            <!-- <h3>ZOOM</h3> -->
        </div>
        <div id="similar-product" class="carousel slide" data-ride="carousel">


        </div>

    </div>
    <div class="col-sm-7">
        <div class="product-information">
            <!--/product-information-->
            <img src="{{URL::to('public/fontend/images//new.jpg')}}" class="newarrival" alt="" />
            <h2>{{$value->product_name}}</h2>
            <p>ID: {{$value->product_id}}</p>
            <!-- <img src="{{URL::to('public/fontend/images//rating.png')}}" alt="" /> -->

            <form role="form" action="{{URL::to('/save-cart')}}" method="post">
                {{csrf_field()}}
                <span>
                    <span style="font-size: 20px;">
                        Giá: @if(empty($value->promotion))
                        {{number_format($value->product_price).' '.'VND'}}
                        @else
                        {{number_format($value->promotion).' '.'VND'}}
                        @endif
                    </span>
                    <p><span style="font-size: 20px;">Số lượng:</span><input
                            style="height: 20px;font-size: 15px;margin: 5px;" type="number" name="qty" min="1"
                            value="1" />
                        <input type="hidden" name="productid_hidden" min="1" value="{{$value->product_id}}" />
                    </p>



                </span>


                @if($value->product_quantity > 0)
                <p><b>Số lượng kho:</b> {{$value->product_quantity}}</p>
                @else
                <p><b>Số lượng kho:</b> Hết hàng</p>
                @endif
                <p><b>Điều kiện:</b> Mới</p>

                <p><b>Thương hiệu:</b> {{$value->brand_name}}</p>
                <p><b>Danh mục:</b> {{$value->category_name}}</p>
                <button type="submit" class="btn btn-fefault cart">
                    <i class="fa fa-shopping-cart"></i>
                    Thêm giỏ hàng
                </button>
            </form>
            <!-- <a href=""><img src="{{URL::to('public/fontend/images/recommend3.jpg')}}" class="share img-responsive"  alt="" /></a> -->
        </div>
        <!--/product-information-->
    </div>
</div>
<!--/product-details-->

<div class="category-tab shop-details-tab">
    <!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#details" data-toggle="tab">Mô tả</a></li>
            <li><a href="#companyprofile" data-toggle="tab">Chi tiết sản phẩm</a></li>

            <li><a href="#reviews" data-toggle="tab">Bình luận</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade active in" id="details">
            <p>{!!$value->product_desc!!} </p>


        </div>

        <div class="tab-pane fade" id="companyprofile">
            <p>{!!$value->product_content!!} </p>


        </div>



        <div class="tab-pane fade " id="reviews">
            <div class="col-sm-12">



                <form action="{{URL::to('/comment/'.$value->product_id)}}" method="POST">
                    {{csrf_field()}}
                    <span>
                        <a style="color: #FE980F;"> Vui lòng đăng nhập để bình luận.</a>
                    </span>

                    <span>
                        <input type="text" placeholder="Thêm bình luận" name="comment" />
                    </span>

                    <?php
									$customer_id = Session::get('customer_id');
									
									if($customer_id != NULL){

											
								?>

                    <input style="margin-left: 20px;" class="btn btn-primary btn-sm" type="submit" value="Thêm"
                        name="send_oder">

                    <?php
									}else{
								
								?>

                    <a class="btn btn-default check_out" href="{{URL::to('/login-checkout')}}">Thêm bình luận</a>
                    <?php
									}
								?>
                </form>

                <a class="btn btn-default check_out" href="{{URL::to('/show-comment/'.$value->product_id)}}">Xem bình
                    luận</a>

            </div>
        </div>

    </div>
</div>
<!--/category-tab-->
@endforeach
<div class="recommended_items">
    <!--recommended_items-->
    <h2 style="margin: 4px 15px;" class="title text-center">Sản phẩm liên quan</h2>

    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">

                @foreach($related_product as $key => $lienquan)
                @if(empty($lienquan->promtion))
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{URL::to('public/uploads/'.$lienquan->product_image)}}" alt="" />
                                <h2>{{number_format($value->product_price).' '.'VND'}}</h2>
                                <p>{{$lienquan->product_name}}</p>
                                <button type="button" class="btn btn-default add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>Thêm giỏ hàng</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>

        </div>
        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>
</div>
<!--/recommended_items-->




@endsection