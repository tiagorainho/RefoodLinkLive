<div>
    <div class="modal-body">
        @if(isset($order))
            <div class="row" style="margin-bottom:-25px">
                <div class="col"></div>
                <div class="col-auto">
                    <div class="{{ $order->isPayed()? 'circle-green': ($order->isPending()? 'circle-yellow': 'circle-red') }}"></div>
                </div>
            </div>
            
            <div class="form-group">
                <label for="price"><strong>ID</strong></label>
                <input value="{{ $order->random_id }}" class="form-control" type="text" disabled>
            </div>
            <div class="form-group">
                <label for="price"><strong>Nome do produto</strong></label>
                <input value="{{ $order->product->name }}" class="form-control" type="text" disabled>
            </div>
            <div class="form-group">
                <label for="price"><strong>Quantidade</strong></label>
                <input value="{{ $order->quantity }}" class="form-control" type="text" disabled>
            </div>
            <div class="form-group">
                <label for="price"><strong>Custo Total</strong></label>
                <input value="{{ $order->price }} €" class="form-control" type="text" disabled>
            </div>
            <div class="form-group">
                <label for="price"><strong>Cliente</strong></label>
                <input value="{{ $order->consumer->first_name }} {{ $order->consumer->last_name }}" class="form-control" type="text" disabled>
            </div>
            <div class="form-group">
                <label for="price"><strong>Data</strong></label>
                <input value="{{ $order->created_at->format('d-m-Y') }}" class="form-control" type="text" disabled>
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox small" style="margin-left:-20px">
                    <div class="form-check">
                        <input {{ $order->use_delivery_man? 'checked':'' }} class="form-check-input custom-control-input" type="checkbox" disabled>
                        <label class="form-check-label custom-control-label">Usou Estafeta</label>
                    </div>
                </div>
            </div>
        @endif        
    </div>
    <div class="modal-footer">
        @if(isset($order))
            @if($order->isPending())
                <button wire:click="cancelOrder" type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            @endif
        @endif
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
    </div>
</div>