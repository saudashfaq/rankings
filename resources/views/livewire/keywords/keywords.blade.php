@extends('layouts.main_layout')

@section('title') {{'keyword'}} @endsection

@section('page-title', 'Keyword Management')

@section('bread-crumb')

    <li class="breadcrumb-item"><a href="redirects">Home</a></li>
    <li class="breadcrumb-item active">Keywords</li>

@endsection

@section('section-title', 'Keywords')

@section('content')

    @livewire('keywords.keyword-table')

@endsection

@section('custom-script')

    <script type="text/javascript">
        window.livewire.on('keywordStore', () => {
            $('#exampleModal').modal('hide');
        });


    </script>

@endsection
