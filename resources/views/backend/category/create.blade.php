@extends('layouts.backend')
@section('content')
 
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Category Form</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" action="{{url('/backend/category/store')}}" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1"> Category Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" name="name"  value="{{old('name')}}" placeholder="Enter category name ">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Slug</label>
          <input type="text" class="form-control" id="exampleInputPassword1" name="slug" placeholder="Enter slug">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Description</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="description" placeholder="Enter description">
          </div>
       
            <!-- radio -->
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="status" id="exampleCheck2">
                <label class="form-check-label" for="exampleCheck2"><b>Status</b></label>
              </div>

              <div class="form-check">
                <input type="checkbox" class="form-check-input" name="popular" id="exampleCheck2">
                <label class="form-check-label" for="exampleCheck2"><b>Popular</b></label>
              </div>
        
               <div class="form-group">
                <label for="exampleInputPassword1">Image</label>
                <input type="file" class="form-control" id="exampleInputPassword1" name="image" placeholder="choose image ">
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Meta Ttile</label>
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