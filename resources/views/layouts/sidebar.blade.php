<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
    <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
            <!--<div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>-->
            <img src={{ asset("assets/img/structure/logo.png") }} style="width:30px; height: 30px;">
            <div class="sidebar-brand-text mx-3"><span>RefoodLink</span></div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="nav navbar-nav text-light" id="accordionSidebar">
            @if($is_owner)
            <li class="nav-item"><a class="nav-link active" href="/dashboard"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
            <li class="nav-item"><a class="nav-link" href="/estabelecimentos"><i class="fas fa-table"></i><span>Estabelecimentos</span></a></li>
            @endif
            <li class="nav-item"><a class="nav-link" href="/perfil"><i class="fas fa-user"></i><span>Perfil</span></a></li>            
            <!--
                <li class="nav-item"><a class="nav-link" href="/entrar"><i class="far fa-user-circle"></i><span>Entrar</span></a></li>
                <li class="nav-item"><a class="nav-link" href="/registar"><i class="fas fa-user-circle"></i><span>Registar</span></a></li>
            -->
            <li class="nav-item"><a class="nav-link" href="/procurar"><i class="fas fa-search"></i><span>Procurar</span></a></li>
        </ul>
        <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
    </div>
</nav>