@extends('admin.includes.main')
@section('title')Admin Dashboard -  {{ config('app.name', 'Laravel') }} @endsection
@section('content')
<div class="content">
  <!-- Start Content-->
  <div class="container-fluid">

      <!-- start page title -->
      <div class="row">
          <div class="col-12">
              <div class="page-title-box">
                  <div class="page-title-right">
                      <ol class="breadcrumb m-0">
                          <li class="breadcrumb-item active">Dashboard</li>
                      </ol>
                  </div>
                  <h4 class="page-title">Dashboard</h4>
              </div>
          </div>
      </div>
      <div class="row">
        <div class="col-xxl-3 col-sm-3">
          <div class="card widget-flat bg-success text-white">
              <div class="card-body">
                  <div class="float-end">
                    <i class="fa-solid fa-message fa-2x"></i>
                  </div>
                  <h5 class="text-uppercase mt-0" title="Customers">Messages</h5>
                  <h3 class="mt-3 mb-3">{{ count(\App\Models\Message::all()) }}</h3>
              </div>
          </div>
        </div>
        <div class="col-xxl-3 col-sm-3">
          <div class="card widget-flat bg-primary text-white">
              <div class="card-body">
                  <div class="float-end">
                    <i class="fa-solid fa-blog fa-2x"></i>
                  </div>
                  <h5 class="text-uppercase mt-0" title="Customers">Blogs</h5>
                  <h3 class="mt-3 mb-3">{{ count(\App\Models\Blog::all()) }}</h3>
              </div>
          </div>
        </div>
      </div>
  </div>
</div>
    <!-- Main content -->
    {{-- <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{count(\App\Models\Blog::all())}}</h3>

                <p>Blogs</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{count(\App\Models\Client::all())}}</h3>

                <p>Clients</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{count(\App\Models\Team::all())}}</h3>

                <p>Teams</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{count(\App\Models\Service::all())}}</h3>

                <p>Services</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section> --}}
    <!-- /.content -->
  </div>
@endsection
    