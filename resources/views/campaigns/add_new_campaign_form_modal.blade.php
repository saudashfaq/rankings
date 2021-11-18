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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>

            </div>
            @include('general.form_validation_errors')

            <div class="modal-body">
                <p>Specify your Clients Website to begin connecting their marketing channels and creating
                    reports</p>
                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">

                            <form wire:submit.prevent="">

                                {{--                                {{$currentStep}}--}}
                                {{-- STEP 1 --}}

                                @if ($currentStep == 1)
                                    <div class="step-one">
                                        <div class="card">
                                            <div class="card-header bg-danger text-white">STEP 1/3 -Enter Campaigns
                                                Details
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Campaign Title</label>
                                                            <input type="text" class="form-control"
                                                                   placeholder="Enter Your campaign name"
                                                                   wire:model.defer="campaign_name">

                                                            <span
                                                                class="text-danger">@error('campaign_name'){{ $message }}@enderror</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Website Address</label>
                                                            <input type="text" class="form-control"
                                                                   placeholder="Enter Website Address"
                                                                   wire:model.defer="url">
                                                            <span
                                                                class="text-danger">@error('url'){{ $message }}@enderror</span>
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




                                                    {{--                                                    <input type="text" name="language_code" value="abc" wire:model="language_code">--}}
                                                    <div class="col-md-6">
                                                        <div class="form-group">

                                                            <label for="">Group</label>
                                                            <select class="form-control" wire:model.defer="group">
                                                                <option value="" selected>Select Group</option>
                                                                <option value="Sample1">Sample1</option>
                                                                <option value="Sample2">Sample2</option>
                                                            </select>
                                                            <span
                                                                class="text-danger">@error('group'){{ $message }}@enderror</span>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Language</label>
                                                            <select class="form-control" wire:model.defer="language">
                                                                <option value="">Select</option>
                                                                <option value="English">English</option>
                                                                <option value="Urdu">Urdu</option>
                                                            </select>
                                                            <span
                                                                class="text-danger">@error('language'){{ $message }}@enderror</span>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for=""> Report Delivery Time zone</label>
                                                            <input type="text" class="form-control"
                                                                   placeholder="Enter Report Delivery Time zone "
                                                                   wire:model.defer="time_zone">
                                                            <span
                                                                class="text-danger">@error('report_delivery'){{ $message }}@enderror</span>
                                                        </div>
                                                    </div>


                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endif

                                {{-- STEP 2 --}}

                                @if ($currentStep == 2)


                                    <div class="step-two">
                                        <div class="card">
                                            <div class="card-header bg-secondary text-white">STEP 2/3 - Enter Keywords
                                            </div>
                                            <div class="card-body">
                                                <div class="frameworks d-flex flex-column align-items-left mt-2">
                                                    <textarea name="keywords" placeholder="Press Enter Key To Add New Keywords" wire:model="keywords" cols="50"
                                                              rows="5"></textarea>
                                                </div>
                                                <span
                                                    class="text-danger">@error('keywords'){{ $message }}@enderror</span>
                                            </div>
                                        </div>
                                    </div>

                                @endif
                                {{-- STEP 3 --}}

                                @if ($currentStep == 3)


                                    <div class="step-three">
                                        <div class="card">
                                            <div class="card-header bg-secondary text-white">STEP 3/3 - Campaigns Created

                                            </div>
                                            <div class="card-body">
                                                You campaign is created successfully
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                {{-- STEP 4 --}}
                                {{--                                @if ($currentStep == 4)--}}


                                {{--                                    <div class="step-four">--}}
                                {{--                                        <div class="card">--}}
                                {{--                                            <div class="card-header bg-secondary text-white">STEP 4/4 - Attachments--}}
                                {{--                                            </div>--}}
                                {{--                                            <div class="card-body">--}}
                                {{--                                                Lorem, ipsum dolor sit amet consectetur adipisicing elit.--}}
                                {{--                                                <div class="form-group">--}}
                                {{--                                                    <label for="cv">CV</label>--}}
                                {{--                                                    <input type="file" class="form-control" wire:model="cv">--}}
                                {{--                                                    <span class="text-danger">@error('cv'){{ $message }}@enderror</span>--}}
                                {{--                                                </div>--}}
                                {{--                                                <div class="form-group">--}}
                                {{--                                                    <label for="terms" class="d-block">--}}
                                {{--                                                        <input type="checkbox" id="terms" wire:model="terms"> You must--}}
                                {{--                                                        agree with our <a href="#">Terms and Conditions</a>--}}
                                {{--                                                    </label>--}}
                                {{--                                                    <span--}}
                                {{--                                                        class="text-danger">@error('terms'){{ $message }}@enderror</span>--}}
                                {{--                                                </div>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}

                                {{--                                @endif--}}

                                <div class="action-buttons d-flex justify-content-between bg-white pt-2 pb-2">

                                    @if ($currentStep == 1 )
                                        <button type="button" style="margin-left: 650px" class="btn btn-md btn-success"
                                                wire:click="store()">Next
                                        </button>
                                        {{--                                            <button type="button" class="btn btn-md btn-success"--}}
                                        {{--                                                   wire:click="{{$currentStep == 2 ? 'addKeyword()':'store()'}}" >Next--}}
                                        {{--                                            </button>--}}
                                    @endif


                                @if ($currentStep == 2 )
                                        <button type="button" class="btn btn-md btn-secondary"
                                                wire:click="decreaseStep()">Back
                                        </button>
                                    @endif


                                    @if ($currentStep == 2 )

                                        <button type="button" style="margin-left:550px" class="btn btn-md btn-success"
                                                wire:click="addKeywords()">Next
                                        </button>

                                    @endif

                                    @if ($currentStep == 3)
                                        {{--                                        <button type="submit"  class="btn btn-md btn-primary">Save</button>--}}

                                    @endif


                                </div>

                            </form>

                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.card-body -->

        </div>
        <!-- /.card -->

    </div>

</div>
