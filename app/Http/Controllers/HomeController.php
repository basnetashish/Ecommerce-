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
 
    public function roles(){
        return view('admin');
    }

    

   
    // view category product
   

   

   
    public function searchproduct(Request $request)
    {
        dd($request);
       $query = $request->input('input'); 
       if($query){
        $result = Product::where('name','LIKE','%'.$query.'%')->get();
        return view('frontend.search');


     }
      
    }
}
