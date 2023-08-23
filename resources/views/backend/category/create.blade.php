@extends('layouts.backend')
@section('content')
 
<div class="card ">
    <div class="card-header">
      <h3 class="card-title">Category Form</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" action="{{url('/backend/category/store')}}" method="POST" enctype="multipart/form-data">
        @csrf

      <div class="card-body">
        <div class="custom-control custom-radio">
          <input type="radio"  name="customRadio" id="main" onchange="hideParent()" >
          <label for="customRadio1" >Main Category</label>
        </div>
        <div class="custom-control custom-radio">
          <input  type="radio" id="customRadio1" name="customRadio" onchange="hideParent()">
          <label for="customRadio1" >Sub Category</label>
        </div>

        <div class="form-group" id="parent">
          <label>Parent Id</label>
          <select class="form-control" name="parent">
            <option value="">Select Category</option>
            @foreach($categories as $id => $category)
            
            <option value="{{$id}}" >{{$category}}</option>
            @endforeach
          </select>

      </div>
        <div class="form-group">
          <label for="exampleInputEmail1"> Category Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" name="name"  value="{{old('name')}}" placeholder="Enter category name ">
          @error('name')
            <div class=" text-small text-danger" >{{ $message }}</div>
            @enderror
        </div>
       

        <div class="form-group">
            <label for="exampleInputPassword1">Description</label>
            <input type="text" class="form-control" id="exampleInputPassword1"  value="{{old('description')}}"  name="description" placeholder="Enter description">
            @error('description')
            <div class=" text-small text-danger">{{ $message }}</div>
            @enderror
          </div>
       
            <!-- radio -->
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="status" id="exampleCheck2">
                <label class="form-check-label" for="exampleCheck2"><b>Status</b></label>
                @error('status')
            <div class=" text-small text-danger">{{ $message }}</div>
            @enderror
              </div>

              <div class="form-check">
                <input type="checkbox" class="form-check-input" name="popular"{{old('popular')== '1' ? 'checked': ''}} id="exampleCheck2">
                <label class="form-check-label" for="exampleCheck2"><b>Popular</b></label>
              </div>
        
               <div class="form-group">
                <label for="exampleInputPassword1">Image</label>
                <input type="file" class="form-control" id="exampleInputPassword1" name="image" placeholder="choose image ">
                @error('image')
            <div class=" text-small text-danger">{{ $message }}</div>
            @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Meta Ttile</label>
                <textarea type="text" class="form-control" id="exampleInputPassword1" name="meta_title" placeholder="Enter meta title"> {{old('meta_title')}} </textarea>
                @error('meta_title')
                <div class=" text-small text-danger " role="alert" >{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Meta description</label>
                <textarea type="text" class="form-control" id="exampleInputPassword1" name="meta_descrip" placeholder="Enter meta description">{{old('meta_descrip')}}  </textarea>
                @error('meta_descrip')
                <div class=" text-small text-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Meta Keywords</label>
                <input type="text" class="form-control" id="exampleInputPassword1"value="{{old('meta_keywords')}}" name="meta_keywords" placeholder="Enter meta Keywords">
                @error('meta_keywords')
                <div class=" text-small text-danger">{{ $message }}</div>
                @enderror
              </div>
        
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>



@endsection
<script>
  function hideParent()
  {
    const  maincategory = document.getElementById("main");
    const  parentcategory = document.getElementById("parent");

    if(maincategory.checked)
    {
      parentcategory.style.display ='none';
    }
    else{
      parentcategory.style.display ='block';
    }

  }
</script>