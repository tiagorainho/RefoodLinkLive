<div wire:poll.1000ms>
    @if(count($available)>0 or count($unavailable)>0)
        @if(count($available)>0)
            <h3 class="text-dark mb-1">Disponivel</h3>
            <div class="row">
                @foreach($available as $product)
                    <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                        <a wire:click="$emit('refreshModalPrepareOrder', {{ $product->id }})" data-toggle="modal" data-target="#modalPrepareToOrder" role="button" class="card-button">
                            <div class="card shadow mb-3 small-border zoom">
                                <img class="mb-3 card-image" src={{ asset("assets/img/apresentacao/ovos_moles.png") }} style="height: 200px">
                                <div class="mb-3 ml-2">
                                    <h5 style="margin-bottom: -20px"><strong>{{ $product->name }}</strong></h5><br>
                                    <span>Preço: {{ $product->price }} €<strike style="color:grey">{{ $product->normal_price }} €</strike></span><br>
                                    <span>{{ $product->quantity }} {{ $product->quantity == 1? "unidade disponivel": "unidades disponiveis" }}</span><br>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
        @if(count($unavailable)>0)
            <h3 class="text-dark mb-1">Esgotado</h3>
            <div class="row">
                @foreach($unavailable as $product)
                    <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                        <a class="card-button" style="cursor:default">
                            <div class="card shadow mb-3 small-border" style="opacity:0.4">
                                <img class="mb-3 card-image" src={{ asset("assets/img/apresentacao/pastel_de_nata.png") }} style="height: 200px">
                                <div class="mb-3 ml-2">
                                    <h5 style="margin-bottom: -20px"><strong>{{ $product->name }}</strong></h5><br>
                                    <span>Preço: {{ $product->price }} € <strike style="color:grey"> {{ $product->normal_price }} €</strike></span><br>
                                    <span>Disponivel há {{ $product->updatedAt() }}</span><br>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    @else
        <p>De momento não existem produtos registados</p>
    @endif
</div>