<?php
@if ($message = Session::get('success'))
    @php Session::forget('success') @endphp
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 2000)" x-show="show">
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{($message) }}
        </div>
    </div>

@endif


@if ($message = Session::get('failed'))
    @php Session::forget('failed') @endphp
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 2000)" x-show="show">
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{($message) }}
        </div>
    </div>

@endif
