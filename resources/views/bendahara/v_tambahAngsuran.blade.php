@extends('layouts.v_app')
@section('title','Form Tambah Angsran')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <!-- <div class="row mb-0">
          <div class="col-sm-6">
            <h4 class="title"> TAMBAH ANGSURAN</h4>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item"><a href="/bendahara/kredit-anggota">Kredit Pinjaman</a></li>
              <li class="breadcrumb-item active">Form Tambah Angsuran</li>
            </ol>
          </div>
        </div> -->
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
                    <h3 class="card-title"><b style="font-size: 30px" class="mr-1">F</b>orm Angsuran</h3><br>
                    <hr class="mt-3 mb-0"style="border: 1px solid #fff">
                </div>
              <!-- /.card-header -->
                <div class="card-body">
                   <form action="{{route('store.angsuran')}}" class="form-horizontal" method="POST">
                    @csrf
                    @foreach ($kredit as $data)
                    <input name="kredit_kd" type="hidden" value="{{$data->kd_kredit}}">
                    <input name="user_id" type="hidden" value="{{$data->user_id}}">
                    <input name="nama" type="hidden" value="{{$data->nama}}">
                    <input name="ttl_kredit" type="hidden" value="{{$ttlKredit}}">
                    <input name="ttl_angsuran" type="hidden" value="{{$ttlAngsuran}}">
                      <div class="card collapsed-card" style="border: 0px">
                      <div class="card-header">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label" style="font-size: 18px">KODE TRANSAKSI</label>
                          <label class="col-sm-9 col-form-label " style="font-size: 20px">{{$data->kd_kredit}}</label>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label" style="font-size: 18px">NAMA KREDITUR</label>
                          <label class="col-sm-9 col-form-label " style="font-size: 20px">{{$data->nama}}</label>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label" style="font-size: 18px">TANGGAL PENGAJUAN</label>
                          <label class="col-sm-9 col-form-label" style="font-size: 18px">{{Carbon\Carbon::parse($data->tgl_kredit)->isoFormat("D MMMM YYYY HH:mm")}}</label>
                        </div>
                        <div class="card-tools">
                          <button type="button" class="btn btn-sm btn-outline-primary btn-block" data-card-widget="collapse">
                            <i class="fas fa-plus mr-2"></i> Detail
                          </button>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Jenis Kredit</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" value="{{$data->jns_krdt}}" readonly>
                          </div>
                        </div>
                        <div class="form-group row {{ $data->nm_brg ? '' : 'd-none' }}">
                          <label class="col-sm-3 col-form-label">Nama Barang</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" value="{{$data->nm_brg}}" readonly>
                          </div>
                        </div>
                        <div class="form-group row {{ $data->jml_brng ? '' : 'd-none' }}">
                          <label class="col-sm-3 col-form-label">Jumlah</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" value="{{$data->jml_brng}}" readonly>
                          </div>
                        </div>
                        <div class="form-group row {{ $data->nm_kendaraan ? '' : 'd-none' }}">
                          <label class="col-sm-3 col-form-label">Nama Kendaraan</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" value="{{$data->nm_kendaraan}}" readonly>
                          </div>
                        </div>
                        <div class="form-group row {{ $data->kondisi ? '' : 'd-none' }}">
                          <label class="col-sm-3 col-form-label">Kondisi</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" value="{{$data->kondisi}}" readonly>
                          </div>
                        </div>
                        <div class="form-group row {{ $data->jml_unit ? '' : 'd-none' }}">
                          <label class="col-sm-3 col-form-label">Jumlah Unit</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" value="{{$data->jml_unit}}" readonly>
                          </div>
                        </div>
                        <div class="form-group row {{ $data->spesifikasi ? '' : 'd-none' }}">
                          <label class="col-sm-3 col-form-label">Spesifikasi</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" value="{{$data->spek}}" readonly>
                          </div>
                        </div>
                        <div class="form-group row {{ $data->beli_oleh ? '' : 'd-none' }}">
                          <label class="col-sm-3 col-form-label">Di beli oleh</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" value="{{$data->beli_oleh}}" readonly>
                          </div>
                        </div>
                        <div class="form-group row {{ $data->keperluan ? '' : 'd-none' }}">
                          <label class="col-sm-3 col-form-label">Keterangan</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" value="{{$data->keperluan}}" readonly>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Plafon Kredit</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" value="@currency($data->nominal)" readonly>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Bunga</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" value="{{$data->bunga}}%" readonly>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tenor</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" value="{{$data->tenor}} Bulan" readonly>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Angsuran</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" value="@currency($data->angsuran)/bulan" readonly>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Jumlah Kredit</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" value="@currency($data->total)" readonly>
                          </div>
                        </div>
                      </div>
                      </div>
                      <div class="card-footer">
                      <div class="form-group row">
                          <label class="col-sm-3 col-form-label">TANGGAL</label>
                          <div class="col-sm-2">
                              <input name="tgl_angsuran" type="date" class="form-control" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">ANGSURAN <small>(Rupiah)</small></label>
                          <div class="col-sm-9">
                              <input name="jml_angsuran" id="tanpa-rupiah" type="text" class="form-control"  placeholder="{{$ttlKredit-$ttlAngsuran}}"required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">METODE PEMBAYARAN</label>
                          <div class="col-sm-9">
                              <select name="metode" class="form-control" required>
                                <option value="">-Pilih-</option>
                                <option value="1">TUNAI</option>
                                <option value="2">TRANSFER</option>
                              </select>
                          </div>
                        </div>
                        <div class="form-group row">
                        <div class="offset-sm-3 col-sm-9">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </div>
                      </div>
                      @endforeach
                   </form>
                </div>
          </div>
        </div>
      </div>
    </section>
@endsection