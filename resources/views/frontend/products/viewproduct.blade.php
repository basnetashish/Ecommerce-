@extends('frontend.mainpage')

@section('content')

<section class="product_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
            {{$categories->name}}
        </h2>
      </div>
      @if($products->isEmpty())
      <br>     
  <div   style="height: 200px" class="alert alert-danger text-center" role="alert">
      <br>
      <h4 class="alert-heading">Sorry!</h4>
     <h4>Product out of stock. Please visit next one !</h4>       
     <br>
    </div>
<br>
  @else
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
    @endif
  
</section>
@endsection