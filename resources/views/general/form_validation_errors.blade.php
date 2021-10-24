@if (count($errors) > 0)
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if ($message = Session::get('success'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 2000)" x-show="show">
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{($message) }}
        </div>
    </div>

@endif
