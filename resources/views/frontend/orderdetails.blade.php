@extends('frontend.mainpage')

@section('content')

<section style="background-color:#eee; min-height: 100vh;">
    <div class="container py-5">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-4 mx-auto" style="margin-left: auto; margin-right: 0;">
          <div class="card" style="border-radius: 15px; height: 80vh; width: 30vw;">
            <div class="bg-image hover-overlay ripple ripple-surface ripple-surface-light"
              data-mdb-ripple-color="light">
            
          
              
              <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/12.webp"
                style="border-top-left-radius: 15px; border-top-right-radius: 15px;" class="img-fluid"
                alt="Laptop" />
              <a href="#!">
                <div class="mask"></div>
              </a>
            </div>
            <div class="row">
                <div class="col-12 d-flex justify-content-center text-center">
                  <h5> <b>Customer Details</b></h5>
                </div>
            </div>
        
            <div class="card-body pb-0">
              <div class="d-flex justify-content-between">
                <div>
                     
                  {{-- <p> <i class="fa fa-user" aria-hidden="true"></i> {{$order->name}}</p>
                  <p><i class="fa fa-envelope"></i> {{$order->email}}</p>
                  <p><i class="fa fa-location-dot"></i> {{$order->address}}</p> --}}
                 
                </div>
                <div>
                 
                 {{-- <p><i class="fa fa-phone"> {{$order->phone}}</i></p> --}}
                </div>
              </div>
            </div>
            <hr class="my-0" />
            <div class="card-body pb-0">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center text-center">
                      <h5> <b>Product Details</b></h5>
                    </div>
                </div>
              <div class="d-flex justify-content-between">
                {{-- <p> Id: <b>{{$order->tracking_no}}</b> </p> --}}
               
                {{-- @if($order->status == 0)
                <p class="text-danger">Pending</p>
                @else
                <p class="text-success">Complete</p>
                @endif --}}
              </div>
              <p> 
                {{-- @foreach($order->orderItems as $item)
                Rs.{{$item->price}}
                
            @endforeach --}}
            </p>
              <p class="small text-muted">VISA Platinum</p>
            </div>
            <hr class="my-0" />
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center pb-2 mb-1">
                <a href="#!" class="text-dark fw-bold">Cancel</a>
                <button type="button" class="btn btn-primary">Buy now</button>

              </div>
            
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
