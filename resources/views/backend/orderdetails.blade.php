@extends('layouts.backend')
@section('content')

@if ($message = Session::get('message'))
<div class="alert alert-success alert-block" id="flashmsg" >
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Invoice</h1>
        </div>
        {{-- <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('\admin')}}">Home</a></li>
            <li class="breadcrumb-item active">Invoice</li>
          </ol>
        </div> --}}
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="callout callout-info">
            <h5><i class="fas fa-info"></i> Note:</h5>
            This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
          </div>


          <!-- Main content -->
          <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
              <div class="col-12">
                <h4>
                  <i class="fas fa-globe"></i> AdminLTE, Inc.
                  <small class="float-right">Date: {{ now()->format('d-m-Y') }}</small>
                </h4>
              </div>
              <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">
                From
                <address>
                  <strong>Admin, Inc.</strong><br>
                  795 Folsom Ave, Suite 600<br>
                  San Francisco, CA 94107<br>
                  Phone: (804) 123-5432<br>
                  Email: info@almasaeedstudio.com
                </address>
              </div>
              <!-- /.col -->
              @foreach($orders as $order)
             
              <div class="col-sm-4 invoice-col">
                To
                <address>
                  <strong>{{$order->name}}</strong><br>
                 Address: {{$order->address}}<br>
                  Phone: {{$order->phone}}<br>
                  Email: {{$order->email}}
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                <b>Invoice No : #{{$order->id}}</b><br>
                <br>
                <b>Tracking No:</b> {{$order->tracking_no}}<br>
                <b>Order Status:</b> 
                @switch($order->status)
                @case('pending')
                <span class="badge badge-danger">Pending</span>
                @break;
                @case('accepted')
                <span class="badge badge-info">Accepted</span>
                @break;
                @case('shipped')
                <span class="badge badge-primary">Shipped</span>
                @break;
                @case('completed')
                <span class="badge badge-success">Completed</span>
                @break;
                @case('cancelled')
                <span class="badge badge-danger">Cancelled</span>
                @break;
                @case('returned')
                <span class="badge badge-danger">Returned</span>
                @break;
                @default
                <span class="badge badge-danger">Pending</span>

              @endswitch
                <br>
                {{-- <b>Account:</b> 968-34567 --}}
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
              <div class="col-12 table-responsive">
                <table class="table table-striped">
                  <thead>
                  <tr>
                 
                    <th>Particulars</th>
                    <th>Qty</th>
                    <th>Description</th>
                    <th>Subtotal</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    @foreach($order->orderItems as $item)
                    
                   
                    <td>{{$item->Products->name}}</td>
                    <td>{{$item->qty}}</td>
                    <td>{{$item->Products->description}}</td>
                    <td>
                      
                        {{$item->price}}
                    </td>
                  </tr>
                
                  </tbody>
              
                  @endforeach
                </table>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <!-- accepted payments column -->
              <div class="col-6">
                <p class="lead">Payment Methods:</p>
                Cash On Delivery

                <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                 
                </p>
              </div>
              <!-- /.col -->
              <div class="col-6">
                {{-- <p class="lead">Amount Due 2/22/2014</p> --}}

                <div class="table-responsive">
                  <table class="table">
                    <tr>
                      <th style="width:50%">Subtotal:</th>
                     
                      <td>
                        <?php $total =0;
                           $shipping =70 ;
                        
                        ?>
                        @foreach($order->orderItems as $item)
                        
                        <?php $total +=$item->price ; ?>
                        @endforeach
                        {{$total}}
                      
                      </td>
                    </tr>
                   
                    <tr>
                      <th>Tax (5%) </th>
                      <?php $tax =  5/100 * $total; ?>
                      <td>{{$tax}}</td>
                    </tr>
                    <tr>
                      <th>Shipping:</th>
                      <td>{{$shipping}}</td>
                    </tr>
                    <tr>
                      <th>Total:</th>
                      <td>{{$total + $shipping + $tax }}</td>
                    </tr>
                  </table>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- this row will not appear when printing -->
            <div class="row no-print">
              <div class="col-12">
                <a href="{{url('/order_details_print/'.$order->id)}}" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                <a href="{{url('/invoice/send-mail/'.$order->id)}}">
                  <button type="button" class="btn btn-success float-right"><i class="far fa-envelope"></i> Send Mail
                  </button>
                </a>
                <a href="{{url('/generate/'.$order->id)}}">
                <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                  <i class="fas fa-download"></i> Generate PDF
                </button>
                </a>
              </div>
            </div>
          </div>
          @endforeach
          <!-- /.invoice -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@endsection

