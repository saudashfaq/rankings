<div class="form-group">
    <label for="location_name">Location</label>
    <input type="text" name="location_name" wire:model.lazy="location"
           placeholder="Enter Your Location"
           class="form-control" list="locations">
    <datalist id="locations">
        @if($locations)
            @foreach($locations as $val)
                <option value="{{$val['location_name']}}">
            @endforeach
        @endif
    </datalist>

    <span
        class="text-danger">@error('location'){{ $message }}@enderror</span>
</div>
