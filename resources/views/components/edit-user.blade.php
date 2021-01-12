<div class="card shadow mb-3">
    <div class="card-header py-3">
        <p class="text-primary m-0 font-weight-bold">Definições de utilizador</p>
    </div>
    <div class="card-body">
        <form wire:submit.prevent="submit">
            @csrf
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="first_name"><strong>Primeiro Nome</strong></label>
                        <input wire:model.lazy="user.first_name" class="form-control" type="text" name="first_name">
                        @error('user.first_name') <span class="text-red text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="last_name"><strong>Ultimo Nome</strong></label>
                        <input wire:model.lazy="user.last_name" class="form-control" type="text" name="last_name">
                        @error('user.last_name') <span class="text-red text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="email"><strong>Email</strong></label>
                <input wire:model.lazy="user.email" class="form-control" type="text" name="email" disabled>
            </div>
            <div class="form-group">
                <label for="address"><strong>Localização</strong></label>
                <input class="form-control" type="text" placeholder="" name="address" value="R. Dr. Alberto Souto 24, 3800-148 Aveiro">
            </div>
            <div class="custom-control custom-switch mb-2">
                <input class="custom-control-input" type="checkbox" id="notification">
                <label class="custom-control-label" for="notification"><strong>Ativar notificações</strong><br></label>
            </div>
            <div class="custom-control custom-switch mb-2">
                <input class="custom-control-input" type="checkbox" id="emails">
                <label class="custom-control-label" for="emails"><strong>Receber emails</strong><br></label>
            </div>
            <div class="form-group"><button class="btn btn-primary btn-sm" type="submit">Guardar</button></div>
        </form>
    </div>
</div>