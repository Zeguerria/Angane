<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-image: url({{asset('glbal/theme/t7c.jpg')}}) ; background-position: center; background-size: cover; background-repeat: no-repeat;">
    <!-- Brand Logo -->
    <a href="./dashboard" class="brand-link">
      <img src="{{asset('assets/img/dgcpt/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><strong style="font-size: 1.3em; color :hsl(139, 91%, 22%);">E</strong><label for="" style="color :hsl(139, 91%, 22%);">N</label><label for="" style="color :#cbf900;">GA</label><label for="" style="color :#5300f9;">NE</label></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        @if (Route::has('login'))
            @auth
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                  <img src="{{asset(Auth::user()->le_profil)}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                  <a href="#" class="d-block">{{Auth::user()->name}}</a>
                </div>
              </div>

        @else
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block">Alexander Pierce</a>
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
                    <a href="./dashacceuil" class="nav-link nav-link-heart">
                        <i class="nav-icon fas fa-home msicons"></i>
                        <p class="mesliens">
                            Home
                        </p>
                    </a>
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
                            <a href="./user" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./livreur" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Livreur</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./client" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Client</p>
                            </a>
                        </li>

                        {{-- <li class="nav-item">
                            <a href="./destinataire" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Destinataire</p>
                            </a>
                        </li> --}}
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link nav-link-heart">
                        <i class="nav-icon fas fa-clipboard-list msicons"></i>
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


                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-list msicons"></i>
                        <p style="font-size: 20px; color: var(--color-ti); font-family : 'Times New Roman', Times, serif;">
                            Restaurants
                            <i class="fas fa-angle-left right msicons"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./restaurant" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>boutique</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-list msicons"></i>
                        <p style="font-size: 20px; color: var(--color-ti); font-family : 'Times New Roman', Times, serif;">
                            Produits
                            <i class="fas fa-angle-left right msicons"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./adminproduit" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>produits</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-list msicons"></i>
                        <p style="font-size: 20px; color: var(--color-ti); font-family : 'Times New Roman', Times, serif;">
                            Profils
                            <i class="fas fa-angle-left right msicons"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./profilAdmin" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>profil</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fab  fa-jedi-order msicons"></i>
                        <p style="font-size: 20px; color: var(--color-ti); font-family : 'Times New Roman', Times, serif;">
                            Types
                            <i class="fas fa-angle-left right msicons"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./categorie" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Catégorie</p>
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
                        <i class="nav-icon fas fa-trash msicons"></i>
                        <p style="font-size: 20px; color: var(--color-ti); font-family : 'Times New Roman', Times, serif;">
                            Corbeille
                            <i class="fas fa-angle-left right msicons"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./categoriecorbeille" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./clientcorbeille" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Clients</p>
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
                        {{-- <li class="nav-item">
                            <a href="./produitCorbeille" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Produit</p>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="./profilCorbeille" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Profil</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="./profilhabilitationCorbeille" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Profil Habilitation</p>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="./Types-Parametres-Corbeille" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Type de Parametre</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./usercorbeille" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Users</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <hr>

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
