@section('admincontent')
@extends('admin')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm sản phẩm
            </header>
            <?php
	$message = Session::get('message');
	if($message){
		echo $message;
		Session::put('message',null);
	}
	
	?>
            <div class="panel-body">
                <div class="position-center">
                    @foreach($edit_product as $key => $pro)
                    <form role="form" action="{{URL::to('/update-add-product/'.$pro->product_id)}}" method="post"
                        enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" name="product_name" value="{{$pro->product_name}}" class="form-control"
                                id="exampleInputEmail1" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh</label>
                            <input type="file" name="product_image" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                            <img src="{{URL::to('public/uploads/'.$pro->product_image)}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá</label>
                            <input type="text" name="product_price" value="{{$pro->product_price}}" class="form-control"
                                id="exampleInputEmail1" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phần trăm khuyến mãi</label>
                            <input type="text" name="promotion" value="{{$pro->promotion}}" class="form-control"
                                id="exampleInputEmail1" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả</label>
                            <textarea class="form-control" name="product_desc"
                                id="exampleInputPassword">{{$pro->product_desc}}</textarea>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nội dung</label>
                                <textarea class="form-control" name="product_content"
                                    id="exampleInputPassword">{{$pro->product_content}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Danh mục sản phẩm</label>
                                <select name="category_id" class="form-control input-sm m-bot15">
                                    @foreach($cate_product as $key => $cate)
                                    @if($cate->category_id==$pro->category_id)
                                    <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                    @else
                                    <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Thương hiệu sản phẩm</label>
                                <select name="brand_id" class="form-control input-sm m-bot15">
                                    @foreach($brand_product as $key => $brand)
                                    @if($brand->brand_id==$pro->brand_id)
                                    <option selected value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                    @else
                                    <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            @endforeach
                        </div>
                        <div class="checkbox">
                        </div>
                        <button type="submit" name="update-add-product" class="btn btn-info">Sửa</button>
                    </form>
                </div>

            </div>
        </section>

    </div>

    </section>

</div>
@endsection