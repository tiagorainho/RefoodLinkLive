<form wire:submit.prevent="submit">
    @csrf
    <div class="modal-body">
        @if(isset($product))
            <div class="mb-4" style="border-width: 1px;
            border-color: rgb(224, 219, 219);
            border-style: groove; border-radius:5px">
                <div class="ml-2">
                    <span>Informação sobre o produto:</span><br>
                    <span>Nome: {{ $product->name }}</span><br>
                    <span>Preço por unidade: {{ $product->price }} €</span><br>
                </div>
            </div>
        @endif

        <div class="form-group">
            <label for="quantityToOrder"><strong>Quantidade</strong></label>
            <input wire:model="quantityToOrder" min="1" max="{{ $quantityToOrder }}" class="form-control" type="number" placeholder="" name="quantityToOrder"/>
            @error('quantityToOrder') <span class="text-red text-xs">{{ $message }}</span> @enderror
        </div>
        <div class="mb-2" style="float:right">
            <span>Preço: {{ $price }} €</span>
        </div>
        <div class="form-group">
            <div class="custom-control custom-checkbox small" style="margin-left:-20px">
                <div class="form-check">
                    <input wire:model="useDeliveryman" class="form-check-input custom-control-input" type="checkbox" id="useDeliveryman">
                    <label class="form-check-label custom-control-label" for="useDeliveryman">Entrega ao Domicílio</label>
                </div>
            </div>
        </div>
        
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-success">Confirmar</button>
    </div>
</form>