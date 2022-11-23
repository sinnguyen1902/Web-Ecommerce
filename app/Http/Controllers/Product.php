<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class Product extends Controller
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
    public function add_product(){
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
       
        return view('admin.add_product')->with('cate_product',$cate_product)->with('brand_product',$brand_product);
   }



   public function all_product(){
    $this->AuthLogin();
       $all_product = DB::table('tbl_product')
       ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
       ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
       ->orderby('product_id','desc')->get();
       $manager_product = view('admin.all_product')->with('all_product',$all_product);
       return view('admin')->with('admin.all_product',$manager_product);

       
   }
   public function edit_product($product_id){
    $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();


       $edit_product = DB::table('tbl_product')->where('product_id',$product_id)->get();
       $manager_product = view('admin.edit_product')->with('edit_product',$edit_product)
       ->with('cate_product',$cate_product)->with('brand_product',$brand_product);
       return view('admin')->with('admin.edit_product',$manager_product);

       
   }


   public function delete_product($product_id){
    $this->AuthLogin();
       DB::table('tbl_product')->where('product_id',$product_id)->delete();
       Session::put('message','Xóa sản thành công');
       return Redirect::to('all-product');

       
   }
   public function update_add_product(Request $request,$product_id){
    $this->AuthLogin();
    $data = array();
    $data['product_name'] = $request->product_name;
    $data['product_desc'] = $request->product_desc;
    $data['brand_id'] = $request->brand_id;
    $data['category_id'] = $request->category_id;
    $data['product_content'] = $request->product_content;
    $data['product_price'] = $request->product_price;
    
    if(isset($request->promotion)){
      $promotion = ($request->promotion * $request->product_price)/100;
      $data['promotion'] = $request->product_price - $promotion;

    }else{
      $data['promotion'] = null;
    }
    

      $get_img = $request->file('product_image');
     if($get_img){
         $get_name_img = $get_img->getClientOriginalName();
         $name_img = current(explode('.',$get_name_img));
         $new_img = $name_img.rand(0,99).'.'.$get_img->getClientOriginalExtension();
         $get_img->move('public/uploads',$new_img);
         $data['product_image'] = $new_img;
        DB::table('tbl_product')->where('product_id',$product_id)->update($data);
        Session::put('message','Thêm sản phẩm thành công');
        return Redirect::to('all-product');  
     } 
    
    DB::table('tbl_product')->where('product_id',$product_id)->update($data);
    Session::put('message','Thêm sản phẩm thành công');
    return Redirect::to('all-product'); 

       /* echo print_r($data); */
   }


   public function save_add_product(Request $request){
    $this->AuthLogin();
       $data = array();
       $data['product_name'] = $request->product_name;
       $data['product_desc'] = $request->product_desc;
       $data['brand_id'] = $request->brand_id;
       $data['category_id'] = $request->category_id;
       $data['product_content'] = $request->product_content;
       $data['product_price'] = $request->product_price;

      if(isset($request->promotion)){
        $promotion = ($request->promotion * $request->product_price)/100;
        $data['promotion'] = $request->product_price - $promotion;

      }else{
        $data['promotion'] = null;
      }

       $data['product_status'] = $request->product_status;
       $data['product_quantity'] = $request->product_quantity;
       

        $get_img = $request->file('product_image');
        if($get_img){
            $get_name_img = $get_img->getClientOriginalName();
            $name_img = current(explode('.',$get_name_img));
            $new_img = $name_img.rand(0,99).'.'.$get_img->getClientOriginalExtension();
            $get_img->move('public/uploads',$new_img);
            $data['product_image'] = $new_img;
             DB::table('tbl_product')->insert($data);
            Session::put('message','Thêm sản phẩm thành công');
            return Redirect::to('add-product');  
        }
         $data['product_image'] = '';
       DB::table('tbl_product')->insert($data);
       Session::put('message','Thêm sản phẩm thành công');
       return Redirect::to('all-product'); 
/*        echo print_r($data); */
   }

   //end admin function

   public function details_product($product_id){
    $all_product = DB::table('tbl_product')
       ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
       ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
       ->orderby('product_id','desc')->get();
    $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
    $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
    $details_product = DB::table('tbl_product')
       ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
       ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
       ->where('tbl_product.product_id',$product_id)->get();
        
       foreach($details_product as $key => $value) {
         $category_id = $value->category_id;
       }
       

       $related_product = DB::table('tbl_product')
       ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
       ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
       ->where('tbl_category_product.category_id',$category_id)->whereNotIn('tbl_product.product_id',[$product_id])->get();


    return view('pages.san_pham.show_details')->with('category',$cate_product)->with('brand',$brand_product)
    ->with('details_product',$details_product)->with('related_product',$related_product)->with('all_product',$all_product);
    

   }

        //search product admin
        public function search_product(Request $request){
          $keywords = $request->search_product;
         
       

          $search_product = DB::table('tbl_product')
          ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
          ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
          ->where('product_name', 'like' , '%'.$keywords.'%')->orderby('product_id','desc')->get();

          return view('admin.search_product')->with('search_product',$search_product);
        }


        //delete all pro admin
    public function delete_all_product(){
      $this->AuthLogin();
      DB::table('tbl_product')->delete();
      return Redirect::to('all-product');

      
  }
  public function delete_promotion($id){
    $this->AuthLogin();
    $data = array();
    $data['promotion'] = null;
    DB::table('tbl_product')->where('product_id',$id)->update($data);
    return Redirect::to('all-product');

    
}
  public function delete_box_product(Request $request){
    $this->AuthLogin();
    $data = array();
    $data['check'] = $request->check;
    /* print_r($data); */
foreach ($data['check'] as $key => $check) 
{
        DB::table('tbl_product')->where('product_id', $check)->delete();
        
}
    return Redirect::to('all-product');
/* return redirect();  */
} 


  
}