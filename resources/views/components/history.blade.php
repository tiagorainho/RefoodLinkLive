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
                <div class="text-md-right dataTables_filter" id="dataTable_filter">
                    <label>
                        <input wire:model="search" type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search">
                    </label>
                </div>
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
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->random_id }}</td>
                            <td><div class="{{ $order->isPayed()? 'circle-green': ($order->isPending()? 'circle-yellow': 'circle-red') }}"></div><span class="ml-2">{{ $order->product->name }}<span></td>
                            <td>{{ $order->price}} €</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->product->updated_at->format('d-m-Y') }}</td>
                            <td>
                                <a wire:click="$emit('refreshModalShowProduct', {{ $order->id }})" class="btn btn-primary btn-sm  d-sm-inline-block" role="button" data-toggle="modal" data-target="#modalShowOrder">Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!--
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
    -->
    </div>
</div>