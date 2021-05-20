<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="views/js/login.js"></script>

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

	<title>Login</title>
</head>
<body>
	<div>
		<div class="container mt-4">
			<div class="row">
				<div class="col">
				
				</div>
				<div class="col">
					<center><h1>Iniciar sesión PQR</h1></center>
					<form method="POST" id="loginform">
						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Usuario</label>
							<input type="text" class="form-control" name="user" id="exampleInputEmail1" aria-describedby="emailHelp">
							<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
						</div>
						<div class="mb-3">
							<label for="exampleInputPassword1" class="form-label">Contraseña</label>
							<input type="password" class="form-control" name="password" id="exampleInputPassword1">
						</div>
						<button type="submit" class="btn btn-primary">Login</button>
					</form>
				</div>
				<div class="col">
					
				</div>
			</div>
			<center> <a href="?signup"> Registrarse </a> </center>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>