
@extends('layouts.main_layout')
@section('title') {{'Dashboard'}} @endsection
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <x-app-layout>

        @include('layouts.nav-bar')
        @include('layouts.contentheader')
        @include('layouts.sidebar')
        @include('layouts.content')
        @include('layouts.footer')


    </x-app-layout>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

