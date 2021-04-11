
<?php
$conexion=mysqli_connect('us-cdbr-east-03.cleardb.com', 'b5785f573142ca', 'a1becf96', 'heroku_e3073c54e55ed24') or die('Error al conectar con la base de datos');

if($conexion){
}else{
	echo 'incorrecto';
}
?>