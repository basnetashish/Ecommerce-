@extends('layouts.backend')
@section('content')

<div class="card ">
  <div class="card-header">
    <p class="card-title"><h3><b> Update UI Information Form</b></h3></p>
  
  </div>
    <form role="form" action="{{url('backend/ui/update/'.$ui->id)}}" method="Post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1"> Company Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" name="company_name"  value="{{$ui->company_name}}" placeholder="Enter Company name ">
          @error('company_name')
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
                <input type="email" class="form-control" id="exampleInputPassword1" name="email" value="{{$ui->email}}" placeholder="Enter  Email"> </input>
                @error('email')
                <div class=" text-small text-danger " role="alert" >{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Address</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="address" value="{{$ui->address}}" placeholder="Enter  Address"></input>
                @error('address')
                <div class=" text-small text-danger " role="alert" >{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Phone</label>
                <input type="number" class="form-control" id="exampleInputPassword1" name="number" value="{{$ui->phone}}" placeholder="Enter  phone"> {{old('phone')}} </input>
                @error('number')
                <div class=" text-small text-danger " role="alert" >{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Information</label>
                <textarea type="text" class="form-control" id="exampleInputPassword1" name="information"  placeholder="Enter Information">{{$ui->information}}  </textarea>
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