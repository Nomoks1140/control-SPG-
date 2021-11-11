<?php 
session_start();

//Si nadie inció sesión vuelve a la pag de Login
if ($_SESSION["s_usuario"] === null){
	header("Location: ../index.php");
}else{
    if($_SESSION["s_idRol"]!=2){
        header("Location: ../vacante/index.php");
    }
}

?>
<?php
include_once 'basesDeDatos/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT * FROM vacante";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$usuarios=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<!--    Datatables  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>
    <link rel="stylesheet" href="sidemenu.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">  
    <title></title>
    <style>
        table.dataTable thead {
            background: linear-gradient(to right, #0575E6, #00F260);
            color:white;
        }
    </style>  
      
  </head>
  </head>
    <body background="fondo.jpg"> 
        <div id="sidemenu" class="menu-collapsed">
            <!-- HEADER -->
            <div id="header">
            <div id="title"></div>
            <div id="menu-btn">
                <div class="btn-hamburger"></div>
                <div class="btn-hamburger"></div>
                <div class="btn-hamburger"></div>
            </div>
            </div>
            <!--PROFILE-->
            <div id="profile">
                <div id="photo"><img src="SIDEMENU/photo.jpg" alt=""></div>
                <div id="name"><span>Marcos Rivas</span></div>
            </div>
            <!--ITEMS-->
            <div id="menu-items">
                <div class="item">
                    <a href="#">
                        <div class="icon"><img src="SIDEMENU/Panel.png"/></div>
                        <div class="title"><span>Panel de control</span></div>
                    </a>
                </div>
                <!-- <div class="item">
                    <a href="/cursoPHP/Empresa/login/Usuarios/index.php">
                        <div class="icon"><img src="SIDEMENU/Profile.png"/></div>
                        <div class="title"><span>Datos Basicos</span></div>
                    </a>
                </div> -->
                <!--<div class="item">
                    <a href="#">
                        <div class="icon"><img src="SIDEMENU/Education.png" alt=""></div>
                        <div class="title"><span>Formacion</span></div>
                    </a>
                </div>-->
                <!--<div class="item">
                    <a href="#">
                        <div class="icon"><img src="SIDEMENU/Experience.png" alt=""></div>
                        <div class="title"><span>Experencia</span></div>
                    </a>
                </div>-->
                <div class="item">
                    <a href="/datatables_bases/index.php">
                        <div class="icon"><img src="SIDEMENU/Business.png" alt=""></div>
                        <div class="title"><span>Oferta de Empleo</span></div>
                    </a>
                </div>
            <!--<div class="item">
                    <a href="#">
                        <div class="icon"><img src="SIDEMENU/Comentarios.png" alt=""></div>
                        <div class="title"><span>Comentarios</span></div>
                    </a>
                </div>-->
            </div>
        </div>
        <div id="main-container">
        <header>
        <button tipe="sumbit" id="end"><a class="Cerse" href="/index.php">Cerrar Sesion</a></button>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <h3><img src="LOGO.png" alt="" height="50px" width="auto" class="imag">   
        Control De Seguridad Privada</h3>
        </header>
        <!--Cuerpo-->
    
    <div class="container">
       <div class="row">
           <div class="col-lg-12">
            <table id="tablaUsuarios" class="table-striped table-bordered" style="width:100%">
                <thead class="text-center">
                    <th>Id_Vacante</th>
                    <th>Descripcion</th>
                    <th>Salario</th>
                    <th>Fecha Creacion</th>
                    <th>Fecha Cierre</th>
                    <th>Cargo</th>
                </thead>
                <tbody>
                    <?php
                        foreach($usuarios as $usuario){
                    ?>
                    <div class="contenido">
                    <tr>
                        <td><?php echo $usuario['id_vacante']?></td>
                        <td><?php echo $usuario['descripcion']?></td>
                        <td><?php echo $usuario['salario']?></td>
                        <td><?php echo $usuario['fecha_creacion']?></td>
                        <td><?php echo $usuario['fecha_cierre']?></td>
                        <td><?php echo $usuario['id_cargo']?></td>
                    </tr>
                    </div>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
           </div>
       </div> 
    </div>
   
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      
      
<!--    Datatables-->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>  
      
      
    <script>
      $(document).ready(function(){
         $('#tablaUsuarios').DataTable(); 
      });
    </script>
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