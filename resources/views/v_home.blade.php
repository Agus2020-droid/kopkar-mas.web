@extends('layouts.v_appStatistik')
@section('title','Home')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h5 class="m-0"> Hi, <b>{{Auth::user()->name}}</b></h5>
          </div><!-- /.col -->
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><a href="/">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Layout</a></li>
              <li class="breadcrumb-item active">Top Navigation</li>
            </ol>
          </div> -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
        <div class="container">
            <div class="row">
                @foreach ($user as $data)
                <div class="col-md-4 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                    <span class="info-box-text">ANGGOTA</span>
                    <span class="info-box-number">{{$data->anggota}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                </div>

                <div class="col-md-4 col-sm-6 col-12">
                    <div class="info-box">
                    <span class="info-box-icon bg-danger"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">PENGURUS</span>
                        <span class="info-box-number">{{$data->pengurus}}</span>
                    </div>
                    <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                @endforeach
                @foreach ($simpanan as $data)

                <div class="col-md-4 col-sm-6 col-12">
                    <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">SIMPANAN ANGGOTA</span>
                        <span class="info-box-number">@currency($data->simpananMasuk - $data->simpananKeluar)</span>
                    </div>
                    <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                @endforeach

                <!-- <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                    <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">KREDIT</span>
                        <span class="info-box-number">93,139</span>
                    </div>
                    </div>
                </div> -->
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between text-center">
                            <h3 class="card-title text-bold text-blue">GRAFIK KREDIT TAHUN </h3>
                            <!-- <a href="javascript:void(0);">View Report</a> -->
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex">
                            <p class="d-flex flex-column">
                                <span class="text-bold text-lg">TAHUN {{date('Y')}}</span>
                                <!-- <span>Tahun Berjalan</span> -->
                            </p>
                            <!-- <p class="ml-auto d-flex flex-column text-right">
                                <span class="text-success">
                                <i class="fas fa-arrow-up"></i> 12.5%
                                </span>
                                <span class="text-muted">Since last week</span>
                            </p> -->
                            </div>
                            <!-- /.d-flex -->

                            <div class="position-relative mb-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                            <canvas id="sales-chart" height="550" width="885" style="display: block; width: 322px; height: 200px;" class="chartjs-render-monitor"></canvas>
                            </div>

                            <div class="d-flex flex-row justify-content-end">
                            <span class="mr-2">
                                <i class="fas fa-square text-primary"></i> K. Barang
                            </span>

                            <span class="mr-2">
                                <i class="fas fa-square" style="color: #ced4da"></i> K. Motor
                            </span>

                            <span>
                                <i class="fas fa-square " style="color: #d8b42b91"></i> K. Tunai
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card">
                    <div class="card-header border-0">
                        <h3 class="card-title text-center">Kredit <b>{{Carbon\Carbon::parse(now())->isoFormat("MMMM")}}</b> Vs <b>{{Carbon\Carbon::parse(now())->submonth(1)->isoFormat("MMMM")}}</b></h3>
                        <div class="card-tools">
                        <!-- <a href="#" class="btn btn-tool btn-sm">
                            <i class="fas fa-download"></i>
                        </a> -->
                        <!-- <a href="#" class="btn btn-tool btn-sm">
                            <i class="fas fa-bars"></i>
                        </a> -->
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                        <thead>
                        <tr>
                            <th>Product</th>
                            <th>Kredit <small>Bulan Ini</small></th>
                            <th>Index</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                            <!-- <img src="{{asset('template/')}}/dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2"> -->
                            Kredit Barang
                            </td>
                            <td>@currency($brg0)</td>
                            <td>
                                @php
                                $ab = $brg0;
                                $bb = $brg1;
                                $cb = $ab - $bb;
                                if($bb != 0 && $ab != 0 ){
                                    $db = round($cb/$bb*100,2);
                                }else{
                                    $db = 0;
                                }
                                @endphp
                                @if($db > 0.00)
                                <small class="text-success mr-1">
                                <i class="fas fa-arrow-up"></i>
                                Naik
                                @elseif($db < 0.00)
                                <small class="text-danger mr-1">
                                <i class="fas fa-arrow-down"></i>
                                Turun
                                @else
                                @endif
                                {{$db}}%
                            </small>
                           
                            </td>

                        </tr>
                        <tr>
                            <td>
                            <!-- <img src="{{asset('template/')}}/dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2"> -->
                            Kredit Kendaraan
                            </td>
                            <td>@currency($mtr0)</td>
                            <td>
                                @php
                                $am = $mtr0;
                                $bm = $mtr1;
                                $cm = $am - $bm;
                                if($bm != 0 && $am != 0 ){
                                    $dm = round($cm/$bm*100,2);
                                }else{
                                    $dm = 0;
                                }
                                @endphp
                                @if($dm > 0.00)
                                <small class="text-success mr-1">
                                <i class="fas fa-arrow-up"></i>
                                Naik
                                @elseif($dm < 0.00)
                                <small class="text-danger mr-1">
                                <i class="fas fa-arrow-down"></i>
                                Turun
                                @else
                                @endif
                                {{$dm}}%
                            </small>
                           
                            </td>

                        </tr>
                        <tr>
                            <td>
                            <!-- <img src="{{asset('template/')}}/dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2"> -->
                            Kredit Tunai
                            </td>
                            <td>@currency($tn0)</td>
                            <td>
                                @php
                                $at = $tn0;
                                $bt = $tn1;
                                $ct = $at - $bt;
                                if($bt != 0 && $at != 0 ){
                                    $dt = round($ct/$bt*100,2);
                                }else{
                                    $dt = 0;
                                }
                                @endphp
                                @if($dt > 0.00)
                                <small class="text-success mr-1">
                                <i class="fas fa-arrow-up"></i>
                                Naik
                                @elseif($dt < 0.00)
                                <small class="text-danger mr-1">
                                <i class="fas fa-arrow-down"></i>
                                Turun
                                @else
                                @endif
                                {{$dt}}%
                            </small>
                            </td>
   
                        </tr>
                        <tr>
                            <td>
                            <!-- <img src="{{asset('template/')}}/dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2"> -->
                            Total Kredit
                            </td>
                            <td>@currency($krdt0)</td>
                            <td>
                                @php
                                $ak = $krdt0;
                                $bk = $krdt1;
                                $ck = $ak - $bk;
                                if($bk != 0 && $ak != 0 ){
                                    $dk = round($ck/$bk*100,2);
                                }else{
                                    $dk = 0;
                                }
                                @endphp
                                @if($dk > 0.00)
                                <small class="text-success mr-1">
                                <i class="fas fa-arrow-up"></i>
                                Naik
                                @elseif($dk < 0.00)
                                <small class="text-danger mr-1">
                                <i class="fas fa-arrow-down"></i>
                                Turun
                                @else
                                @endif
                                {{$dk}}%
                            </small>
                            </td>

                        </tr>
                        </tbody>
                        </table>
                    </div>
                    </div>
                </div>
                <!-- <div class="col-lg-12">
                    <div class="embed-responsive embed-responsive-16by9">
                      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/BE30vYmXkf8" allowfullscreen></iframe>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
@endsection