<button data-toggle="modal" data-target="#updateModal" wire:click="edit({{ $model->keyword_id }})"
        class="btn btn-outline-info">
    <i class="fa fa-edit"></i>
</button>

<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="margin-top: 100px;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Keyword</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                @include('general.success_failure_messages')

                <form>
                    <div class="form-group">
                        <input type="hidden" wire:model="keyword_id">
                        <label for="keyword">Keyword</label>
                        <input type="text" class="form-control" wire:model="keyword" id="keyword" placeholder="Keyword">
                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
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
