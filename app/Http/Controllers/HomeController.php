<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
 
class HomeController extends Controller
{
    //
    public function index(){
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
        $all_product = DB::table('tbl_product')->orderby('product_id','desc')->get();

        

        return view('pages.home')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product);
    }

    public function search( Request $request){
        $keywords = $request->keywords_submit;

        $all_product = DB::table('tbl_product')->orderby('product_id','desc')->get();
        
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
      
      
        /*  $all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->limit(8)->get(); */
        
        $search_product = DB::table('tbl_product')->where('product_name', 'like' , '%'.$keywords.'%')->get();
        
        
        return view('pages.san_pham.search')->with('all_product',$all_product)->with('category',$cate_product)->with('brand',$brand_product)->with('search_product',$search_product);

        
    }
     public function index1(){
        $all_product = DB::table('tbl_product')->orderby('product_id','desc')->get();
        
        $all_product1 = DB::table('tbl_product')->orderby('product_id','desc')->limit(3)->get();
        return view('pages.home')->with('all_product',$all_product)->with('all_product1',$all_product1);
    } 

    public function profile($customer_id){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        $all_product = DB::table('tbl_product')->orderby('product_id','desc')->get();
        
        $info_customer = DB::table('tbl_customers')->where('customer_id',$customer_id)->first();
        
        
        return view('pages.profile')->with('all_product',$all_product)->with('category',$cate_product)->with('brand',$brand_product)->with('info_customer',$info_customer);  

    }

    public  function    edit_customer($customer_id){

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        $all_product = DB::table('tbl_product')->orderby('product_id','desc')->get();
        
        $info_customer = DB::table('tbl_customers')->where('customer_id',$customer_id)->first();
        
        
        return view('pages.edit_profile')->with('all_product',$all_product)->with('category',$cate_product)->with('brand',$brand_product)->with('info_customer',$info_customer);
    }
    public  function    update_customer(Request $request,$customer_id){
        $data = array();
        $data['customer_name'] = $request->update_p_name;
        $data['customer_phone'] = $request->update_p_phone;
        $data['customer_email'] = $request->update_p_email;
        DB::table('tbl_customers')->where('customer_id',$customer_id)->update($data);
        
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        $all_product = DB::table('tbl_product')->orderby('product_id','desc')->get();
        
        $info_customer = DB::table('tbl_customers')->where('customer_id',$customer_id)->first();
        
        
        return view('pages.edit_profile')->with('all_product',$all_product)->with('category',$cate_product)->with('brand',$brand_product)->with('info_customer',$info_customer);
       

    
    
    
    
    
    }



    //whistlist

    public function whistlist($product_id){
        
        
        $customer_id = Session::get('customer_id');
        if(isset($customer_id)){
            $data = array();
            $data['customer_id'] = $customer_id;
            $data['product_id'] = $product_id;
    
            $whistlist = DB::table('tbl_whistlist')->insertGetId($data);
            return Redirect::to('trangchu');
        }else{
            $message = "Bạn chưa đăng nhập";
            echo "<script type='text/javascript'>alert('$message');
            
            </script>";
            $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
            $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
            $all_product = DB::table('tbl_product')->orderby('product_id','desc')->get();
        return view('pages.home')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product);

        }


        
    }

    public function show_whistlist($customer_id){
        
        $all_product = DB::table('tbl_product')->orderby('product_id','desc')->get();
       
        $show_whistlist = DB::table('tbl_whistlist')
       ->join('tbl_customers','tbl_whistlist.customer_id','=','tbl_customers.customer_id')
       ->join('tbl_product','tbl_product.product_id','=','tbl_whistlist.product_id')
       ->where('tbl_whistlist.customer_id',$customer_id)
       ->select('tbl_customers.*','tbl_product.*')->get(); 
        
       
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        return view('pages.whistlist.whistlist')->with('all_product',$all_product)->with('category',$cate_product)->with('brand',$brand_product)->with('show_whistlist',$show_whistlist);  
    }
    public function delete_whistlist($product_id){
        
        DB::table('tbl_whistlist')->where('product_id',$product_id)->delete();
        Session::put('message','Xóa danh mục thành công');

         
        
        return Redirect('show-whistlist/'.Session::get('customer_id'));


    }

// comment

    public function comment($product_id, Request $request){
        $all_product = DB::table('tbl_product')->orderby('product_id','desc')->get();

        $customer_id = Session::get('customer_id');
        $data = array();

        $data['product_id'] = $product_id;
        $data['customer_id'] = $customer_id;
        $data['comment'] = $request->comment;
         print_r($data); 
         $comment  = DB::table('tbl_comment')->insertGetId($data);  
         return Redirect::back(); 

    }

    public function show_comment($product_id){
        $all_product = DB::table('tbl_product')->orderby('product_id','desc')->get();

        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
        $details_product = DB::table('tbl_product')
               ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
               ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
               ->where('tbl_product.product_id',$product_id)->get(); 
       
        $show_comment = DB::table('tbl_comment')
      ->join('tbl_customers','tbl_comment.customer_id','=','tbl_customers.customer_id')
      ->where('tbl_comment.product_id',$product_id)
      ->select('tbl_customers.*','tbl_comment.*')->get(); 
       
      
       return view('pages.comment.comment')->with('category',$cate_product)->with('brand',$brand_product)->with('show_comment',$show_comment)->with('details_product',$details_product)->with('all_product',$all_product);  
   }


   // history
   public function history($customer_id){
    $all_product = DB::table('tbl_product')->orderby('product_id','desc')->get();

    $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
    $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
    $history = DB::table('tbl_order')
       ->join('tbl_oder_details','tbl_order.order_id','=','tbl_oder_details.order_id')
       ->where('tbl_order.customer_id',$customer_id)->select('tbl_oder_details.*','tbl_order.*')->get();
  /*  print_r($history); */
    /* $show_comment = DB::table('tbl_comment')
  ->join('tbl_customers','tbl_comment.customer_id','=','tbl_customers.customer_id')
  ->where('tbl_comment.product_id',$product_id)
  ->select('tbl_customers.*','tbl_comment.*')->get();  */
   
  
    return view('pages.lichsu.history')->with('category',$cate_product)->with('brand',$brand_product)->with('history',$history)->with('all_product',$all_product);  
}




}
?>