
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>KOPKAR MAS | Log in</title>

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
    <div class="card-header text-center bg-navy" style="background: url('polkadot.png') right;opacity: 0.9;position: cover;background-size: 60%;100%;background-repeat: no-repeat">
        <img src="logo1.png" alt="" style="width: 100px"><br>
        <label style="font-size: 18px">KOPERASI KARYAWAN <br>
        MAKMUR ALAM SEJAHTERA</label>
    </div>
    <div class="card-body login-card-body" >
      <p class="login-box-msg">Masuk untuk memulai sesi Anda</p>

      <form action="{{ route('login') }}" method="post">
        @csrf
       
        <div class="input-group mb-3">
          <input name="telp" type="text" maxlength="13"onkeypress="return event.charCode >= 48 && event.charCode <=57" class="form-control @error('telp') is-invalid @enderror" placeholder="Nomor Whatsapp" value="{{ old('telp') }}" required autocomplete="telp" autofocus>
          <div class="input-group-append" >
            <div class="input-group-text" >
              <span class="fas fa-phone"></span>
            </div>
          </div>
          @error('telp')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="input-group mb-3">
          <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="current-password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
              <label for="remember">
                Ingatkan saya
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" data-loading-text="<i class='fas fa-2x fa-sync-alt'></i> Processing">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- <div class="social-auth-links text-center mb-3">
        <p>- atau -</p>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Masuk via Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->

      <p class="mb-1">
      @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}">Lupa password</a>
        @endif
      </p>
      <p class="mb-0">
        <a href="{{ route('register') }}" class="text-center">Register Akun</a>
      </p>
    </div>
    <!-- /.login-card-body -->
    <div class="card-footer" >
      <center><small><strong> Alamat Kantor:</strong><br>Jalan Raya Salatiga - Solo Km. 08, Ds. Butuh, <br> Kec. Tengaran, Kab. Semarang <br> JAWA TENGAH 50775 </small></center>
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
  $('.btn').on('click', function() {
    var $this = $(this);
  $this.button('loading');
    setTimeout(function() {
       $this.button('reset');
   }, 8000);
});
</script>
</body>
</html>
