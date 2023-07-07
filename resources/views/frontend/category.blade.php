@extends('frontend.mainpage')

@section('content')

<div class="container">
    <div class="heading_container heading_center">
        <br>
        <h2> Categories</h2>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                    @foreach($categories as $category)
                        <div class="col-md-4 mb-3">
                            <a href="{{url('/category/'.$category->slug)}}">
                             <div class="card" >
                                <img src="{{asset('/assets/category/'.$category->image)}}" height="300px"  alt="Category image">
                                
                                 <div class="card-body">
                                  <h5>
                                    {{$category->name}}
                                </h5>
                                  <small>
                                   {{$category->description}}
                                </small>
    
    
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

@endsection
