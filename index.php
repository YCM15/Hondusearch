<?php
$conexion=mysqli_connect('us-cdbr-east-03.cleardb.com', 'b5785f573142ca', 'a1becf96', 'heroku_e3073c54e55ed24') or die('Error al conectar con la base de datos');

/*
si la base de datos tiene usuario y contraseña entonces seria de la siguiente forma
$conexion=mysqli_connect('localhost', 'El usuario', 'La contraseña', 'Hondusearch') or die('Error al conectar con la base de datos');
*/

if($conexion){
	$consulta = "SELECT * FROM `tipodeusuario`";


	$result = $conexion->query($consulta);

	while($fila = $result->fetch_assoc()){
		echo $fila['idTipoDeUsuario'].' '.$fila['tipoUsuario'];
		echo '<br>';
	}
}else{
	echo 'incorrecto';
}


	//echo "here I go again on my own";
?>