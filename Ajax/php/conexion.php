
<?php
<<<<<<< HEAD
$conexion=mysqli_connect('us-cdbr-east-03.cleardb.com', 'b5785f573142ca', 'a1becf96', 'heroku_e3073c54e55ed24') or die('Error al conectar con la base de datos');
=======
$conexion=mysqli_connect('localhost', 'root', '', 'Hondusearch') or die('Error al conectar con la base de datos');
>>>>>>> b4381ac0509a0993506169d2f8545f120976b356

if($conexion){
}else{
	echo 'incorrecto';
}
?>