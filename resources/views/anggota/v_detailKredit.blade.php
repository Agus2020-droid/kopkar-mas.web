@extends('layouts.v_appAnggota')
@section('title','Detail Kredit')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <a href="/kredit-anggota" style="font-size: 20px"><i class="fas fa-arrow-circle-left" ></i> Kembali</a>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    @foreach ($kredit as $data)
    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-12">
          <div class="invoice p-3 mb-3">

              <!-- info row -->
           <div class="row">
            <div class="col-md-12">
              <div class="card card-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-navy">
                  <h3 class="widget-user-username">{{$data->nama}}</h3>
                  <!-- <h5 class="widget-user-desc"> {{$data->nik_ktp}} </h5> -->

                </div>
                
                <div class="widget-user-image">
                  <img class="img-circle elevation-2" src="{{url('storage/foto_user/user1.png')}}" alt="User Avatar">

                </div>

                <div class="card-footer">
                  <form class="form-horizontal">
                  <div class="form-group row ">
                      <label class="col-sm-3 control-label"> KODE TRANSAKSI</label> 
                      <div class="col-sm-9">
                        <input type="text" class="form-control"value="{{$data->kd_kredit}}" readonly>
                      </div>
                    </div>
                    <div class="form-group row ">
                      <label class="col-sm-3 control-label"> JENIS KREDIT</label> 
                      <div class="col-sm-9">
                        <input type="text" class="form-control"value="{{$data->jns_krdt}}" readonly>
                      </div>
                    </div>
                    <div class="form-group row <?php if($data->nm_brg == null) echo 'd-none'; else echo ''; ?>">
                      <label class="col-sm-3 control-label"> NAMA BARANG</label> 
                      <div class="col-sm-9">
                        <input type="text" class="form-control"value="{{$data->nm_brg}}" readonly>
                      </div>
                    </div>
                    <div class="form-group row <?php if($data->jml_brng == null) echo 'd-none'; else echo ''; ?>">
                      <label class="col-sm-3 control-label"> JUMLAH BARANG</label> 
                      <div class="col-sm-9">
                        <input type="text" class="form-control"value="{{$data->jml_brng}}" readonly>
                      </div>
                    </div>
                    <div class="form-group row <?php if($data->nm_kendaraan == null) echo 'd-none'; else echo ''; ?>">
                      <label class="col-sm-3 control-label"> NAMA KENDARAAN</label> 
                      <div class="col-sm-9">
                        <input type="text" class="form-control"value="{{$data->nm_kendaraan}}" readonly>
                      </div>
                    </div>
                    <div class="form-group row <?php if($data->kondisi == null) echo 'd-none'; else echo ''; ?>">
                      <label class="col-sm-3 control-label"> KONDISI</label> 
                      <div class="col-sm-9">
                        <input type="text" class="form-control"value="{{$data->kondisi}}" readonly>
                      </div>
                    </div>
                    <div class="form-group row <?php if($data->jml_unit == null) echo 'd-none'; else echo ''; ?>">
                      <label class="col-sm-3 control-label"> JUMLAH UNIT</label> 
                      <div class="col-sm-9">
                        <input type="text" class="form-control"value="{{$data->jml_unit}}" readonly>
                      </div>
                    </div>
                    <div class="form-group row <?php if($data->spek == null) echo 'd-none'; else echo ''; ?>">
                      <label class="col-sm-3 control-label"> SPESIFIKAsi</label> 
                      <div class="col-sm-9">
                        <input type="text" class="form-control"value="{{$data->spek}}" readonly>
                      </div>
                    </div>
                    <div class="form-group row <?php if($data->beli_oleh == null) echo 'd-none'; else echo ''; ?>">
                      <label class="col-sm-3 control-label"> PEMBELIAN OLEH</label> 
                      <div class="col-sm-9">
                        <input type="text" class="form-control"value="{{$data->beli_oleh}}" readonly>
                      </div>
                    </div>
                    <div class="form-group row <?php if($data->keperluan == null) echo 'd-none'; else echo ''; ?>">
                      <label class="col-sm-3 control-label"> KEPERLUAN</label> 
                      <div class="col-sm-9">
                        <input type="text" class="form-control"value="{{$data->keperluan}}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 control-label"> PLAFON KREDIT</label> 
                      <div class="col-sm-9">
                        <input type="text" class="form-control"value="@currency($data->nominal)" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 control-label"> TENOR</label> 
                      <div class="col-sm-9">
                        <input type="text" class="form-control"value="{{$data->tenor}} bulan" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                    <label class="col-sm-3 control-label"> JATUH TEMPO</label> 
                      <div class="col-sm-9">
                        <input type="text" class="form-control"value="{{Carbon\Carbon::parse($data->tempo)->isoFormat('D MMMM Y')}}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                    <label class="col-sm-3 control-label"> ANGSURAN</label> 
                      <div class="col-sm-9">
                        <input type="text" class="form-control"value="@currency($data->angsuran)" readonly>
                      </div>
                    </div>
                  </form>
                  <!-- /.row -->
                </div>
              </div>

            </div>
           </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-sm-8 table-responsive">
                  <table class="table table-striped " >
                    <thead>
                      <tr colspan=""><strong>TABEL ANGSURAN</strong></tr>
                    <tr>
                      <th width="8%">No</th>
                      <th>Tanggal</th>
                      <th>Nilai Angsuran</th>
                      <th>Metode</th>
                    </tr>
                    </thead>
                    <tbody>
                      @php
                      $no=1;
                      @endphp
                      @foreach ($angsuran as $item)
                    <tr>
                      <td>{{$no++}}</td>
                      <td>{{Carbon\Carbon::parse($data->tgl_angsuran)->isoFormat("D MMMM Y")}}</td>
                      <td>@currency($item->jml_angsuran)</td>
                      @if($item->metode == 1)
                      <td>TUNAI</td>
                      @elseif($item->metode == 2)
                      <td>TRANSFER</td>
                      @elseif($item->metode == 3)
                      <td>POTONG GAJI</td>
                      @endif
                    </tr>
                    @endforeach
                   
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                @foreach ($ttlAngsuran as $item)
                @php
                $a = $item->ttl_angsuran;
                $b = $ttlKredit;
                $ttl = round($a/$b*100,2);
                @endphp
                  <div class="text-center pt-4">
                    <input type="text" class="knob" value="{{$ttl}}" data-width="160" data-height="160" data-fgColor="<?php if($ttl < 100) echo 'red';else echo 'green';?>" data-readonly="true" >
                    <div class="knob-label text-red">
                      @if($ttl < 100)
                      <span class="badge bg-red"> BELUM LUNAS</span>
                      @elseif($ttl >= 100)
                      <span class="badge bg-green"> SUDAH LUNAS</span>
                      @endif
                    </div>  
                    <!-- <div class="knob-label text-green"><b> LUNAS</b></div>   -->
                  </div>
                </div>
              </div>
              <!-- /.row -->

              <div class="row ">
                <!-- accepted payments column -->
                <!-- <div class="col-sm-4">
                  <div class="text-center pt-4">
                    <input type="text" class="knob" value="30" data-width="120" data-height="120" data-fgColor="red" data-readonly="true" >
                    <div class="knob-label text-red"><b> BELUM LUNAS</b></div>  
                  </div>
                </div> -->
               
                <div class="col-sm-8">
                  <p class="lead"></p>

                  <div class="table-responsive">
                    <table class="table">
                      <tbody><tr>
                        <th style="width:50%">TOTAL KREDIT</th>
                        <td>@currency($ttlKredit)</td>
                      </tr>
                      <tr>
                        <th>TOTAL ANGSURAN</th>
                        
                        <td>@currency($item->ttl_angsuran)</td>
                       
                      </tr>
                      <tr class="text-red">
                        <th>SISA ANGSURAN</th>
                        <td>@currency($item->ttl_angsuran-$ttlKredit)</td>
                      </tr>
                      @endforeach
                    </tbody></table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
     
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    @endforeach

<!-- ./wrapper -->
<!-- Page specific script -->
  @endsection
