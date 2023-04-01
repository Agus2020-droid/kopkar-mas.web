@extends('layouts.v_app')
@section('title','User Account')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-0">
          <div class="col-sm-6">
            <!-- <h4> Daftar Pengguna  </h4> -->
          </div><!-- /.col -->
          <div class="col-sm-6">

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
            <div class="card ">
                <div class="card-header bg-navy" >
                    <h3 class="card-title"><b style="font-size: 30px" class="mr-1">L</b>IST USER </h3><br>
                    <hr class="mt-3 mb-0"style="border: 1px solid #fff">
                </div>
              <!-- /.card-header -->
                <div class="card-body">
                <ul class="nav nav-tabs nav-justified" id="custom-content-below-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active bg-primary pb-1" style="border-radius: 90px 0px" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true"><i class="fa fa-user-circle pr-1"></i> Aktif</a>
                  </li>
                  <li class="nav-item" >
                    <a class="nav-link bg-danger pb-1" style="border-radius: 90px 0px" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="false"><i class="fa fa-user-circle pr-1"></i> Non Aktif</a>
                  </li>
                </ul>
                <div class="tab-content" id="custom-content-below-tabContent">
                  <div class="tab-pane fade active show" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                      <div class="card p-2">
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <table id="example1" class="table table-bordered table-hover dataTable dtr-inline collapsed" aria-describedby="example2_info">
                              <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>Nama</th>
                                      <th>email</th>
                                      <th>IP Address</th>
                                      <th>Last login</th>
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
                                      <td>{{$data->name}}</td>
                                      <td>{{$data->email}}</td>
                                      <td class="text-center">
                                      {{$data->last_login_ip}}
                                      </td>
                                      <td>
                                      {{ \Carbon\Carbon::parse($data->last_login_at)->diffForHumans() }}
                                      </td>
                                      <td>
                                          <!-- <a href="" class="btn btn-outline-success btn-sm"  data-toggle="modal" data-target="#edit-user{{$data->id}}"><i class="fas fa-spinner pr-1"></i> Restore</a> -->
                                          <a href="" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#hapus{{$data->id}}"><i class="fas fa-minus-circle pr-1"></i> Non Aktif</a>
                                      </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                          
                            </table>
                        </div>
                      </div>
                  </div>
                  <div class="tab-pane fade active " id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
                  <div class="card p-2">
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <table id="example2" class="table table-bordered table-hover dataTable dtr-inline collapsed" aria-describedby="example2_info">
                              <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>Nama</th>
                                      <th>email</th>
                                      <th>IP Address</th>
                                      <th>Deleted at</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @php 
                                  $no=1;
                                  @endphp
                                  @foreach ($n_users as $data)
                                  <tr>
                                      <td>{{$no++}}</td>
                                      <td>{{$data->name}}</td>
                                      <td>{{$data->email}}</td>
                                      <td class="text-center">
                                      {{$data->last_login_ip}}
                                      </td>
                                      <td>
                                      {{ \Carbon\Carbon::parse($data->deleted_at)->diffForHumans() }}
                                      </td>
                                      <td>
                                          <a href="" class="btn btn-outline-success btn-sm"  data-toggle="modal" data-target="#edit-user{{$data->id}}"><i class="fas fa-sync-alt pr-1"></i> Restore</a>
                                          <a href="" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#hapus{{$data->id}}"><i class="fas fa-times-circle pr-1"></i> Delete</a>
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
          </div>
        </div>
      </div>
    </section>
    @foreach ($users as $data)
    <div class="modal fade show" id="hapus{{$data->id}}" aria-modal="true" role="dialog" style="padding-right: 17px; display: none;">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header bg-navy">
              <h4 class="modal-title">Hapus Akun</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
            <div class="card card-widget widget-user-2">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-navy">
                <div class="widget-user-image">
                  <img class="img-circle elevation-2" src="{{url('storage/foto_user/'.$data->foto)}}" style="width: 60px;height: 60px;object-fit: cover;object-position: 100% 0;"alt="User Avatar">
                </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username">{{$data->name}}</h3>
                <h5 class="widget-user-desc">{{$data->nik_kry}}</h5>
              </div>
              <div class="card-footer p-0">
                <form action="{{route('hapus.akun')}}"method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{$data->id}}">
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Email <span class="float-right">{{$data->email}}</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      No. Whatsapp <span class="float-right">{{$data->telp}}</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Alamat <span class="float-right">{{$data->alamat}}</span>
                    </a>
                  </li>
            
                </ul>
              </div>
            </div>
            Hapus akun ini ? 
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Ya</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      @endforeach
@endsection