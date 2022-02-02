@extends('layouts.main_layout')

@section('title') {{'Dashboard'}} @endsection

@section('page-title', 'Dashboard')

@section('bread-crumb')

    <li class="breadcrumb-item"><a href="redirects">Home</a></li>
    <li class="breadcrumb-item active">Dashboard</li>

@endsection

@section('section-title', 'Dashboard')

@section('content')

    @livewire('dashboard.keyword-ranking-table')

    {{--
    <table class="table table-bordered">
        <thead>
        <tr>
            <th disabled=""></th>
            <th disabled=""></th>

            <th colspan="2">Google Organic</th>


            <th colspan="2">Google Local</th>

            <th colspan="2">Google Mobile</th>

        </tr>
        <tr>
            <th>Keyword/Date</th>
            <th>Location</th>


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
    --}}

@endsection
