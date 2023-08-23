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
            <h2 class="card-title">Information Table</h2>

          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <table class="table">
              <thead>
                <tr>
                  <th >S.N</th>
                  <th>Company</th>
                  <th>Logo</th>
                  <th >Email</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>Information</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
               
             
                <tr>
                  <td>1.</td>
                  <td>{{$ui->company_name}}</td>
                  <td>{{$ui->logo}}</td>
                  <td>{{$ui->email}}</td>
                  <td>{{$ui->address}}</td>
                  <td>{{$ui->phone}}</td>
                  <td> {{$ui->information}} </td>
                  <td>
                     <div style="display:flex;">
                        <a href="{{route('information.edit',['id'=>$ui->id])}}"><button class="btn btn-warning">Edit</button></a>
                    <a href=" {{route('information.delete',['id'=>$ui->id])}}"><button class="btn  btn-danger"  onclick="return confirm('Are you sure to delete?')" style="margin-left:3px;">Delete</button></a>
                     </div>

                  </td>
                </tr>          
              </tbody>
             
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


