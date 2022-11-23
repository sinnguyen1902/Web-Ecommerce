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
                    <form role="form" action="{{URL::to('/save-add-product')}}" method="post"
                        enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" name="product_name" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh</label>
                            <input type="file" name="product_image" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá</label>
                            <input type="text" name="product_price" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Phần trăm khuyến mãi</label>
                            <input type="text" name="promotion" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số lượng</label>
                            <input type="text" name="product_quantity" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả</label>
                            <textarea class="form-control" name="product_desc" id="exampleInputPassword"
                                placeholder="Mô tả danh mục"></textarea>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nội dung</label>
                                <textarea class="form-control" name="product_content" id="exampleInputPassword"
                                    placeholder="Mô tả danh mục"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Danh mục sản phẩm</label>
                                <select name="category_id" class="form-control input-sm m-bot15">
                                    @foreach($cate_product as $key => $cate)
                                    <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Thương hiệu sản phẩm</label>
                                <select name="brand_id" class="form-control input-sm m-bot15">
                                    @foreach($brand_product as $key => $brand)
                                    <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Hiển thị</label>
                                <select name="product_status" class="form-control input-sm m-bot15">
                                    <option value="1">Ẩn</option>
                                    <option value="0">Hiển thị</option>
                                </select>
                            </div>
                            <div class="checkbox">
                            </div>
                            <button type="submit" name="add_product" class="btn btn-info">Thêm</button>
                    </form>
                </div>

            </div>
        </section>

    </div>

    </section>

</div>
@endsection