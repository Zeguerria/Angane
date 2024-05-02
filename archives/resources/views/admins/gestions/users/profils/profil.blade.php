{{-- @php
    $droits = array();

    foreach(Auth::user()->profil->profil_habilitations as $key => $value){
        $droits[$key] = $value->habilitation->code;
    }
@endphp --}}

@extends('admins.menus.menu')
@section('titre')
    Profil
@endsection
@section('corps')
    <div class="content-wrapper lebody masection pb-5">
        <div class="content-header pb-5">
            <div class="col-md-12 moncard" >
                <div class="title pt-2">
                    <h4 class="mb-0 bread" style="color:#D9B8F7;"><img src="{{asset('glbal/icon/password.gif')}}" alt="" class="img img-circle " width="50" height="50">&ensp;Profil</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation" class="d-flex justify-content-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item nav-link-heart"><a href="/dashboard"  style="color: #60528A;">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page" style="color:#D097BF;">Profils</li>
                        <li class="breadcrumb-item active" aria-current="page" style="color:#FCF2E9;" >Profil</li>
                    </ol>
                </nav>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Partie 1 -->
                    <div class="col-12 col-md-3 col-ml-3 col-lg-3">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <!-- Image de profil -->
                                    @if(isset(Auth::user()->photo) && Auth::user()->photo !== "")
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{asset(Auth::user()->le_profil)}}"
                                            alt="User profile picture">
                                    @else
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{asset('/glbal/autres/images.png')}}"
                                            alt="User profile picture">
                                    @endif
                                    <!-- Nom et prénom de l'utilisateur -->
                                    <h3 class="profile-username text-center">{{Auth::user()->name}}&ensp;{{Auth::user()->prenom}}</h3>
                                    <!-- Détails utilisateur -->
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item d-flex justify-content-between">
                                            <b>Profil</b><a class="">{{ Auth::user()->profil->libelle }}</a>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between">
                                            <b>Email</b> <a class="float-right">{{Auth::user()->email}}</a>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between">
                                            <b>Telephone</b> <a class="float-right">{{Auth::user()->phone}}</a>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between">
                                            <b>Quartier</b> <a class="float-right">{{Auth::user()->quartier->libelle}}</a>
                                        </li>
                                        <!-- Bouton de modification -->
                                        <li class="list-group-item cardt">
                                            <div class="d-flex justify-content-center">
                                                <!-- Bouton de modification -->
                                                @foreach($users as $key => $value)
                                                    <a class=" btn btn-warning nav-link-heart" type="button" data-toggle="modal" data-target="#modifier{{$value->id}}"><i class="fa fa-edit msicons">&ensp;Modifier</i></a>
                                                    <!-- Modal de modification -->
                                                    <div class="modal fade" id="modifier{{$value->id}}">
                                                        <!-- Contenu du modal -->
                                                    </div>
                                                @endforeach
                                            </div>
                                        </li>
                                    </ul>
                                    <!-- Bouton de déconnexion -->
                                    <form action="{{route('logout')}}" method="POST">
                                        @csrf
                                        <div class="d-flex justify-content-center col-md-7">
                                            <button type="submit" class="btn btn-danger btn-block ">
                                                <i class="nav-icon fas fa-power-off msicons">&ensp;<b>Se deconnecter</b></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Partie 2 -->
                    <div class="col-12 col-md-9 col-ml-9 col-lg-9">
                        <div class="card cardt">
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="timeline" >
                                        <div class="d-flex justify-content-center">
                                            <!-- Image occupant toute la largeur -->
                                            <div class="col-12 d-flex justify-content-center">
                                                <img src="{{ asset('glbal/autres/compte.png') }}" alt="login form" class="img-thumbnail w-100" style="height: 80vh;" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- /.row -->
            </div> <!-- /.container-fluid -->
        </section> <!-- /.content -->

    </div>
@endsection
@section('footer')
@endsection








