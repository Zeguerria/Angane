@extends('layouts.menu')

{{-- intgration du titre --}}
@section("titre")
    Gestion des types Parametres
@endsection

{{-- intgration des css supplémentaire --}}
@section('header')

@endsection


{{-- intgration de la vue principale --}}
@section('corps')
    <div class="page-header">
        <div class="page-title">
            <h4>Parametrages</h4>
            <h6>Gestion des Types Parametres</h6>
        </div>
        <div class="page-btn">
            <a href="/Ajouter-Types-Parametre" class="btn btn-added"><img src="assets/img/icons/plus.svg" alt="img" class="me-1">Nouveau Parametre</a>
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

            <div class="table-responsive">
                <table class="table  datanew">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Code</th>
                            <th>Libelle</th>
                            <th>Description</th>
                            <th>Nbr Enreg.</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($types_parametres as $key => $parametre)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>
                                <a href="/Details-Parametre/{{ $parametre->id }}"> {{ $parametre->code }} </a>
                            </td>
                            <td>{{ $parametre->libelle }}</td>
                            <td>{{ $parametre->desc }}</td>
                            <td>{{ $parametre->parametres()->count() }}</td>
                            <td>
                                <a class="me-3" href="/Details-Types-Parametre/{{ $parametre->id }}">
                                    <img src="assets/img/icons/eye.svg" alt="img">
                                </a>
                                <a class="me-3" href="/Modifier-Types-Parametre/{{ $parametre->id }}">
                                    <img src="assets/img/icons/edit.svg" alt="img">
                                </a>
                                <a class="me-3" href="/Supprimer-Types-Parametre/{{ $parametre->id }}">
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
