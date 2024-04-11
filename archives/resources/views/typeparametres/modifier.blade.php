@extends('layouts.menu')

{{-- intgration du titre --}}
@section("titre")
    Modification du type de parametre
@endsection

{{-- intgration des css supplémentaire --}}
@section('header')

@endsection


{{-- intgration de la vue principale --}}
@section('corps')
    <div class="page-header">
        <div class="page-title">
            <h4>Parametrage</h4>
            <h6>Modification du type de parametre</h6>
        </div>
        <div class="page-btn">
            <a href="/Types-Parametres" class="btn btn-added"><img src="{{ asset('assets/img/icons/return1.svg') }}" alt="img" class="me-1">Liste des Parametres</a>
        </div>
    </div>
    {{-- <livewire:ajouter-archive></livewire:ajouter-archive> --}}

    <div class="card">
        <div class="card-body">
            <form action="{{ route('modifierTypeParametre') }}" method="POST" enctype="multipart/form-data">@csrf
                <input type="hidden" name="id" value="{{ $parametre->id }}">
                <div class="row">
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Code</label>
                            <input type="text" name="code" value="{{ $parametre->code }}"  required>
                        </div>
                    </div>
                    <div class="col-lg-8 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Libelle</label>
                            <input type="text" name="libelle" value="{{ $parametre->libelle }}"   required>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Observation</label>
                            <input type="text" name="desc"  value="{{ $parametre->desc }}"  >
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control"  name="desc2">{{ $parametre->desc2 }}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <center>
                            <button type="submit" class="btn btn-submit me-2">
                                <i class="fas fa-edit"></i>
                                MODIFIER LE TYPE DE PARAMETRE
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
