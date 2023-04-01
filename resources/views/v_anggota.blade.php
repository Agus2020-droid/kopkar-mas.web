@extends('layouts.v_app')
@section('title','Data Anggota')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <!-- <h1 class="m-0"> Data Anggota <small>{{Auth::user()->name}}</small></h1> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active"><a href="#">Data Anggota</a></li>
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
                    <h3 class="card-title"><b style="font-size: 30px">D</b>ATA ANGGOTA </h3><br>
                    <div class="float-right btn-group">
                        <!-- <a href="#"type="button" class="btn btn-default bg-olive" title="Import file" data-toggle="modal" data-target="#modal-upload-simpanan">
                        <i class="fas fa-upload pr-2"></i><span>Upload Simpanan</span>
                        </a> -->
                        
                      </div>
                    <hr class="mt-3 mb-0"style="border: 1px solid #fff">
                </div>
              <!-- /.card-header -->
                <div class="card-body">
                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline collapsed" aria-describedby="example2_info">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>No. Ktp</th>
                                <th>Nik</th>
                                <th>Alamat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php 
                            $no=1;
                            @endphp
                            @foreach ($users as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td><img class="img-circle" src="{{url('storage/foto_user/user1.png')}}" style="height: 45px;width: 45px" alt="User Avatar"></td>
                                <td>{{$data->name}}</td>
                                <td>KTP.{{$data->nik_ktp}}</td>
                                <td>{{$data->nik_kry}}</td>
                                <td>{{$data->alamat}}<br>Telp : <a href="">{{$data->telp}}</a> </td>
                                <td>
                                    <a href="/bendahara/detail-anggota/{{$data->id}}" class="btn btn-primary btn-sm " style="border-radius: 5px">Lihat</a>
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