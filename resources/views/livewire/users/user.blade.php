<div>

    {{--@include('livewire.create')
    @include('livewire.update')
--}}
    @if (session()->has('message'))
        <div class="alert alert-success" style="margin-top:30px;">x
            {{ session('message') }}
        </div>
    @endif


    @livewire('user-table')

    {{--
    <table class="table table-bordered mt-5">
        <thead>
        <tr>

            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
        </tr>

        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td></td>
                <td>
                    <button data-toggle="modal" data-target="#updateModal" wire:click="edit({{ $user->id }})"
                            class="badge bg-info">Edit
                    </button>
                    {{--                    <button wire:click="delete({{ $user->id }})" class="badge bg-danger">Delete</button>--}}
                    {{--                    <a href=""  class="badge bg-danger" wire:click.prevent="confirmUserRemoval({{$user->id}})">--}}
                    {{--                        Delete--}}
                    {{--                    </a>--}}
                    {{--                    <button type="button" wire:click="deleteId({{ $user->id }})" class="btn btn-danger" data-toggle="modal" data-target="#conifrm">Delete</button>--
                    <a href="" class="badge bg-danger" wire:click.prevent="confirmUserRemoval({{ $user->id }})">
                        Delete
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    --}}
</div>

{{--
<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Delete User</h5>
            </div>

            <div class="modal-body">
                <h4>Are you sure you want to delete this user and this user?</h4>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times mr-1"></i>
                    Cancel
                </button>
                <button type="button" wire:click="deleteUser()" class="btn btn-danger">
                    <i class="fa fa-trash mr-1"></i>
                        Delete User
                </button>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    window.addEventListener('show-delete-modal', event => {
        $('#confirmationModal').modal('show');

    })

    window.addEventListener('hide-delete-modal',event => {
        $('#confirmationModal').modal('hide');
        toastr.success(event.detail.message,'Success');
    })
</script>

--}}
{{--<div wire:ignore.self class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--<div class="modal-dialog" role="document">--}}
{{--    <div class="modal-content"style="margin-top: 100px;">--}}
{{--        <div class="modal-header">--}}
{{--            <h5 class="modal-title" id="exampleModalLabel"> User</h5>--}}
{{--            <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                <span aria-hidden="true close-btn">×</span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--        <div class="modal-body">--}}
{{--            <h4>Are you sure want to delete this User?</h4>--}}
{{--        </div>--}}
{{--        <div class="modal-footer">--}}
{{--            <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>--}}
{{--            <button type="button" wire:click.prevent="deleteUser()" class="btn btn-danger close-modal">Delete</button>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--</div>--}}

