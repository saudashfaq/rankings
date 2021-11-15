{{--@if ($errors->any())--}}
{{--    <div {{ $attributes }}>--}}
{{--<div>--}}
{{--        <div class="font-medium text-red-600">{{ __('Whoops! Something went wrong.') }}</div>--}}

{{--        <ul class="mt-3 list-disc list-inside text-sm text-red-600">--}}
{{--            @foreach ($errors->all() as $error)--}}
{{--                <li>{{ $error }}</li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}
{{--        <div class="form-group">--}}
{{--            <ul class="text-danger">--}}
{{--                @foreach ($errors->all() as $error)--}}
{{--                    {{ $error }}--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endif--}}
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
