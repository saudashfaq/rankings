{{--@can("add campaign")--}}
<button data-toggle="modal" data-target="#createCampaign"
        class="btn btn-light "><i class="fa fa-plus"></i>
    Create New Campaigns
</button>

{{--@endcan--}}

{{--<!--  add new campaigns Modal -->--}}
<div wire:ignore.self class="modal fade" id="createCampaign" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="margin-top: 100px;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Campaign</h5>
                <button type="button" wire:click="cancel" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>

            </div>
            {{--            @include('general.form_validation_errors')--}}

            <div class="modal-body">

                @include('general.success_failure_messages')
                {{--
                <div>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('failed'))
                        <div class="alert alert-danger">
                            {{ session('failed') }}
                        </div>
                    @endif
                </div>
                --}}
                <div class="row">

                    <form wire:submit.prevent="">

                        @if ($currentStep == 1)

                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="campaign_title">Campaign Title</label>
                                            <input type="text" class="form-control"
                                                   placeholder="Enter Your campaign name"
                                                   wire:model.defer="campaign_title" id="campaign_title">

                                            <span
                                                class="text-danger">@error('campaign_title'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="website_address">Website Address</label>
                                            <input type="text" class="form-control"
                                                   placeholder="Enter Website Address"
                                                   wire:model.defer="website_address">
                                            <span
                                                class="text-danger">@error('website_address'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">

                                        @livewire('campaigns.form.countries')

                                    </div>


                                    <div class="col-md-6">

                                        @livewire('campaigns.form.locations')

                                    </div>


                                    <div class="col-md-6">

                                        @livewire('campaigns.form.languages')

                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <label for="time_zone"> Report Delivery Time (UTC)</label>
                                            <select class="form-control"
                                                    id="time_zone"
                                                    wire:model.defer="report_delivery_time">

                                                <option readonly>Select Time</option>
                                                @for( $x=0; $x<24; $x++)

                                                    <option value="{{$x}}:00">{{$x}}:00</option>
                                                    <option value="{{$x}}:30">{{$x}}:30</option>

                                                @endfor;

                                            </select>
                                            <span
                                                class="text-danger">@error('report_delivery_time'){{ $message }}@enderror</span>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group">

                                            <label for="keywords"> Keywords </label>
                                            <textarea class="form-control" name="keywords"
                                                      placeholder="One keyword per line."
                                                      wire:model.defer="keywords"></textarea>
                                            <span class="text-danger">@error('keywords'){{ $message }}@enderror</span>
                                        </div>
                                    </div>


                                </div>

                            </div>


                        @endif


                    </form>

                </div>

                <!-- /.col -->

                <!-- /.row -->
            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-success"
                        wire:click.prevent="store()">
                    Save
                </button>


                <button type="button" class="btn btn-secondary"
                        data-dismiss="modal" aria-label="Close"
                        wire:click.prevent="cancel()">Cancel
                </button>
            </div>

        </div>
        <!-- /.card -->

    </div>

</div>
