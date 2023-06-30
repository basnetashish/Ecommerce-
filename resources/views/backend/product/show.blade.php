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
        <div class="card-body table-responsive p-0" style="height: 300px;">
          <table class="table table-head-fixed text-nowrap">
          @foreach($products as $product) 
          <tr>
            <th>Category</th>
            <td>{{$product->category->name}}</td>
          </tr>


          @endforeach
          

          </table>
          
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>

@endsection