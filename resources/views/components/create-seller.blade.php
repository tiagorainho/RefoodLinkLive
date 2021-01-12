<form wire:submit.prevent="submit">
    @csrf
    <div class="modal-body">
        <div class="form-group">
            <label for="nif"><strong>NIF</strong></label>
            <input wire:model.lazy="user.nif" placeholder="ex: PT 02 3172 3917 123456789 03" class="form-control" type="text" name="nif" pattern="[A-Z]{2}[' ']{0,}[0-9]{2}[' ']{0,}[0-9]{4}[' ']{0,}[0-9]{4}[' ']{0,}[0-9]{9}[' ']{0,}[0-9]{2}[' ']{0,}">
            @error('user.nif') <span class="text-red text-xs">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="swift"><strong>SWIFT/BIC</strong></label>
            <input wire:model.lazy="user.swift" placeholder="ex: CTBAAU2S" class="form-control" name="swift" type="text" pattern="[A-Z0-9]{8}">
            @error('user.swift') <span class="text-red text-xs">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="bank"><strong>Nome do Banco</strong></label>
            <input wire:model.lazy="user.bank" placeholder="ex: Santander" class="form-control" name="bank" type="text">
            @error('user.bank') <span class="text-red text-xs">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="holder"><strong>Nome do Titular</strong></label>
            <input wire:model.lazy="user.holder" placeholder="ex: João Tiago Rainho" class="form-control" name="holder" type="text">
            @error('user.holder') <span class="text-red text-xs">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</form>