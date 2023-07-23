@extends('frontend.mainpage')

@section('content')


  <?php  $total = 0    ?>
<div class="bg-warning" style="font-family: 'Roboto', sans-serif;">
    <div class="container py-2" style="font-family: 'Lato', sans-serif;">
      <!-- Breadcrumb -->
      <nav class="d-flex">
        <h6 class="  mb-0">
          <a href="{{url('/home')}}" class="text-hover">Home</a>
          <span class="text-white-50 mx-2"> > </span>
          <a href="{{url('/category')}}" class="text-hover">Category</a>
          <span class="text-white-50 mx-2"> > </span>
          <a href="" class="text-hover">Cart</a>
        </h6>
      </nav>
      <!-- Breadcrumb -->
    </div>
  </div>
   @if ($carts->count() >= 1)
   <section class="h-100" style="background-color: #eee; font-family: 'Lato', sans-serif;">
    <div class="container h-100 py-5">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-10">
  
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-normal mb-0 text-black">My Cart</h3>
            
          </div>
  
          @foreach( $carts as $cart)
          <div class="card rounded-3 mb-4">
            <div class="card-body p-4">
              <div class="row d-flex justify-content-between align-items-center product_data">
                <div class="col-md-2 col-lg-2 col-xl-2">
                  <img
                    src="{{asset('assets/backend/product/'.$cart->Products->image)}}"
                    class="img-fluid rounded-3" alt="Cotton T-shirt">
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3">
                  <p class="lead fw-normal mb-2">{{$cart->Products->name}}</p>
                  <p>
                    @if($cart->products->trending == true)
                        <span class="badge badge-danger"> Trending</span>
                    @endif 
                  </p>
                  <p><span class="text-muted">{{$cart->Products->small_description}} </span></p>
                </div>
                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                    
                    <div class="d-flex">
                        <input type="hidden" class="prod_id" value="{{$cart->prod_id}}">

                        @if($cart->Products->qty >= $cart->prod_qty)
                        <input class="form-control text-center me-3 prod_qty" id="inputQuantity" type="number" value="{{$cart->prod_qty}}" min="1" max="5"  oninput="validity.valid||(value='1');"  data-productqty = "{{$cart->prod_qty}}" style="max-width: 4rem" />
                        @else
                        <span class="badge badge-danger"> Out of Stock</span>
                     
                       @endif
                      
                  </div>
                </div>
                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                  @if($cart->Products->qty >= $cart->prod_qty)
                  <?php $price=0 ?>  
                     
                  <?php $price = $cart->Products->selling_price * $cart->prod_qty

                    ?>

                  <h5 class="mb-0">Rs.{{$price}}</h5>
                  @endif
                </div>
                
                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
            <a href="#!" class="text-danger delete_cart" data-productid = "{{$cart->prod_id}}"><i class="fas fa-trash fa-lg"></i></a>
                </div>
              </div>
            </div>
          </div>
  
          @endforeach
  
          
  
          {{-- <div class="card mb-4">
            <div class="card-body flex-row">
          
            </div>
          </div> --}}
  
          <div class="card">
            <div class="card-body">
              
              <div class="total px-4  ">
                @foreach( $carts as $cart)
                @if($cart->Products->qty >= $cart->prod_qty)
                     
                         <?php  $total  += $cart->Products->selling_price * $cart->prod_qty ?>
                         @endif
                      @endforeach
                     <h6 class="float-right"><strong>Total:</strong> {{$total}}</h6>
               
               </div>
              <a href="{{url('/checkout')}}">
              <button type="button" class="btn btn-warning btn-block btn-lg" style="color: black">Checkout</button>
            </a>
            </div>
          </div>
  
        </div>
      </div>
    </div>
</section>
   @else 
   <div class="container-fluid  mt-150 py-4" style="font-family: 'Roboto', sans-serif;">
    <div class="row">
    
     <div class="col-md-12">
     
       
           <div class="col-sm-12 empty-cart-cls text-center">
          
             <i class="fa  fa-cart-shopping  fa-9x"></i>
             <h3><strong>Your Cart is Empty</strong></h3>
             <h4>Add something to make me happy :)</h4>
             <a href="{{url('/category')}}">
              <button type="button" class="btn btn-primary btn-sm">Continue Shopping</button>

             </a>
            
             
           
       
   </div>
       
     
     </div>
    
    </div>
   
   </div>
   @endif


@endsection

@section('script')
 <script>
  $(document).ready(function() {
    
    console.log('loaded')
    $(document).on('click', '.delete_cart', function() {
        // var product_id = $(this).data('productid');
        var product_id = $(this).closest('.product_data').find('.prod_id').val();
      

      $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

      $.ajax({
        type : "POST",
        url :"/deletecart",
        data : {
                'prod_id' : product_id,
        },
        success: function(response){
          swal("Message",response.status,'success',{
              button:true,
            button:"ok",
            timer:3000,
            dangerMode:true,

            });
            window.location.reload();
        }

      });
 });

 // Update cart
   $('.prod_qty').change( function(e){
    var product_id = $(this).closest('.product_data').find('.prod_id').val();

    // e.preventDefault();
    
    var product_qty = $(this).val();

      $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
 $.ajax({
    method : "POST",
    url : "/updatecart",
    data: {
       'prod_id' : product_id,
       'prod_qty' : product_qty,
    },

    success:function(response){
      // console.log(response)
      swal("Message",response.status,'success',{
              button:true,
            button:"ok",
            timer:3000,
            dangerMode:true,

            });
           location.reload();
    }
 });

   });
   
  
}); 
 </script>

@endsection

<style>
    .text-hover{
        color:white;
    }
    .text-hover:hover {
  
  color:white;
  font-weight: bold;
}
</style>