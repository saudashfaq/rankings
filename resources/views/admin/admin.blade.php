 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rankings</title>

    <!-- Google Font: Source Sans Pro -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
                        <div class="row">

                            <div class="col-lg-2 col-6">
                                <!-- small box -->
                                <div class="small-box bg-light">
                                    <div class="inner">
                                        @foreach($keywords_ranking as $keyword)
                                            <h3>{{$keyword->google_organic_stats}}</h3>
                                        @endforeach()
                                        <p>Google Organic Change</p>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-2 col-6">
                                <!-- small box -->
                                <div class="small-box bg-light">
                                    <div class="inner">
                                        @foreach($keywords_ranking as $keyword)
                                            <h3>{{$keyword->google_organic_change}}</h3>
                                        @endforeach()
                                        <p>Google Organic Change</p>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-2 col-6">
                                <!-- small box -->
                                <div class="small-box bg-light">
                                    <div class="inner">
                                        @foreach($keywords_ranking as $keyword)
                                            <h3>{{$keyword->google_local_stats}}</h3>
                                        @endforeach()
                                        <p>Google Local Rankings</p>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-2 col-6">
                                <!-- small box -->
                                <div class="small-box bg-light">
                                    <div class="inner">
                                        @foreach($keywords_ranking as $keyword)
                                            <h3>{{$keyword->google_local_change}}</h3>
                                        @endforeach()
                                        <p>Google Local Change</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-6">
                                <!-- small box -->
                                <div class="small-box bg-light">
                                    <div class="inner">
                                        @foreach($keywords_ranking as $keyword)
                                            <h3>{{$keyword->google_mobile_stats}}</h3>
                                        @endforeach()
                                        <p>Google Mobile Rankings</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-6">
                                <!-- small box -->
                                <div class="small-box bg-light">
                                    <div class="inner">
                                        @foreach($keywords_ranking as $keyword)
                                            <h3>{{$keyword->google_mobile_change}}</h3>
                                        @endforeach()
                                        <p>Google Mobile Change</p>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Keyword</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div  id="html-content-holder" class="card-body">
                                        <a id="btn-Convert-Html2Image" style="margin-left:1050px" href="#">Download Report</a>
{{--                                        <div id="html-content-holder"  style="background-color: #F0F0F1; color: #00cc65; width: 700px; padding-left: 25px; padding-top: 10px;">--}}
                                            <strong>Ranking Report </strong>
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>Keyword</th>
                                                    <th>Location</th>
                                                    <th>Google Organic</th>
                                                    <th>Google Organic Ranking</th>
                                                    <th>Google Organic Change</th>
                                                    <th>Google url</th>
                                                    <th>Google Local</th>
                                                    <th>Google local Ranking</th>
                                                    <th>Google local change</th>
                                                    <th>Google Mobile</th>
                                                    <th>Google Mobile Ranking</th>
                                                    <th>Google Mobile change</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <tr>
                                                    @foreach($keywords_ranking as $keword)
                                                        <td>{{$keword->keywordshow->keyword}}</td>
{{--                                                        <td>{{$campaigns_loc[0]->campaigns}}</td>--}}
                                                        <td>static</td>
                                                        <td>{{$keword->google_organic}}</td>
                                                        <td>{{$keword->google_organic_stats}}</td>
                                                        <td>{{$keword->google_organic_change}}</td>
                                                        <td>it is static</td>
                                                        <td>{{$keword->google_local}}</td>
                                                        <td>{{$keword->google_local_stats}}</td>
                                                        <td>{{$keword->google_local_change}}</td>
                                                        <td>{{$keword->google_mobile}}</td>
                                                        <td>{{$keword->google_mobile_stats}}</td>
                                                        <td>{{$keword->google_mobile_change}}</td>
                                                </tr>

                                                @endforeach


                                                </tbody>
                                            </table>

                                    </div>
                                    <!-- /.card-body -->
                                                                <div class="card-footer clearfix">
                                                                    <ul class="pagination pagination-sm m-0 float-right">
                                                                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                                                                    </ul>
                                                                </div>
                                </div>
                                <!-- /.card -->

                            </div>
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
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
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

{{--@extends('layouts.main_layout')--}}
{{--@section('title') {{'Dashboard'}} @endsection--}}



{{--@section('page-title', 'Dashboard')--}}

{{--@section('bread-crumb')--}}

{{--    <li class="breadcrumb-item"><a href="redirects">Home</a></li>--}}
{{--    <li class="breadcrumb-item active">Dashboard</li>--}}

{{--@endsection--}}


{{--@section('section-title', 'Rankings')--}}

{{--@section('content')--}}

{{--        @livewire('users')--}}
{{--    <!-- Main content -->--}}
{{--    <section class="content">--}}
{{--        <div class="container-fluid">--}}
{{--            <!-- Small boxes (Stat box) -->--}}

{{--            <!-- /.row -->--}}
{{--            <!-- Main row -->--}}
{{--            <div class="row">--}}
{{--                <!-- Left col -->--}}
{{--                <div class="col-md-12">--}}
{{--                    <!-- Line chart -->--}}
{{--                    <div class="card card-primary card-outline">--}}
{{--                        <div class="card-header">--}}
{{--                            <h3 class="card-title">--}}
{{--                                <i class="far fa-chart-bar"></i>--}}
{{--                                Google Organic Change--}}
{{--                            </h3>--}}

{{--                            <div class="card-tools">--}}
{{--                                <button type="button" class="btn btn-tool" data-card-widget="collapse">--}}
{{--                                    <i class="fas fa-minus"></i>--}}
{{--                                </button>--}}
{{--                                <button type="button" class="btn btn-tool" data-card-widget="remove">--}}
{{--                                    <i class="fas fa-times"></i>--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <div id="line-chart" style="height: 300px;">--}}
{{--                                <canvas id="myChart" style="width:100%;max-width:600px"></canvas>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- /.card-body-->--}}
{{--                    </div>--}}
{{--                    <!-- /.card -->--}}
{{--                    <div class="row">--}}

{{--                        <div class="col-lg-2 col-6">--}}
{{--                            <!-- small box -->--}}
{{--                            <div class="small-box bg-light">--}}
{{--                                <div class="inner">--}}
{{--                                    @foreach($keywords_ranking as $keyword)--}}
{{--                                        <h3>{{$keyword->google_organic_stats}}</h3>--}}
{{--                                    @endforeach()--}}
{{--                                    <p>Google Organic Change</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- ./col -->--}}
{{--                        <div class="col-lg-2 col-6">--}}
{{--                            <!-- small box -->--}}
{{--                            <div class="small-box bg-light">--}}
{{--                                <div class="inner">--}}
{{--                                    @foreach($keywords_ranking as $keyword)--}}
{{--                                        <h3>{{$keyword->google_organic_change}}</h3>--}}
{{--                                    @endforeach()--}}
{{--                                    <p>Google Organic Change</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- ./col -->--}}
{{--                        <div class="col-lg-2 col-6">--}}
{{--                            <!-- small box -->--}}
{{--                            <div class="small-box bg-light">--}}
{{--                                <div class="inner">--}}
{{--                                    @foreach($keywords_ranking as $keyword)--}}
{{--                                        <h3>{{$keyword->google_local_stats}}</h3>--}}
{{--                                    @endforeach()--}}
{{--                                    <p>Google Local Rankings</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- ./col -->--}}
{{--                        <div class="col-lg-2 col-6">--}}
{{--                            <!-- small box -->--}}
{{--                            <div class="small-box bg-light">--}}
{{--                                <div class="inner">--}}
{{--                                    @foreach($keywords_ranking as $keyword)--}}
{{--                                        <h3>{{$keyword->google_local_change}}</h3>--}}
{{--                                    @endforeach()--}}
{{--                                    <p>Google Local Change</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-2 col-6">--}}
{{--                            <!-- small box -->--}}
{{--                            <div class="small-box bg-light">--}}
{{--                                <div class="inner">--}}
{{--                                    @foreach($keywords_ranking as $keyword)--}}
{{--                                        <h3>{{$keyword->google_mobile_stats}}</h3>--}}
{{--                                    @endforeach()--}}
{{--                                    <p>Google Mobile Rankings</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-2 col-6">--}}
{{--                            <!-- small box -->--}}
{{--                            <div class="small-box bg-light">--}}
{{--                                <div class="inner">--}}
{{--                                    @foreach($keywords_ranking as $keyword)--}}
{{--                                        <h3>{{$keyword->google_mobile_change}}</h3>--}}
{{--                                    @endforeach()--}}
{{--                                    <p>Google Mobile Change</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- ./col -->--}}
{{--                    </div>--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-12">--}}
{{--                            <div class="card">--}}
{{--                                <div class="card-header">--}}
{{--                                    <h3 class="card-title">Keyword</h3>--}}
{{--                                </div>--}}
{{--                                <!-- /.card-header -->--}}
{{--                                <div  class="card-body">--}}
{{--                                    <a id="btn-Convert-Html2Image" style="margin-left:300px" href="#">convertto image</a>--}}

{{--                                        <table class="table table-bordered">--}}
{{--                                            <thead>--}}
{{--                                            <tr>--}}
{{--                                                <th>Keyword</th>--}}
{{--                                                <th>Location</th>--}}
{{--                                                <th>Google Organic</th>--}}
{{--                                                <th>Google Organic Ranking</th>--}}
{{--                                                <th>Google Organic Change</th>--}}
{{--                                                <th>Google url</th>--}}
{{--                                                <th>Google Local</th>--}}
{{--                                                <th>Google local Ranking</th>--}}
{{--                                                <th>Google local change</th>--}}
{{--                                                <th>Google Mobile</th>--}}
{{--                                                <th>Google Mobile Ranking</th>--}}
{{--                                                <th>Google Mobile change</th>--}}
{{--                                            </tr>--}}
{{--                                            </thead>--}}
{{--                                            <tbody>--}}

{{--                                            <tr>--}}
{{--                                                @foreach($keywords_ranking as $keword)--}}
{{--                                                    <td>{{$keword->keywordshow->keyword}}</td>--}}
{{--                                                    <td>Static Location</td>--}}
{{--                                                    <td>{{$keword->google_organic}}</td>--}}
{{--                                                    <td>{{$keword->google_organic_stats}}</td>--}}
{{--                                                    <td>{{$keword->google_organic_change}}</td>--}}
{{--                                                    <td>it is static</td>--}}
{{--                                                    <td>{{$keword->google_local}}</td>--}}
{{--                                                    <td>{{$keword->google_local_stats}}</td>--}}
{{--                                                    <td>{{$keword->google_local_change}}</td>--}}
{{--                                                    <td>{{$keword->google_mobile}}</td>--}}
{{--                                                    <td>{{$keword->google_mobile_stats}}</td>--}}
{{--                                                    <td>{{$keword->google_mobile_change}}</td>--}}
{{--                                            </tr>--}}

{{--                                            @endforeach--}}


{{--                                            </tbody>--}}
{{--                                        </table>--}}
{{--                                </div>--}}
{{--                                <!-- /.card-body -->--}}
{{--                                                            <div class="card-footer clearfix">--}}
{{--                                                                <ul class="pagination pagination-sm m-0 float-right">--}}
{{--                                                                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>--}}
{{--                                                                    <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
{{--                                                                    <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                                                                    <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                                                                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>--}}
{{--                                                                </ul>--}}
{{--                                                            </div>--}}
{{--                            </div>--}}
{{--                            <!-- /.card -->--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- /.row (main row) -->--}}
{{--                </div><!-- /.container-fluid -->--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

{{--@endsection--}}

{{--<html>--}}
{{--<head>--}}
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>--}}
{{--</head>--}}
{{--<body style="border: 1px solid #808080; width: 750px; height: 350px">--}}
{{--<div id="html-content-holder"  style="background-color: #F0F0F1; color: #00cc65; width: 700px; padding-left: 25px; padding-top: 10px;">--}}
{{--    <strong>Ranking Report </strong><hr />--}}

{{--    <table class="table table-bordered">--}}
{{--        <thead>--}}
{{--        <tr>--}}
{{--            <th>Keyword</th>--}}
{{--            <th>Location</th>--}}
{{--            <th>Google Organic</th>--}}
{{--            <th>Google Organic Ranking</th>--}}
{{--            <th>Google Organic Change</th>--}}
{{--            <th>Google url</th>--}}
{{--            <th>Google Local</th>--}}
{{--            <th>Google local Ranking</th>--}}
{{--            <th>Google local change</th>--}}
{{--            <th>Google Mobile</th>--}}
{{--            <th>Google Mobile Ranking</th>--}}
{{--            <th>Google Mobile change</th>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}

{{--        <tr>--}}
{{--            @foreach($keywords_ranking as $keword)--}}
{{--                <td>{{$keword->keywordshow->keyword}}</td>--}}
{{--                <td>Static Location</td>--}}
{{--                <td>{{$keword->google_organic}}</td>--}}
{{--                <td>{{$keword->google_organic_stats}}</td>--}}
{{--                <td>{{$keword->google_organic_change}}</td>--}}
{{--                <td>it is static</td>--}}
{{--                <td>{{$keword->google_local}}</td>--}}
{{--                <td>{{$keword->google_local_stats}}</td>--}}
{{--                <td>{{$keword->google_local_change}}</td>--}}
{{--                <td>{{$keword->google_mobile}}</td>--}}
{{--                <td>{{$keword->google_mobile_stats}}</td>--}}
{{--                <td>{{$keword->google_mobile_change}}</td>--}}
{{--        </tr>--}}

{{--        @endforeach--}}


{{--        </tbody>--}}
{{--    </table>--}}
{{--</div>--}}

{{--<script>--}}
{{--    $(document).ready(function () {--}}
{{--        var element = $("#html-content-holder"); // global variable--}}
{{--        var getCanvas; //global variable--}}
{{--        html2canvas(element, {--}}
{{--            onrendered: function (canvas) {--}}
{{--                getCanvas = canvas;--}}
{{--            }--}}
{{--        });--}}

{{--        $("#btn-Convert-Html2Image").on('click', function () {--}}
{{--            var imgageData = getCanvas.toDataURL("image/png");--}}
{{--            //Now browser starts downloading it instead of just showing it--}}
{{--            var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");--}}
{{--            $("#btn-Convert-Html2Image").attr("download", "your_image.png").attr("href", newData);--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}
{{--</body>--}}
{{--</html>--}}
