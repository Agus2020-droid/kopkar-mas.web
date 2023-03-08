
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>KOPKAR MAS | Simpanan</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('template/')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template/')}}/dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed">
<div class="wrapper">



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content -->
        <!-- Content Header (Page header) -->

    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-12">
          <div class="invoice p-3 mb-3">
              <!-- title row -->
                <div class="card-footer card-comments">
                    <div class="card-comment">
                    <!-- User image -->
                    <img src="logo1.png" alt="User Image" style="width: 50px;height: 50px">

                    <div class="comment-text" style="padding-left: 2%">
                        <span class="username" >
                        KOPKAR MAKMUR ALAM SEJAHTERA
                        <span class="text-muted float-right">Tanggal pengajuan : 27 February 2023</span>
                        </span><!-- /.username -->
                        Jl. Raya Salatiga No.23 Ds. Butuh Kab. Semarang Provinsi Jawa Tengah 
                    </div>
                    <!-- /.comment-text -->
                    </div>
                </div>
                <!-- /.col -->
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  <strong>Kreditur</strong>
                  <address>
                    <strong style="font-size: 22px">YAHYA AL MUNAWAR</strong><br>
                    Jalan Mawar No.24<br>
                    Kalikajar, Purbalingga<br>
                    Phone: 086535637777<br>
                    Email: yahya234@gmail.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <strong> Info Kredit</strong>
                  <address>
                    Kendaraan Bermotor<br>
                    YAMAHA N-MAX<br>
                    250 cc / Hitam<br>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>No. #007612</b><br>
                  <br>
                  <b>Order ID:</b> 4F3S8J<br>
                  <b>Jatuh Tempo:</b> 2/22/2014<br>
                  <b>Status:</b> <span class="badge bg-success">LUNAS</span>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Bulan</th>
                      <th>Tanggal</th>
                      <th>Angsuran</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>1</td>
                      <td>Call of Duty</td>
                      <td>455-981-221</td>
                      <td>$64.50</td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Need for Speed IV</td>
                      <td>247-925-726</td>
                      <td>$50.00</td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Monsters DVD</td>
                      <td>735-845-642</td>
                      <td>$10.70</td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Grown Ups Blue Ray</td>
                      <td>422-568-642</td>
                      <td>$25.99</td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row ">
                <!-- accepted payments column -->
                <div class="col-4">
                </div>
               
                <div class="col-8">
                  <p class="lead">Amount Due 2/22/2014</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tbody><tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>$250.30</td>
                      </tr>
                      <tr>
                        <th>Tax (9.3%)</th>
                        <td>$10.34</td>
                      </tr>
                      <tr>
                        <th>Shipping:</th>
                        <td>$5.80</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>$265.24</td>
                      </tr>
                    </tbody></table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->

            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  window.addEventListener("load", window.print());
</script>
      <!-- /.content -->
  </div>



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
