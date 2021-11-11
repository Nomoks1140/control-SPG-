<?php require_once "vistas/parte_superior.php"?>
<?php 
//Si nadie inció sesión vuelve a la pag de Login
if ($_SESSION["s_usuario"] === null){
	header("Location: ../index.php");
}else{
    if($_SESSION["s_idRol"]!=3){
        header("Location: ../admin/index.php");
    }
}
?>
<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=devise-width, initial-scale=1.0">
        <title>Side Menu</title>
        <link rel="stylesheet"  href="style_jquery.css">
        <link rel="stylesheet" href="sidemenu.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
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
                <div id="name"><span>Colpatria</span></div>
            </div>
            <!--ITEMS-->
            <div id="menu-items">
                <div class="item">
                    <a href="#">
                        <div class="icon"><img src="SIDEMENU/Panel.png"/></div>
                        <div class="title"><span>Panel de control</span></div>
                    </a>
                </div>
                <!--<div class="item">
                    <a href="/cursoPHP/Empresa/login/datatables_bases/index.php">
                        <div class="icon"><img src="SIDEMENU/Profile.png"/></div>
                        <div class="title"><span>Datos Basicos</span></div>
                    </a>
                </div>-->
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
                    <a href="#">
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
        <button tipe="sumbit" id="end"><a class="Cerse" href="/cursoPHP/Empresa/login/index.php">Cerrar Sesion</a></button>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <h3><img src="LOGO.png" alt="" height="50px" width="auto" class="imag">   
        Control De Seguridad Privada</h3>
        </header>
        <!--Cuerpo-->
<!--INICIO del cont principal-->
<div class="container">
    <h1>Oferta Laboral</h1>
    
    
    
 <?php
include_once 'bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT id_vacante, descripcion, salario, id_cargo, fecha_creacion, fecha_cierre, id_registro_postulante FROM vacante";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>


<div class="container">
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Nuevo</button>    
            </div>    
        </div>    
    </div>    
    <br>  
<div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Id Vacante</th>
                                <th>Descripcion</th>
                                <th>Salario</th>
                                <th>Cargo</th>
                                <th>Fecha Creacion</th>                                
                                <th>Fecha Cierre</th>  
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php       
                            foreach($data as $dat) {                                                        
                            ?>
                            <tr>
                                <td><?php echo $dat['id_vacante'] ?></td>
                                <td><?php echo $dat['descripcion'] ?></td>
                                <td><?php echo $dat['salario'] ?></td>
                                <td><?php echo $dat['id_cargo'] ?></td>
                                <td><?php echo $dat['fecha_creacion'] ?></td>
                                <td><?php echo $dat['fecha_cierre'] ?></td>    
                                <td></td>
                            </tr>
                            <?php
                                }
                            ?>                                
                        </tbody>        
                       </table>                    
                    </div>
                </div>
        </div>  
    </div>    
      
<!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formPersonas">    
            <div class="modal-body">
                <div class="form-group">
                <label for="descripcion" class="col-form-label">Descripcion:</label>
                <textarea type="text" class="form-control" id="descripcion"></textarea>
                </div>
                <div class="form-group">
                <label for="salario" class="col-form-label">Salario:</label>
                <input type="number" class="form-control" id="salario">
                </div>
                <div class="form-group">
                <label for="id_cargo" class="col-form-label">Cargo:</label>
                <select type="text" class="form-control" id="id_cargo">
                    <option value="1">Vigilante</option>
                    <option value="2">Escolta</option>
                    <option value="3">Medios Tecnologicos</option></select>
                </div>
                <div class="form-group">
                <label for="fecha_creacion" class="col-form-label">Fecha Creacion:</label>
                <input type="date" class="form-control" id="fecha_creacion">
                </div>                
                <div class="form-group">
                <label for="fecha_cierre" class="col-form-label">Fecha Cierre:</label>
                <input type="date" class="form-control" id="fecha_cierre">
                </div>            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>  
      
    
    
</div>
<!--FIN del cont principal-->
</div>
        <script src="js/formulario.js"></script>
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

<?php require_once "vistas/parte_inferior.php"?>