@extends('layouts.menu')

{{-- intgration du titre --}}
@section("titre")
    Ajouter une archive
@endsection

{{-- intgration des css supplémentaire --}}
@section('header')

@endsection


{{-- intgration de la vue principale --}}
@section('corps')
    <div class="page-header">
        <div class="page-title">
            <h4>Ajouter Archive</h4>
            <h6>Archiver un document</h6>
        </div>
        <div class="page-btn">
            <a href="/Liste-Archivage" class="btn btn-added"><img src="assets/img/icons/return1.svg" alt="img" class="me-1">Liste des archives</a>
        </div>
    </div>
    {{-- <livewire:ajouter-archive></livewire:ajouter-archive> --}}

    <div class="card">
        <div class="card-body">
            <form action="{{ route('ajouterArchive') }}" method="POST" enctype="multipart/form-data">@csrf
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>N° Enrégistrement</label>
                            <input type="text" name="code" required>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Référence du document</label>
                            <input type="text" name="libelle" required>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Objet du document</label>
                            <input type="text" name="objet" required>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Sens du document</label>
                            <select class="select" name="type_id">
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}">
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
                                    <option value="{{ $categorie->id }}">
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
                                    <option value="{{ $gestionaire->id }}">
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
                                    <option value="{{ $poste->id }}">
                                        {{ $poste->libelle }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Emetteur</label>
                            <select class="select" name="emeteur_id">
                                @foreach ($emeteurs as $emeteur)
                                    <option value="{{ $emeteur->id }}">
                                        {{ $emeteur->libelle }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Date Emission</label>
                            <input type="date" class="form-control" name="date_emission" required>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Destinataire</label>
                            <select class="select" name="destinataire_id">
                                @foreach ($destinataires as $destinataire)
                                    <option value="{{ $destinataire->id }}">
                                        {{ $destinataire->libelle }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Date Reception</label>
                            <input type="date"  class="form-control" name="date_reception">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Nom Receveur (Accusé de réception)</label>
                            <select class="select" name="receveur_id">
                                @foreach ($receveurs as $receveur)
                                    <option value="{{ $receveur->id }}">
                                        {{ $receveur->libelle }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-9 col-sm-9 col-12">
                        <div class="form-group">
                            <label>Ampliation</label>
                            <input type="text" name="ampillation" >
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="desc"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label> Document à archiver</label>
                            <div class="image-upload">
                                <input type="file" required name="fichier">
                                <div class="image-uploads">
                                    <img src="assets/img/icons/upload.svg" alt="img">
                                    <h4>Déplacer le fichier ici ou cliquez pour en selectionner un</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-12">
                        <div class="status-toggle d-flex justify-content-between align-items-center">
                            <input type="checkbox" name="type_fichier" value="1" id="user2" class="check">
                            <label for="user2" class="checktoggle">Document Privé</label>
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
