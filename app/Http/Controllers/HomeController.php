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
       $categories = Category::all();
        return view('frontend.category',compact('categories'));

    }

    public function product()
    {
        $products = Product::all();
        return view('frontend.product',compact('products'));
    }

    public function test(){
        return view('frontend.testimonial');
    }
    // view category product
   public function viewproduct($slug){
        if(Category::where('slug', $slug)->exists()){
            $categories = Category::where('slug', $slug)->first();
            $products= Product::where('cate_id',$categories->id)->where('status',0)->get();
           
                return  view('frontend.products.viewproduct',compact('categories','products'));

        }else{
            return redirect('/')->with('status',"slug does not exists");
        }
   }

   public function productdetails($cat_slug, $prod_slug){
    if(Category::where('slug', $cat_slug)->exists()){

        if(Product::where('slug', $prod_slug)->exists()){

        $products = Product::where('slug',$prod_slug)->first();
        return view('frontend.products.productdetails',compact('products'));

        }else{
            return redirect('/')->with('status',"slug does not exists");
        }

    }else{
        return redirect('/')->with('status',"slug does not exists");
    }

   }
    public function searchproduct(Request $request)
    {
        $query = $request->input('input');
        $results = Product::where('name', 'like', '%' . $query . '%')->get();
        return view('frontend.search', ['results' => $results]);
    }
}
