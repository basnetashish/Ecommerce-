<?php

namespace App\Http\Controllers;

use App\Models\Backend\Product;
use App\Models\Backend\Category;

use Illuminate\Http\Request;

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
    public function index()
    {
        $products = Product::where('trending','1')->get();
        $categories =Category::where('popular','1')->get();
        return view('/userhome',compact('products','categories'));
    }

    public function roles(){
        return view('admin');
    }

    public function main(){
        return view('frontend.mainpage');
    }

    
    public function about()
    {
        return view('frontend.about');
    }

    public function category()
    {
       $categories = Category::where('status','0')->get();
        return view('frontend.category',compact('categories'));

    }

    public function product()
    {
        $products = Product::where('trending','1')->take(3)->get();
        return view('frontend.product',compact('products'));
    }

    public function test(){
        return view('frontend.testimonial');
    }

   
}
