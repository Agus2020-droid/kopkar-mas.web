
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Slip SHU</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('template/')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template/')}}/dist/css/adminlte.min.css">
</head>
<body>
<div class="wrapper">
    <div class="container">
  <!-- Main content -->
  <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <center><h2 class="page-header">
          <img src="<?php echo $pict ?>" width="110px" height="110px">     
          <br><br>
            KOPERASI KARYAWAN <br>MAKMUR ALAM SEJAHTERA</h2> 
            <small>Jalan Raya Salatiga - Solo KM. 8, Ds. Butuh, Kec. Tengaran <br> Kab. Semarang Jawa Tengah 50775</small>
          </center><hr style="border-top: 3px double #8c8b8b;">
        </div>
        @foreach ($shu as $item)
        <div class="col-xs-12">
            <center><label>-- SLIP SHU TAHUN BUKU {{$item->thn_buku}}--</label></center>
        </div><br>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-6 invoice-col">
        <table class="table"> 
            <tbody>
            
            <tr>
              <td>Nama</td>
              <td>:</td>
              <td>{{$item->nama}}</td>
            </tr>
            <tr>
              <td>NIK KTP</td>
              <td>:</td>
              <td>{{$item->nik_ktp}}</td>
            </tr>
            @endforeach
            <tr>
              <td>Alamat</td>
              <td>:</td>
                <td>{{auth()->user()->alamat}}</td>
            </tr>
            <tr>
            <td>Telp</td>
            <td>:</td>
              <td>{{auth()->user()->telp}}</td>
            </tr>
            <tr>
              <td>Email</td>
              <td>:</td>
                <td>{{auth()->user()->email}}</td>
            </tr>
            @foreach ($shu as $data)
            <tr>
              <td>Nama Bank</td>
              <td>:</td>
                <td>{{$data->nm_bank}}</td>
            </tr>
            <tr>
              <td>No. Rekening</td>
              <td>:</td>
                <td>{{$data->no_rek}}</td>
            </tr>
            </tbody>
          </table>
        </div>
        <div class="col-sm-6 invoice-col">
    
        </div>
        <!-- /.col -->
      </div><hr>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-12">
          <table class="table table-striped">
            <tbody>
             <tr>  
              <td>SHU Peran Kredit</td>
              <td style="text-align: right;">: </td>
              <td style="text-align: right;">Rp </td>
              <td style="text-align: right;">@formatUang($data->peran_krdt)</td>
            </tr>
            <tr>
              <td>SHU Peran Pengurus</td>
              <td style="text-align: right;">: </td>
              <td style="text-align: right;">Rp </td>
              <td style="text-align: right;">@formatUang($data->peran_peng)</td>
            </tr>
            <tr class="bg-black text-white">
              <td>JUMLAH SHU yang ditransfer</td>
              <td style="text-align: right;">: </td>
              <td style="text-align: right;">Rp </td>
              <td style="text-align: right;">@formatUang($data->jml_shu)</td>
            </tr>
            
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div><br><hr>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">

         
          <center>
            <small>Tanggal download : {{date(now())}}</small><br>
          <small><i>www.kopkarmas.com</i> </small>
        </center>
        </div>
        @endforeach
        <div class="col-xs-6">

       
        </div>

      </div>

    </section>
  <!-- /.content -->
    </div>
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
//   window.addEventListener("load", window.print());
</script>
</body>
</html>
