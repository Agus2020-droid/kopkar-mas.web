@extends('layouts.v_app')
@section('title','List User')
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
            <div class="card">
                <div class="card-header bg-navy" >
                    <h3 class="card-title"><b style="font-size: 30px" class="mr-1">L</b>IST USER </h3><br>
                    <hr class="mt-3 mb-0"style="border: 1px solid #fff">
                </div>
              <!-- /.card-header -->
                <div class="card-body">
                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline collapsed" aria-describedby="example2_info">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>email</th>
                                <th>No. KTP</th>
                                <th>Nik </th>
                                <th>No. WA</th>
                                <th>Multi Kredit</th>
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
                                <td>{{$data->nik_ktp}}</td>
                                <td>{{$data->nik_kry}}</td>
                                <td>{{$data->telp}}</td>
                                <td class="text-center">
                                    @if($data->status_user == 0)
                                    <span class="badge bg-danger">OFF</span>
                                    @elseif($data->status_user == 1)
                                    <span class="badge bg-success">ON</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm" style="border-radius: 5px" data-toggle="modal" data-target="#edit-user{{$data->id}}">edit</a>
                                    <a href="" class="btn btn-danger btn-sm" style="border-radius: 5px">Hapus</a>
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
    @foreach ($users as $data)
    <div class="modal fade show" id="edit-user{{$data->id}}" aria-modal="true" role="dialog" style="padding-right: 17px; display: none;">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header bg-navy">
              <h4 class="modal-title">Edit User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
            <div class="card card-widget widget-user-2">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-navy">
                <div class="widget-user-image">
                  <img class="img-circle elevation-2" src="{{url('storage/foto_user/user1.png')}}" alt="User Avatar">
                </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username">{{$data->name}}</h3>
                <h5 class="widget-user-desc">{{$data->nik_kry}}</h5>
              </div>
              <div class="card-footer p-0">
                <form action="{{route('simpan.multikredit')}}"method="post">
                    <input type="hidden" name="user_id" value="{{$data->id}}">
                    <input type="hidden" name="nama" value="{{$data->name}}">
                    @csrf
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
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Akses Multi Kredit  <div class="float-right">
                        <select name="status_user" id="" class="form-control" required>
                            <option value="">-Pilih-</option>
                            <option value="1">ON</option>
                            <option value="0">OFF</option>
                        </select>
                      </div>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      @endforeach
@endsection