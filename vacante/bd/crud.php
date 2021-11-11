<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   

$descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : '';
$salario = (isset($_POST['salario'])) ? $_POST['salario'] : '';
$id_cargo = (isset($_POST['id_cargo'])) ? $_POST['id_cargo'] : '';
$fecha_creacion = (isset($_POST['fecha_creacion'])) ? $_POST['fecha_creacion'] : '';
$fecha_cierre = (isset($_POST['fecha_cierre'])) ? $_POST['fecha_cierre'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id_vacante = (isset($_POST['id_vacante'])) ? $_POST['id_vacante'] : '';

switch($opcion){
    case 1: //alta
        $consulta = "INSERT INTO vacante (descripcion, salario, id_cargo, fecha_creacion, fecha_cierre) VALUES('$descripcion', '$salario', '$id_cargo', '$fecha_creacion','$fecha_cierre') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT id_vacante, descripcion, salario, id_cargo, fecha_creacion, fecha_cierre FROM vacante ORDER BY id_vacante DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: //modificación
        $consulta = "UPDATE vacante SET descripcion='$descripcion', salario='$salario', id_cargo='$id_cargo', fecha_creacion='$fecha_creacion', fecha_cierre='$fecha_cierre' WHERE id_vacante='$id_vacante' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT id_vacante, descripcion, salario, id_cargo, fecha_creacion, fecha_cierre FROM vacante WHERE id_vacante='$id_vacante' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3://baja
        $consulta = "DELETE FROM vacante WHERE id_vacante='$id_vacante' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;        
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
