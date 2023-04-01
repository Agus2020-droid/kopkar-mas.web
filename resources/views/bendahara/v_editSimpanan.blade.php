@extends('layouts.v_app')
@section('title','Edit Simpanan Anggota')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1 class="m-0"> Selamat Datang <small>{{Auth::user()->name}}</small></h1> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Simpanan Anggota</a></li>
              <li class="breadcrumb-item active"><a href="#">Edit Simpanan Anggota</a></li>
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
              @foreach ($users as $item)
                <div class="card-header bg-navy" >
                    <h3 class="card-title"><b style="font-size: 30px" class="mr-0">E</b>DIT SIMPANAN</h3>
                    <br>
                    <hr class="mt-3 mb-0"style="border: 1px solid #fff">
                    <span class="float-left" style="text-transform: uppercase">NAMA : {{$item->name}}</span> 
                    <span class="float-right" style="font-size: 20px"><b> SALDO : @currency(3000000)</b></span>

                </div>
                @endforeach
              <!-- /.card-header -->
                <div class="card-body">
                <form action="{{route('update.simpanan')}}" method="post" enctype="multipart/form-data">
              @csrf
              @foreach ($simpanan as $data)
              <input name="simpanan_id" type="hidden" value="{{$data->id_simpanan}}">           
              <input name="nik_ktp" type="hidden" value="{{$data->nik_ktp}}">           
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">No. Transaksi </label>
                <div class="col-sm-1">
                  <div class="form-group">
                    <input type="text" class="form-control" value="{{$data->id_simpanan}}"readonly>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Tanggal </label>
                <div class="col-sm-3">
                  <div class="form-group">
                    <input  name="tgl_simpanan" type="date" class="form-control" value="{{Carbon\Carbon::parse($data->tgl_simpanan)->isoFormat('YYYY-MM-D')}}">
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Nominal</label>
                <div class="col-sm-3">
                  <div class="form-group">
                    <input name="jml_simpanan" id="tanpa-rupiah"type="text" class="form-control"  placeholder="Isi dengan Angka" value="@formatUang($data->jml_simpanan)">
                    <!-- <input type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask="" inputmode="decimal"> -->
                  </div>
                </div>
              </div>

              <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Status<span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                  <div class="form-group">
                      <select name="stts" class="form-control" style="width: 100%;" required>
                        <option value="{{$data->stts}}" class="text-mute" selected>@if($data->stts == 1) SETOR @elseif($data->stts == 0) TARIK @endif</option>
                        <option value="1" class="<?php if($data->stts == 1) echo 'd-none'; else echo '';?>">SETOR</option>
                        <option value="0" class="<?php if($data->stts == 0) echo 'd-none'; else echo '';?>">TARIK</option>
                      </select>
                    </div>
                  </div>
                </div>
                
              <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Keterangan<span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                  <div class="form-group">
                  <input  name="ket" type="text" class="form-control" maxLength="15" placeholder="maksimal 15 karakter"value="{{$data->ket}}">
                    </div>
                  </div>
                </div>
                </div>
                <div class="card-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              <button type="sumbit" class="btn btn-primary float-right">Submit</button>
                </div>
              </form>
                @endforeach
          </div>
        </div>
      </div>
    </section>
    
@endsection