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
                <b><h2>Category Full Details</h2></b>
            </div>
            <div class="col">
                <div class="text-right">
                    <a href="{{route('c_create')}}"><button type="submit" class="btn btn-info">Add Category</button></a>
                    <a href="{{route('c_index')}}"><button type="submit" class="btn btn-primary">Category list</button></a>
                </div>
                
                
            </div>
        </div>
       
   
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
      <table class="table table-striped">
        <tr>
            <th>Category Id</th>
            <td>{{$category->id}}</td>
          </tr>
              
          <tr>
            <th>Category Name</th>
            <td>{{$category->name}}</td>
          </tr>
          <tr>
            <th>Slug </th>
            <td>{{$category->slug}}</td>
          </tr>
          
          <tr>
            <th> Description</th>
            <td>{{$category->description}}</td>
          </tr>
          <tr>
            <th>Status </th>
            <td>{{$category->status}}</td>
          </tr>
          <tr>
            <th>Popular </th>
            <td>{{$category->popular}}</td>
          </tr>
            <th>Image</th>
            <td> 
                <img src="{{asset('/assets/category/'.$category->image)}}" width="50" height="50" alt="image">
            </td>
          </tr>

          <tr>
            <th> Meta Title</th>
            <td>{{$category->meta_title}}</td>
          </tr>
          <tr>
            <th>Meta Description</th>
            <td>{{$category->meta_descrip}}</td>
          </tr>
          <tr>
            <th>Meta keyword</th>
            <td>{{$category->meta_keywords}}</td>
          </tr>
          
      </table>
    </div>
    <!-- /.card-body -->
  </div>
      <!-- /.card -->
    </div>
  </div>

@endsection