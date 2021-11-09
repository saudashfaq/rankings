
{{--<button class="btn btn-primary" wire:click="showUser({{ $model->id }})">Show</button>--}}
<button data-toggle="modal" data-target="#campaignsupdateModal" wire:click="edit({{ $model->campaign_id }})"
        class="btn btn-info">
    <i class="fa fa-edit"></i>
    Edit
</button>

<!-- Modal -->
<div wire:ignore.self class="modal fade" id="campaignsupdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="margin-top: 100px;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Campaigns </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <input type="hidden" wire:model="campaign_id">
                        <label for="exampleFormControlInput1">campaign_name</label>
                        <input type="text" class="form-control" wire:model="campaign_name" id="exampleFormControlInput1" placeholder="Enter Name">
                        @error('campaign_name') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Language Name </label>
                        <input type="text" class="form-control" wire:model="language_name" id="exampleFormControlInput2" placeholder="Enter Language">
                        @error('language_name') <span class="text-danger">{{ $message }}</span>@enderror
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
