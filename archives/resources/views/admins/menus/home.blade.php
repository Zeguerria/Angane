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
                    <h4 class="mb-0 bread mestitres "><img src="{{asset('glbal/icon/home.gif')}}" alt="" class="img img-circle " width="50" height="50">&ensp;Acceuil</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation" class="d-flex justify-content-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./dashacceuil"  style="color: rgb(0, 191, 255);">Home</a></li>
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
                                    {{--{{Auth::user()->profil->libelle}} --}}, et disposez donc tous les droits de {{--{{Auth::user()->profil->libelle}}--}} !<br> Alors Mr,Mdme {{--{{Auth::user()->name}} {{Auth::user()->prenom}}--}} ,Par quoi commencons-nous ?</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- bienvenu utilisateur fin  --}}

        {{-- box total debut  --}}
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-2">
                        <div class="info-box mb-3 cardt">
                        <span class="info-box-icon bg-success elevation-1"><i class="fab fa-teamspeak "></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text" _msttexthash="293956" _msthash="140" style="font-size: 20px; color: var(--color-t); font-family : 'Times New Roman', Times, serif;">Gestionnaires</span>
                            <span class="info-box-number" _msttexthash="27846" _msthash="141" style="color: var(--titre-couleur); font-family: italic; font-size:18px;">{{$data['gestionnairett']}}</span>
                        </div>

                        </div>

                    </div>
                    <div class="col-12 col-sm-6 col-md-2">
                        <div class="info-box cardt">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-paper-plane"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text" _msttexthash="42718" _msthash="136" style="font-size: 20px; color: var(--color-t); font-family : 'Times New Roman', Times, serif;">Emmeteurs</span>
                            <span class="info-box-number" _msttexthash="36231" _msthash="137" style="color: var(--titre-couleur); font-family: italic; font-size:18px;">{{$data['emmeteurtt']}}</span>
                        </div>
                        <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-12 col-sm-6 col-md-2">
                        <div class="info-box cardt">
                            <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-map-marked-alt"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text" _msttexthash="42718" _msthash="136" style="font-size: 20px; color: var(--color-t); font-family : 'Times New Roman', Times, serif;">Quartiers</span>
                                <span class="info-box-number" _msttexthash="36231" _msthash="137" style="color: var(--titre-couleur); font-family: italic; font-size:18px;">{{$data['quartiertt']}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>

                    </div>
                    <div class="col-12 col-sm-6 col-md-2">
                        <div class="info-box mb-3 cardt">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-tie"></i></span>

                            <div class="info-box-content">
                            <span class="info-box-text" _msttexthash="42718" _msthash="136" style="font-size: 20px; color: var(--color-t); font-family : 'Times New Roman', Times, serif;">Recepteurs</span>
                            <span class="info-box-number" _msttexthash="36231" _msthash="137" style="color: var(--titre-couleur); font-family: italic; font-size:18px;">{{$data['recepteurtt']}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix hidden-md-up"></div>
                    <div class="col-12 col-sm-6 col-md-2">
                        <div class="info-box cardt">
                        <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-toolbox"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text" _msttexthash="42718" _msthash="136" style="font-size: 20px; color: var(--color-t); font-family : 'Times New Roman', Times, serif;">Parametres</span>
                            <span class="info-box-number" _msttexthash="36231" _msthash="137" style="color: var(--titre-couleur); font-family: italic; font-size:18px;">{{$data['parametrett']}}</span>
                        </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-2">
                        <div class="info-box mb-3 cardt">
                        <span class="info-box-icon bg-white elevation-1"><i class="fas fa-list-ol"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text" _msttexthash="78663" _msthash="138" style="font-size: 20px; color: var(--color-t); font-family : 'Times New Roman', Times, serif;">Catégories</span>
                            <span class="info-box-number" _msttexthash="16237" _msthash="139" style="color: var(--titre-couleur); font-family: italic; font-size:18px;">{{$data['categoriett']}}</span>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- box total fin  --}}
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner bg-light">
                        <h3>{{$data['archivett']}}</h3>

                        <p>Archives Total</p>
                    </div>
                    <div class="icon  ">
                        <i class="ion ion-filing"></i>
                    </div>
                    <a href="./Archives" class="small-box-footer">Voir plus&ensp;<i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                <div class="inner bg-light">
                    <h3>{{$data['usertt']}}</h3>

                    <p>Utilisateurs Total</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="./Users" class="small-box-footer">Voir plus&ensp;<i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-primary">
                <div class="inner bg-light">
                    <h3>{{$data['gestionnairett']}}</h3>

                    <p>Gestionnaires Total</p>
                </div>
                <div class="icon">
                    <i class="ion ion-link"></i>
                </div>
                <a href="./Gestionnaires" class="small-box-footer">Voir plus&ensp;<i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                <div class="inner bg-light">
                    <h3>{{$data['administrationtt']}}</h3>

                    <p>Administrations Total</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-pin"></i>
                </div>
                <a href="./Entites" class="small-box-footer">Voir plus&ensp; <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <section>
            <div class="serction-chart">
                <div class="container-fluid">
                    <div class="row">
                        {{-- CATEGORIE ARCHIVE DU MOIS EN COURS DEBUT --}}
                            <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-6">
                                <div class="card card-success">
                                    <div class="card-header">
                                    <h3 class="card-title">Catégorie d'archives du Mois</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool nav-link-heart" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool nav-link-heart" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                    </div>
                                    <div class="card-body">
                                    <div class="chart">
                                        <canvas id="archivesByCategoryChart"></canvas>
                                    </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>

                            </div>
                        {{-- CATEGORIE ARCHIVE DU MOIS EN COURS FIN --}}
                        {{-- TENDANCE ARCHIVE PIE DEBUT --}}
                            <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-6">
                                <div class="card card-warning">
                                    <div class="card-header">
                                    <h3 class="card-title">Tandances</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool nav-link-heart" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool nav-link-heart" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart">
                                            <canvas id="pieChart" ></canvas>
                                        </div>

                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        {{-- TENDANCE ARCHIVE PIE FIN --}}

                    </div>
                    <div class="row">
                        {{-- TYPE ARCHIVE (ENTRANT/SORTANT) PAR MOIS DEBUT --}}
                            <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-6">
                                <div class="card card-primary">
                                    <div class="card-header">
                                    <h3 class="card-title">Type d'archive par Mois</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool nav-link-heart" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool nav-link-heart" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart">
                                            <canvas id="stackedBarChart" ></canvas>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>

                            </div>
                        {{-- TYPE ARCHIVE (ENTRANT/SORTANT) PAR MOIS FIN --}}

                        <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-6">
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Total d'archive par Direction</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool nav-link-heart" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool nav-link-heart" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chart">
                                        <form id="filterForm">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-12 col-sm-12 col-md-12 col-ml-5 col-lg-5">
                                                        <!-- Sélection de la période -->
                                                        <div class="form-group">
                                                            <!-- Sélection de la période -->
                                                            <label for="interval">Période :</label>
                                                            <select name="interval" id="interval" class="form-control">
                                                                <option value="jour">Jour</option>
                                                                <option value="semaine">Semaine</option>
                                                                <option value="mois">Mois</option>
                                                                <option value="trimestre">Trimestre</option>
                                                                <option value="annee">Année</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                <div class="col-12 col-sm-12 col-md-12 col-ml-5 col-lg-5">
                                                    <!-- Sélection du type de poste -->
                                                    <div class="form-group">
                                                        <!-- Sélection du type de poste -->
                                                        <label for="type">Type de poste :</label>
                                                        <select name="type" id="type" class="form-control">
                                                            <option value="public">Public</option>
                                                            <option value="prive">Privé</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-12 col-md-12 col-ml-2 col-lg-2">
                                                    <!-- Bouton de soumission -->
                                                    <div class="style" style="padding-top: 30px;">
                                                        <button type="submit" class="btn btn-primary ">Filtrer</button>

                                                    </div>
                                                </div>
                                                </div>
                                            </div>





                                        </form>
                                        <canvas id="archivesParPosteChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </section>





        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Sales
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                    </li>
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart"
                       style="position: relative; height: 300px;">
                      <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                   </div>
                  <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                    <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                  </div>
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- DIRECT CHAT -->
            <div class="card direct-chat direct-chat-primary">
              <div class="card-header">
                <h3 class="card-title">Direct Chat</h3>

                <div class="card-tools">
                  <span title="3 New Messages" class="badge badge-primary">3</span>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
                    <i class="fas fa-comments"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages">
                  <!-- Message. Default to the left -->
                  <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-left">Alexander Pierce</span>
                      <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                      Is this template really for free? That's unbelievable!
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>
                  <!-- /.direct-chat-msg -->

                  <!-- Message to the right -->
                  <div class="direct-chat-msg right">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-right">Sarah Bullock</span>
                      <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                      You better believe it!
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>
                  <!-- /.direct-chat-msg -->

                  <!-- Message. Default to the left -->
                  <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-left">Alexander Pierce</span>
                      <span class="direct-chat-timestamp float-right">23 Jan 5:37 pm</span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                      Working with AdminLTE on a great new app! Wanna join?
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>
                  <!-- /.direct-chat-msg -->

                  <!-- Message to the right -->
                  <div class="direct-chat-msg right">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-right">Sarah Bullock</span>
                      <span class="direct-chat-timestamp float-left">23 Jan 6:10 pm</span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                      I would love to.
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>
                  <!-- /.direct-chat-msg -->

                </div>
                <!--/.direct-chat-messages-->

                <!-- Contacts are loaded here -->
                <div class="direct-chat-contacts">
                  <ul class="contacts-list">
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="dist/img/user1-128x128.jpg" alt="User Avatar">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Count Dracula
                            <small class="contacts-list-date float-right">2/28/2015</small>
                          </span>
                          <span class="contacts-list-msg">How have you been? I was...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="dist/img/user7-128x128.jpg" alt="User Avatar">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Sarah Doe
                            <small class="contacts-list-date float-right">2/23/2015</small>
                          </span>
                          <span class="contacts-list-msg">I will be waiting for...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="dist/img/user3-128x128.jpg" alt="User Avatar">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Nadia Jolie
                            <small class="contacts-list-date float-right">2/20/2015</small>
                          </span>
                          <span class="contacts-list-msg">I'll call you back at...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="dist/img/user5-128x128.jpg" alt="User Avatar">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Nora S. Vans
                            <small class="contacts-list-date float-right">2/10/2015</small>
                          </span>
                          <span class="contacts-list-msg">Where is your new...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="dist/img/user6-128x128.jpg" alt="User Avatar">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            John K.
                            <small class="contacts-list-date float-right">1/27/2015</small>
                          </span>
                          <span class="contacts-list-msg">Can I take a look at...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="dist/img/user8-128x128.jpg" alt="User Avatar">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Kenneth M.
                            <small class="contacts-list-date float-right">1/4/2015</small>
                          </span>
                          <span class="contacts-list-msg">Never mind I found...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                  </ul>
                  <!-- /.contacts-list -->
                </div>
                <!-- /.direct-chat-pane -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <form action="#" method="post">
                  <div class="input-group">
                    <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                    <span class="input-group-append">
                      <button type="button" class="btn btn-primary">Send</button>
                    </span>
                  </div>
                </form>
              </div>
              <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->

            <!-- TO DO List -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                  To Do List
                </h3>

                <div class="card-tools">
                  <ul class="pagination pagination-sm">
                    <li class="page-item"><a href="#" class="page-link">&laquo;</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">&raquo;</a></li>
                  </ul>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <ul class="todo-list" data-widget="todo-list">
                  <li>
                    <!-- drag handle -->
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <!-- checkbox -->
                    <div  class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo1" id="todoCheck1">
                      <label for="todoCheck1"></label>
                    </div>
                    <!-- todo text -->
                    <span class="text">Design a nice theme</span>
                    <!-- Emphasis label -->
                    <small class="badge badge-danger"><i class="far fa-clock"></i> 2 mins</small>
                    <!-- General tools such as edit or delete-->
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <div  class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo2" id="todoCheck2" checked>
                      <label for="todoCheck2"></label>
                    </div>
                    <span class="text">Make the theme responsive</span>
                    <small class="badge badge-info"><i class="far fa-clock"></i> 4 hours</small>
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <div  class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo3" id="todoCheck3">
                      <label for="todoCheck3"></label>
                    </div>
                    <span class="text">Let theme shine like a star</span>
                    <small class="badge badge-warning"><i class="far fa-clock"></i> 1 day</small>
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <div  class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo4" id="todoCheck4">
                      <label for="todoCheck4"></label>
                    </div>
                    <span class="text">Let theme shine like a star</span>
                    <small class="badge badge-success"><i class="far fa-clock"></i> 3 days</small>
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <div  class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo5" id="todoCheck5">
                      <label for="todoCheck5"></label>
                    </div>
                    <span class="text">Check your messages and notifications</span>
                    <small class="badge badge-primary"><i class="far fa-clock"></i> 1 week</small>
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <div  class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo6" id="todoCheck6">
                      <label for="todoCheck6"></label>
                    </div>
                    <span class="text">Let theme shine like a star</span>
                    <small class="badge badge-secondary"><i class="far fa-clock"></i> 1 month</small>
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <button type="button" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add item</button>
              </div>
            </div>
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

            <!-- Map card -->
            <div class="card bg-gradient-primary">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-map-marker-alt mr-1"></i>
                  Visitors
                </h3>
                <!-- card tools -->
                <div class="card-tools">
                  <button type="button" class="btn btn-primary btn-sm daterange" title="Date range">
                    <i class="far fa-calendar-alt"></i>
                  </button>
                  <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <div class="card-body">
                <div id="world-map" style="height: 250px; width: 100%;"></div>
              </div>
              <!-- /.card-body-->
              <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-4 text-center">
                    <div id="sparkline-1"></div>
                    <div class="text-white">Visitors</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-2"></div>
                    <div class="text-white">Online</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-3"></div>
                    <div class="text-white">Sales</div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.card -->

            <!-- solid sales graph -->
            <div class="card bg-gradient-info">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-th mr-1"></i>
                  Sales Graph
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas class="chart" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
              <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60"
                           data-fgColor="#39CCCC">

                    <div class="text-white">Mail-Orders</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60"
                           data-fgColor="#39CCCC">

                    <div class="text-white">Online</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60"
                           data-fgColor="#39CCCC">

                    <div class="text-white">In-Store</div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->

            <!-- Calendar -->
            <div class="card bg-gradient-success">
              <div class="card-header border-0">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Calendar
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <!-- button with a dropdown -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                      <i class="fas fa-bars"></i>
                    </button>
                    <div class="dropdown-menu" role="menu">
                      <a href="#" class="dropdown-item">Add new event</a>
                      <a href="#" class="dropdown-item">Clear events</a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">View calendar</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
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
!-- Script pour initialiser le chart -->
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
@endsection
