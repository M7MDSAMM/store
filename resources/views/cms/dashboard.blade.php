@extends('cms.layout')


@section('page-large-name','Dashboard')
@section('page-small-name','index')

@section('content')

<section class="content">
    <div class="container-fluid">
      <h5 class="mb-2">Store Info</h5>
      <div class="row">
        <div class="col-md-4 col-sm-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-info"><i class="fas fa-chart-pie"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">All Categories</span>
              <span class="info-box-number">{{ $categories }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-4 col-sm-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-success"><i class="fas fa-chart-pie"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Active Categories</span>
              <span class="info-box-number">{{ $active }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-4 col-sm-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Products</span>
              <span class="info-box-number">{{ $products }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- /.col -->
      </div>
      <!-- /.row -->





    </div>
  </section>
@endsection
