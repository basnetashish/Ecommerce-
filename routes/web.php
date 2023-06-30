<?php

use App\Http\Controllers\Backend\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\Roles;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'roles'])->group(function () {
  
    Route::get('/admin', [HomeController::class, 'roles'])->name('admin');
});



//Category
Route::get('/backend/category/create',[CategoryController::class,'create'])->name('c_create');
Route::get('/backend/category/index',[CategoryController::class,'index'])->name('c_index');
Route::post('/backend/category/store',[CategoryController::class,'store'])->name('c_store');
Route::get('/backend/category/delete/{id}',[CategoryController::class,'destroy'])->name('c_delete');
Route::get('/backend/category/edit/{id}',[CategoryController::class,'edit'])->name('c_edit');
Route::put('/backend/category/update/{id}',[CategoryController::class,'update'])->name('c_update');
