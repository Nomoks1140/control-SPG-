<?php
include ("configuracion.php");
$conexion= new mysqli($server, $user, $pass, $bd);
if ($conexion->connect_errno) {
    die ('No Conectado' . $conexion->connect_error);
} //else {
    //echo 'Conectado';
//}
?>