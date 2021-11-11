<?php

$conexion = mysqli_connect("localhost","root","","control_sp");


insertar($conexion);

function insertar($conexion){
    $nombre_institucion = $_POST['nombre_institucion'];
    $id_nivel_educativo = $_POST ['id_nivel_educativo'];
    $id_grado_escolaridad = $_POST['id_grado_escolaridad'];
    $diploma = $_POST['diploma'];
 
 

    $consulta = "INSERT INTO formacion(nombre_institucion, id_nivel_educativo, id_grado_escolaridad, diploma)
    VALUES ('$nombre_institucion', '$id_nivel_educativo', '$id_grado_escolaridad', '$diploma')";
    mysqli_query($conexion, $consulta);
    echo  '<script>';
    echo 'alert("Registro realizado con exito.");';
    echo 'window.location.href="/index.php";';
    echo '</script>';

}
mysqli_close($conexion);

?>