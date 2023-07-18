<?php

use App\Http\Controllers\Backend\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\Roles;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\FrontController;
use App\Http\Controllers\Backend\CartController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\PDFController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\UserController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/', [UserController::class, 'index'])->name('home1');

Auth::routes();


Route::middleware(['auth', 'roles'])->group(function () {
  
    Route::get('/admin', [HomeController::class, 'roles'])->name('admin');
    
    //
    Route::get('/backend/category/create',[CategoryController::class,'create'])->name('c_create');
Route::get('/backend/category/index',[CategoryController::class,'index'])->name('c_index');
Route::post('/backend/category/store',[CategoryController::class,'store'])->name('c_store');
Route::get('/backend/category/delete/{id}',[CategoryController::class,'destroy'])->name('c_delete');
Route::get('/backend/category/edit/{id}',[CategoryController::class,'edit'])->name('c_edit');
Route::put('/backend/category/update/{id}',[CategoryController::class,'update'])->name('c_update');

//Products 
Route::get('backend/product/create',[ProductController::class,'create'])->name('p_create');
Route::get('backend/product/index',[ProductController::class,'index'])->name('p_index');
Route::post('backend/product/store',[ProductController::class,'store'])->name('p_store');
Route::get('/backend/product/delete/{id}',[ProductController::class,'destroy'])->name('p_delete');
Route::get('backend/product/show/{id}',[ProductController::class,'show'])->name('p_show');
Route::get('/backend/product/edit/{id}',[ProductController::class,'edit'])->name('p_edit');
Route::put('/backend/product/update/{id}',[ProductController::class,'update'])->name('p_update');

Route::get('/order-list',[OrderController::class,'adminorderlist'])->name('order_list');
Route::get('/order-details/{id}',[OrderController::class,'adminorderdetails'])->name('order_details');
Route::get('/order-edit/{id}',[OrderController::class,'adminorderedit'])->name('order_edit');
Route::put('/order-update/{id}',[OrderController::class,'orderupdate']);
Route::get('/order_details_print/{id}',[OrderController::class,'print'])->name('order_detail_print');
// Route::get('/generate/{id}',[PDFController::class,'generatePDF']);
Route::get('/invoice/send-mail/{id}',[PDFController::class,'sendmail']);

// order Invoice
Route::get('/order-invoice/{id}',[PDFController::class,'orderinvoice'])->name('order.invoice');


});
//frontend 
//Category



//frontend
Route::get('/show',[HomeController::class,'show'])->name('f_show');
Route::get('/frontend/mainpage',[ UserController::class,'main'])->name('mainpage');

Route::get('/category',[UserController::class,'category'])->name('f_category');
Route::get('/product',[UserController::class,'product'])->name('f_product');
Route::get('/about',[UserController::class,'about'])->name('f_about');
Route::get('/testimonial',[UserController::class,'test'])->name('f_testimonial');

Route::get('/category/{slug}',[UserController::class,'viewproduct'])->name('f_viewcategory');
Route::get('products/{prod_slug}',[UserController::class,'productdetails'])->name('f_productdetails');








Route::middleware(['auth'])->group(function () {
  Route::get('/cart1',[CartController::class,'viewcart']);
  Route::get('/count-cart',[CartController::class,'cartcount']);
  Route::get('/cartlist',[CartController::class,'cartindex'])->name('c_cartlist');
  Route::post('/add-to-cart',[CartController::class,'addproduct']);
  Route::post('/deletecart',[CartController::class,'deletecart']);
  Route::post('/updatecart',[CartController::class,'updatecart']);
  Route::post('/orderstore',[OrderController::class,'orderstore']);
  Route::get('/checkout',[OrderController::class,'checkout']);
  Route::get('/store',[OrderController::class,'store']);
  Route::get('/placeorder',[OrderController::class,'placeorder'])->name('f_placeorder');
  Route::get('/orderdetails/{id}',[OrderController::class,'orderdetails']);

  //wishlist
  Route::get('/wishlist',[WishlistController::class,'index']);
 Route::get('/count-wishlist',[WishlistController::class,'countwishlist']);
  Route::post('/add-wishlist',[WishlistController::class,'addwishlist']);
  Route::delete('/delete-wishlist',[WishlistController::class,'deletewishlist']);
  Route::put('/update-wishlist',[WishlistController::class,'updatewishlist']);
  

});


