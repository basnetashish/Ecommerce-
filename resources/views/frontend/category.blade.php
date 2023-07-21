@extends('frontend.mainpage')

@section('content')

<section class="product_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Our Category
        </h2>
      </div>
      <div class="row">
        @foreach($categories as $category)
        <div class="col-sm-6 col-lg-4">
          <div class="box">
            <div class="img-box">
              <img src="{{asset('/assets/category/'.$category->image)}}" alt="">
              <a href="{{url('/category/'.$category->slug)}}" class="add_cart_btn">
                <span>
                  View Products
                </span>
              </a>
            </div>
            <div class="detail-box">
              <h5>
                {{$category->name}}
              </h5>
              <div class="product_info">
                <small>
                    {{$category->description}}

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
