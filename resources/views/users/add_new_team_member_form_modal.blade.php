
<!--  add new Team Member Button and Modal. Displayed in header of users table s-->

{{-- Add New Team Member Button -- Displays the modal further deep in this file --}}
<button data-toggle="modal" data-target="#createUser"
        class="btn btn-light ">  <i class="fa fa-user-plus"></i>
    Add New user
</button>


{{--  Add new Team member form modal --}}
<div wire:ignore.self class="modal fade" id="createUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="margin-top: 100px;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form  method="GET" action="{{url('sendemail/send')}}">
                    <div class="form-group">
                        <label>Enter Your Name</label>
                        <input type="text" name="name" class="form-control" value=""/>
                    </div>
                    <div class="form-group">
                        <label>Enter Your Email</label>
                        <input type="text" name="email" class="form-control" value=""/>
                    </div>
                    <div class="form-group">
                        <label for="role">Enter The Role</label>

                        <select id="role" name="role" class="form-control">
                            <option value="">Assign the role</option>
                                                            @foreach(\App\Models\Role::all() as $role)
                                                                <option value="{{$role->name}}">{{$role->name}}</option>
                                                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" name="send" class="btn btn-light"
                               value="Send Invitation"/>


                    </div>

                </form>

            </div>
            {{--            <div class="modal-footer">--}}

            {{--                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Save changes</button>--}}
            {{--            </div>--}}
        </div>
    </div>
</div>
