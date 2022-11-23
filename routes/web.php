<?php

//use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\AdminController; 
use App\Http\Controllers\CategoryProduct; 
use App\Http\Controllers\BrandProduct; 
use App\Http\Controllers\Product; 
use App\Http\Controllers\Cart; 
use App\Http\Controllers\CartController; 
use App\Http\Controllers\CheckoutController; 


//frontend
Route::get('/', [HomeController::class, 'index']);
Route::get('/trangchu',[HomeController::class, 'index']);


// danh muc san pham

Route::get('/danh-muc-san-pham/{category_id}',[CategoryProduct::class, 'show_category_home']);
Route::get('/thuong-hieu-san-pham/{brand_id}',[BrandProduct::class, 'show_brand_home']);
Route::get('/chi-tiet-san-pham/{product_id}',[Product::class, 'details_product']);


//backend
Route::get('/adminlogin', [AdminController::class, 'index']);
Route::get('/admin', [AdminController::class, 'showdashboard']);
Route::get('/logout', [AdminController::class, 'logout']);
Route::post('/admin-dashboard', [AdminController::class, 'dashboard']);

// Category protected
Route::get('/add-category-product', [CategoryProduct::class, 'add_category_product']);
Route::get('/edit-category-product/{category_product_id}', [CategoryProduct::class, 'edit_category_product']);
Route::get('/delete-category-product/{category_product_id}', [CategoryProduct::class, 'delete_category_product']);
Route::get('/all-category-product', [CategoryProduct::class, 'all_category_product']);



Route::post('/save-add-category-product', [CategoryProduct::class, 'save_add_category_product']);
Route::post('/update-add-category-product/{category_product_id}', [CategoryProduct::class, 'update_add_category_product']);
// Brand Product

Route::get('/add-brand-product', [BrandProduct::class, 'add_brand_product']);
Route::get('/edit-brand-product/{brand_product_id}', [BrandProduct::class, 'edit_brand_product']);
Route::get('/delete-brand-product/{brand_product_id}', [BrandProduct::class, 'delete_brand_product']);
Route::get('/all-brand-product', [BrandProduct::class, 'all_brand_product']);


Route::post('/save-add-brand-product', [BrandProduct::class, 'save_add_brand_product']);
Route::post('/update-add-brand-product/{brand_product_id}', [BrandProduct::class, 'update_add_brand_product']);

// Product 
Route::get('/add-product', [Product::class, 'add_product']);
Route::get('/delete-promotion/{id}', [Product::class, 'delete_promotion']);
Route::get('/edit-product/{product_id}', [Product::class, 'edit_product']);
Route::get('/delete-product/{product_id}', [Product::class, 'delete_product']);
Route::get('/all-product', [Product::class, 'all_product']);


Route::post('/save-add-product', [Product::class, 'save_add_product']);
Route::post('/update-add-product/{product_id}', [Product::class, 'update_add_product']);

// cart
Route::post('/save-cart', [CartController::class, 'save_cart']);
Route::post('/update-cart-quantity', [CartController::class, 'update_cart_quantity']);
Route::get('/show-cart', [CartController::class, 'show_cart']);
Route::get('/delete-to-cart/{rowId}', [CartController::class, 'delete_to_cart']);

// checkout
Route::get('/login-checkout', [CheckoutController::class, 'login_checkout']);
Route::get('/logout-checkout', [CheckoutController::class, 'logout_checkout']);
Route::get('/checkout', [CheckoutController::class, 'checkout']);
Route::post('/add-customer', [CheckoutController::class, 'add_customer']);
Route::post('/save-checkout-customer', [CheckoutController::class, 'save_checkout_customer']);
Route::post('/login-customer', [CheckoutController::class, 'login_customer']);
Route::get('/payment', [CheckoutController::class, 'payment']);
Route::post('/oder-place', [CheckoutController::class, 'oder_place']);

// search
Route::post('/search', [HomeController::class, 'search']);


//order
Route::get('/manage-order', [CheckoutController::class, 'manage_order']);
Route::get('/delete-manage-order/{order_id}', [CheckoutController::class, 'delete_manage_order']);
Route::get('/view-manage-order/{order_id}', [CheckoutController::class, 'view_manage_order']);


//profile
Route::get('/profile/{customer_id}', [HomeController::class, 'profile']);
Route::post('/edit-customer/{customer_id}', [HomeController::class, 'edit_customer']);
Route::post('/update-customer/{customer_id}', [HomeController::class, 'update_customer']);

// whistlist
Route::get('/whistlist/{product_id}', [HomeController::class, 'whistlist']);
Route::get('/show-whistlist/{customer_id}', [HomeController::class, 'show_whistlist']);
Route::get('/delete-whistlist/{product_id}', [HomeController::class, 'delete_whistlist']);

// history
Route::get('/history/{customer_id}', [HomeController::class, 'history']);

// comment 
Route::post('/comment/{product_id}', [HomeController::class, 'comment']);
Route::get('/show-comment/{product_id}', [HomeController::class, 'show_comment']);


//search category

Route::post('/search-category', [CategoryProduct::class, 'search_category']);
Route::post('/search-order', [CategoryProduct::class, 'search_order']);


//search brand

Route::post('/search-brand', [BrandProduct::class, 'search_brand']);

//search product
Route::post('/search-product', [Product::class, 'search_product']);
//delete box product
Route::post('/delete-box-product', [Product::class, 'delete_box_product']);

// delete pro all
Route::post('/delete-all-product', [Product::class, 'delete_all_product']);
// delete all category
Route::post('/delete-all-category', [CategoryProduct::class, 'delete_all_category']);
// delete all order
Route::post('/delete-all-order', [CategoryProduct::class, 'delete_all_order']);
// delete box category
Route::post('/delete-box-category', [CategoryProduct::class, 'delete_box_category']);
// delete box order
Route::post('/delete-box-order', [CategoryProduct::class, 'delete_box_order']);



// delete all brand
Route::post('/delete-all-brand', [BrandProduct::class, 'delete_all_brand']);

// delete box brand
Route::post('/delete-box-brand', [BrandProduct::class, 'delete_box_brand']);


// status order
Route::get('/status-order/{order_id}', [CheckoutController::class, 'status_order']);

// print order
Route::get('/print-order/{order_id}', [CheckoutController::class, 'print_order']);