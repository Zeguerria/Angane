@extends('layouts.menu')

{{-- intgration du titre --}}
@section("titre")
Liste des documents archivés
@endsection

{{-- intgration des css supplémentaire --}}
@section('header')

@endsection


{{-- intgration de la vue principale --}}
@section('corps')
    <div class="page-header">
        <div class="page-title">
            <h4>Liste des documents archivés</h4>
            <h6>Archives des documents</h6>
        </div>
        <div class="page-btn">
            <a href="/Archiver" class="btn btn-added"><img src="assets/img/icons/plus.svg" alt="img" class="me-1">Nouvelle Archive</a>
        </div>
    </div>
    {{-- <livewire:ajouter-archive></livewire:ajouter-archive> --}}

    <div class="card">
        <div class="card-body">
            <div class="table-top">
                <div class="search-set">
                    <div class="search-path">
                        <a class="btn btn-filter" id="filter_search">
                            <img src="assets/img/icons/filter.svg" alt="img">
                            <span><img src="assets/img/icons/closes.svg" alt="img"></span>
                        </a>
                    </div>
                    <div class="search-input">
                        <a class="btn btn-searchset"><img src="assets/img/icons/search-white.svg" alt="img"></a>
                    </div>
                </div>
                <div class="wordset">
                    <ul>
                        <li>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="assets/img/icons/pdf.svg" alt="img"></a>
                        </li>
                        <li>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="assets/img/icons/excel.svg" alt="img"></a>
                        </li>
                        <li>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="assets/img/icons/printer.svg" alt="img"></a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="card mb-0" id="filter_inputs">
                <div class="card-body pb-0">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <form action="{{ route('recherche_archive') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg col-sm-6 col-12">
                                        <div class="form-group">
                                            <select class="select" name="type_id">
                                                <option value="0">Tous les types</option>
                                                @foreach ($types as $type)
                                                    <option value="{{ $type->id }}">
                                                        {{ $type->libelle }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg col-sm-6 col-12">
                                        <div class="form-group">
                                            <select class="select"name="categorie_id">
                                                <option value="0">Toutes les catégories</option>
                                                @foreach ($categories as $categorie)
                                                    <option value="{{ $categorie->id }}">
                                                        {{ $categorie->libelle }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg col-sm-6 col-12">
                                        <div class="form-group">
                                            <select class="select"name="poste_id">
                                                <option value="0">Tous les postes</option>
                                                @foreach ($postes as $poste)
                                                    <option value="{{ $poste->id }}">
                                                        {{ $poste->libelle }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-sm-6 col-12">
                                        <div class="form-group">
                                            <a class="btn btn-filters ms-auto"><img src="assets/img/icons/search-whites.svg" alt="img"></a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table  datanew">
                    <thead>
                        <tr>
                            <th>
                                <label class="checkboxs">
                                    <input type="checkbox" id="select-all">
                                    <span class="checkmarks"></span>
                                </label>
                            </th>
                            <th>Reference</th>
                            <th>Objet</th>
                            <th>Emetteur</th>
                            <th>Date Emission</th>
                            <th>Destinataire</th>
                            <th>Fichier</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($archives as $archive)
                        <tr>
                            <td>
                                <label class="checkboxs">
                                    <input type="checkbox">
                                    <span class="checkmarks"></span>
                                </label>
                            </td>
                            <td>
                                <a href="/Details-Archivage/{{ $archive->id }}"> {{ $archive->libelle }} </a>
                            </td>
                            <td>{{ $archive->objet }}</td>
                            <td>{{ $archive->lemetteur->libelle }}</td>
                            <td>{{ $archive->la_date_emission }}</td>
                            <td>{{ $archive->ledestinataire->libelle }}</td>
                            <td class="productimgname">
                                <a href="{{ $archive->lienfichier }}" target="_blank" class="product-img">
                                    <img src="{{ asset("assets/img/fichiers/$archive->icone") }}">
                                </a>
                            </td>
                            <td>
                                <a class="me-3" href="/Details-Archivage/{{ $archive->id }}">
                                    <img src="assets/img/icons/eye.svg" alt="img">
                                </a>
                                <a class="me-3" href="/Modifier-Archivage/{{ $archive->id }}">
                                    <img src="assets/img/icons/edit.svg" alt="img">
                                </a>
                                <a class="me-3" href="/Supprimer-Archivage/{{ $archive->id }}">
                                    <img src="assets/img/icons/delete.svg" alt="img">
                                </a>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


{{-- integration des scriptes js supplémentaire --}}
@section('footer')

@endsection
