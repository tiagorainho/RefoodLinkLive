<form wire:submit.prevent="submit">
    @csrf
    <div class="modal-body">
        <div class="form-group">
            <label for="order_random_id"><strong>ID do Pedido</strong></label>
            <input wire:model.lazy="order_random_id" class="form-control" type="text" placeholder="" name="order_random_id"/>
            @error('order_random_id') <span class="text-red text-xs">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Confirmar</button>
    </div>
</form>