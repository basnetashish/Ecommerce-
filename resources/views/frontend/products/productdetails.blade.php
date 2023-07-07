@extends('frontend.mainpage')


@section('content')

    <div class="container py-5" style="font-family: 'Lato', sans-serif;">
      <div class="row justify-content-center mb-3">
        <div class="col-md-12 col-xl-10">
          <div class="card shadow-0 border rounded-3">
            <div class="card-body product_data">
              <div class="row">
                <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                  <div class="bg-image hover-zoom ripple rounded ripple-surface">
                    <img src="{{asset('assets/backend/product/'.$products->image)}}"
                      class="w-100" />
                    <a href="#!">
                      <div class="hover-overlay">
                        <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-6">
                  <h2>{{$products->name}}</h2>
                  
                  <div class="mt-1 mb-0 text-muted small">
                   @if($products->qty>0)
                     <p class="badge badge-success">In stock</p>

                     @else
                     <p class="badge badge-danger">Out of stock</p>
                     @endif
                  </div>
                    <input type="hidden" value="{{$products->id}}" class="prod_id">
                    <label for="quantity">Quantity</label>
                    <div class="d-flex">
                      <input class="form-control text-center me-3 prod_qty" id="inputQuantity" type="number" value="1" min="1" max="5"  oninput="validity.valid||(value='1');" style="max-width: 4rem" />
                      
                  </div>
                    <br>
                  <p class="text-truncate mb-4 mb-md-0">
                    {{$products->description }}
                  </p>
                </div>
                <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                  <div class="d-flex flex-row align-items-center mb-1">
                    <h4 class="mb-1 me-1" > Rs.{{$products->selling_price}}</h4>
                    <span class="text-danger " ><s>Rs.{{$products->orginal_price}}</s></span>
                  </div>
                 
                  @if ($products->trending == true)
                  <h6 class="badge badge-danger ">Trending</h6>
                  @endif
                  <br>
                  <div class="d-flex flex-column mt-3">

                    @if($products->qty>0)
                    <button class="btn btn-primary btn-sm addtocart" data-productid="{{$products->id}}" type="button"> <i class="fa fa-shopping-cart"></i>Add to cart</button>
                    
                    @endif

                   
                    <button class="btn btn-outline-success btn-sm mt-2" type="button"> <i class="fa fa-heart"></i>
                      Add to wishlist
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>


@endsection

@section('script')
 <script>
  $(document).ready(function() {
    console.log('loaded')
    $(document).on('click', '.addtocart', function() {

    // e.preventDefault();
    var product_id = $(this).data('productid');
    // console.log('here', product_id)
    var product_qty = $(this).closest('.product_data').find('.prod_qty').val();

    //   alert(product_id);
    // alert(product_qty);
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

     $.ajax({
          type:"post",
          url: "/add-to-cart",
          data: {
            'prod_id': product_id,
            'prod_qty': product_qty,
          },
          
          success: function(response){
              alert(response.status);
          }
     });
  });
}); 
 </script>

@endsection