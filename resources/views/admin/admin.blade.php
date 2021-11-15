@extends('layouts.main_layout')
@section('title') {{'Dashboard'}} @endsection



@section('page-title', 'Dashboard')

@section('bread-crumb')

    <li class="breadcrumb-item"><a href="redirects">Home</a></li>
    <li class="breadcrumb-item active">Dashboard</li>

@endsection


@section('section-title', 'Rankings')

@section('content')

    {{--    @livewire('users')--}}
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
                                Google Change
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
                                    <h3>45</h3>
                                    <p>Google Rankings</p>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-2 col-6">
                            <!-- small box -->
                            <div class="small-box bg-light">
                                <div class="inner">
                                    <h3>35</h3>
                                    <p>Google Change</p>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-2 col-6">
                            <!-- small box -->
                            <div class="small-box bg-light">
                                <div class="inner">
                                    <h3>75</h3>
                                    <p>Google Local Rankings</p>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-2 col-6">
                            <!-- small box -->
                            <div class="small-box bg-light">
                                <div class="inner">
                                    <h3>25</h3>
                                    <p>Google Local Change</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-6">
                            <!-- small box -->
                            <div class="small-box bg-light">
                                <div class="inner">
                                    <h3>15</h3>
                                    <p>Google Mobile Rankings</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-6">
                            <!-- small box -->
                            <div class="small-box bg-light">
                                <div class="inner">
                                    <h3>65</h3>
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
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Keyword</th>
                                            <th>Location</th>
                                            <th>Google</th>
                                            <th>Google Change</th>
                                            <th>Google url</th>
                                            <th>Google local Ranking</th>
                                            <th>Google local change</th>
                                            <th>Google Mobile Ranking</th>
                                            <th>Google Mobile change</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>
                                            @foreach($keyword as $keword)
                                            <td>{{$keword->keyword}}</td>
                                            <td>us</td>
                                            <td>2</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>


                                        </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                                {{--                            <div class="card-footer clearfix">--}}
                                {{--                                <ul class="pagination pagination-sm m-0 float-right">--}}
                                {{--                                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>--}}
                                {{--                                    <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
                                {{--                                    <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
                                {{--                                    <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
                                {{--                                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>--}}
                                {{--                                </ul>--}}
                                {{--                            </div>--}}
                            </div>
                            <!-- /.card -->

                        </div>
                    </div>
                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </div>
        </div>
    </section>

@endsection
