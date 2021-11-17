<div class="form-group">

    <label for="country">Country</label>

    <input type="text" name="country" wire:model.lazy="country"
{{--           wire:focusOut="$emit('getLocations($selected_country)')"--}}
{{--           wire:keyDown.debounce.800ms="readCsv()"--}}
           placeholder="Select Country"
           class="form-control" list="countries">
    <datalist  id="countries">
        @if($countries && count($countries) > 0 )
            @foreach($countries as $val)
                <option value="{{$val['location_name']}}"><br>
            @endforeach

        @endif
    </datalist>
{{--{{var_dump($country)}}--}}
{{----}}
{{--    <select wire:model="country" class="form-control"  >--}}
{{--        @if(!is_null($country))--}}
{{--            <option value="{{trim($country)}}" selected> {{$country}} </option>--}}
{{--            <option value="line-break" disabled>--------------------------------------------------</option>--}}
{{--        @endif--}}

{{--    @if($countries && count($countries) > 0)--}}
{{--            @foreach($countries as $val)--}}
{{--                @if(is_null($country) || trim($val['location_name']) !== trim($country))--}}
{{--                    <option value="{{trim($val['location_name'])}}">{{$val['location_name']}}</option>--}}
{{--                @endif--}}
{{--            @endforeach--}}
{{--        @endif--}}

{{--            <option value="{{$val['location_name']}}" disabled>--}}


{{--    </select>--}}
{{--    {{var_dump($country)}}--}}

    <span
        class="text-danger">@error('country'){{ $message }}@enderror</span>
</div>
