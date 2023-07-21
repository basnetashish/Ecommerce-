<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Backend\Category;
use App\Models\Backend\Product;
use App\Models\Backend\Ui;

class UserController extends Controller
{
    public function index(Request $request)
    { 
        $query = $request->input('input'); 
        if($query){
         $products = Product::where('name','LIKE','%'.$query.'%')->get();
        
        }else{
        $products = Product::where('trending','1')->take(6)->get();
    }
        $categories =Category::where('popular','1')->take(6)->get();
        $ui =  Ui::first();
        return view('home1',compact('products','categories','ui'));
    }

    public function main(){
         $ui = Ui::first();
        return view('frontend.mainpage',compact('ui'));
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function category()
    {
       $categories = Category::all();
        return view('frontend.category',compact('categories'));

    }

    public function product(Request $request)
    { 
        $query = $request->input('input'); 
        if($query){
         $products = Product::where('name','LIKE','%'.$query.'%')->get();
        
        }else{
            $products = Product::where('status','1')->get();
              
        }
        
        return view('frontend.product',compact('products'));
       
    }
    public function test(){
        return view('frontend.testimonial');
    }
//Category>products
    public function viewproduct($slug){
        if(Category::where('slug', $slug)->exists()){
            $categories = Category::where('slug', $slug)->first();
            $products= Product::where('cate_id',$categories->id)->where('status',1)->get();
           
                return  view('frontend.products.viewproduct',compact('categories','products'));

        }else{
            return redirect('/')->with('status',"slug does not exists");
        }
   }
  // category> product> productdetails
   public function productdetails($prod_slug)
   {
   

        if(Product::where('slug', $prod_slug)->exists()){

        $products = Product::where('slug',$prod_slug)->first();
        return view('frontend.products.productdetails',compact('products'));

        }else{
            return redirect('/')->with('status',"slug does not exists");
        }

    }
   
}
