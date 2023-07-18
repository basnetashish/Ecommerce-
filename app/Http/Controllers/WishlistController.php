<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Backend\Wishlist;
use App\Models\Backend\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Backend\Cart;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = Wishlist::where('user_id',Auth::id())->get();
        return view('frontend.wishlist',compact('wishlists'));
    }

    public function addwishlist(Request $request){
       
       
        $product_id = $request->input('prod_id');
        $product_qty = $request->input('prod_qty');
        if(Auth::check()){
            $product_check = Product::where('id',$product_id)->first();
            if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists()){
                return response()->json(['status'=> $product_check->name. " already added to the cart"]);
            }
         if($product_check){
            if(Wishlist::where('prod_id',$product_id)->where('user_id',Auth::id())->exists()){

                return response()->json(['status'=> $product_check->name. " already added to the wishlist"]);
            }
            else{
            $wishlists = new Wishlist();
            $wishlists->user_id = Auth::id();
            $wishlists->prod_id = $product_id;
            $wishlists->prod_qty  = $product_qty;
            $wishlists->save();
           return  response()->json(['status' => $product_check->name. " added to wishlist successfully"]);
            }
        }
        }else{
            return  redirect('/login')->with('error',"login required");
        }
    }

    public function deletewishlist(Request $request)
    {
            
       if(Auth::check()){
        $product_id = $request->input('prod_id');
        if(Wishlist::where('prod_id', $product_id)->where('user_id',Auth::id())->exists()){
             $Wishlists =Wishlist::where('prod_id', $product_id)->where('user_id',Auth::id())->first();
             $Wishlists->delete();
             return response()->json(['status'=>  $Wishlists->Products->name." Wishlist deleted successfully"]);
        }else{
            return response()->json(['status'=> " Wishlist not found"]);
        }

       }else{
        return view('/login')->with('error',"Login required");
       }
    }

    public function updatewishlist(Request $request)
    {
        if(Auth::check()){
            $product_id = $request->input('prod_id');
            $product_qty = $request->input('prod_qty');
           if(Wishlist::where('prod_id',$product_id)->where('user_id',Auth::id())->exists()){
                $wishlists = Wishlist::where('prod_id',$product_id)->where('user_id',Auth::id())->first();
                $wishlists->prod_qty = $product_qty;
                $wishlists->update();
                return response()->json(['status'=>  $wishlists->Products->name." updated successfully"]);
           }
           else
           {
            return response()->json(['status'=>"Products not found"]);
           }

        }else{
            return view('/login')->with('error',"login required");
        }
    }

    public function countwishlist()
    {
        $wishlists = Wishlist::where('user_id',Auth::id())->count();
        return response()->json(['count'=>$wishlists]);
    }
}
