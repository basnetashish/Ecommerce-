@extends('layouts.backend')
@section('content')
 
@include('flash-message')
<div class="card ">
  <div class="card-header">
    <p class="card-title"><h3><b> Update Testimonial Form</b></h3></p>
  
  </div>
    <form role="form" action="{{route('update.testimonial',$test->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1"> Customer Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" name="name"  value="{{$test->name}}" placeholder="Enter Customer Name ">
          @error('name')
            <div class=" text-small text-danger" >{{ $message }}</div>
            @enderror
        </div>
       

        <div class="form-group">
            <label for="exampleInputPassword1">Profession</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="profession" value="{{$test->profession}}" placeholder="Choose Profession ">
            @error('profession')
        <div class=" text-small text-danger">{{ $message }}</div>
        @enderror
          </div>
   

              <div class="form-group">
                <label for="exampleInputPassword1">Image</label>
                <input type="file" class="form-control" id="exampleInputPassword1" name="image" placeholder="Enter  Image"> {{old('phone')}} </input>
                @error('image')
                <div class=" text-small text-danger " role="alert" >{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Message</label>
                <textarea type="text" class="form-control" id="exampleInputPassword1" name="message" placeholder="Enter Message">{{$test->message}}  </textarea>
                @error('message')
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