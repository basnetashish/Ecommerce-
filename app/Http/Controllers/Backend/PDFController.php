<?php

namespace App\Http\Controllers\Backend;

use App\Models\Backend\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvoiceOrdeMailable;
use Exception;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpParser\Node\Stmt\TryCatch;

class PDFController extends Controller
{
    public function generatePDF(String $id)
    {  
        // set_time_limit(300);
        $order =  Order::with('orderItems')->findOrFail($id);
        // dd($order);
        $pdf = PDF::loadview('backend.generate',compact('order'));  
        return $pdf->download('invoice.pdf');
     

    }

    public function sendmail($id){

        $order = Order::findOrFail($id); 
    try {
      
        Mail:: to($order->email)->send(new InvoiceOrdeMailable($order));
     
        return redirect('/order-details/'. $order->id)->with('message',"Mail sent successfully to ".$order->email);
    } catch(\Exception $e) {
        error_log($e->getMessage());
        return redirect('/order-details/'. $order->id)->with('message',"Something went wrong please check");
    }

    }

    public function invoice()
    {
        return view('backend.order-invoice');
    }
}
