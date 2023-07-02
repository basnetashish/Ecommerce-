@extends('frontend.mainpage')

@section('content')


<div class="container">
    <br>
    <div class="heading_container heading_center">
        <h2>Products</h2>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                    @foreach($products as $product)
                        <div class="col-md-4">
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
                        </div>
                        @endforeach
                    </div>
    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection