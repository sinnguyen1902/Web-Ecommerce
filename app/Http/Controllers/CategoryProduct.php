<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class CategoryProduct extends Controller
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

    public function add_category_product(){
        $this->AuthLogin();
       
         return view('admin.add_category_product');
    }
    public function all_category_product(){
        $this->AuthLogin();
        $all_category_product = DB::table('tbl_category_product')->get();
        $manager_category_product = view('admin.all_category_product')->with('all_category_product',$all_category_product);
        return view('admin')->with('admin.all_category_product',$manager_category_product);

        
    }
    public function edit_category_product($category_product_id){
        $this->AuthLogin();
        $edit_category_product = DB::table('tbl_category_product')->where('category_id',$category_product_id)->get();
        $manager_category_product = view('admin.edit_category_product')->with('edit_category_product',$edit_category_product);
        return view('admin')->with('admin.edit_category_product',$manager_category_product);

        
    }


    public function delete_category_product($category_product_id){
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->delete();
        Session::put('message','Xóa danh mục thành công');
        return Redirect::to('all-category-product');

        
    }
    public function update_add_category_product(Request $request,$category_product_id){
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update($data);
        Session::put('message','Cập nhập danh mục thành công');
        return Redirect::to('all-category-product');  
       
        
    }


    public function save_add_category_product(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_status'] = $request->category_product_status;

        DB::table('tbl_category_product')->insert($data);
        Session::put('message','Thêm danh mục thành công');
        return Redirect::to('add-category-product'); 
    }


    //End admin
    
public function show_category_home($category_id){
    
    
    $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
    $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
    $category_by_id = DB::table('tbl_product')
    ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
    ->where('tbl_product.category_id',$category_id)->get();
    $all_product = DB::table('tbl_product')->orderby('product_id','desc')->get();

    $cate_name = DB::table('tbl_category_product')->where('tbl_category_product.category_id',$category_id)->limit(1)->get();
    return view('pages.category.show_category')->with('category',$cate_product)->with('brand',$brand_product)
    ->with('category_by_id',$category_by_id)->with('cate_name',$cate_name)->with('all_product',$all_product);
    
    }


    //search admin
    public function search_category(Request $request){
        $this->AuthLogin();
        $keywords = $request->search_category;

        $search_category = DB::table('tbl_category_product')->where('category_name', 'like' , '%'.$keywords.'%')->get();

        return view('admin.search_category')->with('search_category',$search_category);
    }
    //search order admin
     public function search_order(Request $request){
        $this->AuthLogin();
        $keywords = $request->search_order;

        $search_order = DB::table('tbl_shipping')
        ->join('tbl_order','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
        ->where('shipping_name', 'like' , '%'.$keywords.'%')->orderby('tbl_order.order_id','desc')->get();

        return view('admin.search_order')->with('search_order',$search_order);
    }
    
    //delete all cate admin
    public function delete_all_category(){
        $this->AuthLogin();
        DB::table('tbl_category_product')->delete();
        
        return Redirect::to('all-category-product');

        
    }
    //delete all order admin
    public function delete_all_order(){
        $this->AuthLogin();
        DB::table('tbl_order')->delete();
        
        return Redirect::to('manage-order');

        
    }
    public function delete_box_category(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['check'] = $request->check;
        /* print_r($data); */
		foreach ($data['check'] as $key => $check) 
		{
            DB::table('tbl_category_product')->where('category_id', $check)->delete();
            
		}
        return Redirect::to('all-category-product');
		/* return redirect();  */
    } 
    public function delete_box_order(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['check'] = $request->check;
        /* print_r($data); */
		foreach ($data['check'] as $key => $check) 
		{
            DB::table('tbl_order')->where('order_id', $check)->delete();
            
		}
        return Redirect::to('manage-order');
		/* return redirect();  */
    } 
}
        
        

        

    

    