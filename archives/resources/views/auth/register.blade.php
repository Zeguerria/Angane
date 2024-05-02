{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> --}}
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ANGANE | REGISTRATION</title>
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/dgcpt/favicon.ico')}}">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="{{asset('regsters/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css')}}">

		<!-- STYLE CSS -->
		{{-- <link rel="stylesheet" href="{{asset('regsters/css/style.css')}}"> --}}

        {{--  --}}

        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/fontawesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/all.min.css')}}">

        <style>
            @font-face {
            font-family: "Poppins-Regular";
            src: url("../fonts/poppins/Poppins-Regular.ttf"); }
            @font-face {
            font-family: "Poppins-SemiBold";
            src: url("../fonts/poppins/Poppins-SemiBold.ttf"); }
            * {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box; }

            body {
            font-family: "Poppins-Regular";
            color: #333;
            font-size: 13px;
            margin: 0; }

            input, textarea, select, button {
            font-family: "Poppins-Regular";
            color: #333;
            font-size: 13px; }

            p, h1, h2, h3, h4, h5, h6, ul {
            margin: 0; }

            img {
                max-width: 100%;
            }

            ul {
            padding-left: 0;
            margin-bottom: 0; }

            a:hover {
            text-decoration: none; }

            :focus {
            outline: none; }

            .wrapper {
            min-height: 100vh;
            background-size: cover;
            background-repeat: no-repeat;
            display: flex;
            align-items: center;
            }

            .inner {
            padding: 20px;
            background: #fff;
            max-width: 850px;
            margin: auto;
            display: flex; }
            .inner .image-holder {
                width: 50%; }
            .inner form {
                width: 50%;
                padding-top: 36px;
                padding-left: 45px;
                padding-right: 45px; }
            .inner h3 {
                text-transform: uppercase;
                font-size: 25px;
                font-family: "Poppins-SemiBold";
                text-align: center;
                margin-bottom: 28px; }

            .form-group {
            display: flex; }
            .form-group input {
                width: 50%; }
                .form-group input:first-child {
                margin-right: 25px; }

            .form-wrapper {
            position: relative; }
            .form-wrapper i {
                position: absolute;
                bottom: 9px;
                right: 0; }

            .form-control {
            border: 1px solid #333;
            border-top: none;
            border-right: none;
            border-left: none;
            display: block;
            width: 100%;
            height: 30px;
            padding: 0;
            margin-bottom: 25px; }
            .form-control::-webkit-input-placeholder {
                font-size: 13px;
                color: #333;
                font-family: "Poppins-Regular"; }
            .form-control::-moz-placeholder {
                font-size: 13px;
                color: #333;
                font-family: "Poppins-Regular"; }
            .form-control:-ms-input-placeholder {
                font-size: 13px;
                color: #333;
                font-family: "Poppins-Regular"; }
            .form-control:-moz-placeholder {
                font-size: 13px;
                color: #333;
                font-family: "Poppins-Regular"; }

            select {
            -moz-appearance: none;
            -webkit-appearance: none;
            cursor: pointer;
            padding-left: 20px; }
            select option[value=""][disabled] {
                display: none; }

            button {
            border: none;
            width: 164px;
            height: 51px;
            margin: auto;
            margin-top: 40px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            background: #333;
            font-size: 15px;
            color: #fff;
            vertical-align: middle;
            -webkit-transform: perspective(1px) translateZ(0);
            transform: perspective(1px) translateZ(0);
            -webkit-transition-duration: 0.3s;
            transition-duration: 0.3s; }
            button i {
                margin-left: 10px;
                -webkit-transform: translateZ(0);
                transform: translateZ(0); }
            button:hover i, button:focus i, button:active i {
                -webkit-animation-name: hvr-icon-wobble-horizontal;
                animation-name: hvr-icon-wobble-horizontal;
                -webkit-animation-duration: 1s;
                animation-duration: 1s;
                -webkit-animation-timing-function: ease-in-out;
                animation-timing-function: ease-in-out;
                -webkit-animation-iteration-count: 1;
                animation-iteration-count: 1; }

            @-webkit-keyframes hvr-icon-wobble-horizontal {
            16.65% {
                -webkit-transform: translateX(6px);
                transform: translateX(6px); }
            33.3% {
                -webkit-transform: translateX(-5px);
                transform: translateX(-5px); }
            49.95% {
                -webkit-transform: translateX(4px);
                transform: translateX(4px); }
            66.6% {
                -webkit-transform: translateX(-2px);
                transform: translateX(-2px); }
            83.25% {
                -webkit-transform: translateX(1px);
                transform: translateX(1px); }
            100% {
                -webkit-transform: translateX(0);
                transform: translateX(0); } }
            @keyframes hvr-icon-wobble-horizontal {
            16.65% {
                -webkit-transform: translateX(6px);
                transform: translateX(6px); }
            33.3% {
                -webkit-transform: translateX(-5px);
                transform: translateX(-5px); }
            49.95% {
                -webkit-transform: translateX(4px);
                transform: translateX(4px); }
            66.6% {
                -webkit-transform: translateX(-2px);
                transform: translateX(-2px); }
            83.25% {
                -webkit-transform: translateX(1px);
                transform: translateX(1px); }
            100% {
                -webkit-transform: translateX(0);
                transform: translateX(0); } }
            @media (max-width: 1199px) {
            .wrapper {
                background-position: right center; }
            }
            @media (max-width: 991px) {
            .inner form {
                padding-top: 10px;
                padding-left: 30px;
                padding-right: 30px; } }
            @media (max-width: 767px) {
            .inner {
                display: block; }
                .inner .image-holder {
                width: 100%;
                }
                .inner form {
                width: 100%;
                padding: 40px 0 30px; }

            button {
                margin-top: 60px; } }

            /*# sourceMappingURL=style.css.map */

            /* Styles communs aux liens */
            a {
                padding-top: 2px;
                position: relative;
                text-decoration: none;
                color: blue;
            }
            .container-animat {
                display: flex;
                justify-content: center; /* Centre horizontalement */


            }

            /* Styles pour les span à l'intérieur du lien */
            a span {
                position: relative;
                display: inline-block;
                font-size: 20px; /* Ajustez la taille de la police selon vos besoins */
                margin-right: 5px; /* Espace entre les lettres */
                transition: transform 0.3s ease; /* Animation de la transformation */
            }

            /* Effet de soulignement */
            a::after {
                content: '';
                position: absolute;
                bottom: -2px; /* Positionner le soulignement en dessous du texte */
                left: 0;
                width: 0; /* Départ à zéro pour l'animation */
                height: 2px; /* Hauteur du soulignement */
                background-color: blue; /* Couleur du soulignement */
                transition: width 0.3s ease; /* Animation de l'élargissement */
            }

            /* Animation du soulignement lors du survol */
            a:hover::after {
                width: 100%; /* Elargir le soulignement sur toute la largeur */
            }

            /* Animation du soulignement lors du clic */
            a:active::after {
                width: 0; /* Réduire le soulignement à zéro */
            }

            /* Animation des lettres lors du survol */
            a:hover span {
                transform: translateY(-6px); /* Déplacer les lettres vers le haut */
            }
            /* Styles pour la case à cocher */
            input[type="checkbox"] {
                margin-right: 0.5rem; /* Marge à droite pour séparer la case à cocher du texte */
            }

            /* Styles pour les liens */
            a {
                color: blue; /* Couleur du lien */
                text-decoration: underline; /* Soulignement du lien */
                margin-right: 0.5rem; /* Marge à droite pour séparer les liens */
            }

            /* Styles pour le texte des conditions d'utilisation et de la politique de confidentialité */
            .text-sm {
                font-size: 0.875rem; /* Taille de police */
                line-height: 1.25rem; /* Hauteur de ligne */
                color: #4B5563; /* Couleur du texte */
            }
             /* Ajoutez ces styles pour conserver l'animation animated-link */
            .btn.animated-link {
                background-color: transparent;
                border: none;
                padding: 0;
                cursor: pointer;
            }

            .btn.animated-link span {
                position: relative;
                display: inline-block;
                font-size: 16px;
                margin-right: 5px;
                transition: transform 0.3s ease;
            }

            .btn.animated-link::after {
                content: '';
                position: absolute;
                bottom: -2px;
                left: 0;
                width: 0;
                height: 2px;
                background-color: blue;
                transition: width 0.3s ease;
            }

            .btn.animated-link:hover::after {
                width: 100%;
            }

            .btn.animated-link:active::after {
                width: 0;
            }

            .btn.animated-link span:hover {
                transform: translateY(-4px);
            }
                .btn.animated-link span:last-child {
                margin-right: 0; /* Réduire ou supprimer la marge droite du dernier span */
            }
            a {
                color: blue; /* Couleur du lien */
                text-decoration: none; /* Retirer le soulignement */
                margin-right: 0.5rem; /* Marge à droite pour séparer les liens */
            }
        </style>

	</head>

	<body>

		<div class="wrapper" style="background-image: url('{{asset('regsters/images/r2.jpg')}}');">
			<div class="inner" style="opacity: 0.98;">
				<div class="image-holder" >
					<img src="{{asset('assets/img/Angane.png')}}" alt="">
				</div>

				<form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    <x-validation-errors class="mb-4" />
                    @csrf
					<h3 style="font-family: Lato;"><strong style="font-size: 1.4em; color :hsl(139, 91%, 22%);">E</strong>nregistrement</h3>
					{{-- <div class="form-group">
						<input type="text" placeholder="First Name" class="form-control">
						<input type="text" placeholder="Last Name" class="form-control">
					</div> --}}
					{{-- <div class="form-wrapper">
						<input type="text" id="id" name="name" placeholder="Username" class="form-control custom-input" required autofocus autocomplete="name">
						<i class="zmdi zmdi-account"></i>
					</div> --}}
                    <div class="form-group">
						<input type="text" id="name" name="name" placeholder="Nom" class="form-control custom-input" required autofocus autocomplete="name">
    
						<input type="text" id="prenom" name="prenom" placeholder="Prénom" class="form-control custom-input"  autofocus autocomplete="prenom">
					</div>
					<div class="form-wrapper">
						<input type="text" type="email" id="email" name="email" placeholder="Email Address" class="form-control" required autocomplete="username">
						<i class="zmdi zmdi-email"></i>
					</div>
                    <div class="form-wrapper">
						<input type="text" id="phone" name="phone" placeholder="Télephone" class="form-control custom-input">
						<i class="zmdi zmdi-phone"></i>
					</div>
                    <div class="form-wrapper">
						<select class="form-control" id="quartier_id" name="quartier_id">
                            <option value="" disabled selected>Choisissez votre quartier</option>
                            @foreach ($quartiers as $quartier)
                                <option value="{{ $quartier->id }}">{{ $quartier->libelle }}</option>
                            @endforeach
                        </select>
                        
                        
                        
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
					</div>
					{{-- <div class="form-wrapper">
						<select name="" id="" class="form-control">
							<option value="" disabled selected>Gender</option>
							<option value="male">Male</option>
							<option value="femal">Female</option>
							<option value="other">Other</option>
						</select>
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
					</div> --}}
					<div class="form-wrapper">
						<input type="password" name="password" id="password" placeholder="Password" class="form-control" required autocomplete="new-password">
						<i class="zmdi zmdi-lock"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" placeholder="Confirm Password" class="form-control" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
						<i class="zmdi zmdi-lock"></i>
					</div>
                    <div class="form-wrapper">
                        <input type="file" id="photo" name="photo" accept="" class="form-control">
                        <i class="zmdi zmdi-image"></i>
                    </div>
                    <div class="mt-2 ">
                        <label for="terms" class="flex items-center">
                            <input type="checkbox" name="terms" id="terms" required>
                            <span class="ml-2 text-sm text-gray-600">I agree to the <a href="{{ route('terms.show') }}" class="underline">Terms of Service</a> and <a href="{{ route('policy.show') }}" class="underline">Privacy Policy</a></span>
                        </label>
                    </div>
                    <div class="container-animat">
                        <button type="submit" class="btn animated-link"  style="margin-top: 0px;">
                            <span>V</span>
                            <span>A</span>
                            <span>L</span>
                            <span>I</span>
                            <span>D</span>
                            <span>E</span>
                            <span>R</span>
                            {{-- <span>T</span>
                            <span>E</span>
                            <span>R</span> --}}
                            <span>&ensp;<i class="zmdi zmdi-arrow-right"></i></span>
                        </button>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <span>J'ai déjà un compte , me <a href="{{ route('login') }}" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Connecter
                        </a></span>

                    </div>

				</form>

			</div>
		</div>

        <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>

        <script src="{{asset('assets/js/feather.min.js')}}"></script>

        <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

        <script src="{{asset('assets/js/script.js')}}"></script>
	</body>
</html>
