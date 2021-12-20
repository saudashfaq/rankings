@extends('layouts.main_layout')

@section('title') {{'user'}} @endsection

@section('page-title', 'User Management')

@section('bread-crumb')

    <li class="breadcrumb-item"><a href="redirects">Home</a></li>
    <li class="breadcrumb-item active">Users</li>

@endsection

@section('section-title', 'Users')

@section('content')

    @livewire('user-table')

@endsection

@section('custom-script')

    <script type="text/javascript">
        window.livewire.on('userStore', () => {
            $('#exampleModal').modal('hide');
        });


    </script>

@endsection
