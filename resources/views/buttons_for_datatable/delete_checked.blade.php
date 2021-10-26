{{--datatable delete button to delete all checked items --}}

<div>
    @if(count($checkbox_values) > 0)
        <button class="btn btn-danger" onclick="confirm('Do you really want to delete all selected records?') || event.stopImmediatePropagation();" wire:click="deleteChecked">
            Delete Selected Records
        </button>
    @endif

</div>
