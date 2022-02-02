<button data-toggle="modal" data-target="#campaignsupdateModal" wire:click="edit({{ $model->campaign_id }})"
        class="btn btn-outline-info">
    <i class="fa fa-edit"></i>
</button>


<!-- Modal -->
<div wire:ignore.self class="modal fade" id="campaignsupdateModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="margin-top: 100px;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Campaigns </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                @include('general.success_failure_messages')

                <form>
                    <div class="form-group">
                        <input type="hidden" wire:model="campaign_id">

                        <label for="exampleFormControlInput1">Campaign Title</label>
                        <input type="text" class="form-control" wire:model="campaign_title"
                               id="exampleFormControlInput1" placeholder="Enter Name">
                        @error('campaign_title') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        <label for="WebsiteAddress">Website Address </label>
                        <input type="text" class="form-control" wire:model="website_address" id="#WebsiteAddress"
                               placeholder="Enter Website Address   ">
                        @error('website_address') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>


                    <div class="form-group">

                        <label for="report_delivery_time"> Report Delivery Time (UTC)</label>
                        <select class="form-control"
                                id="report_delivery_time"
                                wire:model="report_delivery_time">

                            @for( $x=0; $x<24; $x++)

                                <option value="{{$x}}:00">{{$x}}:00</option>
                                <option value="{{$x}}:30">{{$x}}:30</option>

                            @endfor;

                        </select>
                        <span
                            class="text-danger">@error('report_delivery_time'){{ $message }}@enderror</span>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="update()" class="btn btn-success" data-dismiss="modal">Save
                    changes
                </button>
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
