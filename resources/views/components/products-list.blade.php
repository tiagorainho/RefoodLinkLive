<div class="card shadow mb-5" wire:poll.2000ms>
    <div class="card-header py-3">
        <p class="text-primary m-0 font-weight-bold">Catálogo</p>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 text-nowrap">
                <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable">
                    <label>Mostrar&nbsp;
                        <select wire:model="pagination_value" class="form-control form-control-sm custom-select custom-select-sm">
                            @foreach($pagination_values as $value)
                                <option value="{{ $value }}">{{ $value }}</option>
                            @endforeach
                        </select>
                        &nbsp;
                    </label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="text-md-right dataTables_filter" id="dataTable_filter">
                    <label>
                        <input wire:model="search_string" type="text" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search">
                    </label>
                </div>
            </div>
        </div>
        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
            <table class="table my-0" id="dataTable">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Preço normal</th>
                        <th>Preço</th>
                        <th>Unidades</th>
                        <th style="width: 80px"></th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($products)==0)
                        <tr><td>Não existem produtos<td></tr>
                    @else
                        @foreach($products as $product)
                            <tr>
                                <td>
                                    @if($product->quantity>0) <div class="circle-green"></div>
                                    @else <div class="circle-red"></div>
                                    @endif
                                    <span class="ml-2">{{ $product->name }}<span></td>
                                <td>{{ $product->normal_price }} €</td>    
                                <td>{{ $product->price }} €</td>
                                <td>{{ $product->quantity }}</td>
                                <td>
                                    <a wire:click="$emit('refreshModalEditProduct', {{ $product->id }})" class="btn btn-primary btn-sm  d-sm-inline-block" role="button" data-toggle="modal" data-target="#modalProductEdit">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-md-6 align-self-center">

            </div>
            <div class="col-md-6">
                {{ $products->links('components.pagination-links') }}                
            </div>
        </div>
    </div>
</div>