<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Invoice Print</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('assets/backend/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/backend/dist/css/adminlte.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
     <!-- Google Font: Source Sans Pro -->
     <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
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
        {{-- <b>Invoice #007612</b><br> --}}
        <br>
        <b>Order ID:</b> {{$order->tracking_no}}<br>
        {{-- <b>Payment Due:</b> 2/22/2014<br> --}}
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
      Cash

        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
        
        </p>
      </div>
      <!-- /.col -->
      <div class="col-6">
        <p class="lead">Amount Due 2/22/2014</p>

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
 
  </div>
  @endforeach

</body>
<script text="text/javascript">
    // $(documnet).ready(function(){
    //     $(document).on('add', '.print', function(){
    //           window.print();
    //     });
    // });
    window.addEventListener("add", window.print());
</script>
</html>