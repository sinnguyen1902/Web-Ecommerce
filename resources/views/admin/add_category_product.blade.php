@section('admincontent')
@extends('admin')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm danh mục sản phẩm
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
                                <form role="form" action="{{URL::to('/save-add-category-product')}}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" name="category_product_name" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả</label>
                                    <textarea class="form-control" name="category_product_desc" id="exampleInputPassword" placeholder="Mô tả danh mục"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Hiển thị</label>
                                    <select name="category_product_status" class="form-control input-sm m-bot15">
                                    <option value="1" >Ẩn</option>
                                    <option value="0" >Hiển thị</option>
                                </select>
                                </div>
                                <div class="checkbox">
                                </div>
                                <button type="submit" name="add_category_product" class="btn btn-info">Thêm</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
            
                </section>

            </div>
@endsection