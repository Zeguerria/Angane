@extends('layouts.menu')

{{-- intgration du titre --}}
@section("titre")
    Ajouter un parametre
@endsection

{{-- intgration des css supplémentaire --}}
@section('header')

@endsection


{{-- intgration de la vue principale --}}
@section('corps')
    <div class="page-header">
        <div class="page-title">
            <h4>Parametrage</h4>
            <h6>Ajouter un parametre</h6>
        </div>
        <div class="page-btn">
            <a href="/Parametres" class="btn btn-added"><img src="{{ asset('assets/img/icons/return1.svg') }}" alt="img" class="me-1">Liste des Parametres</a>
        </div>
    </div>
    {{-- <livewire:ajouter-archive></livewire:ajouter-archive> --}}

    <div class="card">
        <div class="card-body">
            <form action="{{ route('ajouterParametre') }}" method="POST" enctype="multipart/form-data">@csrf
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Code</label>
                            <input type="text" name="code" required>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Libelle</label>
                            <input type="text" name="libelle" required>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Type de Parametre</label>
                            <select class="select" name="type_parametre_id">
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}">
                                        {{ $type->libelle }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Observation</label>
                            <input type="text" name="desc" >
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="desc2"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <center>
                            <button type="submit" class="btn btn-submit me-2">
                                <i class="fas fa-save"></i>
                                ENREGISTRER LE PARAMETRE
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
