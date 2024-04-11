
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ANGANE | Authentification</title>
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/dgcpt/favicon.ico')}}">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="{{ asset('pageauth/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css')}}">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="{{ asset('pageauth/css/style.css')}}">
	</head>

	<body>

		<div class="wrapper" style="background-image: url({{ asset('pageauth/images/bg_login.png')}});">
			<div class="inner">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
					<h3>AUTHENTIFICATION</h3>
					<div class="form-wrapper">
						<label for="">Identifiant</label>
						<input id="email" class="form-control" type="email" placeholder="Saisir votre identifiant" name="email" :value="old('email')" required autofocus >
					</div>
					<div class="form-wrapper">
						<label for="">Mot de passe</label>
						<input id="password" placeholder="Saisir votre Mot de passe" type="password" name="password" required autocomplete="current-password"  class="form-control">
					</div>
					<div class="checkbox">
						<label>
							<input id="remember_me" name="remember" type="checkbox"> Se souvenir de moi.
							<span class="checkmark"></span>
						</label>
					</div>
					<button>Connexion</button>
				</form>
			</div>
		</div>

	</body>
</html>
