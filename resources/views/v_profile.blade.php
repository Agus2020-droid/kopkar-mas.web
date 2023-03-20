@extends('layouts.v_app')
@section('title','Profile')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
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
          <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-navy text-white" style="background: url('polkadot.png') right;opacity: 0.9;position: cover;background-size: 60%;100%;background-repeat: no-repeat">
                <label class="widget-user-username" ><b> {{strtoupper(auth()->user()->name)}}</b></label>
                <h5 class="widget-user-desc" >{{strtolower(auth()->user()->email)}}</h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle" src="{{asset('template/')}}/dist/img/user1-128x128.jpg" alt="User Avatar">
              </div>
              <div class="card-body">
                <div class="row pt-3">
                  <div class="col-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">3,200</h5>
                      <span class="description-text">SALES</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">13,000</h5>
                      <span class="description-text">FOLLOWERS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-4">
                    <div class="description-block">
                      <h5 class="description-header">35</h5>
                      <span class="description-text">PRODUCTS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>

            <div class="card card-outline">
                <div class="card-header bg-warning" style="border-bottom: 5px solid navy"><h3 class="card-title" ><strong>BIODATA DIRI</strong></h3></div>
                    <div class="card-body">
                        <form class="form-horizontal">
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-3 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-9">
                            <input type="email" class="form-control" id="inputName" placeholder="{{strtoupper(auth()->user()->name)}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-3 col-form-label">Tempat / Tanggal Lahir</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputEmail" placeholder="Tempat" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName2" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                            <input type="email" class="form-control" id="inputName2" placeholder="{{strtoupper(auth()->user()->email)}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputExperience" class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-9">
                            <textarea class="form-control" id="inputExperience" placeholder="Experience" readonly></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputSkills" class="col-sm-3 col-form-label">No. Whatsapp</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputSkills" placeholder="{{strtoupper(auth()->user()->telp)}}" readonly>
                            </div>
                        </div>
                        
                        </form>
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
