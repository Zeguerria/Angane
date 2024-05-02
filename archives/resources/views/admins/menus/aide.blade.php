{{-- @php
    $droits = array();

    foreach(Auth::user()->profil->profil_habilitations as $key => $value){
        $droits[$key] = $value->habilitation->code;
    }
@endphp --}}


@extends('admins.menus.menu')
@section('titre')
    Aide
@endsection
@section('header')
@endsection
@section('corps')

    <div class="content-wrapper lebody masection pb-5">
        <div class="content-header pb-5">
            <div class="col-md-12 moncard" >
                <div class="title pt-2">
                    <h4 class="mb-0 bread " style="color:#D9B8F7;"><img src="{{asset('glbal/icon/support.gif')}}" alt="" class="img img-circle " width="50" height="50">&ensp;Aides</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation" class="d-flex justify-content-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item nav-link-heart"><a href="/dashboard"  style="color: #60528A;">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page" style="color:#D097BF;">menu</li>
                        <li class="breadcrumb-item active" aria-current="page" style="color:#FCF2E9;" >Aide</li>
                    </ol>
                </nav>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                    <!-- Introduction Section -->
                    <section class="container my-5">
                        <h2>Bienvenue dans l'aide de l'application de gestion d'archive</h2>
                        <p>Cette page fournit des informations et des instructions pour utiliser les fonctionnalités de l'application.</p>
                    </section>


                    <!-- Fonctionnalités Section -->
                    <section class="container">


                        <h3>Fonctionnalités principales</h3>


                        <div class="row">
                            <div class="col-md-6">
                                <h4>Ajouter un fichier</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
                                <button class="btn btn-primary">Ajouter un fichier</button>
                            </div>
                            <div class="col-md-6">
                                <h4>Rechercher un fichier</h4>
                                    <p>Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta.</p>
                                <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Rechercher un fichier" aria-label="Rechercher un fichier" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button">Rechercher</button>
                                </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    </div>
                </div>
            </div>
        </section>
    </div>
 @endsection
 @section('footer')
 @endsection








