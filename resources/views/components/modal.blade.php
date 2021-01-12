<div class="modal fade" id="{{ $modalId }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"><!--bd-example-modal-lg-->
    <div class="{{ $this->class }}">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{ $modalTitle }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @if($args == null) @livewire($modalContent)
            @else @livewire($modalContent, $args)
            @endif
        </div>
    </div>
</div>