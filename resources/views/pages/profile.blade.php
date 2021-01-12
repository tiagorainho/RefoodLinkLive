<div class="container-fluid">
    <h3 class="text-dark mb-4">Perfil</h3>
    <div class="row mb-3">
        <div class="col-lg-4">
            <div class="card mb-3">
                <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4" src="assets/img/avatars/smoking.jpeg" width="160" height="160">
                    <div class="mb-3"><button class="btn btn-primary btn-sm" type="button">Alterar Foto</button></div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row">
                <div class="col">
                    @livewire('edit-user')
                </div>
            </div>
            @if($user->isSeller())
                @livewire('edit-seller')
            @endif
        </div>
    </div>
    @if($user->isConsumer())
        <div class="card shadow mb-5">
            <div class="card-header py-3">
                <p class="text-primary m-0 font-weight-bold">Inicialização de vendedor</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form>
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input wire:model="wannabe_seller" wire:change="openCreateSellerModal" class="custom-control-input" type="checkbox" id="wannabe_seller">
                                    <label class="custom-control-label" for="wannabe_seller"><strong>Quero ser vendedor</strong></label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @livewire('modal', [
            'id'=> 'modalCreateSeller',
            'title'=> 'Transformar em Vendedor',
            'content'=> 'create-seller',
        ])
    @endif
    <!--
<div class="modal fade bd-example-modal-lg" id="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Definições de vendedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group"><label for="iban"><strong>NIF</strong></label><input class="form-control" type="text" name="IBAN" pattern="[A-Z]{2}[' ']{0,}[0-9]{2}[' ']{0,}[0-9]{4}[' ']{0,}[0-9]{4}[' ']{0,}[0-9]{9}[' ']{0,}[0-9]{2}[' ']{0,}"></div>
                            </div>
                            <div class="col">
                                <div class="form-group"><label for="bic"><strong>SWIFT/BIC</strong></label><input class="form-control" type="text" value="" name="bic" pattern="[A-Z]{8}"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group"><label for="bank"><strong>Nome do Banco</strong></label><input class="form-control" type="text" name="bank" value=""></div>
                            </div>
                            <div class="col">
                                <div class="form-group"><label for="owner"><strong>Nome do Titular</strong></label><input class="form-control" type="text"  name="owner"></div>
                            </div>
                        </div>
                    </form>
                </div>
              </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary">Guardar</button>
            </div>
        </div>
        
    </div>
</div>
-->
</div>
