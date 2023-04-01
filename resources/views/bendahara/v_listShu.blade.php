@extends('layouts.v_app')
@section('title','SHU Tahun Buku')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1 class="m-0"> Selamat Datang <small>{{Auth::user()->name}}</small></h1> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active"><a href="#">Simpanan Anggota</a></li>
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
                    <h3 class="card-title"><b style="font-size: 30px" class="mr-1">SHU</b> TAHUN BUKU {{$thn_buku}}</h3><br>
                    <div class="float-right btn-group">
                        
                      </div>
                    <hr class="mt-3 mb-0"style="border: 1px solid #fff">
                </div>
              <!-- /.card-header -->
                <div class="card-body">
                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <table id="example1" class="table table-bordered table-hover dataTable dtr-inline collapsed" aria-describedby="example2_info">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tahun Buku</th>
                                <th>No. KTP</th>
                                <th>Nama Anggota</th>
                                <th>Jumlah SHU</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php 
                            $no=1;
                            @endphp
                            @foreach ($shu as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$data->thn_buku}}</td>
                                <td>{{$data->nik_ktp}}</td>
                                <td>{{$data->nama}}</td>
                                <td >@currency($data->jml_shu)</td>
                                <td>
                                    <a href="/bendahara/detail-shu/{{$data->id_shu}}" class="btn btn-primary btn-sm " style="border-radius: 5px">Detail</a>
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
    <div class="modal fade show" id="modal-upload-simpanan" style="display: none;" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
          <div id="load" class="overlay d-none">
              <i class="fas fa-4x fa-spinner fa-spin"></i><br>
              <h4 style="pl-4">Upload on progress .....</h4>
          </div> 
            <div class="modal-header bg-navy">
              <h5 class="text-center">Upload File</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="{{route('import.simpanan')}}" method="post" enctype="multipart/form-data">
              @csrf
            <div class="form-group row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <input id="file" type="file" name="file" >
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="sumbit" class="btn btn-primary" id="submitBtn" onclick="loading()" disabled>Upload</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
  <script type="text/javascript">
  const input1 = document.getElementById('file');
  const submitBtn = document.getElementById('submitBtn');

  // fungsi untuk memeriksa apakah semua input telah diisi
  function checkInputs() {
    if (input1.value.trim() !== '') {
      submitBtn.disabled = false;
    } else {
      submitBtn.disabled = true;
    }
  }

  // memeriksa input setiap kali pengguna mengetik
  input1.addEventListener('change', checkInputs);
</script>
@endsection