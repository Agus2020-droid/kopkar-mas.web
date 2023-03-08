@extends('layouts.v_app')
@section('title','Data Anggota')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Data Anggota <small>{{Auth::user()->name}}</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Layout</a></li>
              <li class="breadcrumb-item active">Top Navigation</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with minimal features &amp; hover style</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><table id="example2" class="table table-bordered table-hover dataTable dtr-inline collapsed" aria-describedby="example2_info">
                  <thead>
                  <tr><th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Rendering engine</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Browser</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="display: none;">Platform(s)</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="display: none;">Engine version</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="display: none;">CSS grade</th></tr>
                  </thead>
                  <tbody>
                  <tr class="odd">
                    <td class="dtr-control sorting_1" tabindex="0">Gecko</td>
                    <td style="">Firefox 1.0</td>
                    <td style="display: none;">Win 98+ / OSX.2+</td>
                    <td style="display: none;">1.7</td>
                    <td style="display: none;">A</td>
                  </tr><tr class="even">
                    <td class="dtr-control sorting_1" tabindex="0">Gecko</td>
                    <td style="">Firefox 1.5</td>
                    <td style="display: none;">Win 98+ / OSX.2+</td>
                    <td style="display: none;">1.8</td>
                    <td style="display: none;">A</td>
                  </tr><tr class="odd">
                    <td class="dtr-control sorting_1" tabindex="0">Gecko</td>
                    <td style="">Firefox 2.0</td>
                    <td style="display: none;">Win 98+ / OSX.2+</td>
                    <td style="display: none;">1.8</td>
                    <td style="display: none;">A</td>
                  </tr><tr class="even">
                    <td class="dtr-control sorting_1" tabindex="0">Gecko</td>
                    <td style="">Firefox 3.0</td>
                    <td style="display: none;">Win 2k+ / OSX.3+</td>
                    <td style="display: none;">1.9</td>
                    <td style="display: none;">A</td>
                  </tr><tr class="odd">
                    <td class="sorting_1 dtr-control">Gecko</td>
                    <td style="">Camino 1.0</td>
                    <td style="display: none;">OSX.2+</td>
                    <td style="display: none;">1.8</td>
                    <td style="display: none;">A</td>
                  </tr><tr class="even">
                    <td class="sorting_1 dtr-control">Gecko</td>
                    <td style="">Camino 1.5</td>
                    <td style="display: none;">OSX.3+</td>
                    <td style="display: none;">1.8</td>
                    <td style="display: none;">A</td>
                  </tr><tr class="odd">
                    <td class="sorting_1 dtr-control">Gecko</td>
                    <td style="">Netscape 7.2</td>
                    <td style="display: none;">Win 95+ / Mac OS 8.6-9.2</td>
                    <td style="display: none;">1.7</td>
                    <td style="display: none;">A</td>
                  </tr><tr class="even">
                    <td class="sorting_1 dtr-control">Gecko</td>
                    <td style="">Netscape Browser 8</td>
                    <td style="display: none;">Win 98SE+</td>
                    <td style="display: none;">1.7</td>
                    <td style="display: none;">A</td>
                  </tr><tr class="odd">
                    <td class="sorting_1 dtr-control">Gecko</td>
                    <td style="">Netscape Navigator 9</td>
                    <td style="display: none;">Win 98+ / OSX.2+</td>
                    <td style="display: none;">1.8</td>
                    <td style="display: none;">A</td>
                  </tr><tr class="even">
                    <td class="sorting_1 dtr-control">Gecko</td>
                    <td style="">Mozilla 1.0</td>
                    <td style="display: none;">Win 95+ / OSX.1+</td>
                    <td style="display: none;">1</td>
                    <td style="display: none;">A</td>
                  </tr></tbody>
                  <tfoot>
                  <tr><th rowspan="1" colspan="1">Rendering engine</th><th rowspan="1" colspan="1" style="">Browser</th><th rowspan="1" colspan="1" style="display: none;">Platform(s)</th><th rowspan="1" colspan="1" style="display: none;">Engine version</th><th rowspan="1" colspan="1" style="display: none;">CSS grade</th></tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline collapsed" aria-describedby="example1_info">
                  <thead>
                  <tr><th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Rendering engine</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Browser</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="display: none;">Platform(s)</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="display: none;">Engine version</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="display: none;">CSS grade</th></tr>
                  </thead>
                  <tbody>
                  <tr class="odd">
                    <td class="dtr-control sorting_1" tabindex="0">Gecko</td>
                    <td style="">Firefox 1.0</td>
                    <td style="display: none;">Win 98+ / OSX.2+</td>
                    <td style="display: none;">1.7</td>
                    <td style="display: none;">A</td>
                  </tr><tr class="even">
                    <td class="dtr-control sorting_1" tabindex="0">Gecko</td>
                    <td style="">Firefox 1.5</td>
                    <td style="display: none;">Win 98+ / OSX.2+</td>
                    <td style="display: none;">1.8</td>
                    <td style="display: none;">A</td>
                  </tr><tr class="odd">
                    <td class="dtr-control sorting_1" tabindex="0">Gecko</td>
                    <td style="">Firefox 2.0</td>
                    <td style="display: none;">Win 98+ / OSX.2+</td>
                    <td style="display: none;">1.8</td>
                    <td style="display: none;">A</td>
                  </tr><tr class="even">
                    <td class="dtr-control sorting_1" tabindex="0">Gecko</td>
                    <td style="">Firefox 3.0</td>
                    <td style="display: none;">Win 2k+ / OSX.3+</td>
                    <td style="display: none;">1.9</td>
                    <td style="display: none;">A</td>
                  </tr><tr class="odd">
                    <td class="sorting_1 dtr-control">Gecko</td>
                    <td style="">Camino 1.0</td>
                    <td style="display: none;">OSX.2+</td>
                    <td style="display: none;">1.8</td>
                    <td style="display: none;">A</td>
                  </tr><tr class="even">
                    <td class="sorting_1 dtr-control">Gecko</td>
                    <td style="">Camino 1.5</td>
                    <td style="display: none;">OSX.3+</td>
                    <td style="display: none;">1.8</td>
                    <td style="display: none;">A</td>
                  </tr><tr class="odd">
                    <td class="sorting_1 dtr-control">Gecko</td>
                    <td style="">Netscape 7.2</td>
                    <td style="display: none;">Win 95+ / Mac OS 8.6-9.2</td>
                    <td style="display: none;">1.7</td>
                    <td style="display: none;">A</td>
                  </tr><tr class="even">
                    <td class="sorting_1 dtr-control">Gecko</td>
                    <td style="">Netscape Browser 8</td>
                    <td style="display: none;">Win 98SE+</td>
                    <td style="display: none;">1.7</td>
                    <td style="display: none;">A</td>
                  </tr><tr class="odd">
                    <td class="sorting_1 dtr-control">Gecko</td>
                    <td style="">Netscape Navigator 9</td>
                    <td style="display: none;">Win 98+ / OSX.2+</td>
                    <td style="display: none;">1.8</td>
                    <td style="display: none;">A</td>
                  </tr><tr class="even">
                    <td class="sorting_1 dtr-control">Gecko</td>
                    <td style="">Mozilla 1.0</td>
                    <td style="display: none;">Win 95+ / OSX.1+</td>
                    <td style="display: none;">1</td>
                    <td style="display: none;">A</td>
                  </tr></tbody>
                  <tfoot>
                  <tr><th rowspan="1" colspan="1">Rendering engine</th><th rowspan="1" colspan="1" style="">Browser</th><th rowspan="1" colspan="1" style="display: none;">Platform(s)</th><th rowspan="1" colspan="1" style="display: none;">Engine version</th><th rowspan="1" colspan="1" style="display: none;">CSS grade</th></tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
@endsection