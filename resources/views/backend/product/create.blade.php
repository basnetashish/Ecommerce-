@extends('layouts.backend')
@section('content')
 
<div class="card ">
    <div class="card-header">
      <p class="card-title"><h3><b>Products Form</b></h3></p>
      <a href="{{route('p_index')}}"><button type="submit" class="btn btn-info"> Products list</button></a>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" action="{{url('/backend/product/store')}}" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
         <!-- select -->
         <div class="form-group">
            <label>Category</label>
            <select class="form-control" name="cate_id" id="category">
            <option value="">Select the  Category</option>
              @foreach($products as $id => $product)
              <option value="{{$id}}" >{{$product}}</option>
              @endforeach
            </select>
        </div>
        <div class="form-group" >
          <label>Sub Category</label>
          <select class="form-control" name="parent" id="subcategory">
            <option value="">Select Sub Category</option>
            @foreach($categories as $id => $category)
            <option value="{{$id}}" >{{$category}}</option>
            @endforeach
          </select>

      </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Products Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" name="name"  value="{{old('name')}}" placeholder="Enter products name ">
          @error('name')
          <div class=" text-small text-danger" >{{ $message }}</div>
          @enderror
        </div>
 
        <div class="form-group">
          <label for="exampleInputPassword1">Small Description</label>
          <input type="text" class="form-control" id="exampleInputPassword1" name="small_descripiton" value="{{old('small_descripiton')}}" placeholder="Enter small description">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Description</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="description" value="{{old('description')}}" placeholder="Enter description">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Original Price</label>
            <input type="number" class="form-control" id="exampleInputPassword1" name="original_price" value="{{old('original_price')}}" placeholder="Enter Original Price">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Selling Price</label>
            <input type="number" class="form-control" id="exampleInputPassword1" name="selling_price" value="{{old('selling_price')}}" placeholder="Enter selling price">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Image</label>
            <input type="file" class="form-control" id="exampleInputPassword1" name="image"  placeholder="choose image ">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Quantity </label>
            <input type="number" class="form-control" id="exampleInputPassword1" name="qty" value="{{old('qty')}}" placeholder="Enter  Quantity">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Tax </label>
            <input type="number" class="form-control" id="exampleInputPassword1" name="tax" value="{{old('tax')}}" placeholder="Enter  Tax">
          </div>
         
       
            <!-- radio -->
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="status" {{old('status')== '1' ? 'checked': ''}} id="exampleCheck2">
                <label class="form-check-label" for="exampleCheck2"><b>Status</b></label>
              </div>
                <br>
              <div class="form-check">
                <input type="checkbox" class="form-check-input" name="trending" {{old('trending')== '1' ? 'checked': ''}} id="exampleCheck2">
                <label class="form-check-label" for="exampleCheck2"><b>Trending</b></label>
              </div>
                <br>
              <div class="form-group">
                <label for="exampleInputPassword1">Meta Title</label>
                <textarea type="text" class="form-control" id="exampleInputPassword1" name="meta_title" placeholder="Enter meta title">{{old('meta_title')}}</textarea>
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Meta description</label>
                <textarea type="text" class="form-control" id="exampleInputPassword1" name="meta_descrip" placeholder="Enter meta description">{{old('meta_descrip')}}</textarea>
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Meta Keywords</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="meta_keywords" value="{{old('meta_keywords')}}" placeholder="Enter meta Keywords">
              </div>
        
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>

@endsection
@section('scripts')
<script>
  $(document).ready(function() {
    console.log("Document ready!");
    $('#category').on('change', function() {
        console.log("Category change !"); 
          var selectCategory = $(this).val();
          $.ajaxSetup({
             headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
          });
  
          $.ajax({
              type: "GET",
              url: "{{ route('backend.subcategory') }}", 
              data: {
                  'cate_id': selectCategory,
              },
              dataType: "json",
              success: function(response) {
                  var subCategorySelect = $("#subcategory");
                  subCategorySelect.empty();
                  subCategorySelect.append('<option value="">Select Sub Category</option>');
                  $.each(response, function(key, value) {
                      subCategorySelect.append('<option value="' + key + '">' + value + '</option>');
                  });
              },
              error: function(xhr, status, error) {
                  console.log(error);
              }
          });
      });
  });
  </script>

@endsection