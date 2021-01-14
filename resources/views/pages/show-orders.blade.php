<div class="container-fluid">

    @livewire('history', [
        'type' => 'consumer',
        'id' => Auth()->user()->id
    ])

    @livewire('modal', [
        'id' => 'modalShowOrder',
        'title' => 'Mostrar Pedido',
        'content' => 'show-order',
        'modalClass' => 'modal-dialog modal-dialog-centered',
    ])

</div>