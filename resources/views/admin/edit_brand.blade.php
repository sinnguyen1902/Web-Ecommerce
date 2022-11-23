@section('admincontent')
@extends('admin')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhập thương hiệu sản phẩm
                        </header>
                        <?php
	$message = Session::get('message');
	if($message){
		echo $message;
		Session::put('message',null);
	}
	
	?>
                        <div class="panel-body">
                            @foreach($edit_brand_product as $key => $edit_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-add-brand-product/'.$edit_value->brand_id)}}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" value="{{$edit_value->brand_name}}" name="brand_product_name" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả</label>
                                    <input type="text" value="{{$edit_value->brand_desc}}" name="brand_product_desc" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                
                                @endforeach
                                <button type="submit" name="add_brand_product" class="btn btn-info">Sửa</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
            
                </section>

            </div>
@endsection