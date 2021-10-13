<button data-toggle="modal" data-target="#createCampaign"
        class="btn btn-light "><i class="fa fa-plus"></i>
    Create New Campaign
</button>

{{--<button data-toggle="modal" wire:click="readCsv"--}}
{{--        class="btn btn-light ">--}}
{{--    Check--}}
{{--</button>--}}

{{--<!--  add new user Modal -->--}}
<div wire:ignore.self class="modal fade" id="createCampaign" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="margin-top: 100px;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Campaign</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>

            </div>
{{--            <div wire:load="readCsv">--}}

{{--            </div>--}}
            <div class="modal-body">
                <p>Specify your Clients Website to begin connecting their marketing channels and creating
                    reports</p>
                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">

                            <form wire:submit.prevent="register">

                                {{-- STEP 1 --}}

                                @if ($currentStep == 1)


                                    <div class="step-one">
                                        <div class="card">
                                            <div  class="card-header bg-danger text-white">STEP 1/4 -Enter Campaigns
                                                Details
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Campaign Title</label>
                                                            <select class="form-control" wire:model="campaign_title">
                                                                <option value="" selected>Choose Campaign title</option>
                                                                <option value="abc">abc</option>
                                                                <option value="def">def</option>
                                                            </select>
                                                            <span
                                                                class="text-danger">@error('campaign_title'){{ $message }}@enderror</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Website Address</label>
                                                            <input type="text" class="form-control"
                                                                   placeholder="Enter Website Address"
                                                                   wire:model="website_address">
                                                            <span
                                                                class="text-danger">@error('website_address'){{ $message }}@enderror</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label  for="">Location</label>
{{--                                                            <select wire:click="readCsv()" class="form-control"  >--}}
{{--                                                                <option >Enter Your Location</option>--}}
{{--                                                                @if($location)--}}
{{--                                                                @foreach($location as $loc)--}}
{{--                                                                    <option value="{{$loc}}">{{$loc}}</option>--}}
{{--                                                                @endforeach--}}
{{--                                                                @endif--}}
{{--                                                            </select>--}}
{{--                                                            --}}
                                                            <input type="text" wire:click="readCsv()" placeholder="Enter Your Location" class="form-control"  list="location" >
                                                            <datalist id="location">
                                                                @if($location)
                                                                    @foreach($location as $loc)
                                                                        <option value="{{$loc}}">{{$loc}}</option>
                                                                    @endforeach
                                                                @endif
                                                            </datalist>

                                                            <span
                                                                class="text-danger">@error('location'){{ $message }}@enderror</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Group</label>
                                                            <select class="form-control" wire:model="group">
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
                                                            <select class="form-control" wire:model="language">
                                                                <option value="" selected>Select Language</option>
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
                                                                   wire:model="report_delivery">
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
                                            <div class="card-header bg-secondary text-white">STEP 2/4 - Enter Keywords
                                            </div>
                                            <div class="card-body">
                                                <div class="frameworks d-flex flex-column align-items-left mt-2">
                                                    <textarea name="keywords"  wire:model="keywords" cols="50" rows="5"></textarea>
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
                                            <div class="card-header bg-secondary text-white">STEP 3/4 - Frameworks
                                                experience
                                            </div>
                                            <div class="card-body">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur
                                                explicabo, impedit maxime possimus excepturi veniam ut error sit,
                                                molestias aliquam repellat eos porro? Sit ex voluptates nemo veritatis
                                                delectus quia?
                                                <div class="frameworks d-flex flex-column align-items-left mt-2">
                                                    <label for="laravel">
                                                        <input type="checkbox" id="laravel" value="laravel"
                                                               wire:model="frameworks"> Laravel
                                                    </label>
                                                    <label for="codeigniter">
                                                        <input type="checkbox" id="codeigniter" value="codeigniter"
                                                               wire:model="frameworks"> Codeigniter
                                                    </label>
                                                    <label for="vuejs">
                                                        <input type="checkbox" id="vuejs" value="vuejs"
                                                               wire:model="frameworks"> Vue Js
                                                    </label>
                                                    <label for="cakePHP">
                                                        <input type="checkbox" id="cakePHP" value="cakePHP"
                                                               wire:model="frameworks"> CakePHP
                                                    </label>
                                                </div>
                                                <span
                                                    class="text-danger">@error('frameworks'){{ $message }}@enderror</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                {{-- STEP 4 --}}
                                @if ($currentStep == 4)


                                    <div class="step-four">
                                        <div class="card">
                                            <div class="card-header bg-secondary text-white">STEP 4/4 - Attachments
                                            </div>
                                            <div class="card-body">
                                                Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                                <div class="form-group">
                                                    <label for="cv">CV</label>
                                                    <input type="file" class="form-control" wire:model="cv">
                                                    <span class="text-danger">@error('cv'){{ $message }}@enderror</span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="terms" class="d-block">
                                                        <input type="checkbox" id="terms" wire:model="terms"> You must
                                                        agree with our <a href="#">Terms and Conditions</a>
                                                    </label>
                                                    <span
                                                        class="text-danger">@error('terms'){{ $message }}@enderror</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endif

                                <div class="action-buttons d-flex justify-content-between bg-white pt-2 pb-2">

                                    @if ($currentStep == 1)
                                        <div></div>
                                    @endif

                                    @if ($currentStep == 2 || $currentStep == 3 || $currentStep == 4)
                                        <button type="button" class="btn btn-md btn-secondary"
                                                wire:click="decreaseStep()">Back
                                        </button>
                                    @endif

                                    @if ($currentStep == 1 || $currentStep == 2 || $currentStep == 3)
                                        <button type="button" class="btn btn-md btn-success"
                                                wire:click="increaseStep()">Next
                                        </button>
                                    @endif

                                    @if ($currentStep == 4)
                                        <button type="submit" class="btn btn-md btn-primary">Submit</button>
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


{{--<!--  add new user Modal -->--}}
{{--<div wire:ignore.self class="modal fade" id="createCampaign" tabindex="-1" role="dialog"--}}
{{--     aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--    <div class="modal-dialog" role="document">--}}
{{--        <div class="modal-content" style="margin-top: 100px;">--}}
{{--            <div class="modal-header">--}}
{{--                <h5 class="modal-title" id="exampleModalLabel">Create New Campaign</h5>--}}
{{--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                    <span aria-hidden="true">×</span>--}}
{{--                </button>--}}

{{--            </div>--}}
{{--            <div class="modal-body">--}}
{{--                <p>Specify your Clients Website to begin connecting their marketing channels and creating--}}
{{--                    reports</p>--}}
{{--                <!-- SELECT2 EXAMPLE -->--}}
{{--                <div class="card card-default">--}}
{{--                    <!-- /.card-header -->--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-md-6">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label>Campaign Title</label>--}}
{{--                                    <select class="form-control select2" style="width: 100%;">--}}
{{--                                        <option selected="selected">Alabama</option>--}}
{{--                                        <option>Alaska</option>--}}

{{--                                    </select>--}}
{{--                                </div>--}}
{{--                                <!-- /.form-group -->--}}
{{--                                <div class="form-group">--}}
{{--                                    <label>Website Address</label>--}}
{{--                                    <select class="form-control select2" style="width: 100%;">--}}
{{--                                        <option selected="selected">Alabama</option>--}}
{{--                                        <option>Alaska</option>--}}

{{--                                    </select>--}}
{{--                                </div>--}}
{{--                                <!-- /.form-group -->--}}
{{--                            </div>--}}
{{--                            <!-- /.col -->--}}
{{--                            <div class="col-md-6">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label>Location</label>--}}
{{--                                    <select class="form-control select2" style="width: 100%;">--}}
{{--                                        <option selected="selected">Alabama</option>--}}
{{--                                        <option>Alaska</option>--}}

{{--                                    </select>--}}
{{--                                </div>--}}
{{--                                <!-- /.form-group -->--}}
{{--                                <div class="form-group">--}}
{{--                                    <label>Report Delivery Time zone</label>--}}
{{--                                    <select class="form-control select2" style="width: 100%;">--}}
{{--                                        <option selected="selected">Alabama</option>--}}
{{--                                        <option>Alaska</option>--}}

{{--                                    </select>--}}
{{--                                </div>--}}
{{--                                <!-- /.form-group -->--}}
{{--                            </div>--}}
{{--                            <!-- /.col -->--}}
{{--                        </div>--}}
{{--                        <!-- /.row -->--}}

{{--                        <div class="row">--}}
{{--                            <div class="col-12 col-sm-6">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label>Group</label>--}}
{{--                                    <select class="form-control select2 select2-danger"--}}
{{--                                            data-dropdown-css-class="select2-danger" style="width: 100%;">--}}
{{--                                        <option selected="selected">Alabama</option>--}}
{{--                                        <option>Alaska</option>--}}

{{--                                    </select>--}}
{{--                                </div>--}}
{{--                                <!-- /.form-group -->--}}
{{--                            </div>--}}
{{--                            <!-- /.col -->--}}
{{--                            <div class="col-12 col-sm-6">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label>Language</label>--}}
{{--                                    <select class="form-control select2" style="width: 100%;">--}}
{{--                                        <option selected="selected">Alabama</option>--}}
{{--                                        <option>Alaska</option>--}}

{{--                                    </select>--}}
{{--                                </div>--}}
{{--                                <!-- /.form-group -->--}}
{{--                            </div>--}}
{{--                            <!-- /.col -->--}}
{{--                        </div>--}}
{{--                        <!-- /.row -->--}}
{{--                    </div>--}}
{{--                    <!-- /.card-body -->--}}

{{--                </div>--}}
{{--                <!-- /.card -->--}}

{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
