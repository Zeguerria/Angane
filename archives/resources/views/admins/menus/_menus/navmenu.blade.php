<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-image: url({{asset('glbal/theme/t7c.jpg')}}) ; background-position: center; background-size: cover; background-repeat: no-repeat;">
    <!-- Brand Logo -->
    <a href="./dashboard" class="brand-link ">
        <img src="{{asset('assets/img/dgcpt/logo.png')}}" alt="Angane Logo" class="brand-image img-circle elevation-3 nav-link-heart" style="opacity: .8">
        <span class="brand-text font-weight-light nav-link-heart"><strong style="font-size: 1.3em; color :hsl(139, 91%, 22%);">E</strong><label for="" style="color :hsl(139, 91%, 22%);">N</label><label for="" style="color :#cbf900;">GA</label><label for="" style="color :#5300f9;">NE</label></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        @if (Route::has('login'))
            @auth
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                @if(Auth::user()->photo !=null)
                    <div class="image">
                        <img src="{{asset(Auth::user()->le_profil)}}" class="img-circle elevation-2" alt="User Image">
                    </div>
                @else
                    <div class="image">
                        <img src="{{asset('/glbal/autres/images.png')}}" class="img-circle elevation-2" alt="User Image">
                    </div>
                @endif
                {{-- <div class="image">
                <img src="{{asset(Auth::user()->le_profil)}}" class="img-circle elevation-2" alt="User Image">
                </div> --}}
                <div class="info">
                <a href="#" class="d-block nav-link-heart">{{Auth::user()->name}} {{Auth::user()->prenom}}</a>
                </div>
            </div>

        @else
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            <img src="{{asset('/glbal/autres/images.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
            <a href="#" class="d-block nav-link-heart">Alexander Pierce</a>
            </div>
        </div>

        @endauth
        @endif
        <!-- Sidebar user panel (optional) -->
        <!-- SidebarSearch Form -->
        <div class="form-inline" >
            <div class="input-group" data-widget="sidebar-search" >
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search" >
            <div class="input-group-append" >
                <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="././dashboard" class="nav-link nav-link-heart">
                            <i class="nav-icon fas fa-home msicons"></i>
                            <p class="mesliens">
                                Home
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link  nav-link-heart">
                            <i class="nav-icon fas  fa-folder msicons"></i>
                            <p style="font-size: 20px; color: var(--color-ti); font-family : 'Times New Roman', Times, serif;">
                                Archives
                                <i class="fas fa-angle-left right msicons"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="./Archives" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Archive</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link nav-link-heart">
                            <i class="nav-icon fas fa-sliders-h msicons"></i>
                            <p style="font-size: 20px; color: var(--color-ti); font-family : 'Times New Roman', Times, serif;">
                                Gestions
                                <i class="fas fa-angle-left right msicons"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="./Gestionnaires" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p >Gestionnaire</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./Emmeteurs" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p >Emmeteur</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./Destinataires" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p >Destinataire</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./Receveurs" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p >Receveur</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./Entites" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p >Entité</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="./ParametreCorbeilles" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Parametre</p>
                                </a>
                            </li>
                        </ul>

                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link nav-link-heart">
                            <i class="nav-icon fas fa-map-marker-alt msicons"></i>
                            <p style="font-size: 20px; color: var(--color-ti); font-family : 'Times New Roman', Times, serif;">
                                Localisations
                                <i class="fas fa-angle-left right msicons"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="./Payss" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p >Pays</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./Provinces" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p >Province</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./Communes" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p >Commune</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./Arrondissements" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p >Arrondissment</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./Quartiers" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p >Quartier</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link nav-link-heart">
                            <i class="nav-icon fas fas fa-toolbox msicons"></i>
                            <p class="mesliens">
                                Paramétrages
                                <i class="fas fa-angle-left right msicons"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="./Parametres" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Parametre</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./Types-Parametres" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Type de Parametre</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="./Postes" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p >Poste</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./Statuts" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p >Statut</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./Types" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p >Type</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="./Profils" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p >Profil</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./Habilitations" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p >Habilitation</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./Categories" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p >Catégorie</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link nav-link-heart">
                            <i class="nav-icon fas fa-id-badge msicons"></i>
                            <p style="font-size: 20px; color: var(--color-ti); font-family : 'Times New Roman', Times, serif;">
                                Profils
                                <i class="fas fa-angle-left right msicons"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="./monprofil" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>profil</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link nav-link-heart">
                        <i class="nav-icon fas fa-users msicons"></i>
                        <p class="mesliens">
                            Users
                            <i class="fas fa-angle-left right msicons"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="./Users" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <hr style="background-color: rgb(250, 250, 255);">
                        <a href="#" class="nav-link nav-link-heart">
                            <i class="nav-icon fas fa-trash msicons"></i>
                            <p style="font-size: 20px; color: var(--color-ti); font-family : 'Times New Roman', Times, serif;">
                                Corbeille
                                <i class="fas fa-angle-left right msicons"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="./ArchiveCorbeilles" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Archive</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./ParametreCorbeilles" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Parametre</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./ProvinceCorbeilles" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Provinces</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./CommuneCorbeilles" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p >Commune</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./ArrondissementCorbeilles" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p >Arrondissment</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./QuartierCorbeilles" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p >Quartier</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./PosteCorbeilles" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p >Poste</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./StatutCorbeilles" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p >Statut</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./TypeCorbeilles" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p >Type</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./PaysCorbeilles" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p >Pays</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./ProfilCorbeilles" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p >Profil</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./HabilitationCorbeilles" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p >Habilitation</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./CategorieCorbeilles" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p >Catégorie</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./GestionnaireCorbeilles" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p >Gestionnaire</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./EmmeteurCorbeilles" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p >Emmeteur</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./DestinataireCorbeilles" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p >Destinataire</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./ReceveurCorbeilles" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p >Receveur</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./EntiteCorbeilles" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p >Entité</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./Types-Parametres-Corbeille" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Type de Parametre</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./UserCorbeilles" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Users</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <hr style="background-color: rgb(250, 250, 255);">

                        <form action="{{route('logout')}}" method="POST">@csrf
                            <button type="submit" class="btn nav-link d-flex nav-link-heart">
                                <i class="nav-icon fas fa-power-off msicons"></i>
                            </button>
                        </form>

                    </li>
            </ul>
        </nav>
    </div>
</aside>
