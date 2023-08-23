@extends('layouts.backend')
@section('content')
 
<div class="row">
    <div class="col-12">
      @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block flash-message" id="flashmsg" >
        <button type="button" class="close" data-dismiss="alert">×</button>	
         <strong>{{ $message }}</strong>
       </div>
   @endif
    <div class="">
        <div class="card">
          <div class="card-header">
            <h2 class="card-title">Testimonial Table</h2>

          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <table class="table">
              <thead>
                <tr>
                  <th >S.N</th>
                  <th>Name</th>
                  <th>Prof.</th>
                  <th >Image</th>
                  <th>Message</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
               
             
                <tr>
                    @foreach ($tests as $test)
                    <td>{{$loop->iteration}}</td>
                    <td>{{$test->name}}</td>
                    <td>{{$test->profession}}</td>
                    <td>
                        <img src="{{asset('assets/testimonial/'.$test->image)}}" height="50px" width="50px" alt="image">
                     </td>
                    <td>{{$test->message}}</td>

                    <td>
                       <div style="display:flex;">
                          <a href="{{route('edit.testimonial',['id'=>$test->id])}}"><button class="btn btn-warning">Edit</button></a>
                          <form action="{{route('delete.testimonial',['id'=>$test->id])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn  btn-danger"  onclick="return confirm('Are you sure to delete?')" style="margin-left:3px;">Delete</button>
                          </form>
                      {{-- <a href="{{route('delete.testimonial',['id'=>$test->id])}} "><button class="btn  btn-danger"  onclick="return confirm('Are you sure to delete?')" style="margin-left:3px;">Delete</button></a> --}}
                       </div>
  
                    </td>
                  </tr>          
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


