@extends('layouts.backend')
@section('content')
 
<div class="row">
    <div class="col-12">
      @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
<div class="card">
    <div class="card-header">
       
        <div class="row">
            <div class="col-xs-12">
                <b><h2>Product Full Details</h2></b>
            </div>
            <div class="col">
                <div class="text-right">
                    <a href="{{route('p_create')}}"><button type="submit" class="btn btn-info">Add Products</button></a>
                    <a href="{{route('p_index')}}"><button type="submit" class="btn btn-primary">Products list</button></a>
                </div>
                
                
            </div>
        </div>
       
   
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
      <table class="table table-striped">
        <tr>
            <th>Product Id</th>
            <td>{{$products->id}}</td>
          </tr>
              
        <tr>
            <th>Category</th>
            <td>{{$products->category->name}}</td>
          </tr>

          <tr>
            <th>Product Name</th>
            <td>{{$products->name}}</td>
          </tr>
          <tr>
            <th>Slug </th>
            <td>{{$products->slug}}</td>
          </tr>
          <tr>
            <th> Small Description</th>
            <td>{{$products->small_description}}</td>
          </tr>
          <tr>
            <th> Description</th>
            <td>{{$products->description}}</td>
          </tr>
          <tr>
            <th>Orginal Price </th>
            <td>{{$products->orginal_price}}</td>
          </tr>
          <tr>
            <th>Selling Price</th>
            <td>{{$products->selling_price}}</td>
          </tr>
          <tr>
            <th>Image</th>
            <td> 
                <img src="{{asset('/assets/backend/product/'.$products->image)}}" width="50" height="50" alt="image">
            </td>
          </tr>
          <tr>
            <th>Quality </th>
            <td>{{$products->qty}}</td>
          </tr>
          <tr>
            <th> Tax</th>
            <td>{{$products->tax}}</td>
          </tr>
          <tr>
            <th>Status </th>
            <td>{{$products->status}}</td>
          </tr>
          <tr>
            <th>Trending</th>
            <td>{{$products->trending}}</td>
          </tr>
          <tr>
            <th> Meta Title</th>
            <td>{{$products->meta_title}}</td>
          </tr>
          <tr>
            <th>Meta Description</th>
            <td>{{$products->meta_descrip}}</td>
          </tr>
          <tr>
            <th>Meta keyword</th>
            <td>{{$products->meta_keywords}}</td>
          </tr>
          
      </table>
    </div>
    <!-- /.card-body -->
  </div>
      <!-- /.card -->
    </div>
  </div>

@endsection