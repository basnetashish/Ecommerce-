@extends('frontend.mainpage')

@section('content')

<section class="product_section layout_padding" style="font-family: 'Roboto', sans-serif;">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Our  Subcategory
        </h2>
      </div>
      <div class="row">
        {{-- @dd($subcategories); --}}
        @foreach($subcategories as $subcategory)
        <div class="col-sm-6 col-lg-4">
          <div class="box">
            <div class="img-box">
              <img src="{{asset('/assets/category/'.$subcategory->image)}}" alt="">
              <a href="{{url('/category/'.$subcategory->slug)}}" class="add_cart_btn">
                <span>
                  View Products
                </span>
              </a>
            </div>
            <div class="detail-box">
              <h5>
                {{$subcategory->name}}
              </h5>
              <div class="product_info">
                <small>
                    {{$subcategory->description}}
                </small>

              </div>
            </div>
          </div>
        </div>
        @endforeach

      </div>
    
    </div>
  
</section>

@endsection
