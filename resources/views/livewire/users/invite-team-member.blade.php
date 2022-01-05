
<!--  add new Team Member Button and Modal. Displayed in header of users table s-->

{{-- Add New Team Member Button -- Displays the modal further deep in this file --}}
<button data-toggle="modal" data-target="#createUser"
        class="btn btn-light ">  <i class="fa fa-user-plus"></i>
    Invite Team Member
</button>


{{--  Add new Team member form modal --}}
<div wire:ignore.self class="modal fade" id="createUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="margin-top: 100px;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Team Memeber Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" wire:click.prevent="cancel()">×</span>
                </button>
            </div>
            {{--@include('general.form_validation_errors')--}}
            <div class="modal-body">


                <form wire:submit.prevent="">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" wire:model.defer="name" name="name" class="form-control" value=""/>
                        <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                    </div>

                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="text" wire:model.defer="email" name="email" class="form-control" value=""/>
                        <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="role">Select Role</label>

                        {{-- dd($roles) --}}
                        <select id="role" wire:model.defer="role" name="role" class="form-control">
                            <option disabled>Assign the role</option>
                            @foreach($roles as $role_from_db)
                                <option value="{{$role_from_db->name}}">{{$role_from_db->name}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">@error('role'){{ $message }}@enderror</span>
                    </div>

                    <div class="form-group">

                        <input type="submit" wire:click.prevent="inviteTeamMemeber()" name="send" class="btn btn-primary"
                               value="Send Invitation"/>

                        <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>



                    </div>

                </form>

            </div>
            {{--            <div class="modal-footer">--}}

            {{--                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Save changes</button>--}}
            {{--            </div>--}}
        </div>
    </div>
</div>
