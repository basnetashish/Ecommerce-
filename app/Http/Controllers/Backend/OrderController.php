<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Order;
use App\Models\Backend\Cart;
use App\Models\Backend\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class OrderController extends Controller
{
    public function checkout()
    {
        $cartitems = Cart::where('user_id',Auth::id())->get();
        foreach($cartitems as $item)
        {
            if(!Product:: where('id', $item->prod_id)->where('qty','>=',$item->prod_qty)->exists())
            {
                    $removeitem = Cart::where('user_id',Auth::id())->where('prod_id',$item->prod_id)->first();
                    $removeitem->delete();
            }
        }
            
        $carts = Cart::where('user_id',Auth::id())->get();
        return view('frontend.checkout',compact('carts'));
    }

    public function placeorder()
    {
        if(Auth::check())
        {
           if(Cart::where('user_id',Auth::id())->exists()){

           }
        }else 
        {
            return redirect()->route('/login')->with('danger',"Login required");
        }
    }
}
