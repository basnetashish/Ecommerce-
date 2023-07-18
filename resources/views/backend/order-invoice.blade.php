<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Invoice</title>

<style type="text/css">
    body {
        font-family: Verdana, Arial, sans-serif;
        font-size: 15px;
    }
    tfoot tr{
        margin-top: 20px;
    }
    
    tfoot tr td{
        font-weight: bold; 
    }
    
    .gray {
        background-color: lightgray
    }
   h2{
           justify-content: center;
           align-items: center;
           display: flex;
           font-size: 20px;  
    }
    .dat{
        float:right;
    }
    
</style>
</head>
<body>
     <h2>Invoice</h2> <br>
     <p class="dat"> <b >Date:</b>{{ date('Y-m-d ') }}</p> <br> 
    
  <table width="100%">
    <tr>
        <td><strong>From:</strong> <br>
           
                <strong>Electro, Inc.</strong><br>
                Sukedhara,Kathmandu<br>
                Phone: 9826747182<br>
                Email:electro@gmail.com
            
            </td>
        <td><strong>To:</strong> <br>
            
              
               <strong>{{$order->name}}</strong><br>
              Address: {{$order->address}}<br>
               Phone: {{$order->phone}}<br>
               Email: {{$order->email}}
           
        </td>
        <td>
            <strong>Invoice No:</strong>{{$order->id}} <br>
            <b>Tracking No:</b> {{$order->tracking_no}}<br>
            <b>Payment:</b> Cash On Delivery <br>

        </td>
    </tr>
  </table>
  <br/>
  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th>S.N</th>
        <th>Particulars</th>
        <th>Quantity</th>
        <th>Description</th>
        <th>SubTotal</th>
      </tr>
    </thead>
    <tbody>
        @foreach($order->orderItems as $item)
        <tr>
           
            <td>{{$loop->iteration}}</td>
            <td>{{$item->Products->name}}</td>
            <td>{{$item->qty}}</td>
            <td>{{$item->Products->description}}</td>
            <td>
                {{$item->price}}
            </td>
           
        </tr>  
        @endforeach
     
    </tbody>
    <tfoot class="footer"> 
        <br>
        <tr>
            <td colspan="3"></td>
            <td align="right">Subtotal </td>
            <td align="right">
                <?php $total =0;
                $shipping =70 ;  
             ?>
             @foreach($order->orderItems as $item)
             
             <?php $total +=$item->price ; ?>
             @endforeach
             Rs.{{$total}}
            </td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td align="right">Tax(5%) </td>
            <?php $tax =  5/100 * $total; ?>
            <td align="right">Rs.{{$tax}}</td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td align="right">Shipping</td>
            <td align="right">Rs.{{$shipping}}</td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td align="right">Total </td>
            <td align="right">{{$total + $shipping + $tax }}</td>
        </tr>
    </tfoot>
  </table>
</body>
</html>