@extends('layouts.v_app')
@section('title','Simpanan Saya')
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
            <!-- <div class="card">
              <div class="card-body"> -->
              <div class="row">
                <div class="col-12 col-sm-6 col-md-12">
                  <div class="info-box bg-navy" style="background: url('polkadot.png') right;opacity: 0.9;position: cover;background-size: 60%;100%;background-repeat: no-repeat">
                    <span class="info-box-icon  elevation-1"><i class="fas fa-book-open"></i></span>

                    <div class="info-box-content" >
                      <span class="info-box-text">SALDO TABUNGAN</span>
                      @foreach ($saldo as $item)
                      <h3>@currency($item->simpananMasuk-$item->simpananKeluar)</h3>
                      <small>{{ strtoupper(terbilang($item->simpananMasuk-$item->simpananKeluar))}} RUPIAH</small>
                      @endforeach
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
              </div>
              <!-- </div>
            </div> -->
            @if($simpanan->isEmpty())
                    <div class="card card-outline">
                      <center>
                      <img src="search.png" alt="" style="width: 250px"><br>
                      <span>Belum ada transaksi</h5></span>
                    </div>
                    @else
              <div class="card card-outline">
                <div class="card-header bg-navy"><h3 class="card-title">Histori Transaksi</h3></div>
                    <div class="card-body">

                    <div class="tab-content">
                  
                  <!-- /.tab-pane -->
                  <div class="tab-pane active" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      @foreach ($simpanan as $item)
                      <div>
                        @if($item->stts == 1)
                        <i class="fas fa-arrow-right bg-primary"></i>
                        @elseif($item->stts == 0)
                        <i class="fas fa-arrow-left bg-danger"></i>
                        @endif
                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> {{Carbon\Carbon::parse($item->tgl_simpanan)->isoFormat("D/MM/Y")}}</span>
                          @if($item->stts == 1)
                          <h3 class="timeline-header"> <a href="#">Kredit</a></h3>
                        @elseif($item->stts == 0)
                        <h3 class="timeline-header"> <a href="#">Debit</a></h3>
                        @endif

                          <div class="timeline-body">
                          @if($item->stts == 1)
                          <i class="fas fa-arrow-right fa-circle text-blue"></i> 
                          @elseif($item->stts == 0)
                          <i class="fas fa-arrow-right fa-circle text-red"></i> 
                          @endif
                          <label style="font-size: 20px"> @currency($item->jml_simpanan)</label> <br><small>{{$item->ket}}</small>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      @endforeach
                      <!-- END timeline item -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->
                  <!-- /.tab-pane -->
                </div>
                    
                </div>
                </div><!-- /.card -->
            @endif

            </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
   
  @endsection
