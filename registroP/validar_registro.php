<?php

$correo=$_POST['correo'];
$contraseña=$_POST['contraseña'];


$conexion = mysqli_connect("localhost","root","","control_sp");
$consulta="SELECT * FROM postulante WHERE correo='$correo' and contraseña='$contraseña'";
$resultado=mysqli_query($conexion, $consulta); 

$filas=mysqli_num_rows($resultado);

if ($filas>0) {
echo json_encode('usuario ya registrado');
}
else {
    echo '<script>';
    echo 'alert("Registro cargado con exito");';
  echo'window.location.href="login.html";';
  echo'</script>';
  
  
}
 

insertar($conexion);

function insertar($conexion){
   
    $rol = $_POST ['id_rol'];
    $usuario = $_POST ['usuario'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $contraseña= $_POST['contraseña'];
    $contraseña2 = $_POST['contraseña2'];
    $id_tipo_doc= $_POST['id_tipo_doc'];
    $n_documento = $_POST ['n_documento'];
    $telefono= $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $ciudad = $_POST['id_ciudad'];
    
    
    $consulta = "INSERT INTO postulante(id_rol, usuario, nombre, apellido, correo, contraseña, contraseña2, id_tipo_doc, n_documento, telefono, direccion, id_ciudad)
    VALUES ('$rol','$usuario','$nombre','$apellido', '$correo', '$contraseña', '$contraseña2', '$id_tipo_doc', '$n_documento', '$telefono', '$direccion','$ciudad')";
    mysqli_query($conexion, $consulta);
    
    echo  '<script>';
    echo 'alert("Registro realizado con exito.");';
    echo 'window.location.href="Iniciar Sesion.html";';
    echo '</script>';
}


mysqli_free_result($resultado);
mysqli_close($conexion);

?>