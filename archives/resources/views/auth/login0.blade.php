<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
            <meta name="description" content="">
            <meta name="keywords" content="">
            <meta name="author" content="">
            <meta name="robots" content="noindex, nofollow">
            <title>Authentification Transax </title>

            <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/dgcpt/favicon.ico')}}">

            <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

            <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/fontawesome.min.css')}}">
            <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/all.min.css')}}">

            <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        </head>
        <body class="account-page">

            <div class="main-wrapper">
                <div class="account-content">
                    <div class="login-wrapper">
                        <div class="login-content" width="100%">
                            <form method="POST" action="{{route('login')}}"> @csrf
                                <div class="login-userset">
                                    <div class="login-logo">
                                        <center></center>
                                        <img src="{{asset('assets/img/Angane.png')}}" alt="img">
                                    </div>
                                    <div class="login-userheading">
                                        <h3>AUTHENTIFICATION</h3>
                                    </div>
                                    <div class="form-login">
                                        <label>Email</label>
                                        <div class="form-addons">
                                            <input type="text" name="email" placeholder="Entrer votre adresse email">
                                            <img src="{{asset('assets/img/icons/mail.svg')}}" alt="img">
                                        </div>
                                    </div>
                                    <div class="form-login">
                                        <label>Mot de Passe</label>
                                        <div class="pass-group">
                                            <input type="password"  name="password"  class="pass-input" placeholder="Entre votre mot de passe">
                                            <span class="fas toggle-password fa-eye-slash"></span>
                                        </div>
                                    </div>
                                    <div class="form-login">
                                        <div class="alreadyuser">
                                            <h4><a href="/Mot-de-passe-oublié" class="hover-a">Mot de passe oublié ?</a></h4>
                                        </div>
                                    </div>
                                    <div class="form-login">
                                        <button class="btn btn-login" type="submit">Connexion</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="login-img">
                            <img src="{{asset('assets/img/login.png')}}" alt="img">
                        </div>
                    </div>
                </div>
            </div>


            <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>

            <script src="{{asset('assets/js/feather.min.js')}}"></script>

            <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

            <script src="{{asset('assets/js/script.js')}}"></script>
        </body>
    </html>
