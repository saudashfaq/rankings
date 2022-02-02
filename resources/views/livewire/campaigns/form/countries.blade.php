<div class="form-group">

    <label for="country">Country</label>

    <input type="text" name="country" wire:model.lazy="country"
           placeholder="Select Country"
           class="form-control" list="countries">
    <datalist  id="countries">
        @if($countries && count($countries) > 0 )
            @foreach($countries as $val)
                <option value="{{$val['location_name']}}"><br>
            @endforeach

        @endif
    </datalist>

    <span class="text-danger">@error('country'){{ $message }}@enderror</span>
</div>
