@extends('layouts.menu')

{{-- intgration du titre --}}
@section("titre")
    Page par défaut
@endsection

{{-- intgration des css supplémentaire --}}
@section('header')

<link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
@endsection


{{-- intgration de la vue principale --}}
@section('corps')
    <div class="page-header">
        <div class="page-title">
            <h4>Product List</h4>
            <h6>Manage your products</h6>
        </div>
        <div class="page-btn">
            <a href="addproduct.html" class="btn btn-added"><img src="assets/img/icons/plus.svg" alt="img" class="me-1">Add New Product</a>
        </div>
    </div>
@endsection


{{-- integration des scriptes js supplémentaire --}}
@section('footer')

<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>

<script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

<script src="{{ asset('assets/plugins/sweetalert/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('assets/plugins/sweetalert/sweetalerts.min.js') }}"></script>
@endsection
