@section('admincontent')
@extends('admin')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Thông tin khách hàng
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <!-- <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th> -->
            <th>Tên khách hàng </th>
            <th>Số điện thoại </th>
            <th>Email </th>
            <th>Địa chỉ giao hàng </th>

            
            
            

            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        <!-- <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td> -->
        
             <td>{{ $order_by_id->shipping_name }}</td>
            <td>{{ $order_by_id->shipping_phone}}</td>
            <td>{{ $order_by_id->shipping_email}}</td>
            <td>{{ $order_by_id->shipping_address}}</td>
           
        

        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        
      </div>
    </footer>
  </div>
</div>

<br></br>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê chi tiết đơn hàng
    </div>
    <div class="row w3-res-tb">
      
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <!-- <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th> -->
            <th>Tên sản phẩm </th>
            <!-- <th>Hình ảnh </th> -->

            <th>Số lượng</th>
            <th>Giá</th>
            <th>Tổng tiền</th>
            
            

            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        @foreach($order_by_id1 as $key => $order)
        <tbody>
           
        <!-- <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td> -->
            <td>{{ $order->product_name}}</td>
            <td>{{ $order->product_sales_quantity}}</td>
            
            <td>{{ $order->product_price}}</td>
                <?php $a = $order->product_price * $order->product_sales_quantity; ?>
            <td>{{ $a }}</td>
          

        </tbody>
        @endforeach
        <tbody>
          <td></td>
          <td></td>
          <td></td>
          <td style="color: black">Thành tiền:  {{$order_by_id->order_total}} VND </br>
          </td>
          
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        <a target="_blank" href="{{URL::to('/print-order/'.$order->order_id)}}">In hóa đơn</a>
        
      </div>
      
    </footer>
  </div>
</div>
<br></br>

</section>
@endsection