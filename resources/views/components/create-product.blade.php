<form wire:submit.prevent="submit">
    @csrf
    <div class="modal-body">
        <div class="form-group">
            <label for="name"><strong>Nome do Produto</strong></label>
            <input wire:model.lazy="product.name" class="form-control" type="text" placeholder="" name="name"/>
            @error('product.name') <span class="text-red text-xs">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="description"><strong>Descrição</strong></label>
            <input wire:model.lazy="product.description" class="form-control" type="text" placeholder="" name="description">
            @error('product.description') <span class="text-red text-xs">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="price"><strong>Preço original</strong></label>
            <input wire:model.lazy="product.normal_price" class="form-control" type="number" step="0.01" min="0" placeholder="" name="normal_price">
            @error('product.normal_price') <span class="text-red text-xs">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="price"><strong>Preço com desconto</strong></label>
            <input wire:model.lazy="product.price" class="form-control" type="number" step="0.01" min="0" placeholder="" name="price">
            @error('product.price') <span class="text-red text-xs">{{ $message }}</span> @enderror
        </div>
        @error('product') <span class="text-red text-xs">{{ $message }}</span> @enderror
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</form>