{{-- @php
    $droits = array();

    foreach(Auth::user()->profil->profil_habilitations as $key => $value){
        $droits[$key] = $value->habilitation->code;
    }
@endphp --}}


@extends('admins.menus.menu')
@section('titre')
Archives
@endsection
@section('header')
@endsection
@section('corps')

    <div class="content-wrapper lebody masection pb-5">
        <div class="content-header pb-5">
            <div class="col-md-12 " style="background-image: url({{asset('glbal/theme/t7.jpg')}}) ;  background-size: cover; background-repeat: no-repeat;" >
                <div class="title pt-2">
                    <h4 class="mb-0 bread " style="color:#D9B8F7;"><img src="{{asset('glbal/icon/archive.gif')}}" alt="" class="img img-circle classe_de_vos_elements_gif" width="50" height="50">&ensp;Archives</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation" class="d-flex justify-content-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item nav-link-heart"><a href="./dashboard"  style="color: #60528A;">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page" style="color:#D097BF;">Archivages</li>
                        <li class="breadcrumb-item active" aria-current="page" style="color:#FCF2E9;" >Archive</li>
                    </ol>
                </nav>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header moncard" >
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col">
                                            <button class="btn nav-link-heart" data-bs-toggle="tooltip" title="Ajouter" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus msicons" style="font-size: 30px; color:#7bff00;"></i></button>
                                            {{-- MODAL AJOUTER DEBUT --}}
                                                <div class="modal fade custom-modal" id="modal-default" data-backdrop="static">
                                                    <div class="modal-dialog  modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header bgnav" style="background-image: url({{asset('glbal/theme/t7.jpg')}}) ;  background-size: cover; background-repeat: no-repeat;">
                                                                <h4 class="modal-title fw-bold titre-grandiant" style="font-size : 35px; font-weight: 900; "><span><i class="fas fa-file-archive"></i></span>&ensp;Ajouter une Archive</h4>
                                                                <button type="button" class="close nav-link-heart" data-dismiss="modal" aria-label="Close" style="color: #B460B5;">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="bs-stepper">
                                                                    <div class="bs-stepper-header" role="tablist">
                                                                        <!-- Steps -->
                                                                        <div class="step" data-target="#logins-part">
                                                                            <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                                                                                <span class="bs-stepper-circle">1</span>
                                                                                <span class="bs-stepper-label">Types</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="line"></div>
                                                                        <div class="step" data-target="#information-part">
                                                                            <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                                                                                <span class="bs-stepper-circle">2</span>
                                                                                <span class="bs-stepper-label">Informations</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="line"></div>
                                                                        <div class="step" data-target="#validation-part">
                                                                            <button type="button" class="step-trigger" role="tab" aria-controls="validation-part" id="validation-part-trigger">
                                                                                <span class="bs-stepper-circle">3</span>
                                                                                <span class="bs-stepper-label"> Validation</span>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                    <!-- Form encompassing both steps -->
                                                                    <form action="{{ route('AjouterArchive') }}" method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <div class="bs-stepper-content pt-2">
                                                                            <!-- Step 1 content -->
                                                                            <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                                                                                <div class="container-fluid pb-1">
                                                                                    <div class="row">
                                                                                        <div class="col-12 col-md-6 col-ml-6 col-lg-6">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fas fa-code-branch"></i>&ensp;N° Enrégistrement</label>
                                                                                                <input class="form-control" type="text" name="code" required>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-6 col-sm-6 col-12">
                                                                                            <div class="form-group">
                                                                                                <label style=" color: var(--color-t); font-family: italic;"><i class="fas fa-asterisk"></i>&ensp;Référence du document</label>
                                                                                                <input class="form-control" type="text" name="libelle" required>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-6 col-sm-6 col-12">
                                                                                            <div class="form-group">
                                                                                                <label style=" color: var(--color-t); font-family: italic;"><i class="fas fa-bullseye"></i>&ensp;Objet du document</label>
                                                                                                <input class="form-control" type="text" name="objet" required>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-6 col-sm-6 col-12">
                                                                                            <div class="form-group">
                                                                                                <label style=" color: var(--color-t); font-family: italic;"><i class="fas fa-map-signs"></i>&ensp;Sens du document</label>
                                                                                                <select class="form-control select2 text-start"  name="type_id" style="width: 100%;">
                                                                                                    @foreach ($sens as $key => $sen)
                                                                                                        <option class="text-start" value="{{$sen->id}}">{{$sen->libelle}}</option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-6 col-sm-6 col-12">
                                                                                            <div class="form-group">
                                                                                                <label style=" color: var(--color-t); font-family: italic;"><i class="fas fa-tag"></i>&ensp;Categorie de document</label>
                                                                                                <select class="form-control select2 text-start"  name="categorie_id" style="width: 100%;">
                                                                                                    @foreach ($categories as $key => $categorie)
                                                                                                        <option class="text-start" value="{{$categorie->id}}">{{$categorie->libelle}}</option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-6 col-sm-6 col-12">
                                                                                            <div class="form-group">
                                                                                                <label style=" color: var(--color-t); font-family: italic;"><i class="fas fa-user-tag"></i>&ensp;Nom du Gestionaire</label>
                                                                                                <select class="form-control select2 text-start"  name="gestionaire_id" style="width: 100%;">
                                                                                                    @foreach ($gestionaires as $key => $gestionaire)
                                                                                                        <option class="text-start" value="{{$gestionaire->id}}">{{$gestionaire->libelle}}</option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>

                                                                                </div>
                                                                                <!-- Modal footer with "Next" button -->
                                                                                <div class="modal-footer justify-content-between bgnav" style="background-image: url({{asset('glbal/theme/t7.jpg')}}) ;  background-size: cover; background-repeat: no-repeat;">
                                                                                    <button type="button" class="btn mr-md-2 mb-md-0 mb-2 btn-outline-danger btn-round nav-link-heart"  data-dismiss="modal" style=" font-family: italic ;color:#D9B8F7;"><i class="fas fa-exclamation-triangle msicons"></i>&ensp;Fermer</button>
                                                                                    <button type="button" onclick="stepper.next()" class="btn mr-md-2 mb-md-0 mb-2 btn-outline-primary btn-round nav-link-heart" style=" font-family: italic ;color:#D9B8F7;">Anvancer&ensp;<i class="fas fa-arrow-right"></i></button>
                                                                                </div>
                                                                            </div>
                                                                            <!-- Step 2 content -->
                                                                            <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                                                                                <div class="container-fluid pb-1">
                                                                                    <div class="row">
                                                                                        <div class="col-lg-6 col-sm-6 col-12">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fas fa-building" aria-hidden="true"></i>&ensp;Entité administrative du Concerné</label>
                                                                                                    <select class="form-control select2 text-start"  name="poste_id" style="width: 100%;">
                                                                                                    @foreach ($postes as $key => $poste)
                                                                                                        <option class="text-start" value="{{$poste->id}}">{{$poste->libelle}}</option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-6 col-sm-6 col-12">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fas fa-paper-plane" aria-hidden="true"></i>&ensp;Emetteur</label>
                                                                                                    <select class="form-control select2 text-start"  name="emeteur_id" style="width: 100%;">
                                                                                                    @foreach ($emeteurs as $key => $emeteur)
                                                                                                        <option class="text-start" value="{{$emeteur->id}}">{{$emeteur->libelle}}</option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-6 col-sm-6 col-12">
                                                                                            <div class="form-group">
                                                                                                <label style=" color: var(--color-t); font-family: italic;"><i class="fas fa-calendar" aria-hidden="true"></i>&ensp;Date Emission</label>
                                                                                                <input type="date" class="form-control" name="date_emission" required>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-6 col-sm-6 col-12">
                                                                                            <div class="form-group">
                                                                                                <label style=" color: var(--color-t); font-family: italic;"><i class="fa fa-street-view" aria-hidden="true"></i>&ensp;Destinataire</label>
                                                                                                <select class="form-control select2 text-start"  name="destinataire_id" style="width: 100%;">
                                                                                                    @foreach ($destinataires as $key => $destinataire)
                                                                                                        <option class="text-start" value="{{$destinataire->id}}">{{$destinataire->libelle}}</option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-6 col-sm-6 col-12">
                                                                                            <div class="form-group">
                                                                                                <label style=" color: var(--color-t); font-family: italic;"><i class="fas fa-calendar-check" aria-hidden="true"></i>&ensp;Date Reception</label>
                                                                                                <input type="date"  class="form-control" name="date_reception">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-6 col-sm-6 col-12">
                                                                                            <div class="form-group">
                                                                                                <label style=" color: var(--color-t); font-family: italic;"><i class="fas fa-user-tie"></i>&ensp;Nom Receveur (Accusé de réception)</label>
                                                                                                    <select class="form-control select2 text-start"  name="receveur_id" style="width: 100%;">
                                                                                                    @foreach ($receveurs as $key => $receveur)
                                                                                                        <option class="text-start" value="{{$receveur->id}}">{{$receveur->libelle}}</option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- Modal footer with "Previous" and "Submit" buttons -->
                                                                                <div class="modal-footer justify-content-between bgnav" style="background-image: url({{asset('glbal/theme/t7.jpg')}}) ;  background-size: cover; background-repeat: no-repeat;">
                                                                                    <button type="button" onclick="stepper.previous()" class="btn mr-md-2 mb-md-0 mb-2 btn-outline-primary btn-round nav-link-heart" style=" font-family: italic ;color:#D9B8F7;"><i class="fas fa-arrow-left"></i>&ensp;Reculer</button>
                                                                                    <button type="button" onclick="stepper.next()" class="btn mr-md-2 mb-md-0 mb-2 btn-outline-primary btn-round nav-link-heart" style=" font-family: italic ;color:#D9B8F7;">Anvancer&ensp;<i class="fas fa-arrow-right"></i></button>

                                                                                </div>
                                                                            </div>
                                                                            <div id="validation-part" class="content" role="tabpanel" aria-labelledby="validation-part-trigger">
                                                                                <div class="container-fluid pb-1">
                                                                                    <div class="row">
                                                                                        <div class="col-lg-6 col-sm-6 col-12">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fas fa-crosshairs" aria-hidden="true"></i>&ensp;Ampillation</label>
                                                                                                <input type="text" class="form-control" name="ampillation" >
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-6 col-sm-6 col-12">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fas fa-file" aria-hidden="true"></i>&ensp;Document à archiver</label>
                                                                                                <div class="input-group">
                                                                                                    <div class="custom-file">
                                                                                                        <input type="file" class="custom-file-input" id="exampleInputFile" required name="fichier">
                                                                                                        <label class="custom-file-label" for="exampleInputFile">Selectionnez le fichier</label>
                                                                                                    </div>
                                                                                                    <div class="input-group-append">
                                                                                                        <span class="input-group-text">Upload</span>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-12 col-sm-12 col-12">
                                                                                            <div class="form-group">
                                                                                                <label style=" color: var(--color-t); font-family: italic;"><i class="fas fa-comment" aria-hidden="true"></i>&ensp;Description</label>
                                                                                                <textarea class="form-control" name="desc"></textarea>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-lg-12 col-sm-12 col-12">
                                                                                            <div class="form-group nav-link-heart">
                                                                                                <div class="icheck-primary d-inline">
                                                                                                    <input type="checkbox" id="checkboxPrimary3" name="type_fichier" value="1" id="user2">
                                                                                                    <label for="checkboxPrimary3" style=" color: var(--color-t); font-family: italic;">
                                                                                                        Document Privé
                                                                                                    </label>
                                                                                                </div>

                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer justify-content-between bgnav" style="background-image: url({{asset('glbal/theme/t7.jpg')}}) ;  background-size: cover; background-repeat: no-repeat;">
                                                                                    <button type="button" onclick="stepper.previous()" class="btn mr-md-2 mb-md-0 mb-2 btn-outline-primary btn-round btn-round nav-link-heart" style=" font-family: italic ;color:#D9B8F7;"><i class="fas fa-arrow-left"></i>&ensp;Reculer</button>
                                                                                    <button type="submit" class="btn mr-md-2 mb-md-0 mb-2 btn-outline-success btn-round nav-link-heart" style=" font-family: italic ;color:#D9B8F7;"><i class="fas fa-save"></i>&ensp; Enregistrer</button>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            {{-- MODAL AJOUTER FIN --}}

                                        </div>
                                        <div class="col-md-9 pt-4 d-flex nav justify-content-end">
                                            <div class="form-group">
                                                <label for=""><a href="./Archives" class="btn nav-link-heart" id="" data-bs-toggle="tooltip" title="total archives" ><i class="fas fa-file-archive" style="color :#D9B8F7; font-size: 20px;"></i></a><sup style="color :#D9B8F7;">{{$ArchiveTotal}}</sup></label>
                                                <label for=""><a href="./ArchiveCorbeilles" class="btn nav-link-heart" id="" data-bs-toggle="tooltip" data-placement="bottom" title="total archives en corbeille"><i class="fa fa-trash msicons" style="color :#D9B8F7; font-size: 20px;"></i></a><sup style="color :#D9B8F7;">{{$ArchiveTotalC}}</sup></label>
                                            </div>

                                            <a href="#" class="btn nav-link-heart" id="A" data-bs-toggle="tooltip" title="Option"><i class="fa fa-ellipsis-v" style="color :#D9B8F7; font-size: 20px;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped ">
                                    <thead>
                                        <tr class="text-center">
                                            <th>#</th>
                                            {{-- <th>N° Enrégistrement</th> --}}
                                            {{-- <th>Référence du document</th> --}}
                                            <th>Objet/Raison</th>
                                            {{-- <th>Sens du document</th> --}}
                                            {{-- <th>Categorie de document</th> --}}
                                            {{-- <th>Nom du Gestionaire</th> --}}
                                            <th>Entité administrative du Concerné</th>
                                            <th>Emetteur</th>
                                            <th>Date d'ajout</th>
                                            <th>Destinataire</th>
                                            {{-- <th>Date Reception</th> --}}
                                            <th>Receveur</th>
                                            {{-- <th>Ampliation</th> --}}
                                            <th>Fichier</th>
                                            {{-- <th>Ampliation</th> --}}
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                        @foreach($archives as $key => $value)
                                            <tr>
                                                <td class="text-center">{{$key+1}}</td>


                                                {{-- <td class="text-center"> {{$value->code}}</td> --}}

                                                {{-- <td class="text-center">{{$value->libelle}}</td> --}}
                                                <td class="text-center">{{$value->objet}}</td>
                                                {{-- <td class="text-center">{{$value->type->libelle}}</td> --}}
                                                {{-- <td class="text-center">{{$value->categorie->libelle}}</td> --}}
                                                {{-- <td class="text-center">{{$value->gestionaire->libelle}}</td> --}}
                                                <td class="text-center">{{$value->poste->libelle}}</td>
                                                <td class="text-center">{{$value->lemetteur->libelle}}</td>
                                                <td class="text-center">{{$value->date_emission}}</td>

                                                <td class="text-center">{{$value->ledestinataire->libelle}}</td>

                                                {{-- <td class="text-center">{{$value->date_reception}}</td> --}}
                                                <td class="text-center">{{$value->lereceveur->libelle}}</td>
                                                {{-- <td class="text-center">{{$value->ampillation}}</td> --}}
                                                <td class="text-center">
                                                    <a href="{{ $value->lienfichier }}" class="btn-outline nav-link-heart" data-bs-toggle="tooltip" title="Voir l'archive" data-placement="bottom">
                                                        <center>
                                                            <img src="{{asset($value->icon)}}" alt="" class="img img-fluid" width="50" height="50">
                                                        </center>
                                                    </a>
                                                </td>

                                                <td style="" class="sorting_1 text-center">
                                                    <div class="btn-group">
                                                        <div style="">
                                                            <div class="">
                                                                <div class="btn-group btn-block">
                                                                <a type="button" class="btn btn-success nav-link-heart" data-bs-toggle="tooltip" title="Consulter" data-toggle="modal" data-target="#consulter{{$value->id}}"><i class="fas fa-eye" style="font-size: 20px; color:#050034;"></i></a>
                                                                <a type="button" class="btn btn-outline-warning nav-link-heart" data-bs-toggle="tooltip" data-placement="bottom" title="Modifier" data-toggle="modal" data-target="#modifier{{$value->id}}"><i class="fas fa-edit" style="font-size: 20px; color:#050034;"></i></a>
                                                                <a type="button" class="btn btn-danger nav-link-heart"  data-bs-toggle="tooltip" title="Supprimer" data-toggle="modal" data-target="#corbeille{{$value->id}}"><i class="fas fa-trash" style="font-size: 20px; color:#050034;"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <div class="s">
                                                    <!--CONSULTER-->
                                                    <div class="modal fade" id="consulter{{$value->id}}">
                                                        <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">
                                                            <div class="modal-header bgnav" style="background-image: url({{asset('glbal/theme/t7.jpg')}}) ;  background-size: cover; background-repeat: no-repeat;">
                                                                <h4 class="modal-title titre-grandiant" style="font-size : 35px; font-weight: 900; "><span><i class="fas fa-spinner"></i></span>&ensp;Consulter l'archive destinée a : {{$value->lereceveur->libelle}}</h4>
                                                                <button type="button" class="close nav-link-heart" data-dismiss="modal" aria-label="Close" style="color: #B460B5;">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form>
                                                                    @csrf
                                                                    <!--corp du formulaire debut-->
                                                                    <div>
                                                                        <div class="container-fluid">
                                                                            <div class="row">
                                                                                <div class="col-12 col-md-12 col-ml-9 col-lg-8">
                                                                                    <div class="container-fluid">
                                                                                        <div class="row">
                                                                                            <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-6">
                                                                                                <div class="form-group">
                                                                                                    <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fas fa-code-branch"></i>&ensp;N° Enrégistrement</label>
                                                                                                    <input class="form-control" type="text" name="code" required value="{{$value->code}}" readonly id="consulter{{$value->id}}">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-6">
                                                                                                <div class="form-group">
                                                                                                    <label style=" color: var(--color-t); font-family: italic;"><i class="fas fa-asterisk"></i>&ensp;Référence document</label>
                                                                                                    <input class="form-control" type="text" name="libelle" required value="{{$value->libelle}}" readonly id="consulter{{$value->id}}">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-6">
                                                                                                <div class="form-group">
                                                                                                    <label style=" color: var(--color-t); font-family: italic;"><i class="fas fa-bullseye"></i>&ensp;Objet du document</label>
                                                                                                    <input class="form-control" type="text" name="objet" required value="{{$value->objet}}" readonly id="consulter{{$value->id}}">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-6">
                                                                                                <div class="form-group">
                                                                                                    <label style=" color: var(--color-t); font-family: italic;"><i class="fas fa-map-signs"></i>&ensp;Sens du document</label>
                                                                                                    <select class="form-control select2 text-start" disabled  name="type_id" style="width: 100%;">
                                                                                                        @foreach ($sens as $key => $sen)
                                                                                                            <option class="text-start" value="{{$sen->id}}" {{($sen->id==$value->type_id)?"selected":""}}>{{$sen->libelle}}</option>
                                                                                                        @endforeach
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-6">
                                                                                                <div class="form-group">
                                                                                                    <label style=" color: var(--color-t); font-family: italic;"><i class="fas fa-tag"></i>&ensp;Categorie document</label>
                                                                                                    <select class="form-control select2 text-start"  disabled name="categorie_id" style="width: 100%;">
                                                                                                        @foreach ($categories as $key => $categorie)
                                                                                                            <option class="text-start" value="{{$categorie->id}}" {{($categorie->id==$value->categorie_id)?"selected":""}}>{{$categorie->libelle}}</option>
                                                                                                        @endforeach
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-6">
                                                                                                <div class="form-group">
                                                                                                    <label style=" color: var(--color-t); font-family: italic;"><i class="fas fa-user-tag"></i>&ensp;Nom du Gestionaire</label>
                                                                                                    <select class="form-control select2 text-start" disabled  name="gestionaire_id" style="width: 100%;">
                                                                                                        @foreach ($gestionaires as $key => $gestionaire)
                                                                                                            <option class="text-start" value="{{$gestionaire->id}}" {{($gestionaire->id==$value->gestionaire_id)?"selected":""}}>{{$gestionaire->libelle}}</option>
                                                                                                        @endforeach
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-6">
                                                                                                <div class="form-group">
                                                                                                    <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fas fa-building" aria-hidden="true"></i>&ensp;Entité administrative du Concerné</label>
                                                                                                        <select class="form-control select2 text-start"  disabled name="poste_id" style="width: 100%;">
                                                                                                        @foreach ($postes as $key => $poste)
                                                                                                            <option class="text-start" value="{{$poste->id}}" {{($poste->id==$value->poste_id)?"selected":""}}>{{$poste->libelle}}</option>
                                                                                                        @endforeach
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-6">
                                                                                                <div class="form-group">
                                                                                                    <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fas fa-crosshairs" aria-hidden="true"></i>&ensp;Ampillation</label>
                                                                                                    <input type="text" class="form-control" name="ampillation" value="{{$value->ampillation}}" readonly id="consulter{{$value->id}}" >
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-6">
                                                                                                <div class="form-group">
                                                                                                    <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fas fa-paper-plane" aria-hidden="true"></i>&ensp;Emetteur</label>
                                                                                                        <select class="form-control select2 text-start" disabled  name="emeteur_id" style="width: 100%;">
                                                                                                        @foreach ($emeteurs as $key => $emeteur)
                                                                                                            <option class="text-start" value="{{$emeteur->id}}" {{($emeteur->id==$value->emeteur_id)?"selected":""}}>{{$emeteur->libelle}}</option>
                                                                                                        @endforeach
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-6">
                                                                                                <div class="form-group">
                                                                                                    <label style=" color: var(--color-t); font-family: italic;"><i class="fas fa-calendar" aria-hidden="true"></i>&ensp;Date Emission</label>
                                                                                                    <input type="date" class="form-control" name="date_emission" required value="{{$value->date_emission}}" readonly id="consulter{{$value->id}}">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-6">
                                                                                                <div class="form-group">
                                                                                                    <label style=" color: var(--color-t); font-family: italic;"><i class="fa fa-street-view" aria-hidden="true"></i>&ensp;Destinataire</label>
                                                                                                    <select class="form-control select2 text-start" disabled name="destinataire_id" style="width: 100%;">
                                                                                                        @foreach ($destinataires as $key => $destinataire)
                                                                                                            <option class="text-start" value="{{$destinataire->id}}" {{($destinataire->id==$value->destinataire_id)?"selected":""}}>{{$destinataire->libelle}}</option>
                                                                                                        @endforeach
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-6">
                                                                                                <div class="form-group">
                                                                                                    <label style=" color: var(--color-t); font-family: italic;"><i class="fas fa-calendar-check" aria-hidden="true"></i>&ensp;Date Reception</label>
                                                                                                    <input type="date"  class="form-control" name="date_reception" value="{{$value->date_reception}}" readonly id="consulter{{$value->id}}">
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-12 ">
                                                                                                <div class="form-group">
                                                                                                    <div class="icheck-primary d-inline">
                                                                                                        @if($value->type_fichier !='0')
                                                                                                            <input type="checkbox" id="checkboxPrimary3"  name="type_fichier" checked disabled  id="user2" value="{{$value->type_fichier}}">

                                                                                                        @else
                                                                                                            <input type="checkbox" id="checkboxPrimary3"  name="type_fichier" disabled  id="user2" value="{{$value->type_fichier}}">
                                                                                                        @endif
                                                                                                        <label for="checkboxPrimary3" style=" color: var(--color-t); font-family: italic;">
                                                                                                            Document Privé
                                                                                                        </label>
                                                                                                    </div>

                                                                                                </div>
                                                                                            </div>



                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12 col-md-12 col-ml-3 col-lg-4">
                                                                                    <div class="container-fluid">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <a href="{{url('lienverslefichier',$value->id)}}" class="btn-outline nav-link-heart" data-bs-toggle="tooltip" title="Voir l'archive" data-placement="bottom">
                                                                                                        <center>
                                                                                                            <img src="{{asset($value->icon)}}" alt="" class="img img-thumbnail" >
                                                                                                        </center>
                                                                                                    </a>
                                                                                                </div>

                                                                                            </div>
                                                                                            <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-12">
                                                                                                <div class="form-group">
                                                                                                    <label style=" color: var(--color-t); font-family: italic;"><i class="fas fa-user-tie"></i>&ensp;Nom Receveur (Accusé de réception)</label>
                                                                                                        <select class="form-control select2 text-start" disabled  name="receveur_id" style="width: 100%;">
                                                                                                        @foreach ($receveurs as $key => $receveur)
                                                                                                            <option class="text-start" value="{{$receveur->id}}" {{($receveur->id==$value->receveur_id)?"selected":""}}>{{$receveur->libelle}}</option>
                                                                                                        @endforeach
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-12">
                                                                                                <div class="form-group">
                                                                                                    <label style=" color: var(--color-t); font-family: italic;"><i class="fas fa-comment" aria-hidden="true"></i>&ensp;Description</label>
                                                                                                    <textarea class="form-control" name="desc" value="{{$value->desc}}" readonly id="consulter{{$value->id}}">{{$value->desc}}</textarea>
                                                                                                </div>
                                                                                            </div>


                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="">
                                                                        <div class="">
                                                                            <div class="modal-footer justify-content-between bgnav" style="background-image: url({{asset('glbal/theme/t7.jpg')}}) ;  background-size: cover; background-repeat: no-repeat;">
                                                                                <button type="button" class="btn mr-md-2 mb-md-0 mb-2 btn-outline-danger btn-round nav-link-heart"  data-dismiss="modal" style=" font-family: italic ;color:#D9B8F7;"><i class="fas fa-exclamation-triangle msicons"></i>&ensp;Fermer</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </form>

                                                            </div>

                                                        </div>
                                                        </div>
                                                    </div>
                                                    <!--MODIFIER-->
                                                    <div class="modal fade" id="modifier{{$value->id}}" data-backdrop="static">
                                                        <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">
                                                            <div class="modal-header bgnav" style="background-image: url({{asset('glbal/theme/t7.jpg')}}) ;  background-size: cover; background-repeat: no-repeat;">
                                                                <h4 class="modal-title titre-grandiant" style="font-size : 35px; font-weight: 900; "><span><i class="fas fa-spinner"></i></span>&ensp;Modifier l'archive destinée a : {{$value->lereceveur->libelle}}</h4>
                                                                <button type="button" class="close nav-link-heart" data-dismiss="modal" aria-label="Close" style="color: #B460B5;">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('ModifierArchive') }}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <input type="hidden" name="id" value="{{$value->id}}">
                                                                    <!--corp du formulaire debut-->
                                                                    <div>
                                                                        <div class="container-fluid">
                                                                            <div class="row">
                                                                                <div class="col-12 col-md-12 col-ml-9 col-lg-8">
                                                                                    <div class="container-fluid">
                                                                                        <div class="row">
                                                                                            <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-6">
                                                                                                <div class="form-group">
                                                                                                    <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fas fa-code-branch"></i>&ensp;N° Enrégistrement</label>
                                                                                                    <input class="form-control" type="text" name="code"  value="{{$value->code}}" id="modifier{{$value->id}}">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-6">
                                                                                                <div class="form-group">
                                                                                                    <label style=" color: var(--color-t); font-family: italic;"><i class="fas fa-asterisk"></i>&ensp;Référence document</label>
                                                                                                    <input class="form-control" type="text" name="libelle"  value="{{$value->libelle}}" id="modifier{{$value->id}}">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-6">
                                                                                                <div class="form-group">
                                                                                                    <label style=" color: var(--color-t); font-family: italic;"><i class="fas fa-bullseye"></i>&ensp;Objet du document</label>
                                                                                                    <input class="form-control" type="text" name="objet"  value="{{$value->objet}}"  id="modifier{{$value->id}}">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-6">
                                                                                                <div class="form-group">
                                                                                                    <label style=" color: var(--color-t); font-family: italic;"><i class="fas fa-map-signs"></i>&ensp;Sens du document</label>
                                                                                                    <select class="form-control select2 text-start"  name="type_id" style="width: 100%;">
                                                                                                        @foreach ($sens as $key => $sen)
                                                                                                            <option class="text-start" value="{{$sen->id}}" {{($sen->id==$value->type_id)?"selected":""}}>{{$sen->libelle}}</option>
                                                                                                        @endforeach
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-6">
                                                                                                <div class="form-group">
                                                                                                    <label style=" color: var(--color-t); font-family: italic;"><i class="fas fa-tag"></i>&ensp;Categorie document</label>
                                                                                                    <select class="form-control select2 text-start"  name="categorie_id" style="width: 100%;">
                                                                                                        @foreach ($categories as $key => $categorie)
                                                                                                            <option class="text-start" value="{{$categorie->id}}" {{($categorie->id==$value->categorie_id)?"selected":""}}>{{$categorie->libelle}}</option>
                                                                                                        @endforeach
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-6">
                                                                                                <div class="form-group">
                                                                                                    <label style=" color: var(--color-t); font-family: italic;"><i class="fas fa-user-tag"></i>&ensp;Nom du Gestionaire</label>
                                                                                                    <select class="form-control select2 text-start"  name="gestionaire_id" style="width: 100%;">
                                                                                                        @foreach ($gestionaires as $key => $gestionaire)
                                                                                                            <option class="text-start" value="{{$gestionaire->id}}" {{($gestionaire->id==$value->gestionaire_id)?"selected":""}}>{{$gestionaire->libelle}}</option>
                                                                                                        @endforeach
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-6">
                                                                                                <div class="form-group">
                                                                                                    <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fas fa-building" aria-hidden="true"></i>&ensp;Entité administrative du Concerné</label>
                                                                                                        <select class="form-control select2 text-start"  name="poste_id" style="width: 100%;">
                                                                                                        @foreach ($postes as $key => $poste)
                                                                                                            <option class="text-start" value="{{$poste->id}}" {{($poste->id==$value->poste_id)?"selected":""}}>{{$poste->libelle}}</option>
                                                                                                        @endforeach
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-6">
                                                                                                <div class="form-group">
                                                                                                    <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fas fa-crosshairs" aria-hidden="true"></i>&ensp;Ampillation</label>
                                                                                                    <input type="text" class="form-control" name="ampillation" value="{{$value->ampillation}}" id="modifier{{$value->id}}" >
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-6">
                                                                                                <div class="form-group">
                                                                                                    <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fas fa-paper-plane" aria-hidden="true"></i>&ensp;Emetteur</label>
                                                                                                        <select class="form-control select2 text-start" name="emeteur_id" style="width: 100%;">
                                                                                                        @foreach ($emeteurs as $key => $emeteur)
                                                                                                            <option class="text-start" value="{{$emeteur->id}}" {{($emeteur->id==$value->emeteur_id)?"selected":""}}>{{$emeteur->libelle}}</option>
                                                                                                        @endforeach
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-6">
                                                                                                <div class="form-group">
                                                                                                    <label style=" color: var(--color-t); font-family: italic;"><i class="fas fa-calendar" aria-hidden="true"></i>&ensp;Date Emission</label>
                                                                                                    <input type="date" class="form-control" name="date_emission"  value="{{$value->date_emission}}" id="modifier{{$value->id}}">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-12">
                                                                                                <div class="form-group">
                                                                                                    <label style=" color: var(--color-t); font-family: italic;"><i class="fa fa-street-view" aria-hidden="true"></i>&ensp;Destinataire</label>
                                                                                                    <select class="form-control select2 text-start"  name="destinataire_id" style="width: 100%;">
                                                                                                        @foreach ($destinataires as $key => $destinataire)
                                                                                                            <option class="text-start" value="{{$destinataire->id}}" {{($destinataire->id==$value->destinataire_id)?"selected":""}}>{{$destinataire->libelle}}</option>
                                                                                                        @endforeach
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-6">
                                                                                                <div class="form-group">
                                                                                                    <label style=" color: var(--color-t); font-family: italic;"><i class="fas fa-calendar-check" aria-hidden="true"></i>&ensp;Date Reception</label>
                                                                                                    <input type="date"  class="form-control" name="date_reception" value="{{$value->date_reception}}"  id="modifier{{$value->id}}">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-6">
                                                                                                <div class="form-group">
                                                                                                    <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fas fa-file" aria-hidden="true"></i>&ensp;Document à archiver</label>
                                                                                                    <div class="input-group">
                                                                                                        <div class="custom-file">
                                                                                                            <input type="file" class="custom-file-input" id="exampleInputFile"  name="fichier">
                                                                                                            <label class="custom-file-label" for="exampleInputFile">Selectionnez le fichier</label>
                                                                                                        </div>
                                                                                                        <div class="input-group-append">
                                                                                                            <span class="input-group-text">Upload</span>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                </div>
                                                                                            </div>





                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12 col-md-12 col-ml-3 col-lg-4">
                                                                                    <div class="container-fluid">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <a href="{{url('lienverslefichier',$value->id)}}" class="btn-outline nav-link-heart" data-bs-toggle="tooltip" title="Voir l'archive" data-placement="bottom">
                                                                                                        <center>
                                                                                                            <img src="{{asset($value->icon)}}" alt="" class="img img-thumbnail" >
                                                                                                        </center>
                                                                                                    </a>
                                                                                                </div>

                                                                                            </div>
                                                                                            <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-12">
                                                                                                <div class="form-group">
                                                                                                    <label style=" color: var(--color-t); font-family: italic;"><i class="fas fa-user-tie"></i>&ensp;Nom Receveur (Accusé de réception)</label>
                                                                                                        <select class="form-control select2 text-start"  name="receveur_id" style="width: 100%;">
                                                                                                        @foreach ($receveurs as $key => $receveur)
                                                                                                            <option class="text-start" value="{{$receveur->id}}" {{($receveur->id==$value->receveur_id)?"selected":""}}>{{$receveur->libelle}}</option>
                                                                                                        @endforeach
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-12">
                                                                                                <div class="form-group">
                                                                                                    <label style=" color: var(--color-t); font-family: italic;"><i class="fas fa-comment" aria-hidden="true"></i>&ensp;Description</label>
                                                                                                    <textarea class="form-control" name="desc"  id="consulter{{$value->id}}">{{$value->desc}}</textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-12 pt-2">
                                                                                                    <div class="form-group nav-link-heart">
                                                                                                        <div class="icheck-primary d-inline nav-link-heart">
                                                                                                            <input type="checkbox" id="checkboxPrimary1" name="type_fichier" value="1" @if($value->type_fichier == 1) checked  @endif>
                                                                                                            <label for="checkboxPrimary1" style=" color: var(--color-t); font-family: italic;">
                                                                                                                Document Privé
                                                                                                            </label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>

                                                                                            </div>



                                                                                        </div>
                                                                                    </div>

                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="">
                                                                        <div class="modal-footer justify-content-between bgnav" style="background-image: url({{asset('glbal/theme/t7.jpg')}}) ;  background-size: cover; background-repeat: no-repeat;">
                                                                            <button type="button" class="btn mr-md-2 mb-md-0 mb-2 btn-outline-danger btn-round nav-link-heart"  data-dismiss="modal" style=" font-family: italic ;color:#D9B8F7;"><i class="fas fa-exclamation-triangle "></i>&ensp;Fermer</button>
                                                                            <button type="submit" class="btn mr-md-2 mb-md-0 mb-2 btn-outline-success btn-round nav-link-heart" style=" font-family: italic ;color:#D9B8F7;"><i class="fas fa-save"></i>&ensp;Modifier et Fermer</button>
                                                                        </div>
                                                                    </div>

                                                                </form>

                                                            </div>

                                                        </div>
                                                        </div>
                                                    </div>

                                                    <!--CORBEILLE-->

                                                    <div class="modal fade" id="corbeille{{$value->id}}">
                                                        <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">
                                                            <div class="modal-header bgnav" style="background-image: url({{asset('glbal/theme/t7.jpg')}}) ;  background-size: cover; background-repeat: no-repeat;">
                                                                <h4 class="modal-title titre-grandiant" style="font-size : 35px; font-weight: 900; "><span><i class="fas fa-trash"></i></span>&ensp;Supprimer l'archive destinée a : {{$value->lereceveur->libelle}}</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #B460B5;">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body" style="background: var(--c-color2);">
                                                                <form method="post" action="{{route('CorbeilleArchive')}}" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <input type="hidden" name="id" value="{{$value->id}}">
                                                                        <!--corp du formulaire debut-->
                                                                        <div>
                                                                            <div>
                                                                                <div class="container-fluid">
                                                                                    <div class="row">
                                                                                        <div class="col-12 col-md-12 col-ml-9 col-lg-8">
                                                                                            <div class="container-fluid">
                                                                                                <div class="row">
                                                                                                    <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-6">
                                                                                                        <div class="form-group">
                                                                                                            <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fas fa-code-branch"></i>&ensp;N° Enrégistrement</label>
                                                                                                            <input class="form-control" type="text" name="code" required value="{{$value->code}}" readonly id="consulter{{$value->id}}">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-6">
                                                                                                        <div class="form-group">
                                                                                                            <label style=" color: var(--color-t); font-family: italic;"><i class="fas fa-asterisk"></i>&ensp;Référence document</label>
                                                                                                            <input class="form-control" type="text" name="libelle" required value="{{$value->libelle}}" readonly id="consulter{{$value->id}}">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-6">
                                                                                                        <div class="form-group">
                                                                                                            <label style=" color: var(--color-t); font-family: italic;"><i class="fas fa-bullseye"></i>&ensp;Objet du document</label>
                                                                                                            <input class="form-control" type="text" name="objet" required value="{{$value->objet}}" readonly id="consulter{{$value->id}}">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-6">
                                                                                                        <div class="form-group">
                                                                                                            <label style=" color: var(--color-t); font-family: italic;"><i class="fas fa-map-signs"></i>&ensp;Sens du document</label>
                                                                                                            <select class="form-control select2 text-start" disabled  name="type_id" style="width: 100%;">
                                                                                                                @foreach ($sens as $key => $sen)
                                                                                                                    <option class="text-start" value="{{$sen->id}}" {{($sen->id==$value->type_id)?"selected":""}}>{{$sen->libelle}}</option>
                                                                                                                @endforeach
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-6">
                                                                                                        <div class="form-group">
                                                                                                            <label style=" color: var(--color-t); font-family: italic;"><i class="fas fa-tag"></i>&ensp;Categorie document</label>
                                                                                                            <select class="form-control select2 text-start"  disabled name="categorie_id" style="width: 100%;">
                                                                                                                @foreach ($categories as $key => $categorie)
                                                                                                                    <option class="text-start" value="{{$categorie->id}}" {{($categorie->id==$value->categorie_id)?"selected":""}}>{{$categorie->libelle}}</option>
                                                                                                                @endforeach
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-6">
                                                                                                        <div class="form-group">
                                                                                                            <label style=" color: var(--color-t); font-family: italic;"><i class="fas fa-user-tag"></i>&ensp;Nom du Gestionaire</label>
                                                                                                            <select class="form-control select2 text-start" disabled  name="gestionaire_id" style="width: 100%;">
                                                                                                                @foreach ($gestionaires as $key => $gestionaire)
                                                                                                                    <option class="text-start" value="{{$gestionaire->id}}" {{($gestionaire->id==$value->gestionaire_id)?"selected":""}}>{{$gestionaire->libelle}}</option>
                                                                                                                @endforeach
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-6">
                                                                                                        <div class="form-group">
                                                                                                            <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fas fa-building" aria-hidden="true"></i>&ensp;Entité administrative du Concerné</label>
                                                                                                                <select class="form-control select2 text-start"  disabled name="poste_id" style="width: 100%;">
                                                                                                                @foreach ($postes as $key => $poste)
                                                                                                                    <option class="text-start" value="{{$poste->id}}" {{($poste->id==$value->poste_id)?"selected":""}}>{{$poste->libelle}}</option>
                                                                                                                @endforeach
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-6">
                                                                                                        <div class="form-group">
                                                                                                            <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fas fa-crosshairs" aria-hidden="true"></i>&ensp;Ampillation</label>
                                                                                                            <input type="text" class="form-control" name="ampillation" value="{{$value->ampillation}}" readonly id="consulter{{$value->id}}" >
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-6">
                                                                                                        <div class="form-group">
                                                                                                            <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fas fa-paper-plane" aria-hidden="true"></i>&ensp;Emetteur</label>
                                                                                                                <select class="form-control select2 text-start" disabled  name="emeteur_id" style="width: 100%;">
                                                                                                                @foreach ($emeteurs as $key => $emeteur)
                                                                                                                    <option class="text-start" value="{{$emeteur->id}}" {{($emeteur->id==$value->emeteur_id)?"selected":""}}>{{$emeteur->libelle}}</option>
                                                                                                                @endforeach
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-6">
                                                                                                        <div class="form-group">
                                                                                                            <label style=" color: var(--color-t); font-family: italic;"><i class="fas fa-calendar" aria-hidden="true"></i>&ensp;Date Emission</label>
                                                                                                            <input type="date" class="form-control" name="date_emission" required value="{{$value->date_emission}}" readonly id="consulter{{$value->id}}">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-6">
                                                                                                        <div class="form-group">
                                                                                                            <label style=" color: var(--color-t); font-family: italic;"><i class="fa fa-street-view" aria-hidden="true"></i>&ensp;Destinataire</label>
                                                                                                            <select class="form-control select2 text-start" disabled name="destinataire_id" style="width: 100%;">
                                                                                                                @foreach ($destinataires as $key => $destinataire)
                                                                                                                    <option class="text-start" value="{{$destinataire->id}}" {{($destinataire->id==$value->destinataire_id)?"selected":""}}>{{$destinataire->libelle}}</option>
                                                                                                                @endforeach
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-6">
                                                                                                        <div class="form-group">
                                                                                                            <label style=" color: var(--color-t); font-family: italic;"><i class="fas fa-calendar-check" aria-hidden="true"></i>&ensp;Date Reception</label>
                                                                                                            <input type="date"  class="form-control" name="date_reception" value="{{$value->date_reception}}" readonly id="consulter{{$value->id}}">
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-12 ">
                                                                                                        <div class="form-group">
                                                                                                            <div class="icheck-primary d-inline">
                                                                                                                @if($value->type_fichier !='0')
                                                                                                                    <input type="checkbox" id="checkboxPrimary3"  name="type_fichier" checked disabled  id="user2" value="{{$value->type_fichier}}">

                                                                                                                @else
                                                                                                                    <input type="checkbox" id="checkboxPrimary3"  name="type_fichier" disabled  id="user2" value="{{$value->type_fichier}}">
                                                                                                                @endif
                                                                                                                <label for="checkboxPrimary3" style=" color: var(--color-t); font-family: italic;">
                                                                                                                    Document Privé
                                                                                                                </label>
                                                                                                            </div>

                                                                                                        </div>
                                                                                                    </div>



                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-md-12 col-ml-3 col-lg-4">
                                                                                            <div class="container-fluid">
                                                                                                <div class="row">
                                                                                                    <div class="col-md-12">
                                                                                                        <div class="form-group">
                                                                                                            <a href="{{url('lienverslefichier',$value->id)}}" class="btn-outline nav-link-heart" data-bs-toggle="tooltip" title="Voir l'archive" data-placement="bottom">
                                                                                                                <center>
                                                                                                                    <img src="{{asset($value->icon)}}" alt="" class="img img-thumbnail" >
                                                                                                                </center>
                                                                                                            </a>
                                                                                                        </div>

                                                                                                    </div>
                                                                                                    <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-12">
                                                                                                        <div class="form-group">
                                                                                                            <label style=" color: var(--color-t); font-family: italic;"><i class="fas fa-user-tie"></i>&ensp;Nom Receveur (Accusé de réception)</label>
                                                                                                                <select class="form-control select2 text-start" disabled  name="receveur_id" style="width: 100%;">
                                                                                                                @foreach ($receveurs as $key => $receveur)
                                                                                                                    <option class="text-start" value="{{$receveur->id}}" {{($receveur->id==$value->receveur_id)?"selected":""}}>{{$receveur->libelle}}</option>
                                                                                                                @endforeach
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-12">
                                                                                                        <div class="form-group">
                                                                                                            <label style=" color: var(--color-t); font-family: italic;"><i class="fas fa-comment" aria-hidden="true"></i>&ensp;Description</label>
                                                                                                            <textarea class="form-control" name="desc" value="{{$value->desc}}" readonly id="consulter{{$value->id}}">{{$value->desc}}</textarea>
                                                                                                        </div>
                                                                                                    </div>


                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                            <div class="modal-footer justify-content-between bgnav" style="background-image: url({{asset('glbal/theme/t7.jpg')}}) ;  background-size: cover; background-repeat: no-repeat;">
                                                                                <button type="button" class="btn mr-md-2 mb-md-0 mb-2 btn-outline-danger btn-round"  data-dismiss="modal" style=" font-family: italic ;color:#D9B8F7;"><i class="fas fa-exclamation-triangle "></i>&ensp;Fermer</button>
                                                                                <button type="submit" class="btn mr-md-2 mb-md-0 mb-2 btn-outline-success btn-round" style=" font-family: italic ;color:#D9B8F7;"><i class="fas fa-trash-alt"></i>&ensp;Supprimer et Fermer</button>
                                                                            </div>
                                                                    </form>
                                                            </div>

                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                <tfoot>
                                </tfoot>
                              </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="sumenu card-footer moncard" id="" >
                                <hr class="text-dander">
                                <div class="code-box" >
                                    <div class="clearfix p-1">
                                        <div class="container-fluid pt-2">
                                            <div class="row">
                                                    <div class="col" >
                                                        <a href="corbeilleAllarchive" data-bs-toggle="tooltip" title="Tout Supprimer" class="btn btn-sm code-copy pull-left nav-link-heart" data-clipboard-target="#basic-table-code"><i class="fa fa-trash" style="font-size: 20px; color:#ff0000;"></i></a>&emsp;
                                                        {{-- <a href="userspdf" data-bs-toggle="tooltip" title="Imprimer" data-placement="bottom" class="btn btn-sm code-copy pull-left" data-clipboard-target="#basic-table-code"><i class="fa fa-print" style="font-size: 20px; color:#0682dab4;"></i></a> --}}
                                                    </div>
                                                <div class="col d-flex nav justify-content-end">
                                                    <a href="#basic-table" data-bs-toggle="tooltip" title="fermer" id="T" class="btn btn-sm pull-right nav-link-heart" rel="content-y" data-toggle="collapse" role="button"><i class="fa fa-eye-slash" style="font-size: 20px; color:#D9B8F7;"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
 @endsection
 @section('footer')
 {{-- <script>
    $(document).ready(function() {
        // Sélectionnez tous les éléments GIF par leur classe
        var gifs = $(".classe_de_vos_elements_gif");

        // Ajoutez la classe pause-animation à chaque GIF après 50 secondes
        setTimeout(function() {
            gifs.addClass("pause-animation");
        }, 5000); // 50 secondes en millisecondes
    });
</script> --}}
 @endsection








