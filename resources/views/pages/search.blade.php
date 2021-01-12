<div class="container-fluid">
    @if($is_loading)
        Loading...
    @else        
        @if(count($favorites)>0)
            <div class="d-sm-flex justify-content-between align-items-center mb-4">
                <h3 class="text-dark mb-0">Favoritos</h3>
            </div>
            <div class="row">
                @foreach($favorites->take($max_number_of_favorite_products) as $establishment)
                    <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                        <a wire:click="goto('/estabelecimento/{{ $establishment->id }}')" class="card-button">
                            <div class="card shadow mb-3 small-border zoom">
                                <div style="margin-bottom:-50px;" class="front row">
                                    <div class="col"></div>
                                    <div class="col-auto">
                                        <div wire:click="removeFavorite({{ $establishment->id }})" style="width:50px; height:50px;" class="star"></div>
                                    </div>
                                </div>
                                <img class="mb-3 card-image" src="assets/img/apresentacao/latina_aveiro.png" style="height: 200px;">
                                <div class="mb-3 ml-2">
                                    <h5 style="margin-bottom: -20px"><strong>{{ $establishment->name }}</strong></h5><br>
                                    <span>{{ $establishment->address }}</span>
                                    <span style="float: right;" class="mr-2">{{ round($establishment->distanceToCoordinate, 2) }} kms</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <h3 class="text-dark mb-0">Descobrir</h3>
        </div>
        @if(count($not_favorites)>0)
            <div class="row">
                @foreach($not_favorites->take($max_number_of_not_favorite_products) as $establishment)
                    <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                        <a wire:click="goto('/estabelecimento/{{ $establishment->id }}')" class="card-button">
                            <div class="card shadow mb-3 small-border zoom">
                                <div style="margin-bottom:-50px;" class="front row">
                                    <div class="col"></div>
                                    <div class="col-auto">
                                        <div wire:click="addFavorite({{ $establishment->id }})" style="width:50px; height:50px;" class="star-empty"></div>
                                    </div>
                                </div>
                                <img class="mb-3 card-image" src="assets/img/apresentacao/espeto_do_sul.jpeg" style="height: 200px;">
                                <div class="mb-3 ml-2">
                                    <h5 style="margin-bottom: -20px"><strong>{{ $establishment->name }}</strong></h5><br>
                                    <span>{{ $establishment->address }}</span>
                                    <span style="float: right;" class="mr-2">{{ round($establishment->distanceToCoordinate, 2) }} kms</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <p>Não existem estabelecimentos com produtos disponiveis a uma distância de {{ round($max_distance_from_user_in_kms, 2) }} km de si</p>
        @endif
    @endif
    <div wire:init="start_populate"></div>
    <!--
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            Livewire.hook('component.initialized', component => {
                console.log(component);
                Livewire.emit('start_populateEvent')
            });
        });
    </script>
    -->

</div>