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

            {{-- TODO: verify the following else remove it --}}
            @section('scripts')
                $('.alert').alert('close')
            @endsection

            <div class="modal-body">
                <p></p>
                <div>
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                            @php session()->remove('success') @endphp
                        </div>
                    @endif
                        @if (session()->has('failed'))
                            <div class="alert alert-danger">
                                {{ session('failed') }}
                                @php session()->remove('failed') @endphp
                            </div>
                        @endif
                </div>
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
                                                            <label for="">Website Address</label>
                                                            <input type="text" class="form-control"
                                                                   placeholder="Enter Website Address"
                                                                   wire:model.defer="website_address">
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


                                                    <div class="col-md-6">

                                                        @livewire('campaigns.form.languages')

                                                    </div>


                                                    <div class="col-md-6">
                                                        <div class="form-group">

                                                            <label for="time_zone"> Report Delivery Time zone</label>
                                                            <select class="form-control"
                                                                   id="time_zone"
                                                                    wire:model.defer="time_zone">

                                                                @foreach(timezone_identifiers_list() as $timezone)

                                                                    <option value="{{ $timezone }}">{{ $timezone }}</option>

                                                                @endforeach

                                                            </select>
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
                                            <div class="card-header bg-secondary text-white">STEP 2/2 - Add Keywords
                                            </div>
                                            <div class="card-body">
                                                <div class="frameworks d-flex flex-column align-items-left mt-2">
                                                    <textarea name="keywords"
                                                              placeholder="One keyword per line."
                                                              wire:model.defer="keywords" cols="50"
                                                              rows="5"></textarea>
                                                </div>
                                                <span
                                                    class="text-danger">@error('keywords'){{ $message }}@enderror</span>
                                            </div>
                                        </div>
                                    </div>

                                @endif

                                <div class="action-buttons d-flex justify-content-between bg-white pt-2 pb-2">

                                    <button type="button" class="btn btn-md btn-success"
                                            wire:click="{{$currentStep == 2 ? 'addKeywords()':'store()'}}">{{ $currentStep == 2 ? 'Save' : 'Next' }}
                                    </button>

                                    @if ($currentStep == 2 )
                                        <button type="button" class="btn btn-md btn-secondary"
                                                wire:click="decreaseStep()">Back
                                        </button>
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
