<?php
include ("conexion.php");

if(isset($_POST["enviar"])){
	$rol = mysqli_real_escape_string($conexion, $_POST ['id_rol']);
    $usuario = mysqli_real_escape_string($conexion, $_POST ['usuario']);
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $apellido =mysqli_real_escape_string($conexion,  $_POST['apellido']);
    $correo = mysqli_real_escape_string($conexion, $_POST['correo']);
    $contraseña= mysqli_real_escape_string($conexion, $_POST['contraseña']);
    $contraseña2 = mysqli_real_escape_string($conexion, $_POST['contraseña2']);
    $id_tipo_doc= mysqli_real_escape_string($conexion, $_POST['id_tipo_doc']);
    $n_documento =mysqli_real_escape_string($conexion,  $_POST ['n_documento']);
    $telefono= mysqli_real_escape_string($conexion, $_POST['telefono']);
    $direccion = mysqli_real_escape_string($conexion, $_POST['direccion']);
    $ciudad = mysqli_real_escape_string($conexion, $_POST['id_ciudad']);
    $sqluser = "SELECT * FROM postulante WHERE usuario = '$usuario' and correo = '$correo'";
    $resultadouser = $conexion->query($sqluser);
    $filas= $resultadouser->num_rows;
    if ($filas > 0){
      echo '<script>';
      echo 'alert("usuario ya registrado");';
      echo 'window.location.href="/index.php";';
      echo'</script>';

    } else {
    
    $consulta = "INSERT INTO postulante(id_rol, usuario, nombre, apellido, correo, contraseña, contraseña2, id_tipo_doc, n_documento, telefono, direccion, id_ciudad)
    VALUES ('$rol','$usuario','$nombre','$apellido', '$correo', '$contraseña', '$contraseña2', '$id_tipo_doc', '$n_documento', '$telefono', '$direccion','$ciudad')";
    $resultadoconsulta = $conexion ->query($consulta);
    if($resultadoconsulta > 0){
      echo  '<script>';
      echo 'alert("Registro realizado con exito.");';
      echo 'window.location.href="formacion.html";';
      echo '</script>';
    }else{
      echo  '<script>';
      echo 'alert("error al registrarse.");';
      echo 'window.location.href="/index.php";';
      echo '</script>';

    }
  }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Validación de Formulario con Javascript</title>
	<link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body background="Fondo.jpg">
	<main>
		<h1><img src="LOGO.png" alt="" height="200px" width="auto"><br>Control De <br> Seguridad Privada</h1>
		
		<form class="formulario" id="formulario" action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST" >
            <div class="titulo">
			<h1 id="T">Registro Postulante</h1>
		    </div>
<br>
         <div class="post">   <!-- Grupo: rol -->
		 <div class="formulario__grupo" id="">
			<div class="formulario__grupo-input">
				<select class="formulario__input" name="id_rol" id="id_rol">
					<option value="2">Postulante</option>
				</select>
			</div>
		</div>
	</div> 
             <br>

			<!-- Grupo: Usuario -->
			<div class="formulario__grupo" id="grupo__usuario">
				<label for="usuario" class="formulario__label">Usuario</label>
				<div class="formulario__grupo-input">
					<input type="text" required pattern="[a-zA-Z0-9_-]{4,16}" title="El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo." autofocus class="formulario__input" name="usuario" id="usuario" placeholder="Daniel123">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
			</div>
 
			<!-- Grupo: Nombre -->
			<div class="formulario__grupo" id="grupo__nombre">
				<label for="nombre" class="formulario__label">Nombres</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" required pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,64}" title="El nombre tiene que ser de 4 a 16 dígitos y solo puede contener letras." name="nombre" id="nombre" placeholder="Daniel">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
			</div>

			<!-- Grupo: Apellido -->
			<div class="formulario__grupo" id="grupo__apellido">
				<label for="nombre" class="formulario__label">Apellidos</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" required  pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,64}" title="El apellido tiene que ser de 4 a 16 dígitos y solo puede contener letras." name="apellido" id="apellido" placeholder="Pineda">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
			</div>

            	<!-- Grupo: Correo Electronico -->
			<div class="formulario__grupo" id="grupo__correo">
				<label for="correo" class="formulario__label">Correo Electrónico</label>
				<div class="formulario__grupo-input">
					<input type="email" class="formulario__input" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" required title="El correo solo puede contener letras, numeros, puntos, guiones y guion bajo." name="correo" id="correo" placeholder="correo@correo.com">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
			</div>
		
			<!-- Grupo: Contraseña -->
			<div class="formulario__grupo" id="grupo__contraseña">
				<label for="contraseña" class="formulario__label">Contraseña</label>
				<div class="formulario__grupo-input">
					<input type="password" class="formulario__input" required pattern="[a-zA-Z0-9]{4,16}" title="La contraseña tiene que ser de 4 a 12 dígitos." name="contraseña" id="contraseña">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">La contraseña tiene que ser de 4 a 12 dígitos.</p>
			</div>


		
         <!-- Grupo: Tipo de documento -->
		 <div class="formulario__grupo" id="tipo_doc">
			<label for="id_tipo_doc" class="formulario__label">Tipo de Documento</label>
			<div class="formulario__grupo-input">
				<select class="formulario__input" required name="id_tipo_doc" id="id_tipo_doc">
					<option value="">Selecione una opcion</option>
					<option value="1">Cedula de Ciudadania</option>
					<option value="2">Documento Extranjero</option>
				</select>
			</div>

		</div>

			<!-- Grupo: Teléfono -->
			<div class="formulario__grupo" id="grupo__n_documento">
				<label for="n_documento" class="formulario__label">Numero de Documento</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input"  required pattern="[0-9]{8,11}" title="El numero del documento solo puede contener numeros y el maximo es de 8 a 11 digitos" name="n_documento" id="n_documento" placeholder="4491234567">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El documento solo puede contener numeros y el maximo son 11 dígitos.</p>
			</div>
			

			<!-- Grupo: Teléfono -->
			<div class="formulario__grupo" id="grupo__telefono">
				<label for="telefono" class="formulario__label">Teléfono</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input"  required pattern="[0-9]{8,10}" title="El numero de telefono solo puede contener numeros y el maximo es de 8 a 10 digitos" name="telefono" id="telefono" placeholder="3194267607">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El telefono solo puede contener numeros y el maximo son 10 dígitos.</p>
			</div>

			<!-- Grupo: direccion -->
			<div class="formulario__grupo" id="grupo__direccion">
				<label for="direccion" class="formulario__label">Direccion</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" required pattern="[a-zA-Z0-9_-#]{4,16}" name="direccion" id="direccion" placeholder="Calle 66# a Sur">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
			</div>



			
		
         <!-- Grupo: Tipo de documento -->
		 <div class="formulario__grupo" id="id_ciudad">
			<label for="t_documento" class="formulario__label">Ciudad</label>
			<div class="formulario__grupo-input">
				<select class="formulario__input" required name="id_ciudad" id="id_ciudad">
					<option value="">Selecione una opcion</option>
					<option value="1">Bogota</option>
					<option value="2">Medellin</option>
					<option value="3">Cali</option>
					<option value="4">Barranquilla</option>
					<option value="5">Cartagena de Indias</option>
					<option value="6">Soacha</option>
					<option value="7">Cucuta</option>
					<option value="8">Soledad</option>
					<option value="9">Bucaramanga</option>
					<option value="10">Antioquia</option>
				</select>
			</div>

		</div>
<br>
			<!-- Grupo: Terminos y Condiciones -->
			
			
				<button type="submit" class="formulario__btn" name="enviar">Enviar</button>
				
		</form>
	</main>

	
	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
</body>
</html>