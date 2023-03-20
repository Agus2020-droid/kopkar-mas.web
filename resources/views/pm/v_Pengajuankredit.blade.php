@extends('layouts.v_app')
@section('title','Pengajuan Kredit')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h4> PENGAJUAN KREDIT</h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Kredit Pinjaman</li>
            </ol>
          </div>
          <div class="col-sm-12">
              <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah-kredit">Tambah Kredit</button>
            </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-header bg-navy" style="background: url('{{asset('polkadot.png')}}') right;;opacity: 0.9;position: cover;background-size: 30%;60%;background-repeat: no-repeat">
                    <h3 class="card-title"><b style="font-size: 30px" class="mr-1">K</b>REDIT ANGGOTA </h3><br>
                    <hr class="mt-3 mb-0"style="border: 1px solid #fff">
                </div>
              <!-- /.card-header -->

                <div class="card-body">
                @if (session('sukses'))
                <div class="alert alert-success" role="alert">
                {{session('sukses')}}
                </div>
                @endif
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
                                <th>Petugas</th>
                                <th>Bendahara</th>
                                <th>Ketua</th>
                                <th>Progress</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php 
                            $no=1;
                            @endphp
                            @foreach ($kredit as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$data->kd_kredit}}</td>
                                <td>{{Carbon\Carbon::parse($data->tgl_kredit)->isoFormat("D-MM-YY")}}</td>
                                <td>{{$data->nama}},<br><a href="">{{$data->telp}}</a></td>
                                <td>{{$data->jns_krdt}}</td>
                                <td>@currency($data->nominal)</td>
                                <td>
                                    @if($data->app_ptgs == null)
                                    <i class="fas fa-exclamation-circle text-warning mr-1"></i> Proses
                                    @elseif($data->app_ptgs == 1)
                                    <i class="fas fa-check-circle text-success mr-1"></i> OK
                                    @elseif($data->app_ptgs == 0)
                                    <i class="fas fa-times-circle text-danger mr-1"></i> NO
                                    @else
                                    @endif
                                </td>
                                <td>
                                     @if($data->app_bnd == null)
                                    <i class="fas fa-exclamation-circle text-warning mr-1"></i> Proses
                                    @elseif($data->app_bnd == 1)
                                    <i class="fas fa-check-circle text-success mr-1"></i> OK
                                    @elseif($data->app_bnd == 0)
                                    <i class="fas fa-times-circle text-danger mr-1"></i> NO
                                    @else
                                    @endif
                                </td>
                                <td>
                                    @if($data->app_ket == null)
                                    <i class="fas fa-exclamation-circle text-warning mr-1"></i> Proses
                                    @elseif($data->app_ket == 1)
                                    <i class="fas fa-check-circle text-success mr-1"></i> OK
                                    @elseif($data->app_ket == 0)
                                    <i class="fas fa-times-circle text-danger mr-1"></i> NO
                                    @else
                                    @endif
                                </td>
                                <td>
                                  @php
                                  $sts = round($data->status/4*100,2);
                                  @endphp
                                <div class="progress progress-md active">
                                  <div class="progress-bar bg-aqua progress-bar-striped" role="progressbar"
                                      aria-valuemin="0" aria-valuemax="100" style="width: {{$sts}}%">
                                      <span>{{$sts}}%</span>
                                  </div>
                                </div>
                                <small><code>
                                    @if($sts == 0/4*100)
                                    VERIFIKASI
                                    @elseif($sts == 1/4*100)
                                    BELUM BS
                                    @elseif($sts == 2/4*100)
                                    PEMBELIAN
                                    @elseif($sts == 3/4*100)
                                    TUNGGU AKAD
                                    @elseif($sts == 4/4*100)
                                    COMPLETE
                                    @endif
                                    </code></small>
                                </td>
                                <td>
                                    <a href="/petugas-motor/approval-kredit/{{$data->id_kredit}}" class="btn btn-primary btn-sm <?php if($data->app_bnd == null) echo ''; else echo 'disabled';?>" style="border-radius: 5px"><i class="fas fa-edit"></i></a>
                                    <a href="" class="btn btn-warning btn-sm  <?php if($data->status == 2 || $data->status == 3) echo ''; else echo 'disabled';?>" data-toggle="modal" data-target="#modal-status{{$data->id_kredit}}" style="border-radius: 5px"><i class="fas fa-edit"></i></a>
                                </td>
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
    @foreach ($kredit as $data)
    <div class="modal fade show" id="modal-status{{$data->id_kredit}}" style="display: none;" aria-modal="true" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-navy">
              <h4 class="text-center">{{$data->kd_kredit}}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{route('update.statusKredit.petugas')}}" method="POST">
                @csrf
              <input name="kredit_id" type="hidden" value="{{$data->id_kredit}}">           
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Nama </label>
                <div class="col-sm-8">
                  <div class="form-group">
                    <input  type="text" class="form-control" value="{{$data->nama}}" readonly>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Jenis Kredit</label>
                <div class="col-sm-8">
                  <div class="form-group">
                    <input  type="text" class="form-control" value="{{$data->jns_krdt}}" readonly>
                  </div>
                </div>
              </div>

              <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Status<span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                  <div class="form-group">
                      <select name="status" class="form-control" style="width: 100%;" required>
                        <option value="">-Pilih-</option>
                        <option value="3">TUNGGU AKAD</option>
                        <option value="4">SUDAH AKAD</option>

                      </select>
                    </div>
                  </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              <button type="sumbit" class="btn btn-primary">Submit</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      @endforeach
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
              <form class="form-horizontal" action="{{route('simpan.kredit.byPetugas')}}" method="post">
              @csrf
              <!-- <input name="user_id" type="hidden" value="{{auth()->user()->id}}">
              <input name="nama" type="hidden" value="{{auth()->user()->name}}">
              <input name="nik_ktp" type="hidden" value="{{auth()->user()->nik_ktp}}"> -->
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
                      <label class="col-sm-4 col-form-label">Pilih Kreditur<span class="text-danger">*</span></label>
                      <div class="col-sm-8">
                        <div class="form-group">
                          <select name="user_id" class="form-control" style="width: 100%;" required>
                            <option value="">-Pilih-</option>
                            @foreach($user as $item)
                            <option value="{{$item->id}}" style="text-transform: uppercase">{{$item->name}} - {{$item->nik_ktp}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Jenis Kredit<span class="text-danger">*</span></label>
                      <div class="col-sm-8">
                        <div class="form-group">
                          <select id="jns_krdt" name="jns_krdt" class="form-control" style="width: 100%;" required>
                            <option value="">-Pilih-</option>
                            <option value="BARANG" class="d-none">BARANG</option>
                            <option value="KENDARAAN" >KENDARAAN</option>
                            <option value="TUNAI" class="d-none">TUNAI</option>
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