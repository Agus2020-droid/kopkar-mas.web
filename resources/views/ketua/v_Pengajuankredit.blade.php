@extends('layouts.v_app')
@section('title','Pengajuan Kredit')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-0">
          <div class="col-sm-6">
            <!-- <h4> PENGAJUAN KREDIT</h4> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Kredit Pinjaman</li>
            </ol> -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          @if (session('sukses'))
            <div class="alert alert-success" role="alert">
            {{session('sukses')}}
            </div>
            @endif
            @if (session('gagal'))
            <div class="alert alert-danger" role="alert">
            {{session('gagal')}}
            </div>
            @endif
            @if (count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="card">
                <div class="card-header bg-navy" >
                    <h3 class="card-title"><b style="font-size: 30px" class="mr-0">P</b>ENGAJUAN KREDIT </h3><br>
                    <hr class="mt-3 mb-0"style="border: 1px solid #fff">
                </div>
              <!-- /.card-header -->
                <div class="card-body">
                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <table id="example1" class="table table-bordered table-hover dataTable dtr-inline collapsed" aria-describedby="example2_info">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Tgl</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Plafon</th>
                                <th>Petugas</th>
                                <th>Bendahara</th>
                                <th>Ketua</th>
                                <th>Progress</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php 
                            $no=1;
                            @endphp
                            @foreach ($kredit as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$data->kd_kredit}}</td>
                                <td>{{Carbon\Carbon::parse($data->tgl_kredit)->isoFormat("D-MM-YY")}}</td>
                                <td>{{$data->nama}},<br><a href="">{{$data->telp}}</a></td>
                                <td>{{$data->jns_krdt}}</td>
                                <td>@currency($data->nominal)</td>
                                <td>
                                    @if($data->app_ptgs == null)
                                    <i class="fas fa-exclamation-circle text-warning mr-1"></i> Proses
                                    @elseif($data->app_ptgs == 1)
                                    <i class="fas fa-check-circle text-success mr-1"></i> OK
                                    @elseif($data->app_ptgs == 0)
                                    <i class="fas fa-times-circle text-danger mr-1"></i> NO
                                    @else
                                    @endif
                                </td>
                                <td>
                                     @if($data->app_bnd == null)
                                    <i class="fas fa-exclamation-circle text-warning mr-1"></i> Proses
                                    @elseif($data->app_bnd == 1)
                                    <i class="fas fa-check-circle text-success mr-1"></i> OK
                                    @elseif($data->app_bnd == 0)
                                    <i class="fas fa-times-circle text-danger mr-1"></i> NO
                                    @else
                                    @endif
                                </td>
                                <td>
                                    @if($data->app_ket == null)
                                    <i class="fas fa-exclamation-circle text-warning mr-1"></i> Proses
                                    @elseif($data->app_ket == 1)
                                    <i class="fas fa-check-circle text-success mr-1"></i> OK
                                    @elseif($data->app_ket == 0)
                                    <i class="fas fa-times-circle text-danger mr-1"></i> NO
                                    @else
                                    @endif
                                </td>
                                <td>
                                  @php
                                  $sts = round($data->status/4*100,2);
                                  @endphp
                                <div class="progress progress-md active">
                                  <div class="progress-bar bg-aqua progress-bar-striped" role="progressbar"
                                      aria-valuemin="0" aria-valuemax="100" style="width: {{$sts}}%">
                                      <span>{{$sts}}%</span>
                                  </div>
                                </div>
                                <small><code>
                                    @if($sts == 0/4*100)
                                    VERIFIKASI
                                    @elseif($sts == 1/4*100)
                                    BELUM BS
                                    @elseif($sts == 2/4*100)
                                    PEMBELIAN
                                    @elseif($sts == 3/4*100)
                                    TUNGGU AKAD
                                    @elseif($sts == 4/4*100)
                                    COMPLETE
                                    @endif
                                    </code></small>
                                </td>
                                <td>
                                    <a href="/ketua/approval-kredit/{{$data->id_kredit}}" class="btn btn-primary btn-sm <?php if($data->app_ptgs == 1 && $data->app_bnd == 1 && $data->app_ket == null) echo ''; else echo 'disabled';?>" style="border-radius: 5px"><i class="fas fa-edit"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                       
                        </table>
                    </div>
                </div>
          </div>
        </div>
      </div>
    </section>
@endsection