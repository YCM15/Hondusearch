<?php 
session_start();

include 'conexion.php';

//$idProyecto = $_SESSION["sesion"]["idProyecto"];
$archivo = $_FILES["archivo"];


if(!file_exists('../../curriculum')){
    mkdir('../../curriculum', 0777, true);
}
$curriculum = $_SESSION["sesion"]["usuario"].'.pdf';
								 /*Nombre del usuario, Ruta / tipo de archivo*/
$resultado = move_uploaded_file($archivo["tmp_name"], '../../curriculum/'.$curriculum);
if ($resultado) {
    $respuesta = array('status' => true);
}else {
    $respuesta = array('status' => false);
}

echo json_encode($respuesta);

 ?>