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
          <p class="card-title"><b><h4>Cart Table</p></b></h4>

        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 300px;">
          <table class="table table-head-fixed text-nowrap">
            <thead>
              <tr>
                <th>User Id</th>
                <th>User Name </th>
                <th>Product Name</th>
                <th>Product Quantity</th>
                {{-- <th>Action</th> --}}
              </tr>
            </thead>
            <tbody>
              @foreach($carts as $cart)
                <td>{{$cart->user_id}}</td>
                
                <td>{{ $cart->Users ? $cart->Users->name : 'User Not Found' }}</td>
              <td>{{$cart->Products->name}}</td>
               <td>{{$cart->prod_qty}}</td>
              
              {{-- <td>
                <a href="#"> <button type="submit" class="btn btn-info">show</button></a>
                <a href="#"> <button type="submit" class="btn btn-warning">Edit</button></a>
              <a href="#"> <button type="submit" class="btn btn-danger">Delete</button></a>
             
              </td> --}}

             

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