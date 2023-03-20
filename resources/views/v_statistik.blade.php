@extends('layouts.v_app')
@section('title','Statistik')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                            <h3 class="card-title">Online Store Visitors</h3>
                            <a href="javascript:void(0);">View Report</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex">
                            <p class="d-flex flex-column">
                                <span class="text-bold text-lg">820</span>
                                <span>Visitors Over Time</span>
                            </p>
                            <p class="ml-auto d-flex flex-column text-right">
                                <span class="text-success">
                                <i class="fas fa-arrow-up"></i> 12.5%
                                </span>
                                <span class="text-muted">Since last week</span>
                            </p>
                            </div>
                            <!-- /.d-flex -->

                            <div class="position-relative mb-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                            <canvas id="sales-chart" height="550" width="885" style="display: block; width: 322px; height: 200px;" class="chartjs-render-monitor"></canvas>
                            </div>

                            <div class="d-flex flex-row justify-content-end">
                            <span class="mr-2">
                                <i class="fas fa-square text-primary"></i> This Week
                            </span>

                            <span>
                                <i class="fas fa-square text-gray"></i> Last Week
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                    <div class="card-header border-0">
                        <h3 class="card-title">Products</h3>
                        <div class="card-tools">
                        <a href="#" class="btn btn-tool btn-sm">
                            <i class="fas fa-download"></i>
                        </a>
                        <a href="#" class="btn btn-tool btn-sm">
                            <i class="fas fa-bars"></i>
                        </a>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                        <thead>
                        <tr>
                            <th>Product</th>
                            <th>Rupiah</th>
                            <th>Kredit</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                            <img src="{{asset('template/')}}/dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                            Kredit Barang
                            </td>
                            <td>$13 USD</td>
                            <td>
                            <small class="text-success mr-1">
                                <i class="fas fa-arrow-up"></i>
                                12%
                            </small>
                            12,000 Sold
                            </td>

                        </tr>
                        <tr>
                            <td>
                            <img src="{{asset('template/')}}/dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                            Kredit Kendaraan
                            </td>
                            <td>$29 USD</td>
                            <td>
                            <small class="text-warning mr-1">
                                <i class="fas fa-arrow-down"></i>
                                0.5%
                            </small>
                            123,234 Sold
                            </td>

                        </tr>
                        <tr>
                            <td>
                            <img src="{{asset('template/')}}/dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                            Kredit Tunai
                            </td>
                            <td>$1,230 USD</td>
                            <td>
                            <small class="text-danger mr-1">
                                <i class="fas fa-arrow-down"></i>
                                3%
                            </small>
                            198 Sold
                            </td>
   
                        </tr>
                        <tr>
                            <td>
                            <img src="{{asset('template/')}}/dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                            Total Kredit
                            </td>
                            <td>$199 USD</td>
                            <td>
                            <small class="text-success mr-1">
                                <i class="fas fa-arrow-up"></i>
                                63%
                            </small>
                            87 Sold
                            </td>

                        </tr>
                        </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  @endsection
