@extends('frontend.mainpage')
@section('content')

@if(Session::has('error'))
    <div class="alert alert-danger">
        {{Session::get('error')}}
    </div>
@endif

<div class="container py-4" style="font-family: 'Lato', sans-serif;">
    <div class="title text-center">
        <h2>Check Out </h2>
    </div>
        
   
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h6>Details</h6>
                </div>
                <div class="card-body">
                    <form role="form" action="{{url('/orderstore')}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                      
                        <div class="form-group">
                          <label for="exampleInputEmail1"> Full Name</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" name="name"  value="{{old('name')}}" placeholder=" Full name ">
                          @error('name')
                            <div class=" text-small text-danger" >{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="email" class="form-control" id="exampleInputPassword1"  value="{{old('email')}}"  name="email" placeholder=" Email">
                            @error('email')
                            <div class=" text-small text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                     
                
                        <div class="form-group">
                            <label for="exampleInputPassword1">Address</label>
                            <input type="text" class="form-control" id="exampleInputPassword1"  value="{{old('address')}}"  name="address" placeholder=" Address">
                            @error('address')
                            <div class=" text-small text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                     
                              <div class="form-group">
                                <label for="exampleInputPassword1">Phone</label>
                                <input type="number" class="form-control" id="exampleInputPassword1"value="{{old('phone')}}" name="phone" placeholder="  Phone (Eg: 983659852)">
                                @error('phone')
                                <div class=" text-small text-danger">{{ $message }}</div>
                                @enderror
                              </div>
                        
                      </div>
                      <!-- /.card-body -->
                
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Continue</button>
                      </div>
                    </form>

                </div>
            
        </div>
        <div class="col-lg-5">

          <?php 
          $price=0;
          $total =0;
          $shipping = 70;
          
          ?>
          
          <div class="card">
            <div class="card-header text-center">
              <h6>Order List </h6>
            </div>
            <div class="card-body">
              <table class="table">
                @foreach($carts as $cart)
                {{-- @if($cart->Products->qty >= $cart->prod_qty) --}}

                <?php 
                $price = $cart->prod_qty * $cart->products->selling_price ;
                $total += $price  ;
                 ?>
                <tbody>
                  <tr>
                    
                    <td>{{$cart->Products->name}}</td>
                    <td>{{$cart->prod_qty}}</td>
                    <td>{{$price}}</td>
                  </tr>
                 
                  {{-- @endif --}}
                  @endforeach
                  <tr>
                    <td>Shipping</td>
                    <td></td>
                    <td>{{$shipping}}</td>
                  </tr>

                  <tr>
                    <th>Total</th>
                    <td></td>
                    <td>{{$total + $shipping}}</td>
                  </tr>
                </tbody>
              </table>
              
            </div>
          </div>
          
          
    </div>

    
</div> 
 

@endsection