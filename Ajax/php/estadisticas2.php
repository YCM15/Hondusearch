<?php

session_start();

include 'conexion.php';

$nombreCompleto = '';
$informacion = '';
if($conexion){
	$empleos = array('Java'=>0, 'php'=>0, 'python'=>0, 'Javascript'=>0,'C++'=>0, 'Ruby'=>0, '.NET'=>0);
    $consulta = "SELECT datos, COUNT(*) as numero FROM empleo GROUP BY datos";


	$result = $conexion->query($consulta);
	while($fila = $result->fetch_assoc()){
        $empleos[$fila['datos']] = $fila['numero'];
    }

    $respuesta = array('status' => true, 'emp' => $empleos);

}else{
	$respuesta = array('status' => false);
}

echo json_encode($respuesta);
?>
