<?php
include 'conexion.php';
session_start();
$estado=0;
$consulta = "SELECT * FROM usuario WHERE usuario='".$_SESSION['sesion']['usuario']."'";
$result = $conexion->query($consulta);
$fila = $result->fetch_assoc();
$idRandom = rand(0,100000);
$insertPersona=mysqli_query($conexion, 'INSERT INTO empleo(idempleo, nombre, descripcion ,sueldo, titulo,datos,	correo,idusuario,estado) VALUES ("'.$idRandom.'", "'.$_POST['nombre'].'", "'.$_POST['descripcion'].'", "'.(int)$_POST['sueldo'].'", "'.$_POST['titulo'].'","'.$_POST['datos'].'","'.$_POST['correo'].'","'.$fila['idUsuario'].'", "'.$estado.'")')
or die('<p>Error al registrar La oferta De trabajo</p><br>'.mysqli_error($conexion));
$mensaje=`<div class="alert alert-primary" role="alert">
A simple primary alert—check it out!
</div>`;
$resultado = array('status' => true,'mensaje' => $mensaje);
echo(json_encode($resultado));
?>