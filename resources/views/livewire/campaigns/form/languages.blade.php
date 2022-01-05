<div class="form-group">

    <label for="country">Language</label>

    <input type="text" name="language" wire:model.lazy="language"
           {{--           wire:focusOut="$emit('getLocations($selected_country)')"--}}
           {{--           wire:keyDown.debounce.800ms="readCsv()"--}}
           placeholder="Select Language"
           class="form-control" list="languages">
    <datalist  id="languages">
        @if($languages && count($languages) > 0 )
            @foreach($languages as $val)
                <option value="{{ $val['language_name'] }}"><br>
            @endforeach

        @endif
    </datalist>

    <span class="text-danger">@error('language'){{ $message }}@enderror</span>

</div>
