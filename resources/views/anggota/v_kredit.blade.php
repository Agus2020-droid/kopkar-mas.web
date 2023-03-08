@extends('layouts.v_appAnggota')
@section('title','Home')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <a href="/" style="font-size: 20px"><i class="fas fa-arrow-circle-left" ></i> Kembali</a>
            <div class="float-right">
            <!-- <button class="btn btn-sm " style="font-size: 20px;background:#32599e;color:#fff" data-toggle="modal" data-target="#tambah-kredit"><i class="fas fa-plus-circle" ></i> Tambah Kredit</button> -->
            <a href="#" class="btn btn-primary no-print" role="button" aria-label="Scroll to top" style="border-radius: 45em" data-toggle="modal" data-target="#tambah-kredit">
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
            <div class="card" style="background:#32599e;color:#fff">
              <div class="card-body">
                <h3 class="card-title">KREDIT PINJAMAN</h3>
                <p class="card-text" style="font-size: 40px">
                  Rp. 8.000.000
                </p>
                <p  >( DELAPAN JUTA RUPIAH )</p>
              </div>
            </div>

            <div class="card card-outline">
                <div class="card-header"><h3 class="card-title">KREDIT ANDA</h3></div>
                  <div class="card-body">
                      <a href="/detail-kredit-anggota">
                          <div class="card">
                              <div class="card-header" style="background:#32599e;color:#fff">
                              <p class="card-title ">No. Kredit : P-123</p>
                              <p class="card-title float-right">{{Carbon\Carbon::parse(now())->isoFormat("D/MM/Y")}}</p>
                              </div>
                              <div class="card-body">
                                <dl class="row">
                                    <dt class="col-sm-4">Nama Barang</dt>
                                    <dd class="col-sm-8">Kendaraan Bermotor</dd>
                                    <dt class="col-sm-4">Merk</dt>
                                    <dd class="col-sm-8">Yamaha MIO.</dd>
                                    <dt class="col-sm-4">Jumlah Kredit</dt>
                                    <dd class="col-sm-8">RP. 9.000.000</dd>
                                    <dt class="col-sm-4">Status</dt>
                                    <dd class="col-sm-8"><span class="badge bg-danger">Belum Lunas</span></dd>
                                </dl>
                              </div>
                          </div>
                      </a>
                      <a href="/detail-kredit-anggota">
                          <div class="card">
                              <div class="card-header" style="background:#32599e;color:#fff">
                              <p class="card-title ">No. Kredit : P-123</p>
                              <p class="card-title float-right">{{Carbon\Carbon::parse(now())->isoFormat("D/MM/Y")}}</p>
                              </div>
                              <div class="card-body">
                                <dl class="row">
                                    <dt class="col-sm-4">Nama Barang</dt>
                                    <dd class="col-sm-8">Kendaraan Bermotor</dd>
                                    <dt class="col-sm-4">Merk</dt>
                                    <dd class="col-sm-8">Yamaha MIO.</dd>
                                    <dt class="col-sm-4">Jumlah Kredit</dt>
                                    <dd class="col-sm-8">RP. 9.000.000</dd>
                                    <dt class="col-sm-4">Status</dt>
                                    <dd class="col-sm-8"><span class="badge bg-danger">Belum Lunas</span></dd>
                                </dl>
                              </div>
                          </div>
                      </a>
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
            <div class="modal-header" style="background:#32599e;color:#fff">
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
                              <input id="nm_brg" name="nm_brg" type="text" class="form-control" >
                            </div>
                          </div>
                        </div>
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Spesifikasi<span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                              <div class="form-group">
                                <input id="spek" name="spek" type="text" class="form-control" >
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
                      <div id="f-kendaraan" style="display: none;">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Nama Kendaraan<span class="text-danger">*</span></label>
                          <div class="col-sm-8">
                            <div class="form-group">
                              <input name="nm_kendaraan" type="text" class="form-control">
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label"> Jumlah Unit<span class="text-danger">*</span></label>
                          <div class="col-sm-8">
                            <div class="form-group">
                              <input name="jml_unit" type="text" class="form-control" >
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Kondisi<span class="text-danger">*</span></label>
                          <div class="col-sm-8">
                          <div class="form-group clearfix">
                            <div class="icheck-primary ">
                              <input name="kondisi" type="radio" id="kondisi1"  >
                              <label for="radioPrimary1">Baru
                              </label>
                            </div>
                            <div class="icheck-primary d-inline">
                              <input type="radio" id="kondisi2" name="kondisi">
                              <label for="radioPrimary2">Bekas
                              </label>
                            </div>
                          </div>
                            </div>
                        </div>
                      </div>
                      <!-- End option 2 -->
                      <!-- dibeli oleh -->
                      <div id="f-beli" style="display: none;">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Pembelian Oleh<span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                              <div class="form-group clearfix">
                                <div class="icheck-primary ">
                                  <input type="radio" id="radioPrimary1" name="beli_oleh" >
                                  <label for="radioPrimary1">Koperasi
                                  </label>
                                </div>
                                <div class="icheck-primary d-inline">
                                  <input type="radio" id="radioPrimary2" name="beli_oleh">
                                  <label for="radioPrimary2">Sendiri
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
                              <input name="keperluan" type="text" class="form-control" >
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
                              </select>
                            </div>
                          </div>
                        </div>

                      <button type="button"class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                      <button type="button"class="btn btn-primary" onclick="stepper.next()">Next</button>
                    </div>
                    <div id="konfirmasi-part" class="content active dstepper-block" role="tabpanel" aria-labelledby="konfirmasi-part-trigger">
                    <ul class="list-group list-group-unbordered mb-3">
                      <li class="list-group-item">
                        <b>Jenis Kredit</b> <a class="float-right" id="v_jns_krdt"> </a>
                      </li>
                      <li class="list-group-item" id="list2" style="display:none">
                        <b>Nama Barang</b> <a class="float-right" id="v_nm_brg"></a>
                      </li>
                      <li class="list-group-item" id="list3" style="display:none">
                        <b>Spesifikasi</b> <a class="float-right"></a>
                      </li>
                      <li class="list-group-item" id="list4" style="display:none">
                        <b>Nama Kendaraan</b> <a class="float-right"></a>
                      </li>
                      <li class="list-group-item" id="list5" style="display:none">
                        <b>Jumlah barang</b> <a class="float-right"></a>
                      </li>
                      <li class="list-group-item" id="list6" style="display:none">
                        <b>Kondisi</b> <a class="float-right"></a>
                      </li>
                      <li class="list-group-item" id="list7" style="display:none">
                        <b>Pembelian oleh</b> <a class="float-right"></a>
                      </li>
                      <li class="list-group-item" id="list8" style="display:none">
                        <b>Keperluan</b> <a class="float-right"></a>
                      </li>
                      <li class="list-group-item">
                        <b>Nominal Plafon <small>(Rupiah)</small></b> <a class="float-right" id="v_plafon"></a>
                      </li>
                      <li class="list-group-item">
                        <b>Tenor <small>(bulan)</small></b> <a class="float-right" id="v_tenor"></a>
                      </li>
                      <li class="list-group-item">
                        <b>Angsuran <small>(per bulan)</small></b> <a class="float-right" id="v_angsuran"></a>
                      </li>

                    </ul>

                      <button type="button" class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                      <button type="submit" class="btn btn-primary">Submit</button>
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
