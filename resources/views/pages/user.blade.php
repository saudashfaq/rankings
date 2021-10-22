
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->


    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->

    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <x-app-layout>

        @include('layouts.nav-bar')

        @include('layouts.sidebar')

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">

                            <h1>User Management</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="redirects">Home</a></li>
                                <li class="breadcrumb-item active">User Management</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">User Table</h3>
{{--                                    <button type="button" style="margin-left:920px " class="btn btn-light ">--}}
{{--                                        <a href="teammemberinvitationform">--}}
{{--                                            <i class="fa fa-user-plus"></i>--}}
{{--                                            Add New user--}}
{{--                                        </a>--}}
{{--                                    </button>--}}
                                </div>
                            @include('livewire.home')

                            {{--                                <div class="card-body">--}}
                            {{--                                   --}}

                            {{--                                    <table class="table table-bordered">--}}
                            {{--                                        <thead>--}}
                            {{--                                        <tr>--}}
                            {{--                                            <th style="width: 10px">ID</th>--}}
                            {{--                                            <th>Name</th>--}}
                            {{--                                            <th>Email</th>--}}
                            {{--                                            <th>Role</th>--}}
                            {{--                                            <th style="width: 40px" colspan="2">Action</th>--}}
                            {{--                                        </tr>--}}
                            {{--                                        </thead>--}}
                            {{--                                        <tbody>--}}

                            {{--                                        @foreach($users as $user)--}}
                            {{--                                            <tr>--}}
                            {{--                                                <td>{{$user->id}}</td>--}}
                            {{--                                                <td>{{$user->name}}</td>--}}
                            {{--                                                <td>{{$user->email}}</td>--}}
                            {{--                                                <td></td>--}}

                            {{--                                                <td>--}}
                            {{--                                               <a href = 'edit/{{ $user->id }}'>Edit</a>--}}

                            {{--                                                    <a class="badge bg-info"  data-toggle="modal" id="mediumButton" data-target="#mediumModal"--}}
                            {{--                                                       data-attr="edit/{{ $user->id }}">--}}
                            {{--                                                        Edit--}}
                            {{--                                                    </a>--}}
                            {{--                                                    <a  href = 'delete/{{ $user->id }}' class="badge bg-danger" >Delete</a>--}}

                            {{--                                                </td>--}}

                            {{--                                            </tr>--}}
                            {{--                                        @endforeach--}}
                            {{--                                        </tbody>--}}
                            {{--                                    </table>--}}

                            {{--                                </div>--}}

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
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.card -->


        </div>
        @include('layouts.footer')


    </x-app-layout>

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

</body>
</html>


{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}
{{--    <title>User</title>--}}

{{--    <!-- Google Font: Source Sans Pro -->--}}
{{--    <link rel="stylesheet"--}}
{{--          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">--}}
{{--    <!-- Font Awesome -->--}}
{{--    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">--}}
{{--    <!-- SweetAlert2 -->--}}
{{--    <link rel="stylesheet" href="../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">--}}
{{--    <!-- Toastr -->--}}
{{--    <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">--}}
{{--    <!-- Theme style -->--}}
{{--    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">--}}
{{--    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">--}}

{{--    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">--}}
{{--    <!-- Script -->--}}
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}
{{--    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>--}}

{{--    <!-- Font Awesome JS -->--}}
{{--    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"> </script>--}}
{{--    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"> </script>--}}

{{--    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet' type='text/css'>--}}

{{--    @livewireStyles--}}

{{--</head>--}}
{{--<body class="hold-transition sidebar-mini">--}}
{{--<div class="wrapper">--}}
{{--    <!-- Navbar -->--}}
{{--        <!-- /.navbar -->--}}
{{--    <x-app-layout>--}}

{{--        <!-- Main Sidebar Container -->--}}

{{--        <!-- /.sidebar-menu -->--}}

{{--        <!-- /.sidebar -->--}}
{{--    @include('layouts.sidebar')--}}

{{--    <!-- Content Wrapper. Contains page content -->--}}

{{--        <!-- /.navbar -->--}}


{{--        <!-- Content Wrapper. Contains page content -->--}}
{{--        <div class="content-wrapper">--}}
{{--            <!-- Content Header (Page header) -->--}}
{{--            <section class="content-header">--}}
{{--                <div class="container-fluid">--}}
{{--                    <div class="row mb-2">--}}
{{--                        <div class="col-sm-6">--}}

{{--                            <h1>User Management</h1>--}}
{{--                        </div>--}}
{{--                        <div class="col-sm-6">--}}
{{--                            <ol class="breadcrumb float-sm-right">--}}
{{--                                <li class="breadcrumb-item"><a href="redirects">Home</a></li>--}}
{{--                                <li class="breadcrumb-item active">User Management</li>--}}
{{--                            </ol>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div><!-- /.container-fluid -->--}}
{{--            </section>--}}

{{--            <!-- Main content -->--}}
{{--            <section class="content">--}}
{{--                <div class="container-fluid">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-12">--}}
{{--                            <div class="card card-primary card-outline">--}}
{{--                                <div class="card-header">--}}
{{--                                    <h3 class="card-title">User Table</h3>--}}
{{--                                    <button type="button" style="margin-left:920px " class="btn btn-light ">--}}
{{--                                        <a href="teammemberinvitationform">--}}
{{--                                            <i class="fa fa-user-plus"></i>--}}
{{--                                            Add New user--}}
{{--                                        </a>--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                                @include('livewire.home')--}}
{{--                                <div class="card-body">--}}
{{--                                   --}}

{{--                                    <table class="table table-bordered">--}}
{{--                                        <thead>--}}
{{--                                        <tr>--}}
{{--                                            <th style="width: 10px">ID</th>--}}
{{--                                            <th>Name</th>--}}
{{--                                            <th>Email</th>--}}
{{--                                            <th>Role</th>--}}
{{--                                            <th style="width: 40px" colspan="2">Action</th>--}}
{{--                                        </tr>--}}
{{--                                        </thead>--}}
{{--                                        <tbody>--}}

{{--                                        @foreach($users as $user)--}}
{{--                                            <tr>--}}
{{--                                                <td>{{$user->id}}</td>--}}
{{--                                                <td>{{$user->name}}</td>--}}
{{--                                                <td>{{$user->email}}</td>--}}
{{--                                                <td></td>--}}

{{--                                                <td>--}}
{{--                                               <a href = 'edit/{{ $user->id }}'>Edit</a>--}}

{{--                                                    <a class="badge bg-info"  data-toggle="modal" id="mediumButton" data-target="#mediumModal"--}}
{{--                                                       data-attr="edit/{{ $user->id }}">--}}
{{--                                                        Edit--}}
{{--                                                    </a>--}}
{{--                                                    <a  href = 'delete/{{ $user->id }}' class="badge bg-danger" >Delete</a>--}}

{{--                                                </td>--}}

{{--                                            </tr>--}}
{{--                                        @endforeach--}}
{{--                                        </tbody>--}}
{{--                                    </table>--}}

{{--                                </div>--}}

{{--                                <!-- /.card-body -->--}}
{{--                                <div class="card-footer clearfix">--}}
{{--                                    <ul class="pagination pagination-sm m-0 float-right">--}}
{{--                                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>--}}
{{--                                        <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
{{--                                        <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                                        <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </section>--}}
{{--            <!-- /.card -->--}}


{{--        </div>--}}
{{--    </x-app-layout>--}}
{{--    <!-- /.card -->--}}
{{--</div>--}}


{{--<!-- /.col -->--}}
{{--</div>--}}
{{--<!-- ./row -->--}}
{{--</div><!-- /.container-fluid -->--}}


{{--<!-- /.modal-dialog -->--}}
{{--</div>--}}
{{--<!-- /.modal -->--}}


{{--<!-- /.modal-content -->--}}
{{--<!-- /.modal-dialog -->--}}

{{--<!-- /.modal -->--}}


{{--<!-- /.modal -->--}}

{{--<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"--}}
{{--     aria-hidden="true">--}}
{{--    <div class="modal-dialog" role="document">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                    <span aria-hidden="true">&times;</span>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            <div class="modal-body" id="mediumBody">--}}
{{--                <div>--}}
{{--                    <!-- the result to be displayed apply here -->--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


{{--<script>--}}


{{--    // display a modal (medium modal)--}}
{{--    $(document).on('click', '#mediumButton', function(event) {--}}
{{--        event.preventDefault();--}}
{{--        let href = $(this).attr('data-attr');--}}
{{--        $.ajax({--}}
{{--            url: href,--}}
{{--            beforeSend: function() {--}}
{{--                $('#loader').show();--}}
{{--            },--}}
{{--            // return the result--}}
{{--            success: function(result) {--}}
{{--                $('#mediumModal').modal("show");--}}
{{--                $('#mediumBody').html(result).show();--}}
{{--            },--}}
{{--            complete: function() {--}}
{{--                $('#loader').hide();--}}
{{--            },--}}
{{--            error: function(jqXHR, testStatus, error) {--}}
{{--                console.log(error);--}}
{{--                alert("Page " + href + " cannot open. Error:" + error);--}}
{{--                $('#loader').hide();--}}
{{--            },--}}
{{--            timeout: 8000--}}
{{--        })--}}
{{--    });--}}

{{--</script>--}}
{{--</body>--}}

{{--</html>--}}

