@extends('frontend.mainpage')

@section('content')
<style>
.dropdown-submenu {
  position: relative;
}
.dropdown-submenu .subcategory {
  display: none;
  position: absolute;
  top: 0;
  left: 100%;
  margin-top: -1px;
}

.dropdown-submenu:hover .subcategory {
  display: block;
}
.dropdown-submenu:hover .submenu {
    background-color: lightgray; 
  }
  .nav-item.dropdown:hover .price-menu{
    display: block;
  }

  </style>

<nav class="navbar navbar-expand-lg navbar-light bg-light">


  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
     
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Price 
        </a>
        <div class="dropdown-menu price-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{URL::current()}}" >All Product</a>
          <a class="dropdown-item" href="{{URL::current()."?price=asc"}}" id="low-to-high">Low to High</a>
          <a class="dropdown-item" href="{{URL::current()."?price=desc"}}" id="high-to-low">High to Low</a>
        </div>
      </li>
      <li class="nav-item dropdown category-dropdown ">
        <a class="nav-link dropdown-toggle  " href="#" data-toggle="dropdown" aria-expanded="true"  >
          Category
        </a>
        <div class="dropdown-menu">
          @foreach($categories as $category)

            <div class="dropdown-submenu">

              <a class="dropdown-item submenu " href="#" aria-expanded="false">
                {{$category->name}}
              </a>
            
              @if(count($category->subcategories) > 0)
              <ul class="dropdown-menu subcategory ">
                @foreach($category->subcategories as $subcategory)
                  <li>
                    <a class="dropdown-item" href="{{URL::current()."?subcategory=".$subcategory->slug}}"  aria-expanded="false">
                      {{ $subcategory->name }}
                    </a>
                  </li>
                 
                @endforeach
              </ul>
              @endif
           
            </div>
            
          @endforeach
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{URL::current()."?latest"}}">Latest</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{URL::current()."?trending"}}">Treding</a>
      </li>
      
    </ul>

    
  </div>
</nav>

    <section class="product_section layout_padding" style="font-family: 'Roboto', sans-serif;">
        <div class="container ">
          <div class="heading_container heading_center">
            <h2>
              Our Products
            </h2>
          </div>
          <div class="row  products-section " >
            {{-- @DD($products); --}}
            @foreach($products as $product)
            <div class="col-sm-6 col-lg-4  ">
              <div class="box ">
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
                      <span data-price ="{{$product->selling_price}}">Rs.</span> {{$product->selling_price}}
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

@section('script')

<script>
  $(document).ready(function(){
     console.log('loaded');
     $(document).on('click','#high-to-low',function(){
         var price= $(this).data('price');
        price.sort((a,b)=> b-a);
     });
// Hide all submenu dropdowns by default
// $('.submenu').next('ul').hide();
// $('.submenu').on("click", function(e){
//   e.stopPropagation();
//   e.preventDefault();
// var subcategoryDropdown = $(this).next('ul');
// subcategoryDropdown.toggle();
// });
  });
</script>


@endsection

