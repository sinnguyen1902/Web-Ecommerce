@extends('welcome')
@section('content')

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{URL::to('/trangchu')}}">Home</a></li>
                <li style="background: #FE980F; color: #FFFFFF;padding: 3px 7px;border-radius: 3px;" class="active">Giỏ
                    hàng của bạn</li>
            </ol>
        </div>
        <?php
			$content = Cart::content();
			//  print_r($content);
			?>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Hình ảnh</td>
                        <td class="description">Mô tả</td>
                        <td class="price">Giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Tổng tiền</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($content as $v_content)
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{URL::to('public/uploads/'.$v_content->options->image)}}" width="50"
                                    height="50" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{$v_content->name}}</a></h4>
                            <!-- <p>Web ID: 1089772</p> -->
                        </td>
                        <td class="cart_price">

                            <p>{{number_format($v_content->price).' '.'VND'}}</p>

                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <form action="{{URL::to('/update-cart-quantity')}}" method="POST">
                                    {{csrf_field()}}
                                    <input style="width: 50px" class="cart_quantity_input" type="number" min="0"
                                        max="{{$v_content->weight}}" name="cart_quantity" value="{{$v_content->qty}}"
                                        autocomplete="off" size="2">
                                    <input class="btn btn-default btn-sm" type="submit" value="Cập nhập"
                                        name="update_qty">
                                    <input class="btn btn-default btn-sm" type="hidden" value="{{$v_content->rowId}}"
                                        name="rowId_cart">
                                </form>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">
                                <?php
								$subtotal = $v_content->price * $v_content->qty;
								echo number_format($subtotal).' '.'VND';
								
								?>

                            </p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"><i
                                    class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</section>


<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your
                delivery cost.</p>
        </div>

        <div class="col-sm-6">
            <div class="total_area">
                <ul>
                    <li>Tổng <span>{{Cart::subtotal(0).' '.'VND'}}</span></li>
                    <li>Thuế <span>{{Cart::tax(0).' '.'VND'}}</span></li>
                    <li>Phí vận chuyển <span>Free</span></li>
                    <li>Thành tiền<span>{{Cart::total(0).' '.'VND'}}</span></li>
                </ul>
                <!-- <a class="btn btn-default update" href="">Update</a> -->

                <?php
									$customer_id = Session::get('customer_id');
									$shipping_id = Session::get('shipping_id');
									if($customer_id != NULL && $shipping_id == NULL){

											
								?>

                <a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Thanh toán</a>
                <?php
								}elseif($customer_id != NULL && $shipping_id != NULL){
								?>
                <a class="btn btn-default check_out" href="{{URL::to('/payment')}}">Thanh toán</a>

                <?php 
								}else{
								
								?>
                <a class="btn btn-default check_out" href="{{URL::to('/login-checkout')}}">Thanh toán</a>
                <?php
									}
							?>
                <!-- 	<a class="btn btn-default check_out" href="{{URL::to('/login-checkout')}}">Thanh toán</a> -->




            </div>
        </div>
    </div>
    </div>
</section>

@endsection