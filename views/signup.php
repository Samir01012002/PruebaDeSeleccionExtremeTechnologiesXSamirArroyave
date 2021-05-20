<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="views/js/signup.js"></script>

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

	<title>Login</title>
</head>
<body>
	<div>
		<div class="container mt-4">
			<div class="row">
				<div class="col-3">
				
				</div>
				<div class="col-6">
					<center><h1>Registrarse</h1></center>
					<form method="POST" id="loginform">
					<div class="row">
					<div class="mb-3">
							<input type="text" class="form-control mt-2" placeholder="Nombre" name="name" >
						</div>
					<div class="col">
						<input type="text" class="form-control" placeholder="Usuario" name="userName">
					</div>
					<div class="col">
						<input type="text" class="form-control" placeholder="Telefono" name="phone">
					</div>
				</div>
					<div class="mb-3">
						<input type="password" class="form-control mt-2" placeholder="Contraseña" name="password" >
					</div>
					<div class="form-check">
					<input class="form-check-input" value="USER" type="radio" name="rol" id="rol1">
					<label class="form-check-label" for="rol1">
						Usuario
					</label>
					</div>
					<div class="form-check">
					<input class="form-check-input" value="ADMIN" type="radio" name="rol" id="rol2" checked>
					<label class="form-check-label" for="rol2">
						Administrador
					</label>
					</div>
					<button type="submit" class="btn btn-primary">Registrarse</button>
					</form>
				</div>
				<div class="col-3">
					
				</div>
			</div>
			<center> <a href="?"> Iniciar sesión </a> </center>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>