@extends('layouts.backend')
@section('content')
 
<div class="row">
    <div class="col-12">
     @include('flash-message')
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><b><h2>Category Table</h2></b></h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              

              <div class="input-group-append">
                <a href="{{route('c_create')}}"><button type="submit" class="btn btn-info">Add Category</button></a>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 300px;">
          <table class="table table-head-fixed text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Description</th>
                <th>Status</th>
                <th>Popular</th>
                <th>Image</th>
                <th>Meta Title</th>
                <th>Meta Description</th>
                <th>Meta Keywords</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($categories as $cat)
               <td>{{$cat->id}}</td>
              <td>{{$cat->name}}</td>
              <td>{{$cat->slug}}</td>
              <td>{{$cat->description}}</td>
              <td>{{$cat->status}}</td>
              <td>{{$cat->popular}}</td>
              <td>
                <img src="{{asset('/assets/category/'.$cat->image)}}" width="50" height="50" alt="image">
            
            </td>
              <td>{{$cat->meta_title}}</td>
              <td>{{$cat->meta_descrip}}</td>
              <td>{{$cat->meta_keywords}}</td>
              <td>
              <a href="{{url('backend/category/delete/'.$cat->id)}}"> <button type="submit" class="btn btn-danger">Delete</button></a>
              <a href="{{url('backend/category/edit/'.$cat->id)}}"> <button type="submit" class="btn btn-warning">Edit</button></a>
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
  
@endsection
@section('scripts')
<script type="text/javascript"> 
  $(function(){
setTimeout(function(){
    $("#flashmsg").hide();
    }, 2000);
  });
</script>
@endsection