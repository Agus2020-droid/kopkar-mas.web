@extends('layouts.v_app')
@section('title','Detail Simpanan Anggota')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
          <div class="float-left">
            <a href="#" class="btn bg-olive no-print" role="button" aria-label="Scroll to top" style="border-radius: 45em" data-toggle="modal" data-target="#modal-tambah-simpanan">
              <i class="fas fa-plus"></i> Transaksi Baru
            </a>  
          </div>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <!-- /.col -->
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
              @foreach ($saldo as $item)
                <div class="card-header bg-navy" >
                    <h3 class="card-title"><b style="font-size: 30px" class="mr-0">H</b>ISTORY TRANSAKSI <small class="pl-3" style="text-transform: uppercase">({{$item->name}})</small> </h3>
                    <br>
                    <hr class="mt-3 mb-0"style="border: 1px solid #fff">
                    <span class="float-right" style="font-size: 20px"><b> SALDO : @currency($item->simpananMasuk-$item->simpananKeluar)</b></span>

                </div>
                @endforeach
              <!-- /.card-header -->
                <div class="card-body">
                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <table id="example1" class="table table-bordered table-hover dataTable dtr-inline collapsed" aria-describedby="example2_info">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tgl Transaksi</th>
                                <th>Nominal</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php 
                            $no=1;
                            @endphp
                            @foreach ($simpanan as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{Carbon\Carbon::parse($data->tgl_simpanan)->isoFormat("D MMMM Y")}}</td>
                                <td>@currency($data->jml_simpanan)</td>
                                <td>
                                  @if($data->stts == 1) 
                                  <small class="text-success mr-1">
                                  <i class="fas fa-arrow-down"></i> Setor
                                </small>
                                @elseif($data->stts ==0)
                                <small class="text-danger mr-1">
                                  <i class="fas fa-arrow-up"></i> Tarik
                                </small>
                                @endif
                                </td>
                                <td>{{$data->ket}}</td>
                                <td>
                                <a href="/bendahara/edit-simpanan-anggota/{{$data->id_simpanan}}" class="btn btn-primary btn-sm" style="border-radius: 5px">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-hapus-simpanan{{$data->id_simpanan}}" style="border-radius: 5px">Hapus</a>
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
    @foreach ($simpanan as $data)
    <div class="modal fade show" id="modal-hapus-simpanan{{$data->id_simpanan}}" style="display: none;" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header bg-navy">
              <h5 class="text-center">Hapus Transaksi No. {{$data->id_simpanan}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              Yakin akan hapus transaksi simpanan ini?
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <a href="/bendahara/hapus-simpanan-anggota/{{$data->id_simpanan}}" type="sumbit" class="btn btn-primary">Ya</a>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      @endforeach
      <div class="modal fade show" id="modal-tambah-simpanan" style="display: none;" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div id="load" class="overlay d-none">
                <i class="fas fa-2x fa-spinner fa-spin"></i><br>
                <h4 class="pl-3">Tunggu proses ......</h4>
            </div> 
            <div class="modal-header bg-navy">
              <h5 class="text-center">Buat Transaksi Baru</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{route('store.simpanan')}}" method="post">
                @csrf
                @foreach ($users as $item)
                <input name="nik_ktp" type="hidden" value="{{$item->nik_ktp}}">
      
                <div class="form-group row">
                  <label class="col-sm-4"> Nama </label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <input  name="nama" type="text" value="{{$item->name}}" class="form-control" readonly >
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4"> NiK </label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <input  type="text" value="{{$item->nik_kry}}" class="form-control" readonly >
                    </div>
                  </div>
                </div>
                @endforeach
                <div class="form-group row">
                  <label class="col-sm-4"> Tanggal </label>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <input  id="tgl_simpanan" name="tgl_simpanan" type="date" class="form-control" required>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4"> Nominal <small>(Rp.)</small> </label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <input  id="tanpa-rupiah" name="jml_simpanan" type="text" class="form-control" placeholder="masukan angka"required>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Jenis transaksi<span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                    <div class="form-group">
                        <select id="stts" name="stts" class="form-control" style="width: 100%;" required>
                          <option value="" class="text-mute">-Pilih-</option>
                          <option value="1" class="text-olive">SETOR</option>
                          <option value="0" class="text-danger">TARIK </option>
                        </select>
                      </div>
                    </div>
                  </div>
                
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Keterangan</label>
                  <div class="col-sm-8">
                  <div class="form-group">
                  <input  name="ket" type="text" class="form-control" maxLength="15" placeholder="Max. 15 karakter">
                    </div>
                  </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary" id="submitBtn" onclick="loading()" disabled>Submit</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      </div>
      <script type="text/javascript">
      const input1 = document.getElementById('tgl_simpanan');
      const input2 = document.getElementById('tanpa-rupiah');
      const input3 = document.getElementById('stts');
      const submitBtn = document.getElementById('submitBtn');

      // fungsi untuk memeriksa apakah semua input telah diisi
      function checkInputs() {
        if (input1.value.trim() !== '' && input2.value.trim() !== '' && input3.value.trim() !== '') {
          submitBtn.disabled = false;
        } else {
          submitBtn.disabled = true;
        }
      }

      // memeriksa input setiap kali pengguna mengetik
      input1.addEventListener('change', checkInputs);
      input2.addEventListener('change', checkInputs);
      input3.addEventListener('change', checkInputs);
    </script>
@endsection