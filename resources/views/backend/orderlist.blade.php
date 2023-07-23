@extends('layouts.backend')
@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Order list</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
      <table class="table table-sm">
        <thead>
          <tr>
            <th>User Id</th>
            <th>Name</th>
            <th>Email</th>        
            <th>Status</th>
            <th>Tracking No</th>
         
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
         @foreach($orders as $order)
         <tr>
            <td>{{$order->user_id}}</td>
            <td>{{$order->name}}</td>
            <td>{{$order->email}}</td>
           
            <td>{{$order->status}}</td>
            <td>{{$order->tracking_no}}</td>
            @foreach($order->orderItems as $item)
           
            @endforeach
            <td>
                <a href="{{ route('order_edit', $order->id) }}"><button type="submit" class="btn btn-info">Edit</button></a>
                <a href="{{url('order-details/'.$order->id)}}"><button type="submit" class="btn btn-primary">Detail</button></a>
              
            </td>
         </tr>
        </tbody>
        @endforeach
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection