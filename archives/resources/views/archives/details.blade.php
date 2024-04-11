@extends('layouts.menu')

{{-- intgration du titre --}}
@section("titre")
Détails archive
@endsection

{{-- intgration des css supplémentaire --}}
@section('header')

@endsection


{{-- intgration de la vue principale --}}
@section('corps')
    <div class="page-header">
        <div class="page-title">
            <h4>Détails de l'Archive <b class="text-primary">{{ $archive->code }}</b> </h4>
            <h6>Consulter les informations d'une archive</h6>
        </div>
        <div class="page-btn">
            <a href="/Liste-Archivage" class="btn btn-added"><img src="{{ asset('assets/img/icons/return1.svg') }}" alt="img" class="me-1">Liste des archives</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="productdetails">
                        <ul class="product-bar">
                            <li>
                                <h4>N° Ordre</h4>
                                <h6> {{ $archive->code }} </h6>
                            </li>
                            <li>
                                <h4>Référence</h4>
                                <h6>{{ $archive->libelle }}</h6>
                            </li>
                            <li>
                                <h4>Objet</h4>
                                <h6>{{ $archive->objet }}</h6>
                            </li>
                            <li>
                                <h4>Observations</h4>
                                <h6>{{ $archive->desc }}</h6>
                            </li>
                            <li>
                                <h4>Emetteur</h4>
                                <h6>{{ $archive->lemetteur->libelle }}</h6>
                            </li>
                            <li>
                                <h4>Date Emission</h4>
                                <h6>{{ $archive->la_date_emission }}</h6>
                            </li>
                            <li>
                                <h4>Destinataire</h4>
                                <h6>{{ $archive->ledestinataire->libelle }}</h6>
                            </li>
                            <li>
                                <h4>Date Réception</h4>
                                <h6>{{ $archive->la_date_reception }}</h6>
                            </li>
                            <li>
                                <h4>Accusé de Réception</h4>
                                <h6>{{ $archive->lereceveur->libelle }}</h6>
                            </li>
                            <li>
                                <h4>Ampliations</h4>
                                <h6>{{ $archive->ampillation }}</h6>
                            </li>
                            <li>
                                <h4>Type d'Archive</h4>
                                <h6>{{ $archive->type->libelle }}</h6>
                            </li>
                            <li>
                                <h4>Catégorie d'Archive</h4>
                                <h6>{{ $archive->categorie->libelle }}</h6>
                            </li>
                            <li>
                                <h4>Poste Responsable Archive</h4>
                                <h6>{{ $archive->poste->libelle }}</h6>
                            </li>
                            <li>
                                <h4>Agent ayant effectué l'archivage</h4>
                                <h6>{{ $archive->user->name }}</h6>
                            </li>
                            <li>
                                <h4>Date Archivage</h4>
                                <h6>{{ $archive->la_date_ajout }}</h6>
                            </li>
                        </ul>
                    </div>
                    <div class="row p-2">

                        <div class="col-6">
                            <center>
                                <a href="/Modifier-Archivage/{{ $archive->id }}" class="btn btn-success me-2">
                                    <i class="fas fa-edit"></i>
                                    MODIFIER L'ARCHIVE
                                </a>
                            </center>
                        </div>
                        <div class="col-6">
                            <center>
                                <a href="/Supprimer-Archivage/{{ $archive->id }}" class="btn btn-danger me-2">
                                    <i class="fas fa-trash"></i>
                                    SUPPRIMER L'ARCHIVE
                                </a>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <center>
                        <h2>Consulter le document</h2>
                        <a href="{{ $archive->lienfichier }}" target="_blanck">
                            <img src="{{ asset("assets/img/fichiers125/$archive->icone") }}" width="100%">
                        </a>

                    </center>
                </div>
            </div>
        </div>
    </div>
@endsection


{{-- integration des scriptes js supplémentaire --}}
@section('footer')

@endsection
