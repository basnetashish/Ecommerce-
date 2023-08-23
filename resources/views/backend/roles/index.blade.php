@extends('layouts.backend')
@section('content')
 
<div class="row">
    <div class="col-12">
      @include('flash-message')
    <div class="">
        <div class="card ">
          <div class="card-header">
            <h2 class="card-title">Roles List</h2>
            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <div class="input-group-append">
                  <a href="{{route('roles.create')}}"><button type="submit" class="btn btn-info"><i class="fa fa-plus"></i> Add </button></a>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <table class="table">
              <thead>
                <tr>
                  <th>Id </th>
                  <th>Name</th>
                  <th>Guard Name</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($roles as $role)
                <td>{{$role->id}}</td>
               <td>{{$role->name}}</td>
               <td>{{$role->guard_name}}</td>

              
               <td>
                <div class="d-flex ">
                 <a href="{{route('roles.edit',$role->id)}} "> <button type="submit" class="btn btn-warning">Edit</button></a>
                 {{-- <a href="{{route('users.show',$user->id)}}"><button class="btn btn-info">Show</button></a> --}}
                <form action="{{route('roles.destroy',$role->id)}}" method="post" class="ml-2">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" onclick="return confirm('Are you sure to delete user?')">Delete</button>
                
                </form>
                </div>
               </td> 
                     
              </tbody>
              @endforeach 
             
            </table>
          </div>
          <!-- /.card-body -->
        </div>

      </div>
      <!-- /.card -->
    </div>
  </div>
  
  <script>
    setTimeout(function() {
     $('#flashmsg').remove();
    }, 3000); 
</script>
@endsection




