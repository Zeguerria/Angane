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