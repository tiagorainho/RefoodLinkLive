<div class="card shadow">
    <div class="card-header py-3">
        <p class="text-primary m-0 font-weight-bold">Definições de vendedor</p>
    </div>
    <div class="card-body">
        <form wire:submit.prevent="submit">
            @csrf
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="nif"><strong>NIF</strong></label>
                        <input wire:model.lazy="user.nif" placeholder="PT 02 3172 3917 123456789 03" class="form-control" type="text" name="nif" pattern="[A-Z]{2}[' ']{0,}[0-9]{2}[' ']{0,}[0-9]{4}[' ']{0,}[0-9]{4}[' ']{0,}[0-9]{9}[' ']{0,}[0-9]{2}[' ']{0,}">
                        @error('user.nif') <span class="text-red text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="swift"><strong>SWIFT/BIC</strong></label>
                        <input wire:model.lazy="user.swift" placeholder="CTBAAU2S" class="form-control" name="swift" type="text" pattern="[A-Z0-9]{8}">
                        @error('user.swift') <span class="text-red text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="bank"><strong>Nome do Banco</strong></label>
                        <input wire:model.lazy="user.bank" placeholder="Santander" class="form-control" name="bank" type="text">
                        @error('user.bank') <span class="text-red text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="holder"><strong>Nome do Titular</strong></label>
                        <input wire:model.lazy="user.holder" placeholder="João Tiago Rainho" class="form-control" name="holder" type="text">
                        @error('user.holder') <span class="text-red text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group"><button class="btn btn-primary btn-sm" type="submit">Guardar</button></div>
        </form>
    </div>
</div>