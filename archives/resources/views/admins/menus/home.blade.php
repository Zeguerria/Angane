@extends('admins.menus.menu')
@section('titre')
    Acceuil
@endsection
@section('corps')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <div class="content-header p-1">
            <div class="content-header pb-4 pt-3">
                <div class="col-md-6 col-md-12  moncard">
                    <div class="title">
                        <h4 class="mb-0 bread mestitres " style="color:#D9B8F7;"><img src="{{asset('glbal/icon/home.gif')}}" alt="" class="img img-circle " width="50" height="50">&ensp;Acceuil</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation" class="d-flex justify-content-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./dashacceuil" class="nav-link-heart" style="color: rgb(0, 191, 255);">Home</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                {{-- bievenu uitlisateur debut  --}}
                    <section class="section-2">
                        {{-- ANIMATION FADE UP DEBUT --}}
                            <div data-aos="fade-up">
                                <div class="card cardt pb p-1">
                                    <div class="card-body ">
                                        <div class="">
                                            <div class="card-box pd-10 height-100 mb-10" >
                                                <div class="row align-items-center" >
                                                    <div class="col-md-2">
                                                        @if (Route::has('login'))
                                                            @auth
                                                                @if(Auth::user()->photo !=null)
                                                                    <img src="{{asset(Auth::user()->le_profil)}}" alt="{{asset(Auth::user()->le_profil)}}" class="img img-fluid">
                                                                @else
                                                                    <img src="{{asset('/glbal/autres/images.png')}}" alt="{{asset('/glbal/autres/images.png')}}" class="img img-fluid">
                                                                @endif
                                                            @else
                                                                <img src="{{asset('/glbal/autres/images.png')}}" alt="{{asset('/glbal/autres/images.png')}}" class="img img-fluid">
                                                            @endauth
                                                        @endif
                                                        {{-- <img src="{{asset(Auth::user()->le_profil)}}" alt="{{asset(Auth::user()->le_profil)}}" class="img img-fluid" > --}}
                                                    </div>
                                                    <div class="col-md-10">
                                                        <h4 class="font-20 weight-500 mb-10 text-capitalize" style="font-size : 30px;">
                                                            <span ><b class="fw-bold msicons">W</b><small class="fst-italic titre" style="color: var(--titre-couleur); font-family: italic;">elcome</small> <b class="fw-bold msicons">B</b><small class="fst-italic titre" style="color: var(--titre-couleur); font-family: italic;">ack</small></span>
                                                            <div class="weight-600 font-30 " style="color: var(--titre-couleur);" >
                                                                @if (Route::has('login'))
                                                                @auth
                                                                {{Auth::user()->name}} {{Auth::user()->prenom}}
                                                                @else
                                                                    Nom-User et Prenom-User Connecté
                                                                @endauth
                                                                @endif
                                                            </div>
                                                        </h4>
                                                        <p class="font-18 max-width-600" style="font-size: 20px; color: var(--color-t); font-family : 'Times New Roman', Times, serif;">Vous
                                                            @if (Route::has('login'))
                                                            @auth
                                                                etes connecté en tant que
                                                                {{Auth::user()->profil->libelle}}
                                                            @else
                                                                n'etes pas connecté
                                                            @endauth
                                                            @endif
                                                            , et
                                                            @if (Route::has('login'))
                                                                @auth
                                                                    disposez donc tous les droits de {{Auth::user()->profil->libelle}} !
                                                                @else
                                                                    et ne disposez donc tous les d'aucun droits !
                                                                @endauth
                                                            @endif
                                                            <br> Alors Mr/Mdme
                                                            @if (Route::has('login'))
                                                            @auth
                                                                {{Auth::user()->name}} {{Auth::user()->prenom}} Par quoi commencons-nous ?
                                                                @else
                                                                    Nom-User et Prenom-User Par quoi commencons-nous ?
                                                                @endauth
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        {{-- ANIMATION FADE UP FIN --}}
                    </section>
                {{-- bienvenu utilisateur fin  --}}

                {{-- BOX TOTEAUX DEBUT  --}}
                    {{-- ANIMATION FADE-DOWN DEBUT --}}
                        <section class="section-3">
                            <div data-aos="fade-down">
                                @include('admins.menus._homes.totaux')
                            </div>
                        </section>
                    {{-- ANIMATION FADE-DOWN DEBUT --}}
                {{-- BOX TOTEAUX DEBUT  --}}
                {{-- CARDS DETAIL DEBUT  --}}
                    <section class="section-4">
                        <div data-aos="fade-up">
                            @include('admins.menus._homes.cards')
                        </div>
                    </section>
                {{-- CARDS DETAIL FIN  --}}
                {{-- CHARTS DEBUT  --}}
                    <section class="section-5">
                        <div data-aos="fade-up">
                            @include('admins.menus._homes.charts')
                        </div>
                    </section>
                {{-- CHARTS FIN  --}}




            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
@section('footer')
    <script>
        // BAR CHART DEBUT
        // Récupérer les données depuis PHP
        var monthsData = {!! json_encode($data['monthsData']) !!};
        // Liste des mois avec leurs noms
        var months = Object.keys(monthsData);
        // Données pour les archives entrantes et sortantes empilées
        var stackedData = [];
        // Parcourir les données pour chaque mois
        months.forEach(function(month) {
            // Récupérer les données pour le mois en cours
            var monthData = monthsData[month];

            // Initialiser les totaux pour les archives entrantes et sortantes
            var entrantTotal = 0;
            var sortantTotal = 0;

            // Parcourir les données pour chaque sens
            monthData.forEach(function(sensData) {
                // Ajouter les totaux d'entrées et de sorties pour ce mois
                entrantTotal += sensData.entrant;
                sortantTotal += sensData.sortant;
            });

            // Ajouter les totaux au tableau de données empilées
            stackedData.push({ month: month, entrant: entrantTotal, sortant: sortantTotal });
        });
        // Créer le graphique à barres empilées
        var ctx = document.getElementById('stackedBarChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: months, // Utilisez les noms des mois comme libellés de l'axe des x
                datasets: [{
                    label: 'Archives entrantes',
                        data: stackedData.map(function(data) { return data.entrant; }),
                                backgroundColor: '#007bff' // Bleu AdminLTE
                            }, {
                                label: 'Archives sortantes',
                                data: stackedData.map(function(data) { return data.sortant; }),
                                backgroundColor: '#dc3545' // Rouge AdminLTE
                            }]
                        },
                        options: {
                            scales: {
                                x: {
                                    stacked: true
                                },
                                y: {
                                    stacked: true
                                }
                            },
                            plugins: {
                                legend: {
                                    display: true,
                                    labels: {
                                        font: {
                                            size: 12
                                        }
                                    }
                                }
                            }
                        }
            });

                // BAR CHART FIN
                // PIE CHART DEBUT
                // Récupérer les données depuis PHP
                    var pieData = {!! json_encode($data['pieCategorie']) !!};

                    // Récupérer les libellés des catégories
                    var labels = Object.keys(pieData);

                    // Récupérer les valeurs associées aux libellés
                    var data = Object.values(pieData);

                    // Générer des couleurs aléatoires pour les segments du pie chart
                    var colors = getRandomColors(labels.length);

                    // Créer le diagramme en secteurs (pie chart)
                    var ctx = document.getElementById('pieChart').getContext('2d');
                    var myPieChart = new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: labels,
                            datasets: [{
                                data: data,
                                backgroundColor: colors
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    display: true,
                                    position: 'bottom'
                                },
                                title: {
                                    display: true,
                                    text: 'Répartition des archives par catégorie'
                                }
                            }
                        }
                    });

                    // Fonction pour générer des couleurs aléatoires
                    function getRandomColors(count) {
                        var colors = [];
                        for (var i = 0; i < count; i++) {
                            var color = '#' + Math.floor(Math.random() * 16777215).toString(16);
                            colors.push(color);
                        }
                        return colors;
                    }

                //PIE CHAR FIN




                // PREMIER CHART & CATHEGORIE ARCHIVE DU MOIS DEBUT
                        // Récupérer les données depuis PHP
                    var categories = {!! json_encode($data['categories']->pluck('libelle')->toArray()) !!};
                    var archivesCount = {!! json_encode($data['archivesByCategory']->pluck('total')->toArray()) !!};

                    // Convertir les nombres à l'entier inférieur
                    archivesCount = archivesCount.map(function(count) {
                        return Math.floor(count);
                    });

                    // Créer un graphique à barres
                        var ctx = document.getElementById('archivesByCategoryChart').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: categories,
                                datasets: [{
                                    label: 'Nombre d\'archives par catégorie',
                                    data: archivesCount,
                                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                                    borderColor: 'rgba(54, 162, 235, 1)',
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                // PREMIER CHART & CATHEGORIE ARCHIVE DU MOIS FIN


    </script>
    <!-- Script pour initialiser le chart -->
    {{--  DERNIER CHART A MODIFIER DEBUT--}}
    <script>
        var postes = {!! json_encode($data['postes']) !!};
        var totaux = {!! json_encode($data['totaux']) !!};

        // Création du dataset
        var dataset = {
            labels: postes,
            datasets: [{
                label: 'Total archives par poste',
                data: totaux,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        };

        // Configuration du chart
        var config = {
            type: 'bar',
            data: dataset,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // Initialisation du chart
        var myChart = new Chart(document.getElementById('archivesParPosteChart'), config);
    </script>
    {{--  DERNIER CHART A MODIFIER FIN--}}

@endsection
