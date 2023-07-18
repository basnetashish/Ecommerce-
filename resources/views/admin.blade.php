@extends('layouts.backend')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Dashboard </h1>
      </div><!-- /.col -->

    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
          <section class="content">
            <div class="container-fluid">
              <!-- Small boxes (Stat box) -->
              <div class="row">
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-info">
                    <div class="inner">
                     
                      <h3>{{$order->count()}}</h3>
                       
                      <p>New Orders</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-bag"></i>
                    </div>
                
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-success">
                    <div class="inner">
                      <h3>{{$products->count()}}</h3>
      
                      <p>Products</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                    </div>

                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-warning">
                    <div class="inner">
                 
                      <h3>{{$users->count()}}</h3>
                 
                      <p>User Registrations</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-person-add"></i>
                    </div>
                
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-danger">
                    <div class="inner">
                      <h3>{{$user->count()}}</h3>
      
                      <p>Admins</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-pie-graph"></i>
                    </div>
                
                  </div>
                </div>
                <!-- ./col -->
              </div>
              <!-- /.row -->
              <!-- Main row -->
              {{-- <div class="row">
                <!-- Left col -->
                <section class="col-lg-7 connectedSortable">
                  <!-- Custom tabs (Charts with tabs)-->
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">
                        <i class="fas fa-chart-pie mr-1"></i>
                        Sales
                      </h3>
                     
                    </div><!-- /.card-header -->
                    <div class="card-body">
                      <div class="tab-content p-0">
                        <!-- Morris chart - Sales -->
                        <div class="chart tab-pane active" id="revenue-chart"
                             style="position: relative; height: 300px;">
                            <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>                         
                         </div>
                        <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                          <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>                         
                        </div>  
                      </div>
                    </div><!-- /.card-body -->
                  </div>
                  <!-- /.card -->
      
                  <!-- DIRECT CHAT -->
               
                  <!--/.direct-chat -->
      
                  <!-- TO DO List -->
                  
                  <!-- /.card -->
                </section>
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
               
                <!-- right col -->
              </div> --}}
              <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
          </section>
@endsection