<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="Paoul EDOU">
        <meta name="robots" content="noindex, nofollow">
        <title> @yield('titre') </title>

        <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/dgcpt/favicon.ico')}}">
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
        @yield('header')
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        @livewireStyles

    </head>
    <body>

        {{-- <div id="global-loader">
            <div class="whirly-loader"> </div>
        </div> --}}

        <div class="main-wrapper">

            <div class="header">
                <div class="header-left active">
                    <a href="/" class="logo">
                        <img src="{{ asset('assets/img/logo.png')}}" alt="">
                    </a>
                    <a href="/" class="logo-small">
                        <img src="{{ asset('assets/img/logo.png')}}" alt="">
                    </a>
                    <a id="toggle_btn" href="javascript:void(0);">
                    </a>
                </div>

                <a id="mobile_btn" class="mobile_btn" href="#sidebar">
                    <span class="bar-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </a>

                <ul class="nav user-menu">

                    <li class="nav-item">
                        <div class="top-nav-search">
                            <a href="javascript:void(0);" class="responsive-search">
                                <i class="fa fa-search"></i>
                            </a>
                            <form action="#">
                                <div class="searchinputs">
                                    <input type="text" placeholder="Par ici la recherche ...">
                                    <div class="search-addon">
                                        <span><img src="{{ asset('assets/img/icons/closes.svg')}}" alt="img"></span>
                                    </div>
                                </div>
                                <a class="btn" id="searchdiv"><img src="{{ asset('assets/img/icons/search.svg')}}" alt="img"></a>
                            </form>
                        </div>
                    </li>


                    {{-- <li class="nav-item dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                            <img src="{{ asset('assets/img/icons/notification-bing.svg')}}" alt="img"> <span class="badge rounded-pill">4</span>
                        </a>
                        <div class="dropdown-menu notifications">
                            <div class="topnav-dropdown-header">
                                <span class="notification-title">Notifications</span>
                                <a href="javascript:void(0)" class="clear-noti"> Supprimer tout </a>
                            </div>
                            <div class="noti-content">
                                <ul class="notification-list">
                                    <li class="notification-message">
                                        <a href="/">
                                            <div class="media d-flex">
                                                <span class="avatar flex-shrink-0">
                                                    <img alt="" src="{{ asset('assets/img/profiles/avatar-02.jpg')}}">
                                                </span>
                                                <div class="media-body flex-grow-1">
                                                    <p class="noti-details"><span class="noti-title">John Doe</span> added new task <span class="noti-title">Patient appointment booking</span></p>
                                                    <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="topnav-dropdown-footer">
                                <a href="/">Consulter Tous</a>
                            </div>
                        </div>
                    </li> --}}
                    <li class="nav-item dropdown has-arrow main-drop">
                        <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                            <span class="user-img"><img src="{{ asset('assets/img/dgcpt/logo.png')}}" alt="">
                            <span class="status online"></span></span>
                        </a>
                        <div class="dropdown-menu menu-drop-user">
                            <div class="profilename">
                                <div class="profileset">
                                    <span class="user-img"><img src="{{ asset('assets/img/dgcpt/logo.png')}}" alt="">
                                    <span class="status online"></span></span>
                                    <div class="profilesets">
                                        <h6>{{ Auth::user()->name }}</h6>
                                        <h5>Admin</h5>
                                    </div>
                                </div>
                                <hr class="m-0">
                                <a class="dropdown-item" href="/Mon-Profile"> <i class="me-2" data-feather="user"></i> Mon Profile</a>
                                <a class="dropdown-item" href="/Identifiants"><i class="me-2" data-feather="settings"></i>Parametrage</a>
                                <hr class="m-0">

                                <form method="POST" action="{{route('logout')}}"> @csrf
                                    <button type="submit" class="dropdown-item logout pb-0" href=""><img src="{{ asset('assets/img/icons/log-out.svg')}}" class="me-2" alt="img">Deconnexion</button>
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>


                <div class="dropdown mobile-user-menu">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="/Mon-Profile">Mon profil</a>
                        <a class="dropdown-item" href="/Identifiants">Parametrage</a>
                        <a class="dropdown-item" href="">Deconnexion</a>
                    </div>
                </div>
            </div>


            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
                    <div id="sidebar-menu" class="sidebar-menu">
                        <ul>
                            <li>
                                <a href="/"><img src="{{ asset('assets/img/icons/dashboard.svg')}}" alt="img"><span> Tableau bord</span> </a>
                            </li>
                            {{-- <li>
                                <a href="/Archiver"><img src="{{ asset('assets/img/icons/plus-circle.svg')}}" alt="img"><span> Ajouter Archive</span> </a>
                            </li> --}}
                            <li class="submenu">
                                <a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/product.svg')}}" alt="img"><span> Archivage</span> <span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="/Liste-Archivage">Gérer Archives</a></li>
                                    {{-- <li><a href="/recherche-Archive">Retrouver un document</a></li>
                                    <li><a href="/Stat-Archive">Stats Archive</a></li> --}}
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/settings.svg')}}" alt="img"><span> Paramétrages </span> <span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="/Parametres/10">Gérer Sense Documents</a></li>
                                    <li><a href="/Parametres/19">Gérer Receveurs Documents</a></li>
                                    <li><a href="/Parametres/15">Gérer Caegories Documents</a></li>
                                    <li><a href="/Parametres/9">Gérer Entitées Administratives</a></li>
                                    <li><a href="/Parametres/16">Gérer Gestionaires</a></li>
                                    <li><a href="/Parametres/14">Gérer Habilitations</a></li>
                                    <li><a href="/Parametres/13">Gérer Profils</a></li>
                                    <li><a href="/Types-Parametres">Gérer Types Paramètres</a></li>
                                    <li><a href="/Parametres">Gérer Données Paramètres</a></li>
                                </ul>
                            </li>
                            {{-- <li class="submenu">
                                <a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/users1.svg')}}" alt="img"><span> Utilisateurs</span> <span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="/Ajouter-User">Ajouter</a></li>
                                    <li><a href="/Liste-User">Liste Utilisateurs</a></li>
                                    <li><a href="/Profil-User">Profils</a></li>
                                    <li><a href="/Roles-User">Roles</a></li>
                                </ul>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </div>

            <div class="page-wrapper pagehead">
                <div class="content">
                    @yield('corps')
                </div>
            </div>
        </div>


        <script src="{{ asset('assets/js/jquery-3.6.0.min.js')}}"></script>

        <script src="{{ asset('assets/js/feather.min.js')}}"></script>

        <script src="{{ asset('assets/js/jquery.slimscroll.min.js')}}"></script>

        <script src="{{ asset('assets/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{ asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>

        <script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>

        <script src="{{ asset('assets/plugins/select2/js/select2.min.js')}}"></script>

        <script src="{{ asset('assets/plugins/sweetalert/sweetalert2.all.min.js')}}"></script>
        <script src="{{ asset('assets/plugins/sweetalert/sweetalerts.min.js')}}"></script>

        <script src="{{ asset('assets/js/script.js')}}"></script>

        @include('sweetalert::alert')
        @yield('footer')
        @livewireScripts
    </body>
</html>
