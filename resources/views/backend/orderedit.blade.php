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
            <div class="form-check">
                <input type="checkbox" class="form-check-input"  name="status"   {{$orders->status == 1 ? 'checked':''}} id="exampleCheck2">
                <label class="form-check-label" for="exampleCheck2"><b>Status</b></label>
              </div>
                <br>
              
                <br>
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