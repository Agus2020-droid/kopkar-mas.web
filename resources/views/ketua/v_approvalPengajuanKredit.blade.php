@extends('layouts.v_app')
@section('title','Approval Kredit')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h4> APPROVAL PENGAJUAN KREDIT</h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Approval Kredit</li>
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
          <div id="load" class="overlay d-none">
              <i class="fas fa-2x fa-spinner fa-spin"></i>
          </div> 
              <div class="card-header bg-navy" style="background: url('{{asset('polkadot.png')}}') right;;opacity: 0.9;position: cover;background-size: 30%;60%;background-repeat: no-repeat">
              @foreach ($kredit as $data)
                <h3 class="card-title">KODE TRANSAKSI </h3><br>
                <h3>{{$data->kd_kredit}}</h3>
                <hr class="mt-2 mb-0"style="border: 1px solid #fff">
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form class="form-horizontal" action="{{route('update.kredit.ketua')}}" method="post">
                @csrf
                <input id="jenis_kredit" name="jns_krdt" type="hidden" value="{{$data->jns_krdt}}">
                <input name="kd_kredit" type="hidden" value="{{$data->kd_kredit}}">
                <input name="tgl_kredit" type="hidden" value="{{$data->tgl_kredit}}">
                <input name="kredit_id" type="hidden" value="{{$data->id_kredit}}">
                <input name="nama" type="hidden" value="{{$data->nama}}">
                <input name="user_id" type="hidden" value="{{$data->user_id}}">
                <div class="card-body p-2 m-3" style="border: 1.5px solid #c3cad2">
                  <!-- start info -->
                  <!-- <div class="p-2">
                    <div class="col-md-12">
                      <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{asset('template/')}}/dist/img/user4-128x128.jpg" alt="User profile picture">
                        <p>{{$data->nama}}</p>
                      </div>
                    </div>
                  </div> -->
                  <!-- <hr style="height: 8px;background-image: linear-gradient(90deg, navy, orange);height: 5px"> -->
                  <!-- end info -->
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="box p-2 m-1" >
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Nama Anggota</label>
                          <div class="col-sm-8">
                          <p class="col-form-label">: {{strtoupper($data->nama)}}</p>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Nomor WA</label>
                          <div class="col-sm-8">
                          <p class="col-form-label">: <a href="https://api.whatsapp.com/send?phone=62{{$data->telp}}" target="_blank"> {{$data->telp}}</a></p>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Waktu Pengajuan</label>
                          <div class="col-sm-8">
                          <p class="col-form-label">: {{Carbon\Carbon::parse($data->tgl_kredit)->isoFormat('D MMMM Y HH:mm')}}</p>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Jenis Kredit</label>
                          <div class="col-sm-8">
                          <p class="col-form-label">: {{$data->jns_krdt}}</p>
                          </div>
                        </div>
                        <div class="form-group row {{ $data->nm_brg ? '' : 'd-none' }}">
                          <label class="col-sm-4 col-form-label">Nama Barang</label>
                          <div class="col-sm-8">
                          <p class="col-form-label">: {{$data->nm_brg}}</p>
                          </div>
                        </div>
                        <div class="form-group row {{ $data->jml_brng ? '' : 'd-none' }}">
                          <label class="col-sm-4 col-form-label">Jumlah Barang</label>
                          <div class="col-sm-8">
                          <p class="col-form-label">: {{$data->jml_brng}}</p>

                          </div>
                        </div>
                        <div class="form-group row {{ $data->nm_kendaraan ? '' : 'd-none' }}">
                          <label class="col-sm-4 col-form-label">Nama Kendaraan</label>
                          <div class="col-sm-8">
                            : {{$data->nm_kendaraan}}
                          </div>
                        </div>
                        <div class="form-group row {{ $data->kondisi ? '' : 'd-none' }}">
                          <label class="col-sm-4 col-form-label">Kondisi</label>
                          <div class="col-sm-8">
                          <p class="col-form-label">: {{$data->kondisi}}</p>
                          </div>
                        </div>
                        <div class="form-group row {{ $data->unit ? '' : 'd-none' }}">
                          <label class="col-sm-4 col-form-label">Unit</label>
                          <div class="col-sm-8">
                          <p class="col-form-label">: {{$data->unit}}</p>
                          </div>
                        </div>
                        <div class="form-group row {{ $data->spek ? '' : 'd-none' }}">
                          <label class="col-sm-4 col-form-label">Spesifikasi</label>
                          <div class="col-sm-8">
                          <p class="col-form-label">: {{$data->spek}}</p>
                          </div>
                        </div>
                        <div class="form-group row {{ $data->beli_oleh ? '' : 'd-none' }}">
                          <label class="col-sm-4 col-form-label">Pembeliaan Oleh</label>
                          <div class="col-sm-8">
                          <p class="col-form-label">: {{$data->beli_oleh}}</p>
                          </div>
                        </div>
                        <div class="form-group row {{ $data->keperluan ? '' : 'd-none' }}">
                          <label class="col-sm-4 col-form-label">Keterangan</label>
                          <div class="col-sm-8">
                          <p class="col-form-label">: {{$data->keperluan}}</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="box p-2 m-1" >
                        <div class="form-group row ">
                          <label class="col-sm-4 col-form-label">Plafon<span class="text-red">*</span></label>
                          <div class="col-sm-8">
                            <input id="tanpa-rupiah" name="nominal" type="text" class="form-control" value="@formatUang($data->nominal)" readonly>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Tenor<span class="text-red">*</span></label>
                          <div class="col-sm-8">
                              <input id="tenor" name="tenor" type="number" class="form-control" max="<?php if($data->jns_krdt == 'BARANG') echo '12'; elseif($data->jns_krdt == 'KENDARAAN') echo '24'; elseif($data->jns_krdt == 'TUNAI') echo '5'; ?>" value="{{$data->tenor}}" readonly>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Angsuran</label>
                          <div class="col-sm-8">
                            <input id="angsuran" name="angsuran" type="text" class="form-control" value="{{$data->angsuran}}" readonly>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Bunga</label>
                          <div class="col-sm-8">
                            <input id="bunga" name="bunga" type="text" class="form-control" value="{{$data->bunga}}" readonly>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Nominal Kredit</label>
                          <div class="col-sm-8">
                            <input id="total" name="total" type="text" class="form-control" value="{{$data->total}}" readonly>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Jatuh Tempo <span class="text-red">*</span></label>
                          <div class="col-sm-8">
                            <input name="tempo" type="text" class="form-control" value="{{$data->tempo}}" readonly>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body p-2 m-3" style="border: 1.5px solid #c3cad2">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">PERSETUJUAN <span class="text-red">*</span></label>
                    <div class="col-sm-8">
                        <select id="app_ket" name="app_ket" class="form-control" style="border: 1px solid red;width: 100%;" required>
                          <option value="">-Pilih-</option>
                          <option value="1">APPROVED</option>
                          <option value="0">NOT APPROVED</option>
                        </select>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <a href="/ketua/pengajuan-kredit-anggota" type="button" class="btn btn-default ">Back</a>
                  <button type="submit" class="btn btn-info float-right" id="submitBtn" onclick="loading()" disabled>Submit</button>
                </div>
                <!-- /.card-footer -->
              </form>
              @endforeach
            </div>
        </div>
      </div>
    </section>
    <script type="text/javascript">
    const input1 = document.getElementById('app_ket');
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