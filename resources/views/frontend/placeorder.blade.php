@extends('/frontend.mainpage')
@section('content')

<div class="container mt-5 d-flex justify-content-center" style="font-family: 'Lato', sans-serif;">
    <div class="card p-4 mt-3">
       <div class="first d-flex justify-content-between align-items-center mb-3">
         <div class="info">
            <h5><strong style="color:mediumblue">Thank you , {{Auth::user()->name}}</strong></h5>
           
            <span class="order"> Order Id :   </span>
          
              
         </div>
        
         <i class="fas fa-truck fa-4x" style="color: orange"></i>
           

       </div>
           <div class="detail">
       <span class="d-block summery">Your order has been dispatched. we are delivering you order.</span>
           </div>
       <hr>
       <div class="text">
        <div class="container mt-6">
            <div class="d-flex justify-content-center row">
                <div class="col-md-14">
                    <div class="rounded">
                        <div class="table-responsive table-borderless">
                            <table class="table">
                                <thead style="font-size:15px">
                                    <tr>
                                        <th class="text-center">
                                            <div class="toggle-btn">
                                                <div class="inner-circle"></div>
                                            </div>
                                        </th>
                                        
                                        <th>Tracking Id</th>
                                        <th>Status</th>
                                        <th>Total Price</th>
                                        
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                    @foreach($orders as $order)
                                    <tr class="cell-1">
                                        <td class="text-center">
                                            <div class="toggle-btn">
                                                <div class="inner-circle"></div>
                                            </div>

                                        </td>

                                        <td>{{$order->tracking_no}}</td>
                                        <td >
                                          @switch($order->status)
                                             @case('pending')
                                             <span class="badge badge-danger">Pending</span>
                                             @break
                                             @case('accepted')
                                             <span class="badge badge-info">Accepted</span>
                                             @break
                                             @case('shipped')
                                             <span class="badge badge-info">Shipped</span>
                                             @break
                                             @case('completed')
                                             <span class="badge badge-success">Completed</span>
                                             @break
                                             @case('returned')
                                             <span class="badge badge-danger">Retured</span>
                                             @break
                                             @case('cancelled')
                                             <span class="badge badge-danger">Cancelled</span>
                                             @break

                                             @default
                                             <span class="badge badge-danger">Pending</span>
                                          @endswitch
                                        </td>
                                        <td>
                                            <?php   $totprice =0; ?>
                                            @foreach($order->orderItems as $item)
                                            @if($order->id == $item->order_id)
                                                <?php
                                                $totprice += $item->price;
                                                ?>
                                            @endif
                                        @endforeach
                                          <p>{{$totprice}}</p>
                                        </td>
                                        
                                        <td>
                                            <a href="{{url('/orderdetails/'. $order->id)}}"><button class="badge badge-info">View</button></a>
                                        </td>
                                      
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     

            </div>
     </div>
 </div>

@endsection