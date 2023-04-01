@extends('layouts.v_app')
@section('title','Kredit Anggota')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <!-- <h4> KREDIT ANGGOTA</h4> -->
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
            <div class="alert  alert-dismissible bg-white" style="border: 3px solid red">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h5><i class="fas fa-bullhorn"></i> Catatan:</h5>
              <span class="text-red">*</span> Jika terdapat kelebihan <b>ANGSURAN</b>, baris ter blok warna <span class="badge bg-danger">MERAH</span>.
            </div>
            <div class="card">
                <div class="card-header bg-navy" >
                    <h3 class="card-title"><b style="font-size: 30px" class="mr-0">K</b>REDIT ANGGOTA </h3><br>
                    <div class="float-right btn-group">
                        <a href="#"type="button" class="btn btn-default bg-olive" title="Import file" data-toggle="modal" data-target="#modal-upload-angsuran">
                          <i class="fas fa-upload pr-2"></i><span>Upload Angsuran</span>
                        </a>
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
                            <tr class="{{$data->total < $data->jmlAngsuran ? 'bg-danger': ''}}">
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
                                    <span class="text-light"> LEBIH ANGSURAN </span>
                                    @elseif($data->total > $data->jmlAngsuran)
                                    BELUM LUNAS
                                    @endif
                                    </code></small>
                                </td>
                                <td>
                                    <a href="/bendahara/detail-kredit-anggota/{{$data->id_kredit}}" class="btn btn-outline-primary btn-sm " style="border-radius: 5px">Detail</a>
                                    <a href="/bendahara/tambah-angsuran/{{$data->id_kredit}}" class="btn btn-outline-success btn-sm  <?php if($data->jmlAngsuran >= $data->total) echo 'disabled'; else echo ''; ?>" style="border-radius: 5px">Bayar</a>
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
    <div class="modal fade show" id="modal-upload-angsuran" style="display: none;" aria-modal="true" role="dialog">
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
            <form action="{{route('import.angsuran')}}" method="POST" enctype="multipart/form-data">
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
              <button type="submit" class="btn btn-primary" id="submitBtn" onclick="loading()" disabled>Upload</button>
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