@extends('layouts.backend')
@section('content')
 
<div class="card card-primary">
    <div class="card-header">
      <p class="card-title"><h3><b> Updated Products Form</b></h3></p>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" action="{{url('backend/product/update/'.$products->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
      <div class="card-body">
         <!-- select -->
         <div class="form-group">
            <label>Category</label>
            <select class="form-control"  name="category_id">
              <option  value="{{$products->cate_id}}" >{{$products->category->name}}</option>
            </select>

        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Products Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" name="name"  value="{{$products->name}}" placeholder="Enter products name ">
        </div>
        
            <div class="form-group">
              <label for="exampleInputEmail1">Products Slug</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="slug"  value="{{$products->slug}}" placeholder="Enter products slug ">
            </div>
    
        <div class="form-group">
          <label for="exampleInputPassword1">Small Description</label>
          <input type="text" class="form-control" id="exampleInputPassword1" value="{{$products->small_description}}" name="small_descripiton" placeholder="Enter small description">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Description</label>
            <input type="text" class="form-control" id="exampleInputPassword1" value="{{$products->description}}" name="description" placeholder="Enter description">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Original Price</label>
            <input type="number" class="form-control" id="exampleInputPassword1" value="{{$products->orginal_price}}" name="original_price" placeholder="Enter Original Price">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Selling Price</label>
            <input type="number" class="form-control" id="exampleInputPassword1" value="{{$products->selling_price}}" name="selling_price" placeholder="Enter selling price">
          </div>

          @if($products->image)
          <img src="{{asset('assets/backend/product/'.$products->image)}}" width="100" height="100"  alt="image">
       @endif 
          <div class="form-group">
            <label for="exampleInputPassword1">Image</label>
            <input type="file" class="form-control" id="exampleInputPassword1" value="{{$products->image}}" name="image" placeholder="choose image ">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Quantity </label>
            <input type="number" class="form-control" id="exampleInputPassword1" value="{{$products->qty}}" name="qty" placeholder="Enter  Quantity">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Tax </label>
            <input type="number" class="form-control" id="exampleInputPassword1" value="{{$products->tax}}" name="tax" placeholder="Enter  Tax">
          </div>
         
       
            <!-- radio -->
            <div class="form-check">
                <input type="checkbox" class="form-check-input"  name="status" {{$products->status == 1 ? 'checked':''}} id="exampleCheck2">
                <label class="form-check-label" for="exampleCheck2"><b>Status</b></label>
              </div>
                <br>
              <div class="form-check">
                <input type="checkbox" class="form-check-input" name="trending" {{$products->trending == 1 ? 'checked' : ''}} id="exampleCheck2">
                <label class="form-check-label" for="exampleCheck2"><b>Trending</b></label>
              </div>
                <br>
              <div class="form-group">
                <label for="exampleInputPassword1">Meta Title</label>
                <textarea type="text" class="form-control" id="exampleInputPassword1" name="meta_title" placeholder="Enter meta title">{{$products->meta_title}}</textarea>
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Meta description</label>
                <textarea type="text" class="form-control" id="exampleInputPassword1" name="meta_descrip" placeholder="Enter meta description">{{$products->meta_descrip}}</textarea>
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Meta Keywords</label>
                <input type="text" class="form-control" id="exampleInputPassword1" value="{{$products->meta_keywords}}" name="meta_keywords" placeholder="Enter meta Keywords">
              </div>
        
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Update Products</button>
      </div>
    </form>
  </div>

@endsection