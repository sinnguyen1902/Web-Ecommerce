@extends('welcome')
@section('content')



<div class="product-details"><!--product-details-->
@foreach($details_product as $key => $value)

						<div class="col-sm-5">
							<div class="view-product">
								<img style="height: 250px;" src="{{URL::to('public/uploads/'.$value->product_image)}}" alt="" />
								<p style="color: #FF8C00">Tên:</p><p>{{$value->product_name}}</p>
							</div>
							

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img  src="{{URL::to('public/fontend/images//new.jpg')}}" class="newarrival" alt="" />
								@foreach($show_comment as $key => $comment)
								<a style="color: #FE980F;font-size:20px;margin-right: 20px; margin-bottom: 0px;">
                                <span style="margin-bottom: 0px; margin-top: 0px;"  class="glyphicon glyphicon-user">{{$comment->customer_name}}:</a>
                                <span>{{$comment->comment}}</span>
                                <br></br>
                                



                                @endforeach
								
								
								
                                   
								
								



								
                                
								
								
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
			
					
                    @endforeach			
					
				

                    

@endsection 