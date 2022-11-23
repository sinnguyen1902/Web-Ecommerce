@extends('welcome')
@section('content')

<div class="features_items">
    <!--features_items-->
    <h2 style="margin: 4px 15px;" class="title text-center">Kết quả tìm kiếm</h2>
    @foreach($search_product as $key => $product)

    <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img style="width: 205px; height: 200px"
                            src="{{URL::to('public/uploads/'.$product->product_image)}}" alt="" />
                        <h2>{{number_format($product->product_price).' '.'VND'}}</h2>
                        <p>{{$product->product_name}}</p>
                        <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}"
                            class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Mua ngay</a>
                    </div>

                </div>
                <div class="choose">
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

    @endforeach


</div>
<!--features_items-->








@endsection