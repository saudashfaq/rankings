{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}
{{--    <title>Send Mail To User </title>--}}

{{--    <!-- Google Font: Source Sans Pro -->--}}
{{--    <link rel="stylesheet"--}}
{{--          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">--}}
{{--    <!-- Font Awesome -->--}}
{{--    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">--}}
{{--    <!-- Theme style -->--}}
{{--    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">--}}
{{--</head>--}}
{{--<body class="hold-transition sidebar-mini">--}}
{{--<div class="wrapper">--}}
{{--    <!-- Navbar -->--}}

{{--    <!-- /.navbar -->--}}
{{--    <x-app-layout>--}}

{{--        <!-- Main Sidebar Container -->--}}

{{--        <!-- /.sidebar-menu -->--}}

{{--        <!-- /.sidebar -->--}}
{{--    @include('layouts.sidebar')--}}

{{--    <!-- Content Wrapper. Contains page content -->--}}
{{--        <div class="content-wrapper">--}}
{{--            <!-- Content Header (Page header) -->--}}
{{--            <section class="content-header">--}}
{{--                <div class="container-fluid">--}}
{{--                    <div class="row mb-2">--}}
{{--                        <div class="col-sm-6">--}}
{{--                            <h1>Send Invitation To User </h1>--}}
{{--                        </div>--}}
{{--                        <div class="col-sm-6">--}}
{{--                            <ol class="breadcrumb float-sm-right">--}}
{{--                                <li class="breadcrumb-item"><a href="redirects">Home</a></li>--}}
{{--                                <li class="breadcrumb-item active">Sent Mail to User</li>--}}
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
{{--                            <div class="card">--}}
{{--                                <div class="card-header">--}}
{{--                                    <h3 class="card-title">Mail Invitation</h3>--}}
{{--                                    @if (count($errors) > 0)--}}
{{--                                        <div class="alert alert-danger">--}}
{{--                                            <button type="button" class="close" data-dismiss="alert">×</button>--}}
{{--                                            <ul>--}}
{{--                                                @foreach ($errors->all() as $error)--}}
{{--                                                    <li>{{ $error }}</li>--}}
{{--                                                @endforeach--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    @endif--}}
{{--                                    @if ($message = Session::get('success'))--}}
{{--                                        <div class="alert alert-success alert-block">--}}
{{--                                            <button type="button" class="close" data-dismiss="alert">×</button>--}}
{{--                                            <strong>{{ $message }}</strong>--}}
{{--                                        </div>--}}

{{--                                    @endif--}}
{{--                                </div>--}}
{{--                                <!-- /.card-header -->--}}
{{--                                <div class="card-body">--}}
{{--                                    <form method="GET" action="{{url('sendemail/send')}}">--}}

{{--                                        {{ csrf_field() }}--}}

{{--                                        <div class="form-group">--}}


{{--                                            <label>Enter Your Name</label>--}}
{{--                                            <input type="text" name="name" class="form-control" value=""/>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label>Enter Your Email</label>--}}
{{--                                            <input type="text" name="email" class="form-control" value=""/>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="role">Enter The Role</label>--}}

{{--                                            <select id="role" name="role" class="form-control">--}}
{{--                                                <option value="">Assign the role</option>--}}
{{--                                                @foreach($roles as $role)--}}
{{--                                                    <option value="{{$role->name}}">{{$role->name}}</option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}
{{--                                        </div>--}}

{{--                                        <div class="form-group">--}}
{{--                                            <input type="submit" name="send" class="btn btn-light"--}}
{{--                                                   value="Send Invitation"/>--}}
{{--                                        </div>--}}
{{--                                    </form>--}}

{{--                                </div>--}}
{{--                                <!-- /.card-body -->--}}

{{--                            </div>--}}
{{--                            <!-- /.card -->--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </section>--}}
{{--        </div>--}}

{{--    </x-app-layout>--}}
{{--    <!-- /.content-wrapper -->--}}
{{--    <footer class="main-footer">--}}

{{--    </footer>--}}

{{--<!-- Control Sidebar -->--}}
{{--    <aside class="control-sidebar control-sidebar-dark">--}}
{{--        <!-- Control sidebar content goes here -->--}}
{{--    </aside>--}}
{{--    <!-- /.control-sidebar -->--}}


{{--    <!-- ./wrapper -->--}}

{{--    <!-- jQuery -->--}}
{{--    <script src="../../plugins/jquery/jquery.min.js"></script>--}}
{{--    <!-- Bootstrap 4 -->--}}
{{--    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>--}}
{{--    <!-- AdminLTE App -->--}}
{{--    <script src="../../dist/js/adminlte.min.js"></script>--}}
{{--    <!-- AdminLTE for demo purposes -->--}}
{{--    <script src="../../dist/js/demo.js"></script>--}}
{{--</body>--}}
{{--</html>--}}

