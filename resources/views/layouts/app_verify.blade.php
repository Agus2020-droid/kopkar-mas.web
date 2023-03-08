
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>KOPKAR MAS | @yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('template/')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template/')}}/dist/css/adminlte.min.css">
  <!-- Select2 -->
  <!-- <link rel="stylesheet" href="{{asset('template/')}}/plugins/select2/css/select2.min.css"> -->
  <link rel="stylesheet" href="{{asset('template/')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="{{asset('template/')}}/plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="{{asset('template/')}}/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
    <a href="#" class="navbar-brand">
        <img src="{{asset('template/logo1.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-0" style="opacity: .8; height: 30px">
        <span class="brand-text font-weight-light">Kopkar <strong> MAS</strong></span>
      </a>


      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
       

      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
      
        <!-- Notifications Dropdown Menu -->
       
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" data-toggle="modal" data-target="#modal-logout" role="button">
            <i class="nav-icon fas fa-power-off text-danger" style="font-size: 20px"></i>
          </a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->
  <div class="modal fade show" id="modal-logout" style="display: none; padding-right: 17px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content bg-default">
       
        <div class="modal-body">
          <p>Keluar dari aplikasi ini ? </p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancel</button>
          <a class="btn btn-danger" href="{{ route('logout') }}"
              onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="icon-signout"></i>  Sign Out</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content -->
    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <a id="back-to-top" href="#" class="btn btn-primary back-to-top no-print" role="button" aria-label="Scroll to top" style="border-radius: 45em">
      <i class="fas fa-arrow-up"></i>
    </a>

  <!-- Main Footer -->
  <footer class="main-footer no-print">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      <!-- Anything you want -->
    </div>
    <!-- Default to the left -->
    <center><span>Copyright &copy; 2023 <a href="#">kopkarmas.com</a>.</span> All rights reserved.</center>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('template/')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('template/')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('template/')}}/dist/js/adminlte.min.js"></script>

</body>
</html>
