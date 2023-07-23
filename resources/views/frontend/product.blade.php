@extends('frontend.mainpage')

@section('content')

    <section class="product_section layout_padding" style="font-family: 'Roboto', sans-serif;">
        <div class="container">
          <div class="heading_container heading_center">
            <h2>
              Our Products
            </h2>
          </div>
          <div class="row">
            @foreach($products as $product)
            <div class="col-sm-6 col-lg-4">
              <div class="box">
                <div class="img-box">
                  <img src="{{asset('assets/backend/product/'.$product->image)}}" alt="">
                  <a href="{{url('products/'.$product->slug)}}" class="add_cart_btn">
                    <span>
                      Add To Cart
                    </span>
                  </a>
                </div>
                <div class="detail-box">
                  <h5>
                    {{$product->name}}
                  </h5>
                  <div class="product_info">
                    <h5>
                      <span>Rs.</span> {{$product->selling_price}}
                    </h5>
                    <div>
                        <span class="float-end float-right"><s style="color: red">{{$product->orginal_price}}</s></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
           
            
          
          
         
          </div>
        
        </div>
      
    </section>

@endsection