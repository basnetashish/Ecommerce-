@extends('layouts.backend')
@section('content')
 
<div class="card card-primary">
    <div class="card-header">
      <p class="card-title"><h3><b>Products Form</b></h3></p>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" action="{{url('/backend/product/store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        
      <div class="card-body">
         <!-- select -->
         <div class="form-group">
            <label>Category</label>
        
            
            <select class="form-control" name="cate_id">
              @foreach($products as $id => $product)
              <option value="{{$id}}" >{{$product}}</option>
              @endforeach
            </select>

        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Products Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" name="name"  value="{{old('name')}}" placeholder="Enter products name ">
        </div>
        
            <div class="form-group">
              <label for="exampleInputEmail1">Products Slug</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="slug"  value="{{old('slug')}}" placeholder="Enter products slug ">
            </div>
       
        
        <div class="form-group">
          <label for="exampleInputPassword1">Small Description</label>
          <input type="text" class="form-control" id="exampleInputPassword1" name="small_descripiton" placeholder="Enter small description">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Description</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="description" placeholder="Enter description">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Original Price</label>
            <input type="number" class="form-control" id="exampleInputPassword1" name="original_price" placeholder="Enter Original Price">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Selling Price</label>
            <input type="number" class="form-control" id="exampleInputPassword1" name="selling_price" placeholder="Enter selling price">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Image</label>
            <input type="file" class="form-control" id="exampleInputPassword1" name="image" placeholder="choose image ">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Quantity </label>
            <input type="number" class="form-control" id="exampleInputPassword1" name="qty" placeholder="Enter  Quantity">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Tax </label>
            <input type="number" class="form-control" id="exampleInputPassword1" name="tax" placeholder="Enter  Tax">
          </div>
         
       
            <!-- radio -->
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="status" id="exampleCheck2">
                <label class="form-check-label" for="exampleCheck2"><b>Status</b></label>
              </div>
                <br>
              <div class="form-check">
                <input type="checkbox" class="form-check-input" name="trending" id="exampleCheck2">
                <label class="form-check-label" for="exampleCheck2"><b>Trending</b></label>
              </div>
                <br>
              <div class="form-group">
                <label for="exampleInputPassword1">Meta Title</label>
                <textarea type="text" class="form-control" id="exampleInputPassword1" name="meta_title" placeholder="Enter meta title"></textarea>
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Meta description</label>
                <textarea type="text" class="form-control" id="exampleInputPassword1" name="meta_descrip" placeholder="Enter meta description"></textarea>
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Meta Keywords</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="meta_keywords" placeholder="Enter meta Keywords">
              </div>
        
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>

@endsection