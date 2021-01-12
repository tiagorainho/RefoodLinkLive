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

    Meter o catalogo com um "mostrar mais" e o historico com paginacao

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

    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold">Histórico</p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 text-nowrap">
                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label>Mostrar&nbsp;<select class="form-control form-control-sm custom-select custom-select-sm">
                                <option value="10" selected="">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>&nbsp;</label></div>
                </div>
                <div class="col-md-6">
                    <div class="text-md-right dataTables_filter" id="dataTable_filter"><label><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                </div>
            </div>
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Conta</th>
                            <th>Unidades</th>
                            <th>Data</th>
                            <th style="width: 80px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>3</td>
                            <td><div class="circle-green"></div><span class="ml-2">Pastel de Nata<span></td>
                            <td>6 €</td>
                            <td>3</td>
                            <td>23-11-2020</td>
                            <td><button class="btn btn-primary">Ver</button></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><div class="circle-yellow"></div><span class="ml-2">Biscoitos<span></td>
                            <td>5 €</td>
                            <td>2</td>
                            <td>23-11-2020</td>
                            <td><button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mais
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <a class="dropdown-item" href="#">Cancelar</a>
                                    <a class="dropdown-item" href="#">Confirmar</a>
                                  </div>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td><div class="circle-red"></div><span class="ml-2">Croissants<span></td>
                            <td>4 €</td>
                            <td>2</td>
                            <td>23-11-2020</td>
                            <td><button class="btn btn-primary">Ver</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-md-6 align-self-center">
                    
                </div>
                <div class="col-md-6">
                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                        <ul class="pagination">
                            <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item disabled"><a class="page-link" href="#">2</a></li>
                            <li class="page-item disabled"><a class="page-link" href="#">3</a></li>
                            <li class="page-item disabled"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
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