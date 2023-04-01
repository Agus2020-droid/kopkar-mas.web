@extends('layouts.v_appAnggota')
@section('title','Profile')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <a href="/" style="font-size: 20px"><i class="fas fa-arrow-circle-left" ></i> Kembali</a>
            <div class="float-right">
              <a href="/anggota/edit-password" class="btn btn-sm btn-danger"><i class="fas fa-key" ></i> Ubah Password</a>
            </div>
          </div>
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
                <h5 class="widget-user-desc" >{{strtolower(auth()->user()->nik_kry)}}</h5>
              </div>
              <a href="" title="Change photo profile" data-toggle="modal" data-target="#modal-upload-foto">
              <div class="widget-user-image">
                <img class="img-circle bg-navy" src="{{url('storage/foto_user/'.auth()->user()->foto)}}" alt="User Avatar" style="width: 100px;height: 100px;object-fit: cover;object-position: 100% 0;">
              </div>
              </a>
              <div class="card-body">
                <div class="row pt-3">
                  <div class="col-4 border-right">
                    <!-- <div class="description-block">
                      <h5 class="description-header">3,200</h5>
                      <span class="description-text">SALES</span>
                    </div> -->
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-4 border-right">
                    <!-- <div class="description-block">
                      <h5 class="description-header">13,000</h5>
                      <span class="description-text">FOLLOWERS</span>
                    </div> -->
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-4">
                    <!-- <div class="description-block">
                      <h5 class="description-header">35</h5>
                      <span class="description-text">PRODUCTS</span>
                    </div> -->
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>

            <div class="card card-outline">
            <div class="card-header bg-navy" style="border-bottom: 5px solid navy"><h3 class="card-title" ><strong>BIODATA DIRI</strong></h3></div>
                    <div class="card-footer">
                        <form class="form-horizontal">
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-3 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-9">
                            <input type="email" class="form-control" id="inputName" value="{{strtoupper(auth()->user()->name)}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-3 col-form-label">No. KTP</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputEmail" value="{{strtoupper(auth()->user()->nik_ktp)}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-3 col-form-label">NIK Karyawan</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputEmail" value="{{strtoupper(auth()->user()->nik_kry)}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName2" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                            <input type="email" class="form-control" id="inputName2" value="{{strtoupper(auth()->user()->email)}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputSkills" class="col-sm-3 col-form-label">No. Whatsapp</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputSkills" value="{{strtoupper(auth()->user()->telp)}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputExperience" class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-9">
                            <textarea class="form-control" id="inputExperience" readonly>{{strtoupper(auth()->user()->alamat)}}</textarea>
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
    <div class="modal fade show" id="modal-upload-foto" style="display: none;" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
          <div id="load" class="overlay d-none">
              <i class="fas fa-4x fa-spinner fa-spin"></i><br>
              <h4 style="pl-4">Upload on progress .....</h4>
          </div> 
            <div class="modal-header bg-navy">
              <h5 class="text-center">Ganti Foto Profil</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="{{route('store.photo')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="card">
                <div class="card-header">
                <input type="file" name="image" id="image-input">
                </div>
                <div class="card-body text-center">
                  <img id="image-preview" style="width: 200px;height: 180px;">
                </div>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary" id="submitBtn" onclick="loading()" disabled>Upload</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <script>
        const imageInput = document.getElementById('image-input');
        const imagePreview = document.getElementById('image-preview');

        imageInput.addEventListener('change', () => {
          const file = imageInput.files[0];
          const reader = new FileReader();

          reader.addEventListener('load', () => {
            imagePreview.src = reader.result;
          });

          if (file) {
            reader.readAsDataURL(file);
          }
        });
      </script>
      <script type="text/javascript">
          const input1 = document.getElementById('image-input');
          const submitBtn = document.getElementById('submitBtn');

          // fungsi untuk memeriksa apakah semua input telah diisi
          function checkInputs() {
            if (input1.value.trim() !== '') {
              submitBtn.disabled = false;
            } else {
              submitBtn.disabled = true;
            }
          }

          // memeriksa input setiap kali pengguna mengetik
          input1.addEventListener('change', checkInputs);
        </script>
  @endsection
