<?php

namespace App\Http\Controllers;

use App\Models\Backend\Product;
use App\Models\Backend\Category;
use App\Models\Backend\Order;
use App\Models\User;
use App\Notifications\OrderNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Models\Backend\Ui;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
 
    public function roles(){
        $user = User::where('roles','admin')->get();
        $users =User::where('roles','user')->get();
        $order = Order::all();
        $products = Product::all();
        return view('admin',compact('user','users','order','products'));
    }
    public function order(){
        return view('backend.orderdetails');
    }


    
}
