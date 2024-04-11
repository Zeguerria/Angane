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
<div class="row">

    <div class="col-lg-3 col-sm-6 col-12 d-flex">
        <div class="dash-count">
            <div class="dash-counts">
                <h4>{{ $total }}</h4>
                <h5>Total Archivés</h5>
            </div>
            <div class="dash-imgs">
                <i data-feather="file-text"></i>
            </div>
        </div>
    </div>
    @foreach ($gestionaires as $gestionaire)
    <div class="col-lg-3 col-sm-6 col-12 d-flex">
        <div class="dash-count das3">
            <div class="dash-counts">
                <h4>{{ $gestionaire->gestionairearchives()->count() }}</h4>
                <h5>{{ $gestionaire->libelle }}</h5>
            </div>
            <div class="dash-imgs">
                <i data-feather="user"></i>
            </div>
        </div>
    </div>
    @endforeach
    @foreach ($types as $type)
    <div class="col-lg-3 col-sm-6 col-12 d-flex">
        <div class="dash-count das1">
            <div class="dash-counts">
                <h4>{{ $type->typearchives()->count() }}</h4>
                <h5>{{ $type->libelle }}</h5>
            </div>
            <div class="dash-imgs">
                <i data-feather="file-text"></i>
            </div>
        </div>
    </div>
    @endforeach
    @foreach ($categories as $categorie)
    <div class="col-lg-3 col-sm-6 col-12 d-flex">
        <div class="dash-count das2">
            <div class="dash-counts">
                <h4>{{ $categorie->categoriearchives()->count() }}</h4>
                <h5>{{ $categorie->libelle }}</h5>
            </div>
            <div class="dash-imgs">
                <i data-feather="file-text"></i>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection


{{-- integration des scriptes js supplémentaire --}}
@section('footer')

@endsection
