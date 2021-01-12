<div>
    <div class="container-fluid">
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <h3 class="text-dark mb-0">Estabelecimentos</h3>
            <a class="btn btn-primary btn-sm  d-sm-inline-block" role="button" data-toggle="modal" data-target="#modal">Adicionar Estabelecimento</a>
        </div>
        @if(count($establishments)>0)
        <div class="row">
            @foreach($establishments as $establishment)
            <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                <a href="estabelecimento/{{ $establishment->id }}" class="card-button">
                    <div class="card shadow mb-3 small-border zoom">
                        <img class="mb-3 card-image" src="assets/img/apresentacao/latina_aveiro.png">
                        <div class="mb-3 ml-2">
                            <h5 style="margin-bottom: -20px"><strong>{{ $establishment->name }}</strong></h5><br>
                            <span>{{ $establishment->address }}</span>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        @else
            <h4>ainda sem estabelecimentos</h4>
        @endif
    </div>

    @livewire('modal', [
        'id'=> 'modal',
        'title'=> 'Adicionar Estabelecimento',
        'content'=> 'create-establishment',
        ])
</div>