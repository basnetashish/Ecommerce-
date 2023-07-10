@extends('/frontend.mainpage')
@section('content')

<div class="container mt-5 d-flex justify-content-center" style="font-family: 'Lato', sans-serif;">
    <div class="card p-4 mt-3">
       <div class="first d-flex justify-content-between align-items-center mb-3">
         <div class="info">
            <h5><strong style="color:mediumblue">Thank you , {{Auth::user()->name}}</strong></h5>
           
            <span class="order"> Order Id :   </span>
          
              
         </div>
        
         <i class="fas fa-truck fa-4x"></i>
           

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
                                <thead style="font-size:18px">
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
                                            @if($order->status == 0)
                                            <span class="badge badge-danger">Pending</span>
                                        @else
                                            <span class="badge badge-success">Completed</span>
                                        @endif
                                        </td>
                                        <td>
                                            @foreach($order->orderItems as $item)
                                            {{$item->price}}
                                        @endforeach
                                        </td>
                                        
                                        <td>
                                            <a href="{{url('/orderdetails/'. $order->id)}}"><button class="btn btn-info">View</button></a>
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