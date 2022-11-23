<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
use Cart;
use PDF;
class CheckoutController extends Controller
{
    //
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
         if($admin_id){
           return Redirect::to('admin');
          }else{
            return Redirect::to('adminlogin')->send();
          }
        }



    public function login_checkout(){
        $all_product = DB::table('tbl_product')
       ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
       ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
       ->orderby('product_id','desc')->get();
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

        return view('pages.checkout.login_checkout')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product);
    }
    public function add_customer(Request $request){
        $data = array();
        $data['customer_name'] = $request->sign_name;
        $data['customer_email'] = $request->sign_email;
        $data['customer_password'] = $request->sign_password;
        $data['customer_phone'] = $request->sign_phone;

        $customer_id = DB::table('tbl_customers')->insertGetId($data);
        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$request->customer_name);
        return Redirect::to('/login-checkout');
        
    }
    public function checkout(){
        $all_product = DB::table('tbl_product')
       ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
       ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
       ->orderby('product_id','desc')->get();
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

        return view('pages.checkout.show_checkout')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product);
    }
    public function save_checkout_customer(Request $request){
        $data = array();
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_notes'] = $request->shipping_notes;
        $data['shipping_name'] = $request->shipping_name;

        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);
        Session::put('shipping_id',$shipping_id);
        
        return Redirect::to('/payment');
    }

    public function payment(){

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

        return view('pages.checkout.payment')->with('category',$cate_product)->with('brand',$brand_product);

    }

    public function logout_checkout(){
        Session::flush();
        return Redirect::to('/');
    }

    public function login_customer(Request $request){
        $customer_email = $request->customer_email;
        $customer_password = $request->customer_password;

        $result = DB::table('tbl_customers')->where('customer_email',$customer_email)->where('customer_password',$customer_password)->first();
        if($result){
            Session::put ('customer_name',$result->customer_name);
            Session::put('customer_id',$result->customer_id);
            return Redirect::to('/checkout');
        }else{
            Session::put ('message','Mặt khẩu hoặc tài khoản bị sai.Làm ơn nhập lại');
            return Redirect::to('/login-checkout');

    }
}

    public  function oder_place(Request $request){
        // insert payment_method
        $data = array();
        $data['payment_method'] = $request->payment_option;
        $data['payment_status'] = 'Đang chờ xử lý';
        

        $payment_id = DB::table('tbl_payment')->insertGetId($data);
        
        // insert order
        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = Cart::total(0);
        $order_data['order_status'] = '1';

        

        $order_id = DB::table('tbl_order')->insertGetId($order_data);
        
        
        // insert order_details
        $content =  Cart::content();
        foreach($content as $v_content){

        $order_d_data = array();
        $order_d_data['order_id'] = $order_id;
        $order_d_data['product_id'] = $v_content->id;
        $order_d_data['product_name'] = $v_content->name;
        $order_d_data['product_price'] = $v_content->price;
        $order_d_data['product_sales_quantity'] = $v_content->qty;

        DB::table('tbl_oder_details')->insert($order_d_data);
        }
        if($data['payment_method'] == 1){
            echo 'Thanh toán ATM';

        }else{
            /* echo 'Thanh toán tiền mặt'; */
            Cart::destroy();
            
            $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
            $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
    
            return view('pages.checkout.handcash')->with('category',$cate_product)->with('brand',$brand_product);
            
        }
        //return Redirect::to('/payment');
    }


    // order admin

    public function manage_order(){

    $this->AuthLogin();
       $all_order = DB::table('tbl_order')
       ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
       ->select('tbl_order.*','tbl_customers.customer_name')
       ->orderby('tbl_order.order_id','desc')->get();
       $manage_order = view('admin.manage_order')->with('all_order',$all_order);
       return view('admin')->with('admin.manage_order',$manage_order);
        

    }

    public function delete_manage_order($order_id){

        $this->AuthLogin();
        DB::table('tbl_order')->where('order_id',$order_id)->delete();
        Session::put('message','Xóa danh mục thành công');
        return Redirect::to('manage-order');
            
    
        }
    public function view_manage_order($order_id){

        $this->AuthLogin();
       $order_by_id = DB::table('tbl_order')
       ->join('tbl_shipping','tbl_shipping.shipping_id','=','tbl_order.shipping_id')
       ->where('tbl_order.order_id',$order_id)
       ->select('tbl_shipping.*','tbl_order.*')->first();
         

        $order_by_id1 = DB::table('tbl_order')
       ->join('tbl_oder_details','tbl_order.order_id','=','tbl_oder_details.order_id')
       ->where('tbl_order.order_id',$order_id)->select('tbl_oder_details.*')->get();
        /* print_r($order_by_id1);  */
       /*  foreach($order_by_id1 as $key => $order){
            echo $order->product_name;
        } */
       
        $manage_order_by_id = view('admin.view_order')->with('order_by_id',$order_by_id)->with('order_by_id1',$order_by_id1);
       return view('admin')->with('admin.view_order',$manage_order_by_id)->with('admin.manage_order',$manage_order_by_id); 
     
        }

        // status order

        public function status_order($order_id){
            $this->AuthLogin();
            $data1 = DB::table('tbl_order')
            ->where('order_id',$order_id)->get();
           
            $data2 = DB::table('tbl_oder_details')
            ->join('tbl_product', 'tbl_product.product_id' , '=','tbl_oder_details.product_id')
            ->where('order_id',$order_id)->get();

            

              foreach($data1 as $key => $value){

            if($value->order_status == 1){
            
             DB::table('tbl_order')->where('order_id',$order_id)->update(['order_status' => 2]);
            }elseif($value->order_status == 2){
                foreach($data2 as $key => $value1){
                    DB::table('tbl_product')
                    ->where('product_id',$value1->product_id)
                    ->update(['product_quantity' => $value1->product_quantity - $value1->product_sales_quantity]);
                    }
                DB::table('tbl_order')->where('order_id',$order_id)->update(['order_status' => 3]);
            }
            }  
            
             return Redirect::to('manage-order');   

        }
        
        
        public function print_order($order_id){
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($this->print_order_convert($order_id));
            return $pdf->stream();
        }
        public function print_order_convert($order_id){
        $order_by_id = DB::table('tbl_order')
       ->join('tbl_shipping','tbl_shipping.shipping_id','=','tbl_order.shipping_id')
       ->where('tbl_order.order_id',$order_id)
       ->select('tbl_shipping.*','tbl_order.*')->first();  

        $order_by_id1 = DB::table('tbl_order')
       ->join('tbl_oder_details','tbl_order.order_id','=','tbl_oder_details.order_id')
       ->where('tbl_order.order_id',$order_id)->select('tbl_oder_details.*')->get();
       
       
       
    //return $order_by_id;
       $output = '';
       $output .= ' <style>
            body {
                font-family: DejaVu Sans;
            }
            
              
              #customers td, #customers th {
                border: 1px solid #ddd;
                padding: 8px;
              }
              
              #customers tr:nth-child(even){background-color: #f2f2f2;}
              
              #customers tr:hover {background-color: #ddd;}
              
              #customers th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                
                
              }

       

       </style>
       <h2> <center> Hóa Đơn Bán Hàng </center></h2>
       ';
                
       $output .= ' <h4> Tên khách hàng: '.$order_by_id->shipping_name .' </h4>
                    <h4>Số điện thoại:'.$order_by_id->shipping_phone .' </h4>
                    <h4> Địa chỉ giao hàng:'.$order_by_id->shipping_address .' </h4>
                    
        <table id="customers"> 
            
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th> Đơn giá</th>
                    <th> Thành tiền</th>
                </tr>
            
            ';
            foreach($order_by_id1 as $key => $order){
        $output .='
            <tr>
                <td>'.$order->product_name.'</td>
                <td>'.$order->product_sales_quantity.'</td>
                <td>'.number_format($order->product_price).' '.''.'</td>
                <td>'.number_format($a = $order->product_sales_quantity *$order->product_price ).'</td>
            </tr>';
        }
        $output .='   
           
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>Tổng: '.$order_by_id->order_total.'</td>
            </tr>
        </table >
        
       ';
       
       
       
       
       return $output;
       //return $order_by_id2;
        }
        
        
        

        

}