<button data-toggle="modal" data-target="#addMoreKeywordsToCampaign"
        wire:click="addMoreKeywordsModel({{ $model->campaign_id }})"
        class="btn btn-outline-primary">
    <i class="fa fa-plus-circle"></i>
</button>

<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addMoreKeywordsToCampaign" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content" >

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Add More Keywords to {{ $campaign_title }} </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="row">
                    <div class="col-12">

                        @include('general.success_failure_messages')

                        <form>

                            <div class="form-group">

                                <input type="hidden" wire:model="campaign_id">

                                <label for="keywords">New Keywords</label>

                                <textarea type="text" class="form-control" wire:model="keywords"
                                          id="keywords" rows="4.5" placeholder="One keyword per line"></textarea>

                                @error('keywords') <span class="text-danger">{{ $message }}</span>@enderror

                            </div>

                        </form>


                    </div>


                    <div class="col-12">

                        <div class="card">

                            <div class="card-body">
                                <p class="text-sm"><b>Current Keywords</b></p>

                                @if( !empty($campaign_keywords) )

                                    @foreach($campaign_keywords as $keyword)

                                        <span class="text-sm">{{ $keyword->keyword }}</span><br>

                                    @endforeach

                                @endif
                            </div>
                        </div>

                    </div>
                </div>




            </div>

            <div class="modal-footer">

                <button type="button" wire:click="storeMoreKeywords()" class="btn btn-success">
                    Save changes
                </button>

                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">
                    Close
                </button>


            </div>

        </div>

    </div>

</div>
