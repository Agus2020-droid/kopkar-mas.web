
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>KOPKAR MAS | Reset Password</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('template/')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('template/')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template/')}}/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box" style="box-shadow: 10px 10px 5px #aaaaaa;">
  <div class="login-logo">
    <!-- <a href="{{asset('template/')}}/index2.html"><b>Admin</b>LTE</a> -->
  </div>
  <!-- /.login-logo -->
  <div class="card">

    <div class="card-header text-center" style="background: url('bg.jpg') bottom;center;opacity: 0.9;position: cover">
        <img src="{{asset('template/logo1.png')}}" alt="" style="width: 100px"><br>
        <label style="font-size: 18px">KOPERASI KARYAWAN <br>
        MAKMUR ALAM SEJAHTERA</label>
        <p>Jalan Raya. Salatiga No.46 Butuh - Salatiga </p>
    </div>
    <div class="card-body login-card-body">
      <p class="login-box-msg">Masukan alamat email Anda</p>
      @if (session('status'))
      <div class="alert alert-success" role="alert">
          {{ session('status') }}
      </div>
  @endif
      <form action="{{ route('password.email') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Alamat Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block btn2" data-loading-text="<i class='fas fa-2x fa-sync-alt'></i> Processing">Kirim password reset</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- atau -</p>
        <a href="/" >
          Kembali halaman Login
        </a>
      </div>
      <!-- /.social-auth-links -->

      <!-- <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> -->
    </div>
    <!-- /.login-card-body -->
    <div class="card-footer" style="background: #d8f4fb">
      <center><small><strong> Alamat Kantor:</strong><br>Jalan Raya Salatiga Solo KM. 8, Butuh, Tengaran, Pongge, Butuh, Kec. Tengaran, Kabupaten Semarang<br> Jawa Tengah 50775 </small></center>
    </div>
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('template/')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('template/')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('template/')}}/dist/js/adminlte.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
<script type='text/javascript'>
  $('.btn2').on('click', function() {
    var $this = $(this);
  $this.button('loading');
    setTimeout(function() {
       $this.button('reset');
   }, 8000);
});
</script>
</body>
</html>
