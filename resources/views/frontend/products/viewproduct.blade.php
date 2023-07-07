@extends('frontend.mainpage')

@section('content')

<div class="container">
    <br>
    <div class="heading_container heading_center">
        <h2>{{$categories->name}}</h2>
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
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                    @foreach($products as $product)
                        <div class="col-md-4">
                            <a href="{{url('category/'.$categories->slug.'/'.$product->slug)}}">
                            <div class="card">
                                <img src="{{asset('assets/backend/product/'.$product->image)}}" height="300px" alt="products image">
                                
                                 <div class="card-body">
                                  <h5>
                                    {{$product->name}}
                                </h5>
                                 <span class="float-start">{{$product->selling_price}}</span>
                                 <span class="float-end float-right"><s style="color: red">{{$product->orginal_price}}</s></span>
                                 
                                

                                 </div>
                            </div>
                        </a>
                        </div>
                        @endforeach
                    </div>
    
                </div>
            </div>
        </div>
    </div>
</div>
    @endif   
@endsection