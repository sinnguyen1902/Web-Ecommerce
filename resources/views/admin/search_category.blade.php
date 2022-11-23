@section('admincontent')
@extends('admin')

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê danh mục sản phẩm
    </div>
    <div class="row w3-res-tb">
      
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
        <form action="{{URL::to('/search-category')}}" method="POST">
								{{csrf_field()}}
						<input type="text" style="font-size: 17px; width: 200px;"   name="search_category" placeholder="Tìm kiếm sản phẩm"/>
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
            <th>Tên danh mục</th>
            <th>Hiển thị</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>

            @foreach($search_category as $key => $cate_pro)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$cate_pro->category_name}}</td>
            <td><span class="text-ellipsis">
                <?php
            if($cate_pro->category_status ==0){
                    echo 'Ẩn';
                }else{
                    echo 'Hiện thị';  
                }
                    ?>
            </span></td>
            <td>
              <a href="{{URL::to('/edit-category-product',$cate_pro->category_id)}}" class="active" ui-toggle-class="">
                  <i class="fa fa-pencil-square-o text-success text-active"></i>
            </a>
            <a onclick="return confirm('Are you sure delete?')" href="{{URL::to('/delete-category-product',$cate_pro->category_id)}}" class="active" ui-toggle-class="">
              <i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          @endforeach

        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
</section>
@endsection