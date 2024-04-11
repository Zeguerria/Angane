<footer class="main-footer " style="background-image: url({{asset('glbal/theme/t2.jpg')}}) ;  background-size: cover; background-repeat: no-repeat;">
    <div class="conainer">
        <div class="row">

          <!--bouton mention legale fin-->
          <!--containeur icon debut-->
          <div class="col-12 col-md-3 text-md-end">

            <ul class="list-inline">
              <li class="list-inline-item">
                <a type="button" class="btn " data-toggle="modal" data-target="#staticBackdrop">
                   <span class="class" style="font-size: 20px; color: #D9B8F7; font-family : 'Times New Roman', Times, serif;"> Mention Legale</span>
                  </a>
              </li>
              <div class="modal fade " id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog  modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bgnav" style="background-image: url({{asset('glbal/theme/t2.jpg')}}) ;  background-size: cover; background-repeat: no-repeat;">
                            <h4 class="modal-title" style="font-size : 35px; font-weight: 900; color :#D9B8F7;"><span><i class="fas fa-file-alt"></i></span>&ensp;Mention Légale</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color :#B460B5;">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <section>
                                    <div class="container">
                                        <div class="row">
                                            <div class="row">
                                                <div class="col-12 col-md-12  col-ml-12 col-lg-12">
                                                    <div class="d-flex justify-content-center pb-1">
                                                        <h5 >En vigeur Aux Utilisateur</h5>

                                                    </div>
                                                    <div>
                                                        <p>Conforment aux dispositions des Articles 6-III et 19 de la Loi n°2004-575 du 21 Juin 2004 pour la confiance dans l"economie numérique, dite L.C.E.N, il est porté a la connaissance des utilisateurs et visiteurs de J&J-SHOP les présentes mentions légales. </p>
                                                        <p>La connexion et la navigation sur J&J-SHOP par l'utilisateur implique acceptation intégrale et sans réserve des présentes mentions légales.</p>
                                                        <p>Ces derniere sont accessibles sur le site rubrique <a href="#">Mention legale</a>.</p>
                                                        <div class="d-flex justify-content-start ">
                                                            <h5 pb-1 >Article 1</h5>
                                                        </div>
                                                        <p>l'utilisateur {{Auth::user()->name}} {{Auth::user()->prenom}}.</p>
                                                            <p>J&J-SHOP Assure a {{Auth::user()->name}} {{Auth::user()->prenom}} la collecte et un traitement d'informations personnelles dans le respect de la vie privée conforment a la <a href="#">loi n°78-17</a> du 6 janvier 1978 relative a l'information, aux fichiers et aux libertés.</p>
                                                            <p>En vertu de la loi informatique et Libertés, en date du 6 janvier 1978, l'utilisateur {{Auth::user()->name}} {{Auth::user()->prenom}} dispose d'un droit d'acces, de redaction, de suppression et d'opposition de ses données personnelles. L'utilisateur {{Auth::user()->name}} {{Auth::user()->prenom}} exerce ce droit : </p>
                                                            <p>Toute utilisation, reproduction, diffusion, commercialisation, modification de toute ou partie de l'application, sans autorisation du developper <a href="#">Okawe Jeremy</a> est prohibée et pourra entrainée des actions de poursuites judiciaires telles que notament prévues par le Code de la propriété intellectuelle et le Code Civil. </p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                             </div>


                        </div>
                        <div class="modal-footer justify-content-between bgnav" style="background-image: url({{asset('glbal/theme/t2.jpg')}}) ;  background-size: cover; background-repeat: no-repeat;">
                            <button type="button" class="btn mr-md-2 mb-md-0 mb-2 btn-outline-danger btn-round"  data-dismiss="modal" style=" font-family: italic ;color:#D9B8F7;"><i class="fas fa-exclamation-triangle "></i>&ensp;Fermer</button>
                        </div>
                    </div>
                </div>
              </div>
            </ul>
          </div>
          <div class="col-12 col-md-3 text-md-end">
            <ul class="list-inline pt-2">
              <li class="list-inline-item"><a href="#"  data-bs-toggle="tooltip" title="Localisation"><i class="fas fa-map-marker-alt" style="font-size: 30px; color:#fc0707;"></i></a></li>&thinsp;&thinsp;

              <li class="list-inline-item"><a href="#"  data-bs-toggle="tooltip" title="Facebook"><i class="fab fa-facebook " style="font-size: 30px; color:#3B5998;"></i></a></li>
              <li class="list-inline-item"><a href="#"  data-bs-toggle="tooltip" title="WhatsApp"><i class="fab fa-whatsapp " style="font-size: 30px; color:	#25D366;"></i></a></li>
              <li class="list-inline-item"><a href="#"  data-bs-toggle="tooltip" title="Email"><i class="fas fa-envelope " style="font-size: 30px; color:	#db4a39;"></i></a></li>
              <li class="list-inline-item"><a href="#"  data-bs-toggle="tooltip" title="TikTok"><i class="fab fa-tiktok" style="font-size: 30px; color:	#010101;"></i></a></li>
            </ul>
          </div>
          <div class="col-12 col-md-5">
            <!--bouton metion legale debut-->
            <div class="mention">
              <ul >
                  <a href="#" class="text-decoration-none " >
                    <h5 class="bold">Copyright © 2023 - <a href="#">Okawe Jeremy</a> . Tous droits réservés. <a href="#">CNPE</a></h5>
                    </a>
              </ul>
            </div>

          </div>
          <!--container icon fin-->
          <div class="col-12 col-md-1 d-flex justify-content-end">
            <ul class="list-inline">
              <li class="list-inline-item"><a href="#"  data-bs-toggle="tooltip" title="home"><img src="" alt="" class="brand-image img-circle elevation-3"  width="40"></a></li>
            </ul>
          </div>
        </div>
    </div>
  </footer>