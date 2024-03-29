@extends('layouts.v_app')
@section('title','Kredit Anggota')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h4> KREDIT ANGGOTA</h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Kredit Pinjaman</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-header bg-navy" style="background: url('{{asset('polkadot.png')}}') right;;opacity: 0.9;position: cover;background-size: 30%;60%;background-repeat: no-repeat" >
                    <h3 class="card-title"><b style="font-size: 30px" class="mr-1">K</b>REDIT ANGGOTA </h3><br>
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
                                <th>Bunga</th>
                                <th>Jml Kredit</th>
                                <th>Angsuran</th>
                                <th>Status</th>
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
                                <td>{{$data->kode}}</td>
                                <td>{{Carbon\Carbon::parse($data->tgl_kredit)->isoFormat("D-MM-YY")}}</td>
                                <td>{{$data->nama}}</td>
                                <td>{{$data->jns_krdt}}</td>
                                <td>@currency($data->nominal)</td>
                                <td>{{$data->bunga}}</td>
                                <td>@currency($data->total)</td>
                                <td>@currency($data->jmlAngsuran) </td>
                                <td>
                                  @php
                                  $sts = round($data->countA/$data->tenor*100,2);
                                  @endphp
                                <div class="progress progress-md active">
                                  <div class="progress-bar bg-aqua progress-bar-striped" role="progressbar"
                                      aria-valuemin="0" aria-valuemax="100" style="width: {{$sts}}%">
                                      <span>{{$data->countA}}/{{$data->tenor}}</span>
                                  </div>
                                </div>
                                <small><code>
                                    @if($data->total == $data->jmlAngsuran)
                                    SUDAH LUNAS
                                    @elseif($data->total < $data->jmlAngsuran)
                                    LEBIH ANGSURAN
                                    @elseif($data->total > $data->jmlAngsuran)
                                    BELUM LUNAS
                                    @endif
                                    </code></small>
                                </td>
                                <td>
                                    <a href="/petugas-motor/detail-kredit-anggota/{{$data->id_kredit}}" class="btn btn-primary btn-sm btn-block"> <i class="fas fa-eye"></i> Lihat</a>
                                    <a href="/petugas-motor/cetak-akad/{{$data->id_kredit}}" class="btn btn-default btn-sm btn-block" target="_blank"><i class="fas fa-print"></i> Cetak</a>
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