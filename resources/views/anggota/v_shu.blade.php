@extends('layouts.v_appAnggota')
@section('title','SHU')
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
        @if($shu->isEmpty())
          <div class="col-md-3 col-sm-6 col-12">
              <center>
              <img src="{{asset('search.png')}}" alt="" style="width: 250px"><br>
              <span>Belum ada data</h5></span>
            </div>
            @else
            @foreach ($shu as $item)
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box elevation-2">
                <span class="info-box-icon bg-navy" ><i class="fas fa-hand-holding-usd" ></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">TAHUN BUKU {{$item->thn_buku}}</span>
                        <span class="info-box-number">@currency($item->jml_shu)</span>
                        <div class="text-right">
                            <a href="/download-slip-shu/{{$item->id_shu}}" target="_blank"class="btn-lg"><i class="fas fa-download"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  @endsection
