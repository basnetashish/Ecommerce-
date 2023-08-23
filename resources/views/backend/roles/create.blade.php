@extends('layouts.backend')
@section('content')
 
<div class="card  col-md-6">
    <div class="card-header">
      <p class="card-title"><h3><b>Role Form</b></h3></p>
    
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('roles.store') }}" method="post">
      @csrf
      <div class="input-group mb-3">

       <input id="name" type="text" class="form-control" placeholder="Roles" name="role" value="{{ old('role') }}" required autocomplete="roles" autofocus>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-users"></span>
          </div>
        </div>
        @error('role')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
           </span>
       @enderror
      </div>
      <div class="input-group mb-3">

        <input id="name" type="text" class="form-control" placeholder="Guard Name" name="guard_name" value="{{ old('role') }}" required autocomplete="roles" autofocus>
         <div class="input-group-append">
           <div class="input-group-text">
             <span class="fas fa-users"></span>
           </div>
         </div>
         @error('guard_name')
           <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
            </span>
        @enderror
       </div>
       
        <!-- /.col -->
        
        <!-- /.col -->
      </div>
      <div class="col-md-6">
        <button type="submit" class="btn btn-primary btn-block">Register</button>
        </div>
    </form>
  </div>

@endsection