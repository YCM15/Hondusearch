<?php 
session_start();
include 'conexion.php';
$idRandom = rand(0,100000);

if(isset($_POST['pregunta1']) && isset($_POST['pregunta2']) && isset($_SESSION["sesion"]) && isset($_POST["idEmpleo"])){
	$consulta = "SELECT idUsuario FROM usuario WHERE usuario='".$_SESSION['sesion']['usuario']."'";
	$result = $conexion->query($consulta);
	$fila = $result->fetch_assoc();
	$idUsuario = $fila['idUsuario']; 

	$consulta = "SELECT COUNT(*) as total FROM aspirantes WHERE idempleo='".$_POST["idEmpleo"]."' AND idusuario='".$idUsuario."'";
	$result = $conexion->query($consulta);
	$fila = $result->fetch_assoc();
	$total = $fila['total'];

	if($total==0 and $idUsuario!=null){//si el usuario ya está registrado
	    $insertAspirante = 'INSERT INTO aspirantes(idaspirantes, idusuario, idempleo, urlpdf, pregunta1 ,pregunta2) VALUES ("'.$idRandom.'", "'.$idUsuario.'", "'.$_POST['idEmpleo'].'", "'.$_SESSION['sesion']['usuario'].'.pdf'.'", "'.$_POST['pregunta1'].'", "'.$_POST['pregunta2'].'")';
	    if($result = $conexion->query($insertAspirante)){
	    	$resultado = array('status' => true, 'msg'=>'Solicitud enviada correctamente');
	    } else {
	    	$resultado = array('status' => false, 'msg'=>'Error al agregar postulante');
	    }

	} else {
		$resultado = array('status' => false, 'msg'=>'Ya te postulaste a este empleo');
	}

} else {
	$resultado = array('status' => false , 'msg'=>'Error al enviar todos los datos');
}

echo(json_encode($resultado));

?>