@section('admincontent')
@extends('admin')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Liệt kê sản phẩm
        </div>
        <div class="row w3-res-tb">

            <div class="col-sm-4">
            </div>
            <div class="col-sm-3">
                <div class="input-group">
                    <form action="{{URL::to('/search-product')}}" method="POST">
                        {{csrf_field()}}
                        <input type="text" style="font-size: 17px; width: 200px;" name="search_product"
                            placeholder="Tìm kiếm sản phẩm" />
                        <input class="btn btn-primary btn-sm" style="margin-top: -4px;
    					color: white; font-size: 17px;  " type="submit" value="Tìm" name="send_oder">
                    </form>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Giá</th>
                        <th>Khuyến mãi</th>
                        <th>Danh mục</th>
                        <th>Thương hiệu</th>
                        <th>Trạng thái</th>

                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    <form onclick="return confirm('Are you sure delete?')" action="{{URL::to('/delete-all-product')}}"
                        method="POST">
                        {{csrf_field()}}

                        <input class="btn btn-primary btn-sm" style="margin-top: -4px;
    					color: white; font-size: 17px;  " type="submit" value="Xóa tất cả" name="send_oder">
                    </form>
                    <form action="{{URL::to('/delete-box-product')}}" method="POST">
                        {{csrf_field()}}

                        <input class="btn btn-primary btn-sm" style="margin-top: -4px;
    					color: white; font-size: 17px;  " type="submit" value="Xóa mục đã chọn" name="send_oder">
                        @foreach($all_product as $key => $pro)
                        <tr>
                            <td><label class="i-checks m-b-none"><input type="checkbox" name="check[]"
                                        value="{{$pro->product_id}}"> <i></i></label></td>
                            <td>{{$pro->product_name}}</td>
                            <td><img src="public/uploads/{{$pro->product_image}}" height="75" width="75"></td>
                            <td>{{number_format($pro->product_price) .' '.'VND'}}</td>
                            <td> <a href="{{URL::to('delete-promotion',$pro->product_id)}}">@if(!empty($pro->promotion))
                                    {{number_format($pro->promotion) .' '.'VND'}}
                                    @endif
                                </a>
                            </td>
                            <td>{{$pro->category_name}}</td>
                            <td>{{$pro->brand_name}}</td>

                            <td><span class="text-ellipsis">
                                    <?php
            if($pro->product_status ==0){
                    echo 'Hiện';
                }else{
                    echo 'Ẩn';  
                }
                    ?>
                                </span></td>
                            <td>
                                <a href="{{URL::to('edit-product',$pro->product_id)}}" class="active"
                                    ui-toggle-class="">
                                    <i class="fa fa-pencil-square-o text-success text-active"></i>
                                </a>
                                <a onclick="return confirm('Are you sure delete?')"
                                    href="{{URL::to('delete-product',$pro->product_id)}}" class="active"
                                    ui-toggle-class="">
                                    <i class="fa fa-times text-danger text"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </form>
                </tbody>
            </table>
        </div>
        <footer class="panel-footer">
            <div class="row">

                <div class="col-sm-7 text-right text-center-xs">
                    <!-- <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
             <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li> 
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul> -->
                </div>
            </div>
        </footer>
    </div>
</div>
</section>
@endsection