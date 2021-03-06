
{{--<button class="btn btn-primary" wire:click="showUser({{ $model->id }})">Show</button>--}}
<button data-toggle="modal" data-target="#updateModal" wire:click="edit({{ $model->id }})"
        class="btn btn-outline-info">
    <i class="fa fa-user-edit"></i>
</button>
<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="margin-top: 100px;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <input type="hidden" wire:model="user_id">
                        <label for="exampleFormControlInput1">Update your Name</label>
                        <input type="text" class="form-control" wire:model="name" id="exampleFormControlInput1" placeholder="Enter Name">
                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Email address</label>
                        <input type="email" class="form-control" wire:model="email" id="exampleFormControlInput2" placeholder="Enter Email">
                        @error('email') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="role">Select Role</label>

                        {{-- dd($roles) --}}
                        {{-- dd($roles) --}}
                        <select id="role" wire:model.defer="role" name="role" class="form-control">
                            <option readonly="">Assign Role</option>


                            @if( count($roles) > 0)

                                @foreach($roles as $role_from_db)

                                    <option value="{{$role_from_db->name}}" @if($role_from_db->name == $this->role) selected @endif>{{$role_from_db->name}}</option>

                                @endforeach

                            @endif
                        </select>
                        <span class="text-danger">@error('role'){{ $message }}@enderror</span>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Save changes</button>
            </div>
        </div>
    </div>
</div>
