@extends('layouts.v_app')
@section('title','Edit Password')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <!-- <a href="/" style="font-size: 20px"><i class="fas fa-arrow-circle-left" ></i> Kembali</a> -->

          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
        <div class="col-md-12">
            @if (count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <!-- jquery validation -->
            <div class="card">
              <div class="card-header bg-navy">
                <h3 class="card-title">Ganti Password <small><i>(Change Password)</i></small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="{{route('update.password')}}"novalidate="novalidate" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Password Lama</label>
                    <input type="password" name="old_password" class="form-control" id="exampleInputEmail1" placeholder="Masukan password lama">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password Baru</label>
                    <input type="password" name="new_password" class="form-control" id="exampleInputPassword1" placeholder="Password Baru">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Konfirmasi Password</label>
                    <input type="password" name="confirm_password" class="form-control" id="exampleInputPassword1" placeholder="Konfirmasi Password">
                  </div>
                  <div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                      <label class="custom-control-label" for="exampleCheck1">Saya yakin akan merubah password akun ini.</label>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
            </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  @endsection
