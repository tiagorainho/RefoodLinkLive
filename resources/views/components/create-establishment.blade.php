<form wire:submit.prevent="submit">
    @csrf
    <div class="modal-body">
        <div class="form-group">
            <label for="name"><strong>Nome do estabelecimento</strong></label>
            <input wire:model.lazy="establishment.name" class="form-control" type="text" placeholder="" name="name"/>
            @error('establishment.name') <span class="text-red text-xs">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="description"><strong>Descrição</strong></label>
            <input wire:model.lazy="establishment.description" class="form-control" type="text" placeholder="" name="description">
            @error('establishment.description') <span class="text-red text-xs">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="address"><strong>Address</strong></label>
            <input wire:model.lazy="establishment.address" class="form-control" type="text" placeholder="" name="address">
            @error('establishment.address') <span class="text-red text-xs">{{ $message }}</span> @enderror
        </div>
        <div class="form-group row">
            <div class="col-sm-6">
                <label for="city"><strong>City</strong></label>
                <input wire:model.lazy="establishment.city" class="form-control" type="text" placeholder="" name="city">
                @error('establishment.city') <span class="text-red text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="col-sm-6">
                <label for="country"><strong>Country</strong></label>
                <input wire:model.lazy="establishment.country" class="form-control" type="text" placeholder="" name="country">
                @error('establishment.country') <span class="text-red text-xs">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="schedule"><strong>Horário</strong></label>
            <input wire:model.lazy="establishment.schedule" class="form-control" type="text" placeholder="" name="schedule">
            @error('establishment.schedule') <span class="text-red text-xs">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="contact"><strong>Contacto</strong></label>
            <input wire:model.lazy="establishment.contact" class="form-control" type="text" placeholder="" name="contact">
            @error('establishment.contact') <span class="text-red text-xs">{{ $message }}</span> @enderror
        </div>
        @error('establishment') <span class="text-red text-xs">{{ $message }}</span> @enderror
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</form>