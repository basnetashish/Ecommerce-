@extends('frontend.mainpage')

@section('content')
<div class="bg-warning ">
  <div class="container py-2" style="font-family: 'Lato', sans-serif;">
    <!-- Breadcrumb -->
    <nav class="d-flex">
      <h6 class="  mb-0">
        <a href="{{url('/home')}}" class="text-hover">Home</a>
        <span class="text-white-50 mx-2"> > </span>
        <a href="{{url('/category')}}" class="text-hover">Category</a>
        <span class="text-white-50 mx-2"> > </span>
        <a href="{{url('/cart1')}}" class="text-hover">Cart</a>
        <span class="text-white-50 mx-2"> > </span>
        <a href="{{url('/placeorder')}}" class="text-hover">My Orders</a>

      </h6>
    </nav>
    <!-- Breadcrumb -->
  </div>

</div>
<section style="background-color:#eee; min-height: 80vh;" >
  <div class="container py-5 product-data">
    @foreach($orders as $order)
    @foreach($order->orderItems as $item)
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6 col-sm-4  mx-auto" style="margin-left: auto; margin-right: 0;">
        <div class="card " style="border-radius: 15px; height: 100vh; width: 30vw;  margin-bottom: 20px;">
          <div class="bg-color">
          <img src="{{asset('assets/backend/product/'.$item->Products->image)}}"
                style="height:250px; width:250px;  margin-left:20%; margin-top:20px; " class=" "
                alt="product" />
         
              <a href="#!">
                <div class="mask"></div>
              </a>
          </div>
              
                 <div class="card-body pb-0">
                  <div class="d-flex justify-content-between">
                  <div>
                      <p> <i class="fa fa-user" aria-hidden="true"></i> {{$order->name}}</p>
                      <p><i class="fa fa-envelope"></i> {{$order->email}}</p>
                      <p><i class="fa fa-location-dot"></i> {{$order->address}}</p>
                    </div>
                    <div>
                        <p><i class="fa fa-phone"> {{$order->phone}}</i></p>
                    </div>
                  </div>
                 </div>
                 
                 <div class="card-body " >
                  <div class="d-flex justify-content-between" style="margin-top:-10%;">
                  <div >
                    
                    <p> Tracking No: <b>{{$order->tracking_no}}</b></p>
                          
                      <h6 >{{$item->Products->name}}</h6>
                      <p>Quantity: {{$item->qty}}</p>
                      <p >
                       
                        Price:  {{$item->Products->selling_price}}
                       </p>
                    </div>
                    <div>
                        <p style="margin-left:80px;" class="cancel">
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
                        </p> 
                      <p style="margin-top: 120px;"> <b> Total Price: {{$item->price}}</b></p>
                    
                      
                    </div>
                  </div>
                  <div class="d-flex justify-content-between">
                   
                    <div>
                      @if(!($order->status =='completed'))
                   <a href="{{route('order.cancel',['id'=>$order->id])}}" onclick="return confirm('Are you sure cancel the order?')" ><button type="submit" class="btn btn-danger orderCancel">Cancel Order</button></a>
                   @endif
                    </div>
                  
                    <div>
                      <a href="{{url('/category')}}" > <b >Continue Shopping </b></a>
                    </div>
                   </div>
                 </div>
                 
              </div>           
      </div>
    </div>
    @endforeach
    @endforeach
  </div>

</section>
<style>
  .text-hover{
      color:white;
  }
  .text-hover:hover {

color:white;
font-weight: bold;
}
</style>

{{-- @section('script')
<script>
  $(document).ready(function(){
    console.log('loaded')
    var status = {{$order->status}}
    console.log('Status:', status);
    if(status == 'completed'){
      $('.orderCancel').removeClass('d-none');
    }else{
      $('.orderCancel').addClass('d-none');
    }

  });
</script>

@endsection --}}
@endsection