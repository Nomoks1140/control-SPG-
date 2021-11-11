<?php
include("conexion.php");
session_start();
if (!isset($_SESSION ['usuario'])){
    header("Location: /cursoPHP/Empresa/login/index.php");
}
$iduser = $_SESSION ['usuario'];

$sql = "SELECT usuario, nombre, apellido, correo, id_tipo_doc, n_documento, telefono, direccion, id_ciudad FROM postulante WHERE usuario='$iduser'";
$resultado = $conexion->query($sql);
$row = $resultado->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=devise-width, initial-scale=1.0">
        <title>Side Menu</title>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="sidemenu.css">
    </head>
    <body>
        <div id="sidemenu" class="menu-collapsed">
            <!-- HEADER -->
            <div id="header">
            <div id="title"><span></span></div>
            <div id="menu-btn">
                <div class="btn-hamburger"></div>
                <div class="btn-hamburger"></div>
                <div class="btn-hamburger"></div>
            </div>
            </div>
            <!--PROFILE-->
            <div id="profile">
                <div id="photo"><img src="SIDEMENU/photo.jpg" alt=""></div>
                <div id="name"><span><?php  echo utf8_decode($row['nombre']);
                ?></span></div>
            </div>
            <!--ITEMS-->
            <div id="menu-items">
                <div class="item">
                    <a href="#">
                        <div class="icon"><img src="SIDEMENU/Inicio.png" alt=""></div>
                        <div class="title"><span>Inicio</span></div>
                    </a>
                </div>
                <div class="item">
                    <a href="#">
                        <div class="icon"><img src="SIDEMENU/Perfil.png" alt="-122222px"></div>
                        <div class="title"><span>Perfil</span></div>
                    </a>
                </div>
                <div class="item">
                    <a href="#">
                        <div class="icon"><img src="SIDEMENU/Empresa.png" alt=""></div>
                        <div class="title"><span>Buscar Empresa</span></div>
                    </a>
                </div>
                <div class="item">
                    <a href="#">
                        <div class="icon"><img src="SIDEMENU/Buscar.png" alt=""></div>
                        <div class="title"><span>Consultar Aplicaciones</span></div>
                    </a>
                </div>
                <div class="item">
                    <a href="#">
                        <div class="icon"><img src="SIDEMENU/Contrato.png" alt=""></div>
                        <div class="title"><span>Consultar Contrato</span></div>
                    </a>
                </div>
                <div class="item">
                    <a href="#">
                        <div class="icon"><img src="SIDEMENU/Comentarios.png" alt=""></div>
                        <div class="title"><span>Comentarios</span></div>
                    </a>
                </div>
            </div>
        </div>
        <div id="main-container">
        <header>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <img src="LOGO.png" alt="" height="50px" width="auto" class="imag">   
       <h3>Control De Seguridad Privada</h3>
        <button tipe="sumbit" id="end"><a class="link" href="Iniciar Sesion.html">Cerrar Sesion</a></button>
        </header>
        <main>
            <form action="Bd_curriculum.php" class="formulario" id="formulario" method="$_POST">
                <!-- Grupo: Usuario -->
			<div class="formulario__grupo" id="grupo__usuario">
				<label for="usuario" class="formulario__label">Usuario</label>
				<div class="formulario__grupo-input">
					<input class="formulario__input" <?php  echo utf8_decode($row['usuario']);?> >
				</div>

			</div>
 
			<!-- Grupo: Nombre -->
			<div class="formulario__grupo" id="grupo__nombre">
				<label for="nombre" class="formulario__label">Nombre</label>
				<div class="formulario__grupo-input">
					<input class="formulario__input" <?php  echo utf8_decode($row['nombre']);?> >
				</div>
			</div>

			<!-- Grupo: Apellido -->
			<div class="formulario__grupo" id="grupo__apellido">
				<label for="nombre" class="formulario__label">Apellido</label>
				<div class="formulario__grupo-input">
					<input class="formulario__input" <?php  echo utf8_decode($row['apellido']);?> >
				</div>
				
			</div>

            	<!-- Grupo: Correo Electronico -->
			<div class="formulario__grupo" id="grupo__correo">
				<label for="correo" class="formulario__label">Correo Electrónico</label>
				<div class="formulario__grupo-input">
					<input class="formulario__input" <?php  echo utf8_decode($row['correo']);?>>
				</div>
			</div>
		
         <!-- Grupo: Tipo de documento -->
		 <div class="formulario__grupo" id="tipo_doc">
			<label for="id_tipo_doc" class="formulario__label">Tipo de Documento</label>
			<div class="formulario__grupo-input">
				<select class="formulario__input" <?php  echo utf8_decode($row['id_tipo_doc']);?> ></select>
			</div>

		</div>

			<!-- Grupo: Teléfono -->
			<div class="formulario__grupo" id="grupo__n_documento">
				<label for="n_documento" class="formulario__label">Numero de Documento</label>
				<div class="formulario__grupo-input">
					<input  class="formulario__input" <?php  echo utf8_decode($row['n_documento']);?>>
					
				</div>
			</div>
			

			<!-- Grupo: Teléfono -->
			<div class="formulario__grupo" id="grupo__telefono">
				<label for="telefono" class="formulario__label">Teléfono</label>
				<div class="formulario__grupo-input">
					<input class="formulario__input" <?php  echo utf8_decode($row['telefono']);?>>
				</div>
			</div>

			<!-- Grupo: direccion -->
			<div class="formulario__grupo" id="grupo__direccion">
				<label for="direccion" class="formulario__label">Direccion</label>
				<div class="formulario__grupo-input">
					<input class="formulario__input" <?php  echo utf8_decode($row['direccion']);?>>
				</div>
			</div>



			
		
         <!-- Grupo: Tipo de documento -->
		 <div class="formulario__grupo" id="id_ciudad">
			<label for="t_documento" class="formulario__label">Ciudad</label>
			<div class="formulario__grupo-input">
				<select class="formulario__input" <?php  echo utf8_decode($row['id_ciudad']);?>>
				</select>
			</div>

		</div>
<br>
              
            </form>
        </main>
        </div>

        <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
        <script>
            newFunction();

function newFunction() {
    const btn = document.querySelector('#menu-btn');
    const menu = document.querySelector('#sidemenu');
    btn.addEventListener('click', () => {
        menu.classList.toggle('menu-expanded');
        menu.classList.toggle('menu-collapsed');

        document; querySelector('body').classList.toggle('body-expanded');
    });
}
        </script>
    </body>
</html>
