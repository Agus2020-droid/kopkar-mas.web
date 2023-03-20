@extends('layouts.v_app')
@section('title','Detail Informasi Kredit')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h4> INFORMASI KREDIT ANGGOTA</h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Informasi Kredit Anggota</li>
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
          <div class="card">
              <div class="card card-widget widget-user-2" >
              @foreach ($kredit as $data)
              <div class="widget-user-header bg-navy" style="background: url('{{asset('polkadot.png')}}') right;;opacity: 0.9;position: cover;background-size: 30%;60%;background-repeat: no-repeat">
                <div class="widget-user-image">
                  <img class="img-circle elevation-4" src="{{asset('template/')}}/dist/img/user7-128x128.jpg" alt="User Avatar">
                </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username">{{strtoupper($data->nama)}}</h3>
                <h5 class="widget-user-desc">{{$data->email}}</h5>
              </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form class="form-horizontal">
                <input id="jenis_kredit" name="jns_krdt" type="hidden" value="{{$data->jns_krdt}}">
                <input name="kd_kredit" type="hidden" value="{{$data->kd_kredit}}">
                <input name="tgl_kredit" type="hidden" value="{{$data->tgl_kredit}}">
                <input name="kredit_id" type="hidden" value="{{$data->id_kredit}}">
                <input name="nama" type="hidden" value="{{$data->nama}}">
                <input name="user_id" type="hidden" value="{{$data->user_id}}">
                <div class="card-body p-2 m-3" style="border: 1.5px solid #c3cad2">
                  <!-- start info -->
                    <div class="col-md-12"> 
                      <h3>{{$data->kd_kredit}}</h3>
                    </div>
                  <hr style="background-image: linear-gradient(90deg, navy, orange);height: 1px">
                  <!-- end info -->
                  <div class="row">
                    <div class="col-sm-8">
                      <div class="box p-2 m-1" >
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Nama Anggota</label>
                          <div class="col-sm-8">
                          <input type="text" class="form-control" value="{{strtoupper($data->nama)}}" readonly>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Nomor WA</label>
                          <div class="col-sm-8">
                          <input type="text" class="form-control" value="{{$data->telp}}" readonly>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Waktu Pengajuan</label>
                          <div class="col-sm-8">
                          <input type="text" class="form-control"  value="{{Carbon\Carbon::parse($data->tgl_kredit)->isoFormat('D MMMM Y HH:mm')}}" readonly>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Jenis Kredit</label>
                          <div class="col-sm-8">
                          <input type="text" class="form-control" value="{{$data->jns_krdt}}" readonly>                         
                         </div>
                        </div>
                        <div class="form-group row {{ $data->nm_brg ? '' : 'd-none' }}">
                          <label class="col-sm-4 col-form-label">Nama Barang</label>
                          <div class="col-sm-8">
                          <input type="text" class="form-control" value="{{$data->nm_brg}}" readonly>                        
                        </div>
                        </div>
                        <div class="form-group row {{ $data->jml_brng ? '' : 'd-none' }}">
                          <label class="col-sm-4 col-form-label">Jumlah Barang</label>
                          <div class="col-sm-8">
                          <input type="text" class="form-control" value="{{$data->jml_brng}}" readonly>
                          </div>
                        </div>
                        <div class="form-group row {{ $data->nm_kendaraan ? '' : 'd-none' }}">
                          <label class="col-sm-4 col-form-label">Nama Kendaraan</label>
                          <div class="col-sm-8">
                          <input type="text" class="form-control" value="{{$data->nm_kendaraan}}" readonly>
                          </div>
                        </div>
                        <div class="form-group row {{ $data->kondisi ? '' : 'd-none' }}">
                          <label class="col-sm-4 col-form-label">Kondisi</label>
                          <div class="col-sm-8">
                          <input type="text" class="form-control" value="{{$data->kondisi}}"readonly>
                          </div>
                        </div>
                        <div class="form-group row {{ $data->unit ? '' : 'd-none' }}">
                          <label class="col-sm-4 col-form-label">Unit</label>
                          <div class="col-sm-8">
                          <input type="text" class="form-control" value="{{$data->unit}}" readonly>
                       </div>
                        </div>
                        <div class="form-group row {{ $data->spek ? '' : 'd-none' }}">
                          <label class="col-sm-4 col-form-label">Spesifikasi</label>
                          <div class="col-sm-8">
                          <input type="text" class="form-control" value="{{$data->spek}}" readonly>
                        </div>
                        </div>
                        <div class="form-group row {{ $data->beli_oleh ? '' : 'd-none' }}">
                          <label class="col-sm-4 col-form-label">Pembeliaan Oleh</label>
                          <div class="col-sm-8">
                          <input type="text" class="form-control" value="{{$data->beli_oleh}}" readonly>
                          </div>
                        </div>
                        <div class="form-group row {{ $data->keperluan ? '' : 'd-none' }}">
                          <label class="col-sm-4 col-form-label">Keterangan</label>
                          <div class="col-sm-8">
                          <input type="text" class="form-control" value="{{$data->keperluan}}" readonly>
                          </div>
                        </div>
                        <div class="form-group row ">
                          <label class="col-sm-4 col-form-label">Plafon<span class="text-red">*</span></label>
                          <div class="col-sm-8">
                            <input id="tanpa-rupiah" name="nominal" type="text" class="form-control" value="@currency($data->nominal)" readonly>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Tenor<span class="text-red">*</span></label>
                          <div class="col-sm-8">
                              <input id="tenor" name="tenor" type="text" class="form-control"  value="{{$data->tenor}} bulan" readonly>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Angsuran per bulan</label>
                          <div class="col-sm-8">
                            <input id="angsuran" name="angsuran" type="text" class="form-control" value="@currency($data->angsuran)" readonly>
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
                            <input id="total" name="total" type="text" class="form-control" value="@currency($data->total)" readonly>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Jatuh Tempo<span class="text-red">*</span></label>
                          <div class="col-sm-8">
                            <input name="tempo" type="text" class="form-control" value="{{Carbon\Carbon::parse($data->tempo)->isoFormat('MMMM Y')}}"readonly>
                          </div>
                        </div>
                        
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="text-center pt-4">
                      <input type="text" class="knob" value="30" data-width="150" data-height="150" data-fgColor="red" data-readonly="true" >
                      <div class="knob-label text-red"><b> BELUM LUNAS</b></div>  
                      <!-- <div class="knob-label text-green"><b> LUNAS</b></div>   -->
                    </div>
                    <div class="table-responsive pt-4">
                    <table class="table">
                      <tbody><tr>
                        <th style="width:50%">TOTAL KREDIT</th>
                        <td>@currency($data->total)</td>
                      </tr>
                      <tr>
                        <th>TOTAL ANGSURAN</th>
                        <td>$10.34</td>
                      </tr>
                      <tr>
                        <th>SISA</th>
                        <td>$10.34</td>
                      </tr>
                     
                    </tbody></table>
                  </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <a href="/ketua/kredit-anggota" type="button" class="btn btn-default ">Back</a>
                </div>
                <!-- /.card-footer -->
              </form>
              @endforeach
            </div>
        </div>
      </div>
    </section>
@endsection