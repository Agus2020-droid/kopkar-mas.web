
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
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{asset('template/')}}/plugins/daterangepicker/daterangepicker.css">

  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{asset('template/')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{asset('template/')}}/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('template/')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <!-- <link rel="stylesheet" href="{{asset('template/')}}/plugins/select2/css/select2.min.css"> -->
  <link rel="stylesheet" href="{{asset('template/')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="{{asset('template/')}}/plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="{{asset('template/')}}/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="{{asset('template/')}}/plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template/')}}/dist/css/adminlte.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{asset('template/')}}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('template/')}}/plugins/toastr/toastr.min.css">
  
</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
    <a href="#" class="navbar-brand">
        <img src="{{asset('logo1.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-0" style="opacity: .8; height: 30px">
        <span class="brand-text font-weight-light">Kopkar <strong> MAS</strong></span>
      </a>

      <!-- <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button> -->

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <!-- <ul class="navbar-nav">
          <li class="nav-item">
            <a href="index3.html" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Contact</a>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Dropdown</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="#" class="dropdown-item">Some action </a></li>
              <li><a href="#" class="dropdown-item">Some other action</a></li>

              <li class="dropdown-divider"></li>

              <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Hover for action</a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                  <li>
                    <a tabindex="-1" href="#" class="dropdown-item">level 2</a>
                  </li>

                  <li class="dropdown-submenu">
                    <a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">level 2</a>
                    <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
                      <li><a href="#" class="dropdown-item">3rd level</a></li>
                      <li><a href="#" class="dropdown-item">3rd level</a></li>
                    </ul>
                  </li>

                  <li><a href="#" class="dropdown-item">level 2</a></li>
                  <li><a href="#" class="dropdown-item">level 2</a></li>
                </ul>
              </li>
            </ul>
          </li>
        </ul> -->

        <!-- SEARCH FORM -->
        <form class="form-inline ml-0 ml-md-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
      
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
            @if(count(auth()->user()->unreadNotifications) != 0)
          <span class="badge badge-danger navbar-badge">{{count(auth()->user()->unreadNotifications)}}</span>
          @else
            @endif
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">{{count(auth()->user()->unreadNotifications)}} Notifications</span>
          @foreach(auth()->user()->unreadNotifications as $notification)
          <div class="dropdown-divider"></div>
          <a href="{{route('markasread', $notification->id)}}" class="dropdown-item">
            <i class="fas fa-circle text-sm text-blue mr-2"></i> {{strip_tags($notification->data['user']['name'])}} <span class="float-right text-muted text-sm" style="font-size: 12px">{{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}</span><br> <span style="font-size: 14px">{{strip_tags($notification->data['request']['notif'])}}</span>
            
            <!-- <small class="float-right badge bg-blue text-sm">New</small> -->
          </a>
          @endforeach
            <div class="dropdown-divider"></div>
            <a href="{{route('bacaSemua')}}" class="dropdown-item dropdown-footer">Tandai baca semua</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" data-toggle="modal" data-target="#modal-logout" role="button">
            <i class="nav-icon fas fa-sign-out-alt text-danger" style="font-size: 25px"></i>
          </a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->
  <div class="modal fade show" id="modal-logout" style="display: none; padding-right: 17px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content bg-default">
        <div class="modal-header bg-navy">
          <!-- <h4 class="modal-title"></h4> -->
          <img src="{{asset('logo1.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-0" style="opacity: .8; height: 50px">
          <span class="brand-text font-weight-light pl-2"><strong>{{auth()->user()->name}}</strong><br><small class="text-mute">{{auth()->user()->email}}</small></span>
          
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Keluar dari aplikasi? </p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancel</button>
          <a class="btn btn-danger" href="{{ route('logout') }}"
              onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>  Sign Out</a>
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

  <a id="back-to-top" href="#" class="btn btn-primary back-to-top no-print" role="button" aria-label="Scroll to top" >
      <i class="fas fa-chevron-up"></i>
    </a>

  <!-- Main Footer -->
  <footer class="main-footer no-print">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      
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
<!-- Bootstrap4 Duallistbox -->
<script src="{{asset('template/')}}/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="{{asset('template/')}}/plugins/moment/moment.min.js"></script>
<script src="{{asset('template/')}}/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="{{asset('template/')}}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="{{asset('template/')}}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('template/')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="{{asset('template/')}}/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- Select2 -->
<!-- <script src="{{asset('template/')}}/plugins/select2/js/select2.full.min.js"></script> -->
<!-- BS-Stepper -->
<script src="{{asset('template/')}}/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="{{asset('template/')}}/plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('template/')}}/dist/js/adminlte.min.js"></script>
<!-- jQuery Knob -->
<script src="{{asset('template/')}}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('template/')}}/plugins/sparklines/sparkline.js"></script>
<!-- SweetAlert2 -->
<script src="{{asset('template/')}}/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="{{asset('template/')}}/plugins/toastr/toastr.min.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money rupiah
    // $('[data-mask]').inputmask()
    $( '[uang]' ).inputmask('000.000.000', {reverse: true});
    

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>
<script type="text/javascript">
  /* Tanpa Rupiah */
  var tanpa_rupiah = document.getElementById('tanpa-rupiah');
    tanpa_rupiah.addEventListener('keyup', function(e)
    {
        tanpa_rupiah.value = formatRupiah(this.value);
    });
    
    /* Dengan Rupiah */
    var dengan_rupiah = document.getElementById('dengan-rupiah');
    dengan_rupiah.addEventListener('keyup', function(e)
    {
        dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
    });
    
    /* Fungsi */
    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>

<script type="text/javascript">
  const jns = document.getElementById('jns_krdt');
  const f_brg = document.getElementById('f-barang');
  const f_mtr = document.getElementById('f-k');
  const f_tn = document.getElementById('f-tunai');
  const f_beli = document.getElementById('f-beli');


  const nb = document.getElementById('nm_brg')
  const sp = document.getElementById('spek')
  const jb = document.getElementById('jml_brng')
  const nk = document.getElementById('nm_kendaraan')
  const ju = document.getElementById('jml_unit')
  const kn = document.getElementById('kondisi')
  const bo = document.getElementById('beli_oleh')
  const kp = document.getElementById('keperluan')

  const knds1 = document.getElementById('radioPrimary1')
  const knds2 = document.getElementById('radioPrimary2')
  const beli1 = document.getElementById('radioDanger1')
  const beli2 = document.getElementById('radioDanger2')
  var x = document.getElementById('tenor');


  jns.addEventListener('change', () => {
    // Periksa nilai select input
    if (jns.value == 'BARANG') {
      // Jika nilai adalah 1, tampilkan elemen
      f_brg.style.display = 'block';
      f_mtr.style.display = 'none';
      f_tn.style.display = 'none';
      f_beli.style.display = 'block';
      nk.value = '';
      ju.value = '';
      knds1.checked = false;
      knds2.checked = false;
      kp.value = '';
      x.options[1].classList.remove('d-none');
      x.options[2].classList.remove('d-none');
      x.options[3].classList.remove('d-none');
      x.options[4].classList.remove('d-none');
      x.options[5].classList.remove('d-none');
      x.options[6].classList.remove('d-none');
      x.options[7].classList.remove('d-none');
      x.options[8].classList.remove('d-none');
      x.options[9].classList.remove('d-none');
      x.options[10].classList.remove('d-none');
      x.options[11].classList.remove('d-none');
      x.options[12].classList.remove('d-none');
      x.options[13].classList.add('d-none');
      x.options[14].classList.add('d-none');
      x.options[15].classList.add('d-none');
      x.options[16].classList.add('d-none');
      x.options[17].classList.add('d-none');
      x.options[18].classList.add('d-none');
      x.options[19].classList.add('d-none');
      x.options[20].classList.add('d-none');
      x.options[21].classList.add('d-none');
      x.options[22].classList.add('d-none');
      x.options[23].classList.add('d-none');
      x.options[24].classList.add('d-none');
    } else if (jns.value == 'KENDARAAN') {
      // Jika nilai adalah 1, tampilkan elemen
      f_brg.style.display = 'none';
      f_mtr.style.display = 'block';
      f_tn.style.display = 'none';
      f_beli.style.display = 'block';
      nb.value = '';
      jb.value = '';
      kp.value = '';
      x.options[1].classList.remove('d-none');
      x.options[2].classList.remove('d-none');
      x.options[3].classList.remove('d-none');
      x.options[4].classList.remove('d-none');
      x.options[5].classList.remove('d-none');
      x.options[6].classList.remove('d-none');
      x.options[7].classList.remove('d-none');
      x.options[8].classList.remove('d-none');
      x.options[9].classList.remove('d-none');
      x.options[10].classList.remove('d-none');
      x.options[11].classList.remove('d-none');
      x.options[12].classList.remove('d-none');
      x.options[13].classList.remove('d-none');
      x.options[14].classList.remove('d-none');
      x.options[15].classList.remove('d-none');
      x.options[16].classList.remove('d-none');
      x.options[17].classList.remove('d-none');
      x.options[18].classList.remove('d-none');
      x.options[19].classList.remove('d-none');
      x.options[20].classList.remove('d-none');
      x.options[21].classList.remove('d-none');
      x.options[22].classList.remove('d-none');
      x.options[23].classList.remove('d-none');
      x.options[24].classList.remove('d-none');
    } else if (jns.value == 'TUNAI') {
      // Jika nilai adalah 1, tampilkan elemen
      f_brg.style.display = 'none';
      f_mtr.style.display = 'none';
      f_tn.style.display = 'block';
      f_beli.style.display = 'none';
      nk.value = '';
      ju.value = '';
      knds1.checked = false;
      knds2.checked = false;
      nb.value = '';
      jb.value = '';
      beli1.checked = false;
      beli2.checked = false;
      sp.value = '';
      x.options[1].classList.remove('d-none');
      x.options[2].classList.remove('d-none');
      x.options[3].classList.remove('d-none');
      x.options[4].classList.remove('d-none');
      x.options[5].classList.remove('d-none');
      x.options[6].classList.add('d-none');
      x.options[7].classList.add('d-none');
      x.options[8].classList.add('d-none');
      x.options[9].classList.add('d-none');
      x.options[10].classList.add('d-none');
      x.options[11].classList.add('d-none');
      x.options[12].classList.add('d-none');
      x.options[13].classList.add('d-none');
      x.options[14].classList.add('d-none');
      x.options[15].classList.add('d-none');
      x.options[16].classList.add('d-none');
      x.options[17].classList.add('d-none');
      x.options[18].classList.add('d-none');
      x.options[19].classList.add('d-none');
      x.options[20].classList.add('d-none');
      x.options[21].classList.add('d-none');
      x.options[22].classList.add('d-none');
      x.options[23].classList.add('d-none');
      x.options[24].classList.add('d-none');
    } else {
      // Jika nilai bukan 1, sembunyikan elemen
      f_brg.style.display = 'none';
      f_mtr.style.display = 'none';
      f_tn.style.display = 'none';
      f_beli.style.display = 'none';
      x.options[1].classList.add('d-none');
      x.options[2].classList.add('d-none');
      x.options[3].classList.add('d-none');
      x.options[4].classList.add('d-none');
      x.options[5].classList.add('d-none');
      x.options[6].classList.add('d-none');
      x.options[7].classList.add('d-none');
      x.options[8].classList.add('d-none');
      x.options[9].classList.add('d-none');
      x.options[10].classList.add('d-none');
      x.options[11].classList.add('d-none');
      x.options[12].classList.add('d-none');
      x.options[13].classList.add('d-none');
      x.options[14].classList.add('d-none');
      x.options[15].classList.add('d-none');
      x.options[16].classList.add('d-none');
      x.options[17].classList.add('d-none');
      x.options[18].classList.add('d-none');
      x.options[19].classList.add('d-none');
      x.options[20].classList.add('d-none');
      x.options[21].classList.add('d-none');
      x.options[22].classList.add('d-none');
      x.options[23].classList.add('d-none');
      x.options[24].classList.add('d-none');
    }
  });

</script>
<script>
  $(function () {
    /* jQueryKnob */

    $('.knob').knob({
      /*change : function (value) {
       //console.log("change : " + value);
       },
       release : function (value) {
       console.log("release : " + value);
       },
       cancel : function () {
       console.log("cancel : " + this.value);
       },*/
      draw: function () {

        // "tron" case
        if (this.$.data('skin') == 'tron') {

          var a   = this.angle(this.cv)  // Angle
            ,
              sa  = this.startAngle          // Previous start angle
            ,
              sat = this.startAngle         // Start angle
            ,
              ea                            // Previous end angle
            ,
              eat = sat + a                 // End angle
            ,
              r   = true

          this.g.lineWidth = this.lineWidth

          this.o.cursor
          && (sat = eat - 0.3)
          && (eat = eat + 0.3)

          if (this.o.displayPrevious) {
            ea = this.startAngle + this.angle(this.value)
            this.o.cursor
            && (sa = ea - 0.3)
            && (ea = ea + 0.3)
            this.g.beginPath()
            this.g.strokeStyle = this.previousColor
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false)
            this.g.stroke()
          }

          this.g.beginPath()
          this.g.strokeStyle = r ? this.o.fgColor : this.fgColor
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false)
          this.g.stroke()

          this.g.lineWidth = 2
          this.g.beginPath()
          this.g.strokeStyle = this.o.fgColor
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false)
          this.g.stroke()

          return false
        }
      }
    })
    /* END JQUERY KNOB */

    //INITIALIZE SPARKLINE CHARTS
    var sparkline1 = new Sparkline($('#sparkline-1')[0], { width: 240, height: 70, lineColor: '#92c1dc', endColor: '#92c1dc' })
    var sparkline2 = new Sparkline($('#sparkline-2')[0], { width: 240, height: 70, lineColor: '#f56954', endColor: '#f56954' })
    var sparkline3 = new Sparkline($('#sparkline-3')[0], { width: 240, height: 70, lineColor: '#3af221', endColor: '#3af221' })

    sparkline1.draw([1000, 1200, 920, 927, 931, 1027, 819, 930, 1021])
    sparkline2.draw([515, 519, 520, 522, 652, 810, 370, 627, 319, 630, 921])
    sparkline3.draw([15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21])

  })
</script>
<script type="text/javascript">
$('#cb').click(function(){
    //If the checkbox is checked.
    if($(this).is(':checked')){
        //Enable the submit button.
        $('#btnSubmit').attr("disabled", false);
    } else{
        //If it is not checked, disable the button.
        $('#btnSubmit').attr("disabled", true);
    }
});
</script>
<script>
  $("input[type='submit']").click(function(){
  $("div.spanner").addClass("show");
  $("div.overlay").addClass("show");
});
</script>
<!-- sweatalert -->
@if (Session::has('success'))
  <script>
      $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    Toast.fire({
        icon: "success",
        title: "{!! session::get('success') !!}"
      })
    })
  </script>
@endif
@if (Session::has('error'))
  <script>
      $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    Toast.fire({
          icon: "error",
          title: "{!! session::get('error') !!}"
        })
    })
  </script>
@endif
@if (Session::has('warning'))
  <script>
      $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
  
    Toast.fire({
      icon: "warning",
      title: "{!! session::get('warning') !!}"
    })

    })
  </script>
@endif
@if (Session::has('question'))
  <script>
      $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    Toast.fire({
      icon: "question",
      title: "{!! session::get('question') !!}"
    })
    

    })
  </script>
@endif
</body>
</html>
