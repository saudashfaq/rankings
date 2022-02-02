

<div>
 @include('buttons_for_datatable.delete_checked')
</div>

{{--<button data-toggle="modal" wire:click="readCsv"--}}
{{--        class="btn btn-light ">--}}
{{--    Check--}}
{{--</button>--}}
@include('livewire.campaigns.add_new_campaign_form_modal')



{{--@push('scripts')--}}
{{--    <script>--}}
{{--        $(document).ready(function() {--}}
{{--            $('#select2').select2();--}}
{{--            $('#select2').on('change', function (e) {--}}
{{--                var data = $('#select2').select2("val");--}}
{{--            @this.set('selCity', data);--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
{{--@endpush--}}
