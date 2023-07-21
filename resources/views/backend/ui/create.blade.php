@extends('layouts.backend')
@section('content')
 
@include('flash-message')
<div class="card ">
  <div class="card-header">
    <p class="card-title"><h3><b>UI Information Form</b></h3></p>
  
  </div>
    <form role="form" action="{{route('store.Ui.Information')}}" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1"> Company Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" name="name"  value="{{old('name')}}" placeholder="Enter category name ">
          @error('name')
            <div class=" text-small text-danger" >{{ $message }}</div>
            @enderror
        </div>
       

        <div class="form-group">
            <label for="exampleInputPassword1">Logo</label>
            <input type="file" class="form-control" id="exampleInputPassword1" name="logo" placeholder="Choose Logo ">
            @error('logo')
        <div class=" text-small text-danger">{{ $message }}</div>
        @enderror
          </div>
   
              <div class="form-group">
                <label for="exampleInputPassword1">Email</label>
                <input type="email" class="form-control" id="exampleInputPassword1" name="email" placeholder="Enter  Email"> {{old('email')}} </input>
                @error('email')
                <div class=" text-small text-danger " role="alert" >{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Address</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="address" placeholder="Enter  Address"> {{old('address')}} </input>
                @error('address')
                <div class=" text-small text-danger " role="alert" >{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Phone</label>
                <input type="number" class="form-control" id="exampleInputPassword1" name="number" placeholder="Enter  phone"> {{old('phone')}} </input>
                @error('phone')
                <div class=" text-small text-danger " role="alert" >{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Information</label>
                <textarea type="text" class="form-control" id="exampleInputPassword1" name="information" placeholder="Enter Information">{{old('Inforamtion')}}  </textarea>
                @error('information')
                <div class=" text-small text-danger">{{ $message }}</div>
                @enderror
              </div>


        
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>

  

@endsection