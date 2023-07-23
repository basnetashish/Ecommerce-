@extends('frontend.mainpage')

@section('content')
  <?php  $total = 0    ?>
<div class="bg-warning" style="font-family: 'Roboto', sans-serif;">
    <div class="container py-2" style="font-family: 'Roboto', sans-serif;">
      <!-- Breadcrumb -->
      <nav class="d-flex">
        <h6 class="  mb-0">
          <a href="{{url('/home')}}" class="text-hover">Home</a>
          <span class="text-white-50 mx-2"> > </span>
          <a href="{{url('/category')}}" class="text-hover">Category</a>
          <span class="text-white-50 mx-2"> > </span>
          <a href="" class="text-hover">Wishlist</a>
        </h6>
      </nav>
      <!-- Breadcrumb -->
    </div>
</div>
   @if ($wishlists->count() >= 1)
<section class="h-100" style="background-color: #eee; font-family: 'Roboto', sans-serif;">
    <div class="container h-100 py-5">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-10">
  
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-normal mb-0 text-black">My Wishlist</h3>
            
          </div>
  {{-- @dd($wishlists) --}}
          @foreach( $wishlists as $wishlist )
         {{-- @dd($wishlist->Products()) --}}
          <div class="card rounded-3 mb-4">
            <div class="card-body p-4">
              <div class="row d-flex justify-content-between align-items-center product_data">
                <div class="col-md-2 col-lg-2 col-xl-2">
                  <img
                    src="{{asset('assets/backend/product/'.$wishlist->Products->image)}}"
                    class="img-fluid rounded-3" alt="Cotton T-shirt">
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3">
                  <h4 class=" fw-normal mb-2"> {{$wishlist->Products->name}}</h4>
                  <p>
                    @if($wishlist->products->trending == true)
                        <span class="badge badge-danger"> Trending</span>
                    @endif 
                  </p>
                  <p><span class="text-muted">{{$wishlist->Products->small_description}} </span></p>
                </div>
                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                    
                    <div class="d-flex">
                        <input type="hidden" class="prod_id" value="{{$wishlist->prod_id}}">

                        @if($wishlist->Products->qty >= $wishlist->prod_qty)
                        <input class="form-control text-center me-3 prod_qty" id="inputQuantity" type="number" value="{{$wishlist->prod_qty}}" min="1" max="5"  oninput="validity.valid||(value='1');"  data-productqty = "{{$wishlist->prod_qty}}" style="max-width: 4rem" />
                        @else
                        <span class="badge badge-danger"> Out of Stock</span>
                     
                       @endif
                      
                  </div>
                </div>
                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                  @if($wishlist->Products->qty >= $wishlist->prod_qty)
                  <?php $price=0 ?>  
                     
                  <?php $price = $wishlist->Products->selling_price * $wishlist->prod_qty

                    ?>

                  <h5 class="mb-0">Rs.{{$price}}</h5>
                  @endif
                </div>
                 
                <div class="col-md-1 col-lg-1 col-xl-1 " style="margin-left:-15px">
                  <button class="btn btn-info wishcart"><i class="fa fa-shopping-cart"></i></button>
                 </div> 

                <div class="col-md-1 col-lg-1 col-xl-1 " >
                    <button class="btn btn-danger">
             <a href="#!" class="text-white delete-wishlist" data-productid = "{{$wishlist->prod_id}}"><i class="fa fa-trash fa-lg"></i></a>
            </button>
            </div>
                
               
              </div>
            </div>
          </div>
  
          @endforeach
    </div>
     
    
   @else 
   <div class="container-fluid  mt-150 py-4" style="font-family: 'Roboto', sans-serif;">
    <div class="row">
    
     <div class="col-md-12">
     
       
           <div class="col-sm-12 empty-cart-cls text-center">
          
             <i class="fa  fa-heart  fa-9x"></i>
             <h3><strong>Your Wishlist is Empty</strong></h3>
             <h4>Add something to make me happy :)</h4>
             <a href="{{url('/category')}}">
              <button type="button" class="btn btn-primary btn-sm">Continue Shopping</button>

             </a>     
       
   </div>
     </div>
    
    </div>
   
   </div>
   @endif

      </div>
    </div>
</section>
@endsection

@section('script')
 <script>
  $(document).ready(function() {
    console.log('loaded')
    $(document).on('click', '.delete-wishlist', function() {
        // var product_id = $(this).data('productid');
        var product_id = $(this).closest('.product_data').find('.prod_id').val();
      

      $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

      $.ajax({
        type : "delete",
        url :"/delete-wishlist",
        data : {
                'prod_id' : product_id,
        },
        
          success: function(response){
              swal("Message",response.status,'success',{
              button:true,
            button:"Ok",
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
    method : "PUT",
    url : "/update-wishlist",
    data:{
       'prod_id' : product_id,
       'prod_qty' : product_qty,
    },

    
      // console.log(response)
      success: function(response){
              swal("Message",response.status,'success',{
              button:true,
            button:"Ok",
            timer:3000,
            dangerMode:true,

            });
            window.location.reload();
            }
          });
 
 });

 

   // wishlist add to cart
   $(document).on('click','.wishcart', function(e){
     
     var product_id = $(this).closest('.product_data').find('.prod_id').val();
     var product_qty = $(this).closest('.product_data').find('.prod_qty').val();
    //  alert(product_id);
    //  alert(product_qty);

     $.ajaxSetup
     ({
        headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $.ajax({
        type : 'POST',
        url : '/add-to-cart',
        data : {
          'prod_id' : product_id,
          'prod_qty': product_qty,
           },
        success:function(response){
              swal("Message",response.status,'success',{
               button:true,
               button:"Ok",
               timer:3000,
               dangerMode:true,
              
            });
            window.location.reload();
          }
        });//
          
   });//

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