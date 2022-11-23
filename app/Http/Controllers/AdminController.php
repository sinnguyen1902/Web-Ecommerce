<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class AdminController extends Controller
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
    public function index(){
        return view('adminlogin');
    }
    public function showdashboard(){
        $this->AuthLogin();
        return view('admin.dashboard');
    }
    public function dashboard(Request $request){
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);

        $result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        if($result){
            Session::put ('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id);
            return Redirect::to('/admin');
        }else{
            Session::put ('message','Mặt khẩu hoặc tài khoản bị sai.Làm ơn nhập lại');
            return Redirect::to('/adminlogin');

    }
}
    public function logout(){
        $this->AuthLogin();
        Session::put ('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/adminlogin');
    }
}
