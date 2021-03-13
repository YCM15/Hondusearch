<?php

session_start();


$conexion=mysqli_connect('localhost', 'root', '', 'Hondusearch') or die('Error al conectar con la base de datos');

/*
si la base de datos tiene usuario y contraseña entonces seria de la siguiente forma
$conexion=mysqli_connect('localhost', 'El usuario', 'La contraseña', 'Hondusearch') or die('Error al conectar con la base de datos');
*/

$nombreCompleto = '';
$informacion = '';

if($conexion){
	/*$consulta = "SELECT u.usuario, p.primerNombre, p.segundoNombre, p.primerApellido, p.segundoApellido, c.correo, t.numeroTelefono, td.descripcion, e.especialidad  FROM usuario u INNER JOIN tipodesarrollador td on td.idTipoDesarrollador=u.idTipoDesarrollador INNER JOIN especialidades e on e.idEspecialidad=u.idEspecialidad INNER JOIN persona p on p.idPersona=u.idPersona INNER JOIN telefono t on t.idPersona=p.idPersona INNER JOIN correo c on c.idPersona=p.idPersona WHERE u.usuario='".$_SESSION['sesion']['usuario']."'";*/

    $consulta = "SELECT u.usuario, p.primerNombre, p.segundoNombre, p.primerApellido, p.segundoApellido, c.correo, t.numeroTelefono FROM usuario u INNER JOIN persona p on p.idPersona=u.idPersona INNER JOIN telefono t on t.idPersona=p.idPersona INNER JOIN correo c on c.idPersona=p.idPersona WHERE u.usuario='".$_SESSION['sesion']['usuario']."'";


	$result = $conexion->query($consulta);

	while($fila = $result->fetch_assoc()){


		$nombreCompleto = $fila["primerNombre"].' '.$fila["segundoNombre"].' '.$fila["primerApellido"].' '.$fila["segundoApellido"];
	    $informacion = '<div class="row">
                                    <div class="col-md-6">
                                        <label><b>Nombres</b></label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>'.$fila["primerNombre"].' '.$fila["segundoNombre"].'</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label><b>Apellidos</b></label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>'.$fila["primerApellido"].' '.$fila["segundoApellido"].'</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label><b>Correo</b></label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>'.$fila["correo"].'</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label><b>Telefono</b></label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>'.$fila["numeroTelefono"].'</p>
                                    </div>
                                </div>';

	}
    $consulta = "SELECT COUNT(*) total, td.descripcion, e.especialidad  FROM usuario u INNER JOIN tipodesarrollador td on td.idTipoDesarrollador=u.idTipoDesarrollador INNER JOIN especialidades e on e.idEspecialidad=u.idEspecialidad WHERE u.usuario='".$_SESSION['sesion']['usuario']."'";


    $result = $conexion->query($consulta);

    while($fila = $result->fetch_assoc()){
        $informacion .='<div class="row">
                                    <div class="col-md-6">
                                        <label><b>Desarrollador</b></label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>'.$fila["descripcion"].'</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label><b>Especialidad</b></label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>'.$fila["especialidad"].'</p>
                                    </div>
                                </div>';
    }
    $respuesta = array('status' => true, 'nombre' => $nombreCompleto, 'informacion' => $informacion, 'usuario'=>$_SESSION['sesion']['usuario']);
        echo json_encode($respuesta);
}else{
	echo 'incorrecto';
}
?>