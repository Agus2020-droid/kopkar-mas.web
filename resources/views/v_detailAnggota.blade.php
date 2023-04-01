@extends('layouts.v_app')
@section('title','Detail Anggota')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row">
        @foreach ($users as $item)
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active"><a href="#">Simpanan Anggota</a></li>
            </ol> -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="col-12">
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
           
            <div class="card">
                <div class="card-header bg-navy" >
                    <h3 class="card-title"><b style="font-size: 30px" class="mr-1">D</b>ETAIL INFORMASI ANGGOTA</h3><br>
                    <div class="float-right btn-group">
                        
                      </div>
                    <hr class="mt-3 mb-0"style="border: 1px solid #fff">
                </div>
              <!-- /.card-header -->
                <div class="card-body">
                  
                <div class="card bg-light d-flex ">
  
                <div class="card-body pt-10">
                  <div class="row">
                  <div class="ribbon-wrapper">
                        <div class="ribbon bg-olive">
                          Aktif
                        </div>
                      </div>
                    <div class="col-sm-3  text-center pt-2">
                    <img src="{{url('storage/foto_user/user1.png')}}" alt="user-avatar" class="img-circle img-fluid mb-2" style="width: 150px;height: 150px"><br>
                    <span>NIK. {{$item->nik_kry}}</span>
                    </div>
                    <div class="col-sm-9 pl-4">
                      <form action="">

                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">NAMA LENGKAP</label>
                        <div class="col-sm-8">
                          <div class="form-group">
                            <input  type="text" class="form-control" value="{{$item->name}}" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">NO. IDENTITAS</label>
                        <div class="col-sm-8">
                          <div class="form-group">
                            <input  type="text" class="form-control" value="{{$item->nik_ktp}}" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">ALAMAT</label>
                        <div class="col-sm-8">
                          <div class="form-group">
                            <input  type="text" class="form-control" value="{{$item->alamat}}" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">EMAIL</label>
                        <div class="col-sm-8">
                          <div class="form-group">
                            <input  type="text" class="form-control" value="{{$item->email}}" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">NO. WA</label>
                        <div class="col-sm-8">
                          <div class="form-group">
                            <input  type="text" class="form-control" value="{{$item->telp}}" readonly>
                          </div>
                        </div>
                      </div>

                      </form>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-left">
                    <a href="#">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">SALDO TABUNGAN</label>
                        <div class="col-sm-8">
                          <div class="form-group">
                            @foreach ($simpanan as $item)
                            <input  type="text" class="form-control <?php if($item->simpananMasuk - $item->simpananKeluar >= 0) echo 'bg-success'; else echo 'bg-danger';?>" value="@currency($item->simpananMasuk - $item->simpananKeluar)" readonly>
                            @endforeach
                          </div>
                        </div>
                      </div>
                      </a>
                    <a href="#">
                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">SISA KREDIT</label>
                        <div class="col-sm-8">
                          <div class="form-group">
                            <input  type="text" class="form-control <?php if($angsuran-$kredit >= 0) echo 'bg-success'; else echo 'bg-danger';?>" value="@currency($angsuran-$kredit)" readonly>
                          </div>
                        </div>
                      </div>
                      </a>
                  </div>
                </div>
              </div>
                </div>
                @endforeach
          </div>
        </div>
      </div>
    </section>
@endsection