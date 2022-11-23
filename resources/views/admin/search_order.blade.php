@section('admincontent')
@extends('admin')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê đơn hàng
    </div>
    <div class="row w3-res-tb">
      
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

        @foreach($search_order as $key => $order)
          <tr>
          
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            
            
            <td>{{ $order->shipping_name}}</td>
            <td>{{ $order->order_total }}</td>
            @if($order->order_status == 1 )
            <td><a href="{{URL::to('/status-order',$order->order_id)}}" name="status" value="2">Đang xử lý</a></td>
            @elseif($order->order_status == 2)
            <td><a href="{{URL::to('/status-order',$order->order_id)}}" name="status" value="3">Đang giao hàng</a></td>
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
<br></br>

</section>



@endsection