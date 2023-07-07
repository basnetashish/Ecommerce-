<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Cart;
use App\Models\Backend\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addproduct(Request $request){
        $product_id = $request->input('prod_id');
        $product_qty = $request->input('prod_qty');
        if(Auth::check()){
            $product_check = Product::where('id',$product_id)->first();
        if($product_check){
            if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists()){

                return response()->json(['status'=> $product_check->name. " already added to the cart"]);
            }
            else{
            $cart = new Cart();
            $cart->prod_id = $product_id;
            $cart->user_id = Auth::id();
            $cart->prod_qty  = $product_qty;
            $cart->save();
           return  response()->json(['status' => $product_check->name. " added to cart successfully"]);
            }
        }
        }else{
            return  response()->json(['status' =>  " Please login to add product in cart"]);
        }
    }

    public function viewcart()
    {
        $carts = Cart::where('user_id',Auth::id())->get();
        return view('frontend.cart',compact('carts'));
    }

     public function deletecart(Request $request)
     {
            if(Auth::check())
            {
                $product_id = $request->input('prod_id');
                if(Cart::where('prod_id',$product_id)->where('user_id', Auth::id())->exists())
                {
                     $carts = Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->first();
                     $carts->delete();
                    
                     return response()->json(['status'=>"Cart deleted successfully"]);
                    
                }else{
                    return response()->json(['status'=>"Product not found"]);
                }

            }else{
                 return response()->json(['status'=> "Login required!"]);
            }
     }

        public function updatecart(Request $request)
        {
            if(Auth::check()){
                $product_id = $request->input('prod_id');
                $product_qty = $request->input('prod_qty');
                if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists()){
                    $cart =Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->first();
                    $cart->prod_qty = $product_qty;
                    $cart->update();

                    return response()->json(['status'=>"Product updated successfully"]);

                }
                else{
                    return response()->json(['status'=>"Product not found"]);
                }
            } 
            else{
                return response()->json(['status'=>"Login required"]);
            }


        }
        public function cartindex()
        {
            $carts = Cart::all();
            return view('backend.cartlist',compact('carts'));
        }
}
