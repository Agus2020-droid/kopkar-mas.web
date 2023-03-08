@extends('layouts.v_appAnggota')
@section('title','Beranda')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <!-- <div class="col-sm-6">
            <h1 class="m-0"> Hi, <small style="text-transform: uppercase">{{auth()->user()->name}}</small></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
            </ol>
          </div> -->
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="card bg-primary" style="background: url('background.jpg') bottom;center;opacity: 0.9;position: cover; ">
              <div class="card-body">
                <h3 class="card-title"><span id="greating"></span>                 
                  <script>
                const time = new Date().getHours();
                let greeting;
                if (time < 10) {
                  greeting = "Selamat Pagi, &nbsp &nbsp <i class='fas fa-cloud-sun text-yellow' style='font-size: 30px'></i> ";
                } else if (time < 15) {
                  greeting = "Selamat Siang, &nbsp &nbsp <i class='fas fa-sun text-yellow' style='font-size: 30px'></i> ";
                } else if (time < 18) {
                  greeting = "Selamat Sore, &nbsp &nbsp <i class='fas fa-cloud-sun' style='font-size: 30px'></i> "
                } else {
                  greeting = "Selamat Malam, &nbsp &nbsp <i class='fas fa-cloud-moon' style='font-size: 30px'></i> ";
                }
                document.getElementById("greating").innerHTML = greeting;
                </script> <br><span style="font-size: 25px">{{auth()->user()->name}}</span></h3>
                <div class="float-right">
                <img src="logo1.png" alt="" style="width: 90px">
                  <!-- <p style="text-transform: uppercase; font-size:2vw">{{Carbon\Carbon::parse(now())->isoFormat("dddd")}}, {{Carbon\Carbon::parse(now())->isoFormat("D MMMM Y")}}</p> -->
                </div>
                <p class="card-text">
                  Some quick example text to build on the card title and make up the bulk of the card's
                  content.

                </p>
                <a href="#" class="btn btn-sm btn-default">Tutorial link</a>
                <!-- <a href="#" class="card-link">Another link</a> -->
              </div>
            </div>

            <div class="card card-outline">
              <div class="card-header"><h3 class="card-title">PILIHAN TRANSAKSI</h3></div>
              <div class="card-body text-center">
                <!-- <label>Pilihan Transaksi</label><br> -->
                <div class="row">
                <div class="col-lg-6">
                  <a href="/simpanan-anggota"class="btn btn-app btn-block" style="margin:0; min-height:100px">
                    <span class="badge bg-info" style="font-size: 20px">Rp. 2.300.000</span>
                    <i class="fas fa-barcode text-blue" style="font-size: 50px"></i><p style="font-size: 16px">SIMPANAN</p>
                  </a>
                </div>
                <div class="col-lg-6">
                <a href="/kredit-anggota" class="btn btn-app  btn-block" style="margin:0; min-height:100px">
                  <span class="badge bg-red" style="font-size: 20px">Rp. 8.000.000</span>
                  <i class="fas fa-users text-success" style="font-size: 50px"></i> <p style="font-size: 16px">KREDIT</p>
                </a>
                </div>
                <div class="col-lg-6">
                <a class="btn btn-app  btn-block" style="margin:0; min-height:100px">
                  <!-- <span class="badge bg-teal">67</span> -->
                  <i class="fas fa-inbox text-info" style="font-size: 50px"></i> <p style="font-size: 16px">SHU</p>
                </a>
                </div>
                <div class="col-lg-6">
                <a href="/profile-anggota"class="btn btn-app  btn-block" style="margin:0; min-height:100px">
                  <span class="badge " style="font-size: 20px;border-radius: 45em"><i class="fas fa-check-circle text-success"></i></span>
                  <i class="fas fa-user-circle text-black" style="font-size: 50px"></i> <p style="font-size: 16px">PROFIL</p>
                </a>
                </div>
                </div>
                <!-- <a class="btn btn-app bg-info">
                  <span class="badge bg-danger">531</span>
                  <i class="fas fa-heart"></i> Likes
                </a> -->
              </div>
            </div><!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">BERITA TERKINI</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class=""></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2" class=""></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="carousel-item">
                      <div class="card card-success">
                        <div class="card-body">
                          <div class="card mb-2 bg-gradient-dark">
                            <img class="d-block w-100" src="{{asset('template')}}/dist/img/photo1.png" alt="Dist Photo 1">
                            <div class="card-img-overlay d-flex flex-column justify-content-end">
                              <h5 class="card-title text-primary text-white">Card Title</h5>
                              <p class="card-text text-white pb-2 pt-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor.</p>
                              <a href="#" class="text-white">Last update 2 mins ago</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="carousel-item active">
                      <div class="card card-success">
                          <div class="card-body">
                            <div class="card mb-2 bg-gradient-dark">
                              <img class="d-block w-100" src="{{asset('template')}}/dist/img/photo2.png" alt="Dist Photo 1">
                              <div class="card-img-overlay d-flex flex-column justify-content-end">
                                <h5 class="card-title text-primary text-white">Card Title</h5>
                                <p class="card-text text-white pb-2 pt-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor.</p>
                                <a href="#" class="text-white">Last update 2 mins ago</a>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                      <div class="card card-success">
                        <div class="card-body">
                          <div class="card mb-2 bg-gradient-dark">
                            <img class="d-block w-100" src="{{asset('template')}}/dist/img/photo3.jpg" alt="Dist Photo 1">
                            <div class="card-img-overlay d-flex flex-column justify-content-end">
                              <h5 class="card-title text-primary text-white">Card Title</h5>
                              <p class="card-text text-white pb-2 pt-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor.</p>
                              <a href="#" class="text-white">Last update 2 mins ago</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-custom-icon" aria-hidden="true">
                      <i class="fas fa-chevron-left"></i>
                    </span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-custom-icon" aria-hidden="true">
                      <i class="fas fa-chevron-right"></i>
                    </span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>
              <!-- /.card-body -->
            </div>

          </div>


          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  @endsection
