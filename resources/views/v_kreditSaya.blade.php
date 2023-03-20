@extends('layouts.v_app')
@section('title','Kredit Saya')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="float-right">
            <!-- <button class="btn btn-sm " style="font-size: 20px;background:#32599e;color:#fff" data-toggle="modal" data-target="#tambah-kredit"><i class="fas fa-plus-circle" ></i> Tambah Kredit</button> -->
            <a href="#" class="btn btn-primary no-print <?php if($ttlKredit-$ttlAngsuran == 0) echo ''; else echo 'disabled';?>" role="button" aria-label="Scroll to top" style="border-radius: 45em" data-toggle="modal" data-target="#tambah-kredit">
              <i class="fas fa-plus"></i> Kredit Baru
            </a>            
          </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="card bg-navy" style="background: url('polkadot.png') right;opacity: 0.9;position: cover;background-size: 60%;100%;background-repeat: no-repeat">
              <div class="card-body">
                <h3 class="card-title">KREDIT PINJAMAN</h3>
                <p class="card-text" style="font-size: 40px">
                  @currency($ttlKredit)
                </p>
                <p>
                  @php 
                  function terbilang($ttlKredit)
        {
        $ttlKredit = abs($ttlKredit);
        $words = array(
            0 => '',
            1 => 'satu',
            2 => 'dua',
            3 => 'tiga',
            4 => 'empat',
            5 => 'lima',
            6 => 'enam',
            7 => 'tujuh',
            8 => 'delapan',
            9 => 'sembilan',
            10 => 'sepuluh',
            11 => 'sebelas',
            12 => 'dua belas',
            13 => 'tiga belas',
            14 => 'empat belas',
            15 => 'lima belas',
            16 => 'enam belas',
            17 => 'tujuh belas',
            18 => 'delapan belas',
            19 => 'sembilan belas',
            20 => 'dua puluh',
            30 => 'tiga puluh',
            40 => 'empat puluh',
            50 => 'lima puluh',
            60 => 'enam puluh',
            70 => 'tujuh puluh',
            80 => 'delapan puluh',
            90 => 'sembilan puluh'
        );
     
        $result = '';
     
        if ($ttlKredit < 0) {
            $result = 'minus ';
            $ttlKredit = abs($ttlKredit);
        }
     
        if ($ttlKredit < 21) {
            $result .= $words[$ttlKredit];
        } elseif ($ttlKredit < 100) {
            $result .= $words[10 * floor($ttlKredit / 10)];
            $remainder = $ttlKredit % 10;
            if ($remainder) {
                $result .= ' ' . $words[$remainder];
            }
        } elseif ($ttlKredit < 200) {
            $result .= 'seratus ' . terbilang($ttlKredit - 100);
        } elseif ($ttlKredit < 1000) {
            $result .= terbilang(floor($ttlKredit / 100)) . ' ratus ' . terbilang($ttlKredit % 100);
        } elseif ($ttlKredit < 2000) {
            $result .= 'seribu ' . terbilang($ttlKredit - 1000);
        } elseif ($ttlKredit < 1000000) {
            $result .= terbilang(floor($ttlKredit / 1000)) . ' ribu ' . terbilang($ttlKredit % 1000);
        } elseif ($ttlKredit < 1000000000) {
            $result .= terbilang(floor($ttlKredit / 1000000)) . ' juta ' . terbilang($ttlKredit % 1000000);
        } else {
            $result .= 'Lebih dari 1 milyar';
        }
     
        return $result;
          }
                  @endphp
                  {{ strtoupper(terbilang($ttlKredit))}} RUPIAH
                </p>
              </div>
            </div>
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
            <div class="card card-outline" >
                <div class="card-header"><h3 class="card-title">KREDIT ANDA</h3></div>
                  <div class="card-body">
                    @if($kredit->isEmpty())
                    <div class="box box-primary" style="box-border: 1px solid navy p-3">
                      <center>
                      <img src="search.png" alt="" style="width: 250px"><br>
                      <span>Belum ada transaksi</h5></span>
                    </div>
                    @else
                    @foreach($kredit as $data)
                      <a href="/detail-kredit-saya/{{$data->id_kredit}}">
                          <div class="card">
                              <div class="card-header bg-navy" >
                              <p class="card-title ">No. Kredit : {{$data->kd_kredit}}</p>
                              <p class="card-title float-right">{{Carbon\Carbon::parse($data->tgl_kredit)->isoFormat("D MMMM Y")}}</p>
                              </div>
                              <div class="card-body">
                                <dl class="row">
                                    <dt class="col-sm-2">Jenis Kredit</dt>
                                    <dd class="col-sm-10">{{$data->jns_krdt}}</dd>
                                    <dt class="col-sm-2 <?php if($data->keperluan == null) echo 'd-none'; else ''; ?>">Keperluan </dt>
                                    <dd class="col-sm-10 <?php if($data->keperluan == null) echo 'd-none'; else ''; ?>">{{$data->keperluan}}</dd>
                                    <dt class="col-sm-2 <?php if($data->nm_brg == null) echo 'd-none'; else ''; ?>">Nama Barang</dt>
                                    <dd class="col-sm-10 <?php if($data->nm_brg == null) echo 'd-none'; else ''; ?>">{{$data->nm_brg}}</dd>
                                    <dt class="col-sm-2">Nominal Plafon</dt>
                                    <dd class="col-sm-10">@currency($data->nominal)</dd>
                                    <dt class="col-sm-2">Tenor</dt>
                                    <dd class="col-sm-10">{{$data->tenor}} bulan</dd>
                                    <dt class="col-sm-2">Angsuran</dt>
                                    <dd class="col-sm-10">@currency($data->angsuran)/bulan</dd>
                                    <dt class="col-sm-2">Proses Pengajuan</dt>
                                    <dd class="col-sm-10">
                                      @php 
                                      $p1 = ($data->app_ptgs);
                                      $p2 = ($data->app_bnd);
                                      $p3 = ($data->app_ket);
                                      $tl = ($p1+$p2+$p3);
                                      $rt = round($tl/3*100,2);
                                      @endphp
                                      <div class="card  p-3" style="border: 1.5px solid navy">
                                        <div class="row">
                                          <div class="col-sm-4">
                                            <dl class="row">
                                              <dt class="col-sm-4"> Petugas</dt>
                                              <dd class="col-sm-8"><i class="fas fa-share mr-1"></i>  
                                                @if($data->app_ptgs == 1)
                                                <i class="fas fa-check-circle text-success mr-1"></i> Approved
                                                @elseif($data->app_ptgs == 2)
                                                <i class="fas fa-times-circle text-danger mr-1"></i> Not Approved
                                                @else
                                                <i class="fas fa-exclamation-circle text-warning mr-1"></i> Wait approval
                                                @endif
                                              </dd>
                                            </dl>
                                          </div>
                                          <div class="col-sm-4">
                                          <dl class="row">
                                              <dt class="col-sm-4"> Bendahara</dt>
                                              <dd class="col-sm-8"><i class="fas fa-share mr-1"></i> 
                                                @if($data->app_bnd == 1)
                                                <i class="fas fa-check-circle text-success mr-1"></i> Approved
                                                @elseif($data->app_bnd == 2)
                                                <i class="fas fa-times-circle text-danger mr-1"></i> Not Approved
                                                @else
                                                <i class="fas fa-exclamation-circle text-warning mr-1"></i> Wait approval
                                                @endif
                                              </dd>
                                            </dl>
                                         
                                          </div>
                                          <div class="col-sm-4">
                                            <dl class="row">
                                              <dt class="col-sm-4"> Ketua</dt>
                                              <dd class="col-sm-8"><i class="fas fa-share mr-1"></i> 
                                                @if($data->app_ket == 1)
                                                <i class="fas fa-check-circle text-success mr-1"></i> Approved
                                                @elseif($data->app_ket == 2)
                                                <i class="fas fa-times-circle text-danger  mr-1"></i> Not Approved
                                                @else
                                                <i class="fas fa-exclamation-circle text-warning  mr-1"></i> Wait approval
                                                @endif
                                              </dd>
                                            </dl>
                                          </div>
                                        </div>
                                        <!-- end card -->
                                        @if($tl != 3)
                                        <div class="progress mb-3">
                                          <div class="progress-bar bg-warning"role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: {{$rt}}%">
                                            <span style="font-size: 16px"><small> {{$rt}}% Complete</small></span>
                                          </div>
                                        </div>
                                        @else
                                        <div class="progress mb-3">
                                          <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: {{$rt}}%">
                                            <span style="font-size: 16px"><small> {{$rt}}% Complete</small></span>
                                          </div>
                                        </div>
                                        @endif
                                      </div>
                                    </dd>
                                    <dt class="col-sm-2">Status</dt>
                                  
                                    <dd class="col-sm-5">
                                    @if($data->total == $data->jmlAngsuran)
                                    <span class="badge bg-success">LUNAS</span>
                                    @elseif($data->total < $data->jmlAngsuran)
                                    <span class="badge bg-warning">LEBIH ANGSURAN</span>
                                    @elseif($data->total > $data->jmlAngsuran)
                                    <span class="badge bg-danger">BELUM LUNAS</span>
                                    @endif
                                    </dd>
                                </dl>
                              </div>
                          </div>
                      </a>
                      @endforeach
                      @endif
                  </div>
                </div><!-- /.card -->
            </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
      <div class="modal fade show" id="tambah-kredit" style="display: none; padding-right: 17px;" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-navy">
              <h5 class="modal-title">Form Pengajuan Kredit</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" action="{{route('simpan.kredit')}}" method="post">
              @csrf
              <input name="user_id" type="hidden" value="{{auth()->user()->id}}">
              <input name="nama" type="hidden" value="{{auth()->user()->name}}">
              <input name="nik_ktp" type="hidden" value="{{auth()->user()->nik_ktp}}">
                <div class="card-body p-0">
                <div class="bs-stepper linear">
                  <div class="bs-stepper-header" role="tablist">
                    <!-- your steps here -->
                    <div class="step" data-target="#jenis-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="jenis-part" id="jenis-part-trigger" aria-selected="false" disabled="disabled">
                        <span class="bs-stepper-circle"><i class="fas fa-info"></i></span>
                        <span class="bs-stepper-label">Info Kredit</span>
                      </button>
                    </div>
                    <div class="line"></div>
                    <div class="step " data-target="#information-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger" aria-selected="true">
                        <span class="bs-stepper-circle"><i class="fas fa-dollar-sign"></i></span>
                        <span class="bs-stepper-label">Nominal</span>
                      </button>
                    </div>

                    <div class="line"></div>
                    <div class="step active" data-target="#konfirmasi-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="konfirmasi-part" id="konfirmasi-part-trigger" aria-selected="true">
                        <span class="bs-stepper-circle"><i class="fas fa-question"></i></span>
                        <span class="bs-stepper-label">Konfirmasi </span>
                      </button>
                    </div>
                  </div>
                  <div class="bs-stepper-content">
                    <!-- your steps content here -->
                    <div id="jenis-part" class="content" role="tabpanel" aria-labelledby="jenis-part-trigger">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Jenis Kredit<span class="text-danger">*</span></label>
                      <div class="col-sm-8">
                        <div class="form-group">
                          <select id="jns_krdt" name="jns_krdt" class="form-control" style="width: 100%;" required>
                            <option value="">-Pilih-</option>
                            <option value="BARANG">BARANG</option>
                            <option value="KENDARAAN">KENDARAAN</option>
                            <option value="TUNAI">TUNAI</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- option 1 -->     
                      <div id="f-barang" style="display: none;">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Nama Barang<span class="text-danger">*</span></label>
                          <div class="col-sm-8">
                            <div class="form-group">
                              <input id="nm_brg" name="nm_brg" type="text" class="form-control">
                              @error('nm_brg')
                                  <div>{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                        </div>

                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Jumlah Barang<span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                              <div class="form-group">
                                <input id="jml_brng" name="jml_brng" type="text" class="form-control">
                              </div>
                            </div>
                          </div>
                      </div>
                      <!-- End option 1 -->
                      <!-- option 2 -->     
                      <div id="f-k" style="display: none;">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Merk/Brand Kendaraan<span class="text-danger">*</span></label>
                          <div class="col-sm-8">
                            <div class="form-group">
                              <input id="nm_kendaraan" name="nm_kendaraan" type="text" class="form-control">
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Kondisi<span class="text-danger">*</span></label>
                          <div class="col-sm-8">
                            <div class="form-group clearfix">
                              <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary1" name="kondisi" value="Baru">
                                <label for="radioPrimary1">Baru
                                </label>
                              </div>
                              <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary2" name="kondisi" value="bekas">
                                <label for="radioPrimary2">Bekas
                                </label>
                              </div>
                            </div>
                        </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label"> Jumlah Unit<span class="text-danger">*</span></label>
                          <div class="col-sm-8">
                            <div class="form-group">
                              <input id="jml_unit" name="jml_unit" type="number" class="form-control" >
                            </div>
                          </div>
                        </div>

                      </div>
                      <!-- End option 2 -->
                      <!-- dibeli oleh -->
                      <div id="f-beli" style="display: none;">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Spesifikasi<span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                              <div class="form-group">
                                <input id="spek" name="spek" type="text" class="form-control" >
                              </div>
                            </div>
                          </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Pembelian Oleh<span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                              <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                  <input type="radio" id="radioDanger1" name="beli_oleh" value="Koperasi">
                                  <label for="radioDanger1">Koperasi
                                  </label>
                                </div>
                                <div class="icheck-primary d-inline">
                                  <input type="radio" id="radioDanger2" name="beli_oleh" value="Sendiri">
                                  <label for="radioDanger2">Sendiri
                                  </label>
                                </div>
                            </div>
                          </div>
                      </div>
                    </div>
                  <!-- end dibeli oleh -->
                  <!-- option 3 -->     
                    <div id="f-tunai" style="display: none;">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Keperluan<span class="text-danger">*</span></label>
                          <div class="col-sm-8">
                            <div class="form-group">
                              <input id="keperluan" name="keperluan" type="text" class="form-control" >
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- End option 3 -->
                      <button type="button"class="btn btn-primary" onclick="stepper.next()">Next</button>
                    </div>
                    <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                      <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Nominal Kredit <small>(Rupiah)</small><span class="text-danger">*</span></label>
                          <div class="col-sm-8">
                            <div class="form-group">
                              <input name="plafon" type="text" class="form-control" id="tanpa-rupiah" required>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Tenor<span class="text-danger">*</span></label>
                          <div class="col-sm-8">
                          <div class="form-group">
                              <select id="tenor" name="tenor" class="form-control" style="width: 100%;" required>
                                <option value="">-Pilih-</option>
                                <option value="1">1 Bulan</option>
                                <option value="2">2 Bulan</option>
                                <option value="3">3 Bulan</option>
                                <option value="4">4 Bulan</option>
                                <option value="5">5 Bulan</option>
                                <option value="6">6 Bulan</option>
                                <option value="7">7 Bulan</option>
                                <option value="8">8 Bulan</option>
                                <option value="9">9 Bulan</option>
                                <option value="10">10 Bulan</option>
                                <option value="11">11 Bulan</option>
                                <option value="12">12 Bulan</option>
                                <option value="13">13 Bulan</option>
                                <option value="14">14 Bulan</option>
                                <option value="15">15 Bulan</option>
                                <option value="16">16 Bulan</option>
                                <option value="17">17 Bulan</option>
                                <option value="18">18 Bulan</option>
                                <option value="19">19 Bulan</option>
                                <option value="20">20 Bulan</option>
                                <option value="21">21 Bulan</option>
                                <option value="22">22 Bulan</option>
                                <option value="23">23 Bulan</option>
                                <option value="24">24 Bulan</option>
                              </select>
                            </div>
                          </div>
                        </div>

                      <button type="button"class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                      <button id="btnView" type="button"class="btn btn-primary" onclick="stepper.next()">Next</button>
                    </div>
                    <div id="konfirmasi-part" class="content active dstepper-block" role="tabpanel" aria-labelledby="konfirmasi-part-trigger">
                    <div class="alert alert-default alert-dismissible" style="border: 2px solid orange">
                      <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> -->
                      <h5><i class="icon fas fa-info"></i> Info!</h5>
                      Pastikan data yang di isikan sudah sesuai. Berikan tanda [V] pada check box di bawah ini untuk melanjutkan! <br>
                      <div class="form-group row">
                        <div class="offset-sm-0 col-sm-12">
                          <div class="checkbox">
                            <label>
                              <input id="cb" type="checkbox"> Saya setuju
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                      <button type="button" class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                      <button id="btnSubmit"type="submit" class="btn btn-primary" disabled="true">Submit</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Next</button>
            </div> -->
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
  @endsection
