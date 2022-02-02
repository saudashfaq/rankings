<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rankings</title>

    <!-- Google Font: Source Sans Pro -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
@include('layouts.nav-bar')
<!-- /.navbar -->

    <!-- Main Sidebar Container -->
@include('layouts.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active"> Main Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->

        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->

                <!-- /.row -->
                <!-- Main row -->
                <div class="row">

                        <div class="row">
                            <!-- Left col -->
                            <div class="col-md-12">
                                <!-- Line chart -->
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            <i class="far fa-chart-bar"></i>
                                            Google Organic Change
                                        </h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">

                                        <div id="line-chart" style="height: 300px;">
                                            <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                                        </div>
                                    </div>
                                    <!-- /.card-body-->
                                </div>
                                <!-- /.card -->

                        </div>


                        <div class="row">

                            <div class="col-lg-2 col-6">
                                <!-- small box -->
                                <div class="small-box bg-light">
                                    <div class="inner">
                                        <p>Google Organic Change</p>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-2 col-6">
                                <!-- small box -->
                                <div class="small-box bg-light">
                                    <div class="inner">
                                        <p>Google Organic Change</p>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-2 col-6">
                                <!-- small box -->
                                <div class="small-box bg-light">
                                    <div class="inner">
                                        <p>Google Local Rankings</p>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-2 col-6">
                                <!-- small box -->
                                <div class="small-box bg-light">
                                    <div class="inner">
                                        <p>Google Local Change</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-6">
                                <!-- small box -->
                                <div class="small-box bg-light">
                                    <div class="inner">
                                        <p>Google Mobile Rankings</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-6">
                                <!-- small box -->
                                <div class="small-box bg-light">
                                    <div class="inner">
                                        <p>Google Mobile Change</p>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->
                        </div>
                        <div class="row">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Today Positions</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div id="html-content-holder" class="card-body">
                                        <p>
                                            <a id="btn-Convert-Html2Image" style="margin-left:1050px" href=""> Download
                                                Report </a>
                                        </p>

                                        {{--                                        <div id="html-content-holder"  style="background-color: #F0F0F1; color: #00cc65; width: 700px; padding-left: 25px; padding-top: 10px;">--}}
                                        <strong> Ranking Report </strong>
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Keyword/<br>Date</th>
                                                <th>Location</th>

                                                <th colspan="2">Google Organic</th>


                                                <th colspan="2">Google Local</th>

                                                <th colspan="2">Google Mobile</th>

                                            </tr>
                                            <tr>
                                                <th></th>
                                                <th></th>


                                                <th>Ranking</th>
                                                <th>Change</th>


                                                <th>Ranking</th>
                                                <th>Change</th>

                                                <th>Ranking</th>
                                                <th>Change</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <tr>
                                                @foreach($keywords_rankings as $ranking)

                                                    <td>{{ $ranking->keyword->keyword }}</td>

                                                    <td>{{ $ranking->campaign->location_name }}</td>

                                                    <td>{{ $ranking->google_organic }}</td>
                                                    <td>{{ $ranking->google_organic_change }}</td>

                                                    <td>{{ $ranking->google_local }}</td>
                                                    <td>{{ $ranking->google_local_change }}</td>

                                                    <td>{{ $ranking->google_mobile }}</td>
                                                    <td>{{ $ranking->google_mobile_change }}</td>

                                            </tr>

                                            @endforeach


                                            </tbody>
                                        </table>

                                        {{ $keywords_rankings->links() }}
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer clearfix">

                                    </div>
                                </div>
                                <!-- /.card -->


                        </div>
                        <!-- /.row (main row) -->
                    </div><!-- /.container-fluid -->
                </div>
            </div>
        </section>

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@include('layouts.footer')

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>

<script>
    $(document).ready(function () {
        var element = $("#html-content-holder"); // global variable
        var getCanvas; //global variable
        html2canvas(element, {
            onrendered: function (canvas) {
                getCanvas = canvas;
            }
        });

        $("#btn-Convert-Html2Image").on('click', function () {
            var imgageData = getCanvas.toDataURL("image/png");
            //Now browser starts downloading it instead of just showing it
            var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");
            $("#btn-Convert-Html2Image").attr("download", "your_image.png").attr("href", newData);
        });
    });
</script>
</body>
</html>
