@extends('frontend.mainpage')
@section('content')

<div class="container py-4">
    <div class="card">
        @foreach($results as $product)
        <h6>{{$product->name}}</h6>

        @endforeach
    </div>
</div>
@endsection