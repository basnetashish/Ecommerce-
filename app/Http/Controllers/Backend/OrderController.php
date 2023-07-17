<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Order;
use App\Models\Backend\Cart;
use App\Models\Backend\Product;
use App\Models\Backend\Order_items;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Notifications\OrderNotification;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Notification;
use PDF;

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
  
        try {
            DB::beginTransaction();
            $order= Order::create([
                    'user_id' =>Auth::id(),
                    'name' => $request->input('name'),
                    'email'=> $request->input('email'),
                    'address' => $request->input('address'),
                    'phone' => $request->input('phone'),
                    'tracking_no' => 'order'. rand(1111,9999)

            ]);
                //cart 
            $cart = Cart::where('user_id',Auth::id())->get();

            //store order Items
            foreach($cart as $item){
            $order_items = Order_items::create([
                'order_id' => $order->id,
                'prod_id'  => $item->prod_id,
                  'qty'    => $item->prod_qty,
                 'price'   => $item->Products->selling_price * $item->prod_qty
 
            ]);
        }
            $product = Product::find($item->prod_id);
            $product->qty = $product->qty - $item->prod_qty ;
            

            $cartitems = Cart::where('user_id',Auth::id())->get();
            Cart::destroy($cartitems);

            $latestorder= Order::latest()->first();
            if($latestorder){
            $admins = User::where('roles', 'admin')->get();
           Notification::send($admins, new OrderNotification($latestorder));
            }
            DB::commit();

            return redirect()->route('f_placeorder')->with('success',"Your order placed successfully");

             
        } catch (\Exception $th) {

            DB::rollback();
            return Redirect::to('/checkout')->with('error',"Please fill the form again");
        }


    }

    public function placeorder()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('frontend.placeorder', compact('orders'));
    }

   public function orderdetails($id)
{
    $orders = Order::where('id', $id)->where('user_id', Auth::id())->get();

    if ($orders) {
        return view('frontend.orderdetails', compact('orders'));
    } else {
        return view('frontend.placeorder')->with('error',"Order not found");
    }
}

public function adminorderlist()
{
    
    $orders = Order::all();

    return  view('backend.orderlist',compact('orders'));
}

public function adminorderdetails($id){
   $orders = Order::where('id',$id)->get();
   return view('backend.orderdetails',compact('orders'));
}
 public function print($id)
 {
    $orders = Order::where('id',$id)->get();
    return view('backend.print',compact('orders'));
 }

 

public function adminorderedit($id)
{
     $orders = Order::find($id);
     return view('backend.orderedit',compact('orders'));
}

public function orderupdate(Request $request , String $id)
{
   $orders = Order::find($id);

   $orders->name = $request->input('name');
   $orders->email = $request->input('email');
   $orders->address = $request->input('address');
   $orders->phone  = $request->input('phone');
   $orders->status = $request->input('status');
//    $orders->tracking_no = $request->input('tracking');

   $orders->update();

   return  redirect()->route('order_list')->with('success',"Orders Status updated successfully");

}


}
