
@extends('layouts.main_layout')

@section('title') {{'campaigns'}} @endsection

@section('page-title', 'Campaigns Management')

@section('bread-crumb')

    <li class="breadcrumb-item"><a href="redirects">Home</a></li>
    <li class="breadcrumb-item active">Campaigns</li>

@endsection

@section('section-title', 'Campaign')

@section('content')

    @livewire('campaign-table')

@endsection
