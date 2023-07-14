@extends('frontend.mainpage')

@section('content')
<div class="bg-warning">
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
<section style="background-color:#eee; min-height: 80vh;">
  <div class="container py-5">
    @foreach($orders as $order)
    @foreach($order->orderItems as $item)
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6 col-xl-4 mx-auto" style="margin-left: auto; margin-right: 0;">
        <div class="card" style="border-radius: 15px; height: 89vh; width: 30vw;  margin-bottom: 20px;">
          <div class="bg-color">
          <img src="{{asset('assets/backend/product/'.$item->Products->image)}}"
                style="height:300px; width:250px;  margin-left:20%; margin-top:20px; " class=" "
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
                        <p style="margin-left:80px;">
                          @if($order->status == 0)
                          <span class="badge badge-danger">Pending</span>
                      @else
                          <span class="badge badge-success">Completed</span>
                      @endif
                        </p> 
                      <p style="margin-top: 120px;"> <b> Total Price: {{$item->price}}</b></p>
                    
                      <a href="{{url('/category')}}" > <b>Continue Shopping </b></a>
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
@endsection