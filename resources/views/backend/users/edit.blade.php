@extends('layouts.backend')
@section('content')
 
<div class="card  col-md-6">
    <div class="card-header">
      <p class="card-title"><h3><b>User Edit Form</b></h3></p>
    
    </div>
    <!-- /.card-header -->
    <!-- form start -->
  
    <form action="{{route('users.update',$admins->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="input-group mb-3">
          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Full Name" name="name" value="{{ $admins->name }}" required autocomplete="name" autofocus>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-user"></span>
          </div>
        </div>
        @error('name')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
           </span>
       @enderror
      </div>
      <div class="input-group mb-3">
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ $admins->email }}" required autocomplete="email">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-envelope"></span>
          </div>
        </div>
        @error('email')
           <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
           </span>
       @enderror
      </div>
      <div class="input-group mb-3">
          <input id="password" type="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-lock"></span>
          </div>
        </div>
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
      </div>
      <div class="input-group mb-3">
        <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-lock"></span>
          </div>
        </div>
      </div>

      <div class="input-group mb-3 ">
        <select class="form-control" name="permission[]"  >
         <option value="">Choose Permission</option>
          @foreach($permissions as $permission)
           <option value="{{$permission->id}}">{{$permission->name}}</option>
          @endforeach
          
        </select>
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-user"></span>
        </div>
      </div>
      @error('permission')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
         </span>
     @enderror
    </div>
     
        <!-- /.col -->
        
        <!-- /.col -->
      </div>
      <div class="col-md-6">
        <button type="submit" class="btn btn-primary btn-block">Update</button>
        </div>
    </form>
  </div>

@endsection