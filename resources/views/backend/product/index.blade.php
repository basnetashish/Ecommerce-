@extends('layouts.backend')
@section('content')
 
<div class="row">
    <div class="col-12">

    @include('flash-message')

      <div class="card">
        <div class="card-header">
          <p class="card-title"><b><h2>Products Table</p></b></h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <div class="input-group-append">
                <a href="{{route('p_create')}}"><button type="submit" class="btn btn-info">Add Products</button></a>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" >
          <table class="table table-head-fixed text-nowrap">
            <thead>
              <tr>
                <th>Category </th>
                <th>Product Name</th>

                <th>Slug</th>
                {{-- <th>Small Description</th>
                <th>Description</th> --}}
                {{-- <th>Orginal Price</th> --}}
                <th>Selling Price</th>
                <th>Image</th>
                <th>Quantity</th>
                {{-- <th>Tax</th> --}}
                {{-- <th>Status</th> --}}
                {{-- <th>Trending</th> --}}
                {{-- <th>Meta Title</th>
                <th>Meta Description</th>
                <th>Meta Keywords</th> --}}
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($Products as $product)
               <td>{{$product->category->name}}</td>
              <td>{{$product->name}}</td>
        
               <td>{{$product->slug}}</td>
              {{-- <td>{{$product->small_description}}</td> --}}
              {{-- <td>{{$product->description}}</td>  --}}
              {{-- <td>{{$product->orginal_price}}</td> --}}
              <td>{{$product->selling_price}}</td>
              <td>
                <img src="{{asset('/assets/backend/product/'.$product->image)}}" width="50" height="50" alt="image">
            
            </td>
              <td>{{$product->qty}}</td>
              {{-- <td>{{$product->tax}}</td> --}}
              {{-- <td>{{$product->status}}</td> --}}
              {{-- <td>{{$product->trending}}</td> --}}
              {{-- <td>{{$product->meta_title}}</td>
              <td>{{$product->meta_descrip}}</td>
              <td>{{$product->meta_keywords}}</td> --}}
              <td>
                <a href="{{url('backend/product/show/'.$product->id)}}"> <button type="submit" class="btn btn-info">show</button></a>
                <a href="{{url('backend/product/edit/'.$product->id)}}"> <button type="submit" class="btn btn-warning">Edit</button></a>
              <a href="{{url('backend/product/delete/'.$product->id)}}"> <button type="submit" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger">Delete</button></a>
             
              </td>

             

            </tbody>
            @endforeach
          </table>
          
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
  <script>
    setTimeout(function() {
     $('#flashmsg').remove();
    }, 2000); 
</script>
@endsection