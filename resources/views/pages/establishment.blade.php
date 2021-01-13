<div class="container-fluid">
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h3 wide:model.lazy="establishment.name" class="text-dark mb-1">{{ $establishment->name }}</h3>
        @if($is_owner)
            <div class="form-group mb-0">
                <div class="custom-control custom-switch"><input wire:model="client_mode" class="custom-control-input" type="checkbox" id="client_mode"><label class="custom-control-label" for="client_mode"><strong>Modo Cliente</strong></label></div>
            </div>
        @endif
    </div>
    <div class="row mb-4">
        <div class="col-lg-4">
            <div style="text-align: right;margin-bottom:-50px;" class="front">
                <div class="row">
                    <div class="col"></div>
                    <div class="col-auto">
                        <div wire:click="toggleFavorite" style="width:50px; height:50px;" class="{{ $favorite == true? 'star': 'star-empty' }}"></div>
                    </div>
                </div>
            </div>
            <div class="card mb-3 back">
                <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4" src={{ asset("assets/img/apresentacao/latina_aveiro.png") }} height="200">
                    @if($is_owner and !$client_mode)
                    <div class="mb-3"><button class="btn btn-primary btn-sm" type="button">Alterar Foto</button></div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow mb-3">
                <div class="card-body">
                    <span>Descrição: {{ $establishment->description }}</span><br>
                    <span>Localização: {{ $establishment->address }}</span><br>
                    <span>Cidade: {{ $establishment->city }}</span><br>
                    <span>País: {{ $establishment->country }}</span><br>
                    <span>Contacto: {{ $establishment->contact }}</span><br>
                    <span>Horário: {{ $establishment->schedule }}</span><br>
                    <span>rating: {{ $establishment->rating }}</span>
                    @if($is_owner and !$client_mode)
                    <div class="row">
                        <div class="col"></div>
                        <div class="col-auto">
                            <a class="btn btn-primary btn-sm  d-sm-inline-block" role="button" data-toggle="modal" data-target="#modalEstablishEdit">Editar</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if($is_owner and !$client_mode)
    <div class="row">
        <div class="col">
        </div>
        <div class="col-auto">
            <div class="d-sm-flex justify-content-between align-items-center mb-4">
                <a class="btn btn-primary btn-sm  d-sm-inline-block" role="button" data-toggle="modal" data-target="#modalCreateProduct">Adicionar Produto</a>
            </div>
        </div>
    </div>
    
    @livewire('modal', [
        'id' => 'modalCreateProduct',
        'title' => 'Adicionar Produto',
        'content' => 'create-product',
        'args' => ['establishmentId' => $establishment->id]
    ])
    
    @livewire('modal', [
        'id' => 'modalEstablishEdit',
        'title' => 'Editar Estabelecimento',
        'content' => 'update-establishment',
        'args' => ['id' => $establishment->id]
    ])

    @livewire('products-list', [
        'id' => $establishment->id
    ])

    @livewire('modal', [
        'id' => 'modalProductEdit',
        'title' => 'Editar Produto',
        'content' => 'edit-product'
    ])

    @livewire('modal', [
        'id' => 'modalConfirmOrder',
        'title' => 'Confirmar Pedido',
        'content' => 'confirm-order',
        'modalClass' => 'modal-dialog modal-dialog-centered',
    ])

    @livewire('modal', [
        'id' => 'modalShowOrder',
        'title' => 'Mostrar Pedido',
        'content' => 'show-order',
        'modalClass' => 'modal-dialog modal-dialog-centered',
    ])

    <div class="row">
        <div class="col">
        </div>
        <div class="col-auto">
            <div class="d-sm-flex justify-content-between align-items-center mb-4">
                <a class="btn btn-primary btn-sm  d-sm-inline-block" role="button" data-toggle="modal" data-target="#modalConfirmOrder">Confirmar pedido</a>
            </div>
        </div>
    </div>

    @livewire('history', [
        'type' => 'establishment',
        'id' => $establishment->id
    ])

    @else
        @livewire('catalog', ['id' => $establishment->id])
        <h3 class="text-dark mb-1">Direções</h3>
        <div id='map' style="width: 100%;height: 600px;"></div>
        @if(!$is_owner)
            <div wire:init="updatedClientMode"></div>
        @endif
    @endif

    @livewire('modal', [
        'id' => 'modalPrepareToOrder',
        'title' => 'Encomendar Produto',
        'content' => 'order-product',
        'modalClass' => 'modal-dialog modal-dialog-centered',
    ])
    
</div>