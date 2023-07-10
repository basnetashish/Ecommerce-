<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Order;
use App\Models\Backend\Cart;
use App\Models\Backend\Product;
use App\Models\Backend\Order_items;
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

    public function orderstore(Request $request)
    {
       
       $orders = new Order();
       $orders->user_id = Auth::id(); 
       $orders->name = $request->input('name');
       $orders->email = $request->input('email');
       $orders->address = $request->input('address');
       $orders->phone = $request->input('phone');
       $orders->tracking_no = 'order'.rand(1111,9999);

       $orders->save();
       

        $carts = Cart::where('user_id',Auth::id())->get();
        foreach($carts as $item){
            Order_items::create([
                'order_id' => $orders->id,
                'prod_id' => $item->prod_id,
                'qty' => $item->prod_qty,
                'price' => $item->Products->selling_price * $item->prod_qty,
            ]);

            $product = Product::where('id',$item->prod_id )->first();
            $product->qty = $product->qty - $item->prod_qty;

            $product->update();


        }
        $cartitems = Cart::where('user_id',Auth::id())->get();
        Cart::destroy($cartitems);

        
        return redirect()->route('f_placeorder');


    }

    public function placeorder()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('frontend.placeorder', compact('orders'));
    }

   public function orderdetails($id)
{
    $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();

    if ($orders) {
        return view('frontend.orderdetails', compact('orders'));
    } else {
        return view('frontend.placeorder')->with('error',"Order not found");
    }
}
}
