<?php 
// include("conexion.php");
    session_start();
    if (isset($_SESSION ['usuario'])){
        header("Location: /index.php");
    }
    ?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login con  PHP - Bootstrap 4</title>
    
     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/Estilo.css">
    <link rel="stylesheet" href="/plugins/sweet_alert2/sweetalert2.min.css">

</head>
<body background="/Fondo.jpg">
        <h1><img src="/LOGO.png" alt="" height="200px" width="auto"><br>Control De <br> Seguridad Privada</h1>
    
    <form class="formulario" action="" id="formlogin" method="POST">
      
        <h1 id="T"><b>Iniciar Sesion</b></h1>
        <div class="contenedor">
          
            <div class="input-contenedor">
                <i class="fas fa-envelope icon"></i>
            <input type="text" placeholder="Usuario" name="usuario" id="usuario">

            </div>

            <div class="input-contenedor">
               <i class="fas fa-key icon"></i>
            <input type="password" placeholder="Contraseña" name="password" id="password">
            </div>
        

    <br>
    <input type="submit" name="submit" class="button" value="Iniciar Sesion"><a href="/vistas/pag_inicio.php"></a>
    </form>
    <p>¿No tienes cuenta con nosotros?<a class="link" href="/sweet-alert-2-codigo_base/index.php">Registrate</a></p></div>

    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="popper/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    
    <script src="plugins/sweet_alert2/sweetalert2.all.min.js"></script>
    <script src="codigo.js"></script>
    <script src="https://kit.fontawesome.com/542680d256.js" crossorigin="anonymous"></script>
</body>
</html>