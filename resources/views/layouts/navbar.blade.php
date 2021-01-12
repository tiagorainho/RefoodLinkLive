<nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
        <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="row">
                <div class="col" style="margin-top: 10px;margin-right: -20px;">
                    <div class="row">
                        <div class="col" style="margin-right: -25px">
                            <input wire:model.debounce.300ms="distance" value="{{ $distance }}" type="range" min="0" max="{{ $max_distance }}" oninput="update_distance()" id="distance">
                        </div>
                        <div class="col">
                            <label for="distance" id="distance_displayer">{{ round($distance/1000, 1) }}km</label>
                        </div>
                    </div>
                    
                </div>
                <div class="col">
                    <div class="input-group">
                        <input wire:model="search" class="bg-light form-control border-0 small" type="text" placeholder="Procurar">
                        <div class="input-group-append"><button wire:click="gotoSearch" class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                    </div>
                </div>
            </div>
        </form>
        <ul class="nav navbar-nav flex-nowrap ml-auto">
            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-search"></i></a>
                <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto navbar-search w-100">
                        <div class="input-group">
                            <input wire:model="search" class="bg-light form-control border-0 small" type="text" placeholder="Procurar">
                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                        </div>
                    </form>
                </div>
            </li>
            <li class="nav-item dropdown no-arrow mx-1">
                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="badge badge-danger badge-counter">3+</span><i class="fas fa-bell fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in">
                        <h6 class="dropdown-header">Notificações</h6><a class="d-flex align-items-center dropdown-item" href="#">
                            <div class="mr-3">
                                <div class="bg-success icon-circle"><i class="fas fa-donate text-white"></i></div>
                            </div>
                            <div><span class="small text-gray-500">23 de Novembro de 2020</span>
                                <p>Nova encomenda com total de 6 €</p>
                            </div>
                        </a><a class="d-flex align-items-center dropdown-item" href="#">
                            <div class="mr-3">
                                <div class="bg-success icon-circle"><i class="fas fa-donate text-white"></i></div>
                            </div>
                            <div><span class="small text-gray-500">23 de Novembro de 2020</span>
                                <p>Nova encomenda com total de 5 €</p>
                            </div>
                        </a><a class="d-flex align-items-center dropdown-item" href="#">
                            <div class="mr-3">
                                <div class="bg-success icon-circle"><i class="fas fa-donate text-white"></i></div>
                            </div>
                            <div><span class="small text-gray-500">23 de Novembro de 2020</span>
                                <p>Nova encomenda com total de 4 €</p>
                            </div>
                        </a><a class="text-center dropdown-item small text-gray-500" href="#">Mostrar mais</a>
                    </div>
                </div>
            </li>
            <div class="d-none d-sm-block topbar-divider"></div>
            <li class="nav-item dropdown no-arrow">
                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small">{{ $user_name }}</span><img class="border rounded-circle img-profile" src={{ asset("assets/img/avatars/smoking.jpeg") }}></a>
                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in">
                        <a class="dropdown-item" href="/perfil">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Perfil
                        </a>
                        <!--
                        <a class="dropdown-item" href="/perfil">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Definições
                        </a>
                        -->
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Histórico
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/entrar">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Sair
                        </a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <script>
        update_distance();
        
        function update_distance(value) {
            document.getElementById('distance_displayer').innerHTML = (Math.round(document.getElementById('distance').value)/1000).toFixed(1) + "km";
        }
        
    </script>
</nav>