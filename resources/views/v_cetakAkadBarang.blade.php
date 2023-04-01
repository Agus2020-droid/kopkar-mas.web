
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cetak Akad Pembiayaan Barang</title>

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
    <div style="padding: 4%">
    <!-- title row -->
    <div class="row" >
      <div class="col-12">
        <div class="card-widget widget-user-2">
            <div class="widget-user-header">
                <div class="widget-user-image ">
                    <img class="img-circle" src="{{asset('template/logo1.png')}}" alt="User Avatar" style="width: 60px;height: 60px">
                </div>
                <p class="float-right">Tanggal Cetak : {{now()}}</p>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username pl-1">KOPERASI MAKMUR ALAM SEJAHTERA</h3>
                <h5 class="widget-user-desc pl-1">AKAD PEMBIAYAAN</h5>
                
            </div>
        </div>
        <div class="dropdown-divider" style="background-image: linear-gradient(90deg, navy, orange);height: 4px"></div>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    @foreach ($kredit as $data)
    <div class="row invoice-info">
        <div class="col-sm-12 text-center">
        <p style="font-size: 18px"><b><u>Nomor : {{$data->id_kredit}} / KMAS-AKAD / {{angkaRomawi(Carbon\Carbon::parse($data->tempo)->format("m"))}} /{{Carbon\Carbon::parse($data->tempo)->isoFormat("Y")}}
    </u> </b></p>
        
        </div>
      <div class="col-sm-12 invoice-col" >
        <address>
        Akad ini dibuat dan ditandatangani pada Rabu, 15 Februari 2023 di butuh oleh para pihak sebagai berikut :
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-1 invoice-col text-right">
        1.
      </div>
      <div class="col-sm-11 invoice-col">
        @foreach ($ketua as $item)
                <dl class="row">
                  <dt class="col-sm-2">Nama</dt>
                  <dd class="col-sm-10">{{$item->name}}</dd>
                  <dt class="col-sm-2">Alamat</dt>
                  <dd class="col-sm-10">{{$item->alamat}}</dd>
                  <!-- <dd class="col-sm-10 offset-sm-2">Donec id elit non mi porta gravida at eget metus.</dd> -->
                  <dt class="col-sm-2">No. KTP</dt>
                  <dd class="col-sm-10">{{$item->nik_ktp}}</dd>
                  <dt class="col-sm-2">No. NIK</dt>
                  <dd class="col-sm-10">{{$item->nik_kry}}
                  </dd>
                </dl>
               
      </div>
      <div class="col-sm-12 invoice-col" >
        <address>
        Yang dalam hal ini bertindak untuk dan atas nama  Koperasi Makmur Alam Sejahtera yang berkedudukan di Butuh dan berkantor di Butuh untuk selanjutnya disebut <b>PIHAK PERTAMA</b> 
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-1 invoice-col text-right">
        2.
      </div>
      <div class="col-sm-11 invoice-col">
                <dl class="row">
                  <dt class="col-sm-2">Nama</dt>
                  <dd class="col-sm-10">{{$data->nama}}</dd>
                  <dt class="col-sm-2">Alamat</dt>
                  <dd class="col-sm-10">Jl. Tritis Asri Rt 02/01 Sidorejo Kidul Salatiga.</dd>
                  <!-- <dd class="col-sm-10 offset-sm-2">Donec id elit non mi porta gravida at eget metus.</dd> -->
                  <dt class="col-sm-2">No. KTP</dt>
                  <dd class="col-sm-10">{{$data->nik_ktp}}</dd>
                  <dt class="col-sm-2">No. NIK</dt>
                  <dd class="col-sm-10">202084
                  </dd>
                </dl>
      </div>
      <!-- /.col -->
      <div class="col-sm-12 invoice-col" >
        <address>
        Yang dalam hal ini bertindak untuk dan atas nama diri sendiri, yang untuk  selanjutnya disebut <b> PIHAK KEDUA.</b>
        </address>
      </div>
      <div class="col-sm-12 invoice-col" >
        <address>
        Kedua belah pihak telah sepakat mengadakan perjanjian pembiayaan yang terikat dengan ketentuan dan syarat-syarat berikut ini.
        </address>
      </div>
      <div class="col-sm-12 invoice-col text-center" >
        <label>
        PASAL 1
        </label>
      </div>
      <div class="col-sm-12 invoice-col" >
        <address>
        PIHAK PERTAMA setuju untuk memberikan pinjaman pembiayaan kepada PIHAK KEDUA sebesar <b>@currency($data->nominal)</b> 
        </address>
      </div>
      <div class="col-sm-12 invoice-col" >
        <address>
        Kedua belah pihak telah sepakat bahwa akad ini terikat pada ketentuan-ketentuan dan syarat-syarat sebagai berikut :
        </address>
      </div>
        <div class="col-sm-1 invoice-col text-right">
            1.
        </div>
        <div class="col-sm-11 invoice-col">
            <address>
            Jangka waktu pembiayaan adalah  {{$data->tenor}}  Bulan, oleh karena itu perjanjian ini berlaku sejak ditanda tanganinya surat ini dan akan jatuh tempo pada {{Carbon\Carbon::parse($data->tempo)->isoFormat("D MMMM Y")}}
            </address>
        </div>
        <div class="col-sm-1 invoice-col text-right">
            2.
        </div>
        <div class="col-sm-11 invoice-col">
            <address>
            Pengembalian dana dilakukan melalui pemotongan gaji sebesar <b>@currency($data->angsuran)</b> 
            tiap bulannya selama  {{$data->tenor}} bulan
            </address>
        </div>

        <div class="col-sm-12 invoice-col text-center" >
        <label>
        PASAL 2
        </label>
      </div>
      <div class="col-sm-12 invoice-col" >
        <address>
        Kedua belah pihak telah bersepakat, bahwa segala sesuatu yang belum diatur dalam akad ini, akan diatur dalam addendum dan atau surat - surat dan atau lampiran - lampiran yang akan dibuat dan menjadi bagian yang tidak terpisahkan dengan perjanjian ini.
        </address>
      </div>
      <div class="col-sm-12 invoice-col" >
        <address>
        Demikian perjanjian ini dibuat dan ditandangani kedua belah pihak dengan sukarela tanpa paksaan dari pihak manapun.
        </address>
      </div>
      <div class="col-sm-12 invoice-col" >
        <address>
        Butuh, {{Carbon\Carbon::parse(now())->isoFormat("D MMMM Y")}}
        </address>
      </div>
      <div class="col-sm-4 invoice-col text-center" >
        <label>
        PIHAK PERTAMA
        </label>
      </div>
      <div class="col-sm-4 invoice-col text-center" >
        <label>
        PIHAK KEDUA
        </label>
      </div>
      <div class="col-sm-4 invoice-col text-center" >
        <label>
        VERIFIKASI
        </label>
      </div>
      <br><br><br><br>
      <div class="col-sm-4 invoice-col text-center" >
        <label>
        {{$item->name}}
        </label>
      </div>
      @endforeach
      <div class="col-sm-4 invoice-col text-center" >
        <label>
        {{$data->nama}}
        </label>
      </div>
      <div class="col-sm-4 invoice-col text-center" >
        <label>
        {{$bendahara}}
        </label>
      </div>
      <div class="col-sm-4 invoice-col text-center" >
        <label>

        </label>
      </div>
      <div class="col-sm-4 invoice-col text-center" >
        <label>

        </label>
      </div>
      <div class="col-sm-4 invoice-col text-center" >
        <span>
        Bendahara
        </span>
      </div>
    </div>
    <!-- /.row -->
    </div>
    @endforeach
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
