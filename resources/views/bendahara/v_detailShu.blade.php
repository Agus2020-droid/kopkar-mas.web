@extends('layouts.v_app')
@section('title','Detail SHU')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
        @foreach ($shu as $item)
          <div class="col-sm-6">
          <a href="/bendahara/list-shu/{{$item->thn_buku}}" class="btn btn-sm bg-primary">
            <i class="fas fa-arrow-left pr-2"></i>Kembali
          </a>
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
                    <h3 class="card-title"><b style="font-size: 30px" class="mr-1">SHU</b> DETAIL INFORMATION</h3><br>
                    <div class="float-right btn-group">
                        
                      </div>
                    <hr class="mt-3 mb-0"style="border: 1px solid #fff">
                </div>
              <!-- /.card-header -->
                <div class="card-body">
                  
                <div class="card bg-light d-flex ">
                <div class="card-header text-muted border-bottom-0 bg-navy">
                  NO. {{$item->id_shu}}
                  @if(auth()->user()->level == 3)
                  <div class="float-right">
                  <a href="#"type="button" class="btn btn-primary btn-sm" title="Edit" data-toggle="modal" data-target="#modal-edit-shu{{$item->id_shu}}">
                          <i class="fas fa-edit pr-1"></i>Edit
                        </a>
                  </div>
                  @endif
                </div>
                <div class="card-body pt-5">
                  <div class="row">
                    <div class="col-sm-3  text-center pt-2">
                    <img src="{{url('storage/foto_user/user1.png')}}" alt="user-avatar" class="img-circle img-fluid " style="width: 150px;height: 150px"><br>

                    </div>
                    <div class="col-sm-9 pl-4">
                      <form action="">
                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Tanggal Shu </label>
                        <div class="col-sm-8">
                          <div class="form-group">
                            <input  type="text" class="form-control" value="{{Carbon\Carbon::parse($item->tgl_shu)->isoFormat('DD MMMM YYYY')}}" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Nama</label>
                        <div class="col-sm-8">
                          <div class="form-group">
                            <input  type="text" class="form-control" value="{{$item->nama}}" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">No. KTP</label>
                        <div class="col-sm-8">
                          <div class="form-group">
                            <input  type="text" class="form-control" value="{{$item->nik_ktp}}" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Nama Bank</label>
                        <div class="col-sm-8">
                          <div class="form-group">
                            <input  type="text" class="form-control" value="{{$item->nm_bank}}" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">No. Rekening</label>
                        <div class="col-sm-8">
                          <div class="form-group">
                            <input  type="text" class="form-control" value="{{$item->no_rek}}" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Tahun Buku</label>
                        <div class="col-sm-8">
                          <div class="form-group">
                            <input  type="text" class="form-control" value="{{$item->thn_buku}}" readonly>
                          </div>
                        </div>
                      </div>

                      </form>
                    </div>
                  </div>
                </div>
                <div class="card-footer bg-olive">
                  <div class="text-left">
                  <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Peran Pinjaman</label>
                        <div class="col-sm-8">
                          <div class="form-group">
                            <input  type="text" class="form-control" value="@currency($item->peran_krdt)" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Peran Pengurus</label>
                        <div class="col-sm-8">
                          <div class="form-group">
                            <input  type="text" class="form-control" value="@currency($item->peran_peng)" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Pendapatan SHU</label>
                        <div class="col-sm-8">
                          <div class="form-group">
                            <input  type="text" class="form-control" value="@currency($item->jml_shu)" readonly>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
                </div>
                @endforeach
          </div>
        </div>
      </div>
    </section>
    @foreach ($shu as $item)
    <div class="modal fade show" id="modal-edit-shu{{$item->id_shu}}" style="display: none;" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
          <div id="load" class="overlay d-none">
              <i class="fas fa-4x fa-spinner fa-spin"></i><br>
              <h4 style="pl-4">Upload on progress .....</h4>
          </div> 
            <div class="modal-header bg-navy">
              <h5 class="text-center">Edit SHU No. {{$item->id_shu}} </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form1" action="{{route('update.shu')}}" method="post" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="shu_id" value="{{$item->id_shu}}">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Kreditur</label>
              <div class="col-sm-9">
                  <input type="text" class="form-control" value="{{$item->nama}}" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">No KTP</label>
              <div class="col-sm-9">
                  <input type="text" class="form-control" value="{{$item->nik_ktp}}" readonly>
              </div>
            </div>
              <div class="form-group row">
              <label class="col-sm-3 col-form-label">Tanggal</label>
              <div class="col-sm-9">
                  <input id="tgl_angsuran" name="tgl_shu" type="date" class="form-control" value="{{$item->tgl_shu}}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama Bank</label>
              <div class="col-sm-9">
                  <input id="nm_bank" name="nm_bank" type="text" class="form-control" value="{{$item->nm_bank}}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nomor Rekening</label>
              <div class="col-sm-9">
                  <input id="no_rek"name="no_rek" type="text" class="form-control" value="{{$item->no_rek}}" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Peran Kredit <small>(Rp.)</small></label>
              <div class="col-sm-9">
                  <input id="tanpa-rupiah" name="peran_krdt" type="text" class="form-control" value="@formatUang($item->peran_krdt)" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Peran Pengurus <small>(Rp.)</small></label>
              <div class="col-sm-9">
                  <input id="tanpa-rupiah1" name="peran_peng" type="text" class="form-control" value="@formatUang($item->peran_peng)" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Pendapatan SHU <small>(Rp.)</small></label>
              <div class="col-sm-9">
                  <input id="tanpa-rupiah2" name="jml_shu" type="text" class="form-control" value="@formatUang($item->jml_shu)" required readonly>
              </div>
            </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary" id="submitBtn" onclick="loading()" disabled>Update</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      @endforeach
  <script type="text/javascript">
  const input1 = document.getElementById('tgl_angsuran');
  const input2 = document.getElementById('nm_bank');
  const input3 = document.getElementById('no_rek');
  const input4 = document.getElementById('tanpa-rupiah');
  const input5 = document.getElementById('tanpa-rupiah1');
  const submitBtn = document.getElementById('submitBtn');

  // fungsi untuk memeriksa apakah semua input telah diisi
  function checkInputs() {
    if (input1.value.trim() !== '' && input2.value.trim() !== '' && input3.value.trim() !== '' && input4.value.trim() !== '' && input5.value.trim() !== '') {
      submitBtn.disabled = false;
    } else {
      submitBtn.disabled = true;
    }
  }

  // memeriksa input setiap kali pengguna mengetik
  input1.addEventListener('change', checkInputs);
  input2.addEventListener('change', checkInputs);
  input3.addEventListener('change', checkInputs);
  input4.addEventListener('change', checkInputs);
  input5.addEventListener('change', checkInputs);
  input6.addEventListener('change', checkInputs);
</script>


@endsection