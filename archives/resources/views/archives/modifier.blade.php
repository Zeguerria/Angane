@extends('layouts.menu')

{{-- intgration du titre --}}
@section("titre")
    Modifier une archive
@endsection

{{-- intgration des css supplémentaire --}}
@section('header')

@endsection


{{-- intgration de la vue principale --}}
@section('corps')
    <div class="page-header">
        <div class="page-title">
            <h4>Modifier l'Archive <b class="text-primary">{{ $archive->code }}</b> </h4>
            <h6>Modifier les informations d'une archive</h6>
        </div>
        <div class="page-btn">
            <a href="/Liste-Archivage" class="btn btn-added"><img src="{{ asset('assets/img/icons/return1.svg') }}" alt="img" class="me-1">Liste des archives</a>
        </div>
    </div>
    {{-- <livewire:ajouter-archive></livewire:ajouter-archive> --}}

    <div class="card">
        <div class="card-body">
            <form action="{{ route('modifierArchive') }}" method="POST" enctype="multipart/form-data">@csrf
                <input type="hidden" name="id" value="{{ $archive->id }}">

                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>N° Enrégistrement</label>
                            <input type="text" name="code" value="{{ $archive->code }}" required>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Référence du document</label>
                            <input type="text" name="libelle" value="{{ $archive->libelle }}" required>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Objet du document</label>
                            <input type="text" name="objet" value="{{ $archive->objet }}" required>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Sens du document</label>
                            <select class="select" name="type_id">
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}" {{ ($archive->type_id==$type->id)?"selected":"" }} >
                                        {{ $type->libelle }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Categorie de document</label>
                            <select class="select" name="categorie_id">
                                @foreach ($categories as $categorie)
                                    <option value="{{ $categorie->id }}"  {{ ($archive->categorie_id==$categorie->id)?"selected":"" }} >
                                        {{ $categorie->libelle }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Nom du Gestionaire</label>
                            <select class="select" name="gestionaire_id">
                                @foreach ($gestionaires as $gestionaire)
                                    <option value="{{ $gestionaire->id }}"  {{ ($archive->gestionaire_id==$gestionaire->id)?"selected":"" }} >
                                        {{ $gestionaire->libelle }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Entité administrative du Concerné</label>
                            <select class="select" name="poste_id">
                                @foreach ($postes as $poste)
                                    <option value="{{ $poste->id }}" {{ ($archive->poste_id==$poste->id)?"selected":"" }} >
                                        {{ $poste->libelle }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Fonction Emetteur</label>
                            <select class="select" name="emeteur_id">
                                @foreach ($emeteurs as $emeteur)
                                    <option value="{{ $emeteur->id }}" {{ ($archive->emeteur_id==$emeteur->id)?"selected":"" }} >
                                        {{ $emeteur->libelle }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Date Emission</label>
                            <input type="date" class="form-control" name="date_emission"  value="{{ $archive->date_emission }}" required>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Fonction Destinataire</label>
                            <select class="select" name="destinataire_id">
                                @foreach ($destinataires as $destinataire)
                                    <option value="{{ $destinataire->id }}" {{ ($archive->destinataire_id==$destinataire->id)?"selected":"" }} >
                                        {{ $destinataire->libelle }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Date Reception</label>
                            <input type="date"  class="form-control" name="date_reception" value="{{ $archive->date_reception }}" >
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Nom Receveur (Accusé de réception)</label>
                            <select class="select" name="receveur_id">
                                @foreach ($receveurs as $receveur)
                                    <option value="{{ $receveur->id }}" {{ ($archive->receveur_id==$receveur->id)?"selected":"" }} >
                                        {{ $receveur->libelle }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-9 col-sm-9 col-12">
                        <div class="form-group">
                            <label>Ampliation</label>
                            <input type="text" name="ampillation" value="{{ $archive->ampillation }}" >
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="desc">{{ $archive->desc }}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label> Document à archiver</label>
                            <div class="image-upload">
                                <input type="file" required name="fichier">
                                <div class="image-uploads">
                                    <img src="{{ asset('assets/img/icons/upload.svg') }}" alt="img">
                                    <h4>Déplacer le fichier ici ou cliquez pour en selectionner un</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <center>
                            <button type="submit" class="btn btn-submit me-2">
                                <i class="fas fa-save"></i>
                                ENREGISTRER L'ARCHIVE
                            </button>
                        </center>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


{{-- integration des scriptes js supplémentaire --}}
@section('footer')

@endsection
