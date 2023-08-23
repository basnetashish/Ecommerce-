<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Backend\Category;
use App\Models\Backend\Product;
use App\Models\Backend\Testimonial;
use App\Models\Backend\Ui;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('input');
        if ($query) {
            $products = Product::where('name', 'LIKE', '%' . $query . '%')->get();
        } else {
            $products = Product::where('trending', '1')->take(6)->get();
        }
        $categories = Category::where('popular', '1')->take(6)->get();
        $ui =  Ui::first();
        $tests = Testimonial::take(3)->get();
        return view('home1', compact('products', 'categories', 'ui', 'tests'));
    }

    public function main()
    {
        $ui = Ui::first();
        return view('frontend.mainpage', compact('ui'));
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function category()
    {
        $categories = Category::where('parent_id',null)->get();
        return view('frontend.category', compact('categories'));
    }

    public function product(Request $request  )
    {
        // dd($request);
        $query = $request->input('input');
        
        if ($query) {
            $products = Product::query();
            $products->where('name', 'like', '%' . $query . '%')->get();
        } else {
            $products = Product::where('status', '1')->get();
        }

        if (isset($request->price) && $request->price == 'asc') {
            $products = $products->sortBy('selling_price');
        } elseif (isset($request->price) && $request->price == 'desc') {
            $products = $products->sortByDesc('selling_price');
        }
        elseif (isset($request->latest)) {
            $products = $products->sortByDesc('created_at');
        }
        elseif (isset($request->trending)) {
            $products = $products->sortBydesc('created_at')->where('trending',1);
        }
        if (isset($request->category) && $request->category !== null) {
           
            $categories = Category::where('slug',$request->category)->first();
            $products = $products->where('cate_id',$categories->id)->where('status',1)->take(6);
        }
        if (isset($request->subcategory) && $request->subcategory !== null) {
        
            $subcategories = Category::where('slug',$request->subcategory)->first();
            $products = $products->where('subcategory_id',$subcategories->id)->where('status',1)->take(6);
        }
        $categories = Category::where('parent_id',null)->with('subcategories')->get();
      

        
        
        return view('frontend.product', compact('products','categories'));
    }

    public function subcategoryproducts(Request $request)
    {
        $categoryId = $request->input('subcategory');
        $product = Product::where('subcategory_id',$categoryId)->get();
    
        return response()->json($product); 
    }
    public function test()
    {
        return view('frontend.testimonial');
    }
    //Category>products
    public function viewproduct($slug)
    {
        if (Category::where('slug', $slug)->exists()) {
            $categories = Category::where('slug', $slug)->first();
             if ($categories->parent_id == null) {
                $products = Product::where('cate_id', $categories->id)->where('status', 1)->get();
                
             } else {
                $products = Product::where('subcategory_id', $categories->id)->where('status', 1)->get();
              
             }
             
           
           return  view('frontend.products.viewproduct', compact('categories', 'products'));
        } else {
            return redirect('/')->with('status', "slug does not exists");
        }
    }
    // category> product> productdetails
    public function productdetails($prod_slug)
    {


        if (Product::where('slug', $prod_slug)->exists()) {

            $products = Product::where('slug', $prod_slug)->first();
            return view('frontend.products.productdetails', compact('products'));
        } else {
            return redirect('/')->with('status', "slug does not exists");
        }
    }
    public function subcategory()
    {
        $subcategories = Category::whereNotNull('parent_id')->get();
        
        return view('frontend.subcategory',compact('subcategories'));
    }
}
