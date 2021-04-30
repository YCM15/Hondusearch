<?php

session_start();

include 'conexion.php';

$nombreCompleto = '';
$informacion = '';
if($conexion){
	$empleos = 0;
    $des = 0;
    $consulta = "SELECT COUNT(*) as empleos FROM empleo";


	$result = $conexion->query($consulta);
	$fila = $result->fetch_assoc();
    
    $empleos = $fila['empleos'];


    $consulta = "SELECT COUNT(*) as desarrolladores FROM usuario WHERE idTipoDeUsuario='1'";


    $result = $conexion->query($consulta);

    $fila = $result->fetch_assoc();
    $des = $fila['desarrolladores'];
    
    $respuesta = array('status' => true, 'emp' => $empleos, 'des' => $des);

}else{
	$respuesta = array('status' => false);
}

echo json_encode($respuesta);
?>
