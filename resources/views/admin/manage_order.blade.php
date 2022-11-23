@section('admincontent')
@extends('admin')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê đơn hàng
    </div>
    <div class="row w3-res-tb">
    <!-- <form action="{{URL::to('/thongke-order')}}" method="POST">
								{{csrf_field()}}
    <select class="form-select" aria-label="Default select example">
      <option name="month" selected>Tháng</option>
      <option name="month" value="1">1</option>
      <option name="month" value="2">2</option>
      <option name="month" value="3">3</option>
      <option name="month" value="4">4</option>
      <option name="month" value="5">5</option>
      <option name="month" value="6">6</option>
      <option name="month" value="7">7</option>
      <option name="month" value="8">8</option>
      <option name="month" value="9">9</option>
      <option name="month" value="10">10</option>
      <option name="month" value="11">11</option>
      <option name="month" value="12">12</option>
  </select>
  <select class="form-select" aria-label="Default select example">
      <option selected>Năm</option>
      <option name="years" value="2022">2022</option>
      
  </select>
  <input class="btn btn-primary btn-sm" style="margin-top: -4px;
    color: white; font-size: 17px;  " type="submit" value="Thống kê"name="send_oder">
  </form> -->
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
        <form action="{{URL::to('/search-order')}}" method="POST">
								{{csrf_field()}}
						<input type="text" style="font-size: 17px; width: 200px;"   name="search_order" placeholder="Tìm kiếm sản phẩm"/>
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
            <th>Tên người đặt hàng</th>
            <th>Tổng tiền</th>
            <th>Tình trạng</th>
            

            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        <form onclick="return confirm('Are you sure delete?')" action="{{URL::to('/delete-all-order')}}" method="POST">
								{{csrf_field()}}
						
						<input class="btn btn-primary btn-sm" style="margin-top: -4px;
    					color: white; font-size: 17px;  " type="submit" value="Xóa tất cả" name="send_oder">
					</form>
        <form action="{{URL::to('/delete-box-order')}}" method="POST">
								{{csrf_field()}}
						
						<input class="btn btn-primary btn-sm" style="margin-top: -4px;
    					color: white; font-size: 17px;  " type="submit" value="Xóa mục đã chọn" name="send_oder">
        @foreach($all_order as $key => $order)
          <tr>
          
            <td><label class="i-checks m-b-none"><input type="checkbox" name="check[]" value="{{$order->order_id}}"><i></i></label></td>
            
            
            <td>{{ $order->customer_name}}</td>
            <td>{{ $order->order_total }}</td>
            @if($order->order_status == 1 )
            <td><a onclick="return confirm('Are you sure?')" href="{{URL::to('/status-order',$order->order_id)}}" name="status" value="2">Đang chờ xử lý</a></td>
            @elseif($order->order_status == 2)
            <td><a onclick="return confirm('Are you sure?')" href="{{URL::to('/status-order',$order->order_id)}}" name="status" value="3">Đang giao hàng</a></td>
            @else
            <td><a>Đã giao thành công</a></td>
            @endif
            <td>
              <a href="{{URL::to('/view-manage-order',$order->order_id)}}" class="active" ui-toggle-class="">
                  <i class="fa fa-pencil-square-o text-success text-active"></i>
            </a>
            <a onclick="return confirm('Are you sure delete?')" href="{{URL::to('/delete-manage-order',$order->order_id)}}" class="active" ui-toggle-class="">
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
<br></br>

</section>



@endsection