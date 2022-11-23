<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class BrandProduct extends Controller
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
    public function add_brand_product(){
        $this->AuthLogin();
       
        return view('admin.add_brand');
   }
   public function all_brand_product(){
    $this->AuthLogin();
       $all_brand_product = DB::table('tbl_brand')->get();
       $manager_brand_product = view('admin.all_brand')->with('all_brand_product',$all_brand_product);
       return view('admin')->with('admin.all_brand',$manager_brand_product);

       
   }
   public function edit_brand_product($brand_product_id){
    $this->AuthLogin();
       $edit_brand_product = DB::table('tbl_brand')->where('brand_id',$brand_product_id)->get();
       $manager_brand_product = view('admin.edit_brand')->with('edit_brand_product',$edit_brand_product);
       return view('admin')->with('admin.edit_brand',$manager_brand_product);

       
   }


   public function delete_brand_product($brand_product_id){
    $this->AuthLogin();
       DB::table('tbl_brand')->where('brand_id',$brand_product_id)->delete();
       Session::put('message','Thêm danh mục thành công');
       return Redirect::to('all-brand-product');

       
   }
   public function update_add_brand_product(Request $request,$brand_product_id){
    $this->AuthLogin();
       $data = array();
       $data['brand_name'] = $request->brand_product_name;
       $data['brand_desc'] = $request->brand_product_desc;
       DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update($data);
       Session::put('message','Thêm danh mục thành công');
       return Redirect::to('all-brand-product'); 
       
   }


   public function save_add_brand_product(Request $request){
    $this->AuthLogin();
       $data = array();
       $data['brand_name'] = $request->brand_product_name;
       $data['brand_desc'] = $request->brand_product_desc;
       $data['brand_status'] = $request->brand_product_status;

       DB::table('tbl_brand')->insert($data);
       Session::put('message','Thêm danh mục thành công');
       return Redirect::to('add-brand-product'); 
   }

   //end admin
   public function show_brand_home($brand_id){
    
    $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
    $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
    $brand_by_id = DB::table('tbl_product')
    ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
    ->where('tbl_product.brand_id',$brand_id)->get();
    $all_product = DB::table('tbl_product')->orderby('product_id','desc')->get();

    $brand_name = DB::table('tbl_brand')->where('tbl_brand.brand_id',$brand_id)->limit(1)->get();

    return view('pages.category.show_brand')->with('category',$cate_product)->with('brand',$brand_product)
    ->with('brand_by_id',$brand_by_id)->with('brand_name',$brand_name)->with('all_product',$all_product);
    
    }

    //search brand admin
    public function search_brand(Request $request){
        $keywords = $request->search_brand;

        $search_brand = DB::table('tbl_brand')->where('brand_name', 'like' , '%'.$keywords.'%')->get();

        return view('admin.search_brand')->with('search_brand',$search_brand);
    }

    //delete all brand admin
    public function delete_all_brand(){
        $this->AuthLogin();
        DB::table('tbl_brand')->delete();
        
        return Redirect::to('all-brand-product');

        
    }
    public function delete_box_brand(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['check'] = $request->check;
        /* print_r($data); */
		foreach ($data['check'] as $key => $check) 
		{
            DB::table('tbl_brand')->where('brand_id', $check)->delete();
            
		}
        return Redirect::to('all-brand');
		/* return redirect();  */
    } 
}