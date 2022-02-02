@if (session('success'))

    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ session('success') }}
    </div>

@endif


@if (session('failed'))

    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ session('failed') }}
    </div>

@endif
