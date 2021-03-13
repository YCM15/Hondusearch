<?php
//se lee la cookie de sesion
session_start();
//se establece una conexión a la base de datos
include 'conexion.php';
$usuario=mysqli_real_escape_string($conexion, $_POST['usuario']);
$contrasenia=password_hash($_POST['password'], PASSWORD_DEFAULT);
$idRandom = rand(0,100000);
$tipousuario = (int)$_POST['tipousuario'];

$consulta = "SELECT COUNT(*) total FROM usuario u INNER JOIN persona p ON p.idPersona=u.idPersona WHERE u.usuario='".$usuario."'";

$result = $conexion->query($consulta);
$fila = $result->fetch_assoc();

if($fila['total']!=0){//si el usuario o el numID ya está registrado

$consulta1 = "SELECT COUNT(*) total FROM usuario u WHERE u.usuario='".$usuario."'";
$result2 = $conexion->query($consulta1);
$fila2 = $result2->fetch_assoc();

if($fila2['total']!=0){//si el usuario ya está registrado
    $status = false; 
    $mensaje = "El usuario {$usuario} ya existe";
    $error = 1;
    $ruta = "registrar.php";
}
}else{

$insertPersona=mysqli_query($conexion, 'INSERT INTO persona(idPersona, primerNombre , segundoNombre , primerApellido, segundoApellido) VALUES ("'.$idRandom.'", "'.$_POST['pn'].'", "'.$_POST['sn'].'", "'.$_POST['pa'].'", "'.$_POST['sa'].'")')
or die('<p>Error al registrar persona</p><br>'.mysqli_error($conexion));

$insertCorreo=mysqli_query($conexion, 'insert into correo(idCorreo, correo, idPersona) values('.$idRandom.',"'.$_POST['correo'].'","'.$idRandom.'")')
or die('<p>Error al registrar correo</p><br>'.mysqli_error($conexion));

$insertTelefono=mysqli_query($conexion, 'insert into telefono(idTelefono, numeroTelefono, idPersona) values('.$idRandom.',"'.$_POST['telefono'].'","'.$idRandom.'")')
or die('<p>Error al registrar telefono</p><br>'.mysqli_error($conexion));

$insertUsuario=mysqli_query($conexion, 'INSERT INTO `usuario` (`idUsuario`, `usuario`, `contrasenia`, `idTipoDeUsuario`, `idPersona`) VALUES ("'.$idRandom.'", "'.$usuario.'", "'.$contrasenia.'", "'.$tipousuario.'", "'.$idRandom.'")')
or die('<p>Error al registrar usuario</p><br>'.mysqli_error($conexion));

switch ($tipousuario) {
    case 1:
        # code...
        $usr= array("nivel"=>1, "usuario"=>$usuario);
        $_SESSION['sesion']=$usr;
        $ruta = "../desarrollador/";
        $status = true;
        $error = 0;
        $mensaje = "";
        break;
    case 2:
        # code...
        $usr= array("nivel"=>2, "usuario"=>$usuario);
        $_SESSION['sesion']=$usr;
        $ruta = "../cliente/";
        $status = true;
        $error = 0;
        $mensaje = ""; 
        break;

    case 2:
        # code...
        $usr= array("nivel"=>4, "usuario"=>$usuario);
        $_SESSION['sesion']=$usr;
        $ruta = "../admon/";
        $status = true;
        $error = 0;
        $mensaje = ""; 
        break;
    
    default:
        # code...
        $mensaje = 'Error de tipo de usuario';
        $status = false;
        $error = 0;
        $ruta = "registrar.php";
        break;
}
}
$resultado = array('status' => $status, 'error' => $error, 'url' => $ruta, 'mensaje' => $mensaje);
echo json_encode($resultado);

?>