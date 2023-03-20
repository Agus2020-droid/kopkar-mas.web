@extends('layouts.v_appAnggota')
@section('title','Simpanan')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <a href="/" style="font-size: 20px"><i class="fas fa-arrow-circle-left" ></i> Kembali</a>
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
            <!-- <div class="card">
              <div class="card-body"> -->
              <div class="row">
                <div class="col-12 col-sm-6 col-md-4">
                  <div class="info-box bg-navy" style="background: url('polkadot.png') right;opacity: 0.9;position: cover;background-size: 60%;100%;background-repeat: no-repeat">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                    <div class="info-box-content" >
                      <span class="info-box-text">TOTAL SIMPANAN</span>
                      <span class="info-box-number">
                        Rp. 10.000.000
                        <small></small>
                      </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-4">
                  <div class="info-box mb-3 bg-navy" style="background: url('polkadot.png') right;opacity: 0.9;position: cover;background-size: 60%;100%;background-repeat: no-repeat">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">POKOK</span>
                      <span class="info-box-number">R.4.000.000</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-4">
                  <div class="info-box mb-3 bg-navy" style="background: url('polkadot.png') right;opacity: 0.9;position: cover;background-size: 60%;100%;background-repeat: no-repeat">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">WAJIB</span>
                      <span class="info-box-number">@currency(20000000)</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
              </div>
              <!-- </div>
            </div> -->

            <div class="card card-outline">
                <div class="card-header bg-navy"><h3 class="card-title">Histori Transaksi</h3></div>
                    <div class="card-body">

                    <div class="tab-content">
                  
                  <!-- /.tab-pane -->
                  <div class="tab-pane active" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <div>
                        <i class="fas fa-arrow-right bg-primary"></i>
                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> {{Carbon\Carbon::parse(now())->isoFormat("D/MM/Y")}}</span>
                          <h3 class="timeline-header"> <a href="#">Kas Masuk</a></h3>
                          <div class="timeline-body">
                          <i class="fas fa-arrow-right fa-circle text-blue"></i> <label style="font-size: 20px"> Rp. 100.000</label> <br><small>(Tunai)</small>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-arrow-left bg-danger"></i>
                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> {{Carbon\Carbon::parse(now())->isoFormat("D/MM/Y")}}</span>
                          <h3 class="timeline-header"> <a href="#">Kas Keluar</a></h3>
                          <div class="timeline-body">
                          <i class="fas fa-arrow-right fa-circle text-red"></i> <label style="font-size: 20px"> Rp. 25.000</label> <br><small>(Tunai)</small>
                          </div>
                        </div>
                      </div>
                     
                      <div>
                        <i class="fas fa-arrow-left bg-danger"></i>
                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> {{Carbon\Carbon::parse(now())->isoFormat("D/MM/Y")}}</span>
                          <h3 class="timeline-header"> <a href="#">Kas Keluar</a></h3>
                          <div class="timeline-body">
                          <i class="fas fa-arrow-right fa-circle text-red"></i> <label style="font-size: 20px"> Rp. 25.000</label> <br><small>(Tunai)</small>
                          </div>
                        </div>
                      </div>
                    
                      <!-- END timeline item -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                    
                </div>
                </div><!-- /.card -->
            </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  @endsection
