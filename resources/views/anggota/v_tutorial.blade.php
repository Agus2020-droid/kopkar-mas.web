@extends('layouts.v_appAnggota')
@section('title','Tutorial')
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
            <div class="col-12">
            <div class="card">
              <!-- <div class="card-header"> -->
                <!-- <h3 class="card-title">Video Tutorial </h3> -->
                <div class="embed-responsive embed-responsive-16by9">
                      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/f0Oz3z8hhtc" allowfullscreen></iframe>
                    </div>
                <!-- <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div> -->
              <!-- </div> -->
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2">
                  <li class="item">
                    <div class="product-img">
                      <img src="{{asset('youtube.png')}}" alt="Product Image" style="width: 70px; height: 50px" >
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">Tutorial 1 - Pengajuan Kredit
                        </a>
                      <span class="product-description">
                        Samsung 32" 1080p 60Hz LED Smart HDTV.
                      </span>
                    </div>
                  </li>
                  <!-- /.item -->
                  <li class="item">
                    <div class="product-img">
                      <img src="{{asset('youtube.png')}}" alt="Product Image" style="width: 70px; height: 50px" >
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">Tutorial 2 - Cek Saldo Tabungan
                        </a>
                      <span class="product-description">
                        26" Mongoose Dolomite Men's 7-speed, Navy Blue.
                      </span>
                    </div>
                  </li>
                  <!-- /.item -->
                  <li class="item">
                    <div class="product-img">
                      <img src="{{asset('youtube.png')}}" alt="Product Image" style="width: 70px; height: 50px" >
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">Tutorial 3 - Simpanan 
                      </a>
                      <span class="product-description">
                        Xbox One Console Bundle with Halo Master Chief Collection.
                      </span>
                    </div>
                  </li>
                  <li class="item">
                    <div class="product-img">
                      <img src="{{asset('youtube.png')}}" alt="Product Image" style="width: 70px; height: 50px" >
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">Tutorial 4 - SHU
                      </a>
                      <span class="product-description">
                        Xbox One Console Bundle with Halo Master Chief Collection.
                      </span>
                    </div>
                  </li>
                  <li class="item">
                    <div class="product-img">
                      <img src="{{asset('youtube.png')}}" alt="Product Image" style="width: 70px; height: 50px" >
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">Tutorial 4 - Ganti Password 
                      </a>
                      <span class="product-description">
                        Xbox One Console Bundle with Halo Master Chief Collection.
                      </span>
                    </div>
                  </li>
                 
                  <!-- /.item -->

                  <!-- /.item -->
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center bg-navy">
                <a href="/" class="uppercase" style="color: red">www.kopkarmas.com</a>
              </div>
              <!-- /.card-footer -->
            </div>
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  @endsection
