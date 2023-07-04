@extends('layouts.backend')
@section('content')
 
<div class="card card-primary">
    <div class="card-header">
      <h2 class="card-title"> Edit Category Form</h2    >
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" action="{{url('/backend/category/update/'.$categories->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1"> Category Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" name="name"  value="{{$categories->name}}" placeholder="Enter category name ">
        </div>
       

        <div class="form-group">
            <label for="exampleInputPassword1">Description</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="description" value="{{$categories->description}}" placeholder="Enter description">
          </div>
       
            <!-- radio -->
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="status" {{$categories->status == '1' ? 'checked': ''}} id="exampleCheck2">
                <label class="form-check-label" for="exampleCheck2"><b>Status</b></label>
              </div>

              <div class="form-check">
                <input type="checkbox" class="form-check-input" name="popular" {{$categories->popular == '1' ? 'checked': ''}} id="exampleCheck2">
                <label class="form-check-label" for="exampleCheck2"><b>Popular</b></label>
              </div>
             @if($categories->image)
                <img src="{{asset('assets/category/'.$categories->image)}}" width="50" height="50"  alt="image">
             @endif
               <div class="form-group">
                <label for="exampleInputPassword1">Image</label>
                <input type="file" class="form-control" id="exampleInputPassword1" name="image"value="{{$categories->image}}" placeholder="choose image ">
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Meta Ttile</label>
                <textarea type="text" class="form-control" id="exampleInputPassword1"  name="meta_title" placeholder="Enter meta title">{{$categories->meta_title}}</textarea>
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Meta description</label>
                <textarea type="text" class="form-control" id="exampleInputPassword1" name="meta_descrip"  placeholder="Enter meta description">{{$categories->meta_descrip}}</textarea>
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Meta Keywords</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="meta_keywords" value="{{$categories->meta_keywords}}" placeholder="Enter meta Keywords">
              </div>
        
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Update Category</button>
      </div>
    </form>
  </div>

@endsection