<?php

$conexion = mysqli_connect("localhost","root","","control_sp");


insertar($conexion);

function insertar($conexion){
    $rol = $_POST ['id_rol'];
    $usuario = $_POST['usuario'];
    $nit = $_POST ['nit'];
    $nombre_entidad = $_POST['nombre_entidad'];
    $correo = $_POST['correo'];
    $contraseña = $_POST ['contraseña'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $id_cuidad = $_POST['id_ciudad'];

 
 

    $consulta = "INSERT INTO empresa(id_rol, usuario, nit, nombre_entidad, correo, contraseña, telefono, direccion, id_ciudad)
    VALUES ('$rol','$usuario', '$nit', '$nombre_entidad', '$correo','$contraseña', '$telefono', '$direccion', '$id_cuidad')";
    mysqli_query($conexion, $consulta);
    echo  '<script>';
    echo 'alert("Registro realizado con exito.");';
    echo 'window.location.href="Iniciar Sesion.html";';
    echo '</script>';

}
mysqli_close($conexion);

?>