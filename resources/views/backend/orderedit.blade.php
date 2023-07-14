@extends('layouts.backend')
@section('content')
 
<div class="card card-primary">
    <div class="card-header">
      <p class="card-title"><h3><b> Updated Order Form</b></h3></p>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" action="{{url('/order-update/'.$orders->id)}}" method="POST" >
        @csrf
        @method('PUT')
      <div class="card-body">
         
        <div class="form-group">
          <label for="exampleInputEmail1">Customer Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" name="name"  value="{{$orders->name}}" placeholder="Enter products name ">
        </div>
        
            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" class="form-control" id="exampleInputEmail1" name="email"  value="{{$orders->email}}" placeholder="Enter products slug ">
            </div>
    
        <div class="form-group">
          <label for="exampleInputPassword1">Address</label>
          <input type="text" class="form-control" id="exampleInputPassword1" value="{{$orders->address}}" name="address" placeholder="Enter small description">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Phone</label>
            <input type="text" class="form-control" id="exampleInputPassword1" value="{{$orders->phone}}" name="phone" placeholder="Enter description">
          </div>

          
         
       
            <!-- radio -->
            <div class="form-group">
              <label>Status</label>
              <select class="form-control" name="status">
                <option value="pending" {{ $orders->status === 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="accepted" {{ $orders->status === 'accepted' ? 'selected' : '' }}>Accepted</option>
                <option value="shipped" {{ $orders->status === 'shipped' ? 'selected' : '' }}>Shipped</option>
                <option value="completed" {{ $orders->status === 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="cancelled" {{ $orders->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                <option value="returned" {{ $orders->status === 'returned' ? 'selected' : '' }}>Returned</option>

                
              </select>
            </div>
               
              <div class="form-group">
                <label for="exampleInputPassword1">Tracking No</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="tracking_no" value={{$orders->tracking_no}} placeholder="Enter tracking number"></input>
              </div>

              
        
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Update Orders</button>
      </div>
    </form>
  </div>

@endsection