<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Usuario</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="/Estilo.css"> 
	<title>Login con  PHP - Bootstrap 4</title>
	</head>
	<body
		background="/Fondo.jpg">
			<h1><img src="/LOGO.png" alt="" height="200px" width="auto"><br>Control De <br> Seguridad Privada</h1>
		
		<form class="formulario" action="" id="formlogin" method="POST">
		  
			<h1 id="T"><b>Iniciar Sesion</b></h1>
			<div class="contenedor">
			  
				<div class="input-contenedor">
					<i class="fas fa-envelope icon"></i>
				<input type="text" placeholder="Correo Electronico" name="usuario" id="usuario">
	
				</div>
	
				<div class="input-contenedor">
				   <i class="fas fa-key icon"></i>
				<input type="password" placeholder="Contraseña" name="password" id="password">
				</div>
			
	
		<br>
		<input type="submit"  class="button" value="Iniciar Sesion">
		</form>
		<p>¿No tienes cuenta con nosotros?<a class="link" href="/sweet-alert-2-codigo_base/index.php">Registrate</a></p></div>
	
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<script src="js/Alert.js"></script>
		<script src="https://kit.fontawesome.com/542680d256.js" crossorigin="anonymous"></script>
	
</body>
</html>