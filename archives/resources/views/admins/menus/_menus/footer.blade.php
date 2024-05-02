<footer class="main-footer moncard">
    <div class="container">
        <div class="row">
            <!-- Bouton mention légale -->
            <div class="col-12 col-md-2 text-md-end">
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a type="button" class="btn text-start nav-link-heart" data-toggle="modal" data-target="#staticBackdrop">
                            <span class="class" style="font-size: 20px; color: #D9B8F7; font-family: 'Times New Roman', Times, serif;">Mention Légale</span>
                        </a>
                    </li>

                    <!-- Modal mention légale -->
                    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bgnav" style="background-image: url({{asset('glbal/theme/t7.jpg')}}) ;  background-size: cover; background-repeat: no-repeat;">
                                    <h4 class="modal-title fw-bold titre-grandiant" style="font-size: 35px; font-weight: 900;">
                                        <span><i class="fas fa-file-alt"></i></span>&ensp;Mention Légale</h4>
                                    <button type="button" class="close nav-link-heart" data-dismiss="modal" aria-label="Close" style="color: #B460B5;">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <section>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                                        <div class="d-flex justify-content-center pb-1">
                                                            <h5>En vigueur Aux Utilisateurs</h5>
                                                        </div>
                                                        <div>
                                                            <p>Conformément aux dispositions des Articles 6-III et 19 de la Loi n°2004-575 du 21 Juin 2004 pour la confiance dans l'économie numérique, dite L.C.E.N, il est porté à la connaissance des utilisateurs et visiteurs de ENGANE les présentes mentions légales.</p>
                                                            <p>La connexion et la navigation sur ENGANE par l'utilisateur impliquent l'acceptation intégrale et sans réserve des présentes mentions légales.</p>
                                                            <!-- Ajoutez le reste de votre contenu de mention légale ici -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between bgnav" style="background-image: url({{asset('glbal/theme/t7.jpg')}}) ;  background-size: cover; background-repeat: no-repeat;">
                                    <button type="button" class="btn mr-md-2 mb-md-0 mb-2 btn-outline-danger btn-round nav-link-heart" data-dismiss="modal" style="font-family: italic; color: #D9B8F7;">
                                        <i class="fas fa-exclamation-triangle"></i>&ensp;Fermer
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </ul>
            </div>
            <!-- Container icônes -->
            <div class="col-12 col-md-3 text-md-end">
                <ul class="list-inline pt-2">
                    <li class="list-inline-item"><a href="#" data-bs-toggle="tooltip" title="Localisation"><i class="fas fa-map-marker-alt" style="font-size: 30px; color:#fc0707;"></i></a></li>
                    <li class="list-inline-item"><a href="#" data-bs-toggle="tooltip" title="Facebook"><i class="fab fa-facebook " style="font-size: 30px; color:#3B5998;"></i></a></li>
                    <li class="list-inline-item"><a href="#" data-bs-toggle="tooltip" title="WhatsApp"><i class="fab fa-whatsapp " style="font-size: 30px; color:	#25D366;"></i></a></li>
                    <li class="list-inline-item"><a href="#" data-bs-toggle="tooltip" title="Email"><i class="fas fa-envelope " style="font-size: 30px; color:	#db4a39;"></i></a></li>
                    <li class="list-inline-item"><a href="#" data-bs-toggle="tooltip" title="TikTok"><i class="fab fa-tiktok" style="font-size: 30px; color:	#010101;"></i></a></li>
                </ul>
            </div>
            <!-- Mentions légales et droits d'auteur -->
            <div class="col-12 col-md-6">
                <div class="mention">
                    <ul>
                        <a href="#" class="text-decoration-none">
                            <h5 class="bold">Copyright © 2024 - <a href="#"><span class="brand-text font-weight-light "><strong style="font-size: 1.3em; color :hsl(139, 91%, 22%);">E</strong><label for="" style="color :hsl(139, 91%, 22%);">N</label><label for="" style="color :#cbf900;">GA</label><label for="" style="color :#5300f9;">NE</label></span></a>. Tous droits réservés. <a href="https://cnpe-gabon.com/Accueil" class="nav-link-heart" target="_blank">CNPE</a>
                            </h5>
                        </a>
                    </ul>
                </div>
            </div>
            <!-- Icône home -->
            <div class="col-12 col-md-1 d-flex justify-content-end">
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="./dashboard" data-bs-toggle="tooltip" title="home" class="nav-link-heart"><img src="{{asset('assets/img/dgcpt/logo.png')}}" alt="" class="brand-image img-circle elevation-3" width="40"></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
