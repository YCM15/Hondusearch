<?php

session_start();

include 'conexion.php';

$nombreCompleto = '';
$informacion = '';

if($conexion){
    /*$consulta = "SELECT u.usuario, p.primerNombre, p.segundoNombre, p.primerApellido, p.segundoApellido, c.correo, t.numeroTelefono, td.descripcion, e.especialidad  FROM usuario u INNER JOIN tipodesarrollador td on td.idTipoDesarrollador=u.idTipoDesarrollador INNER JOIN especialidades e on e.idEspecialidad=u.idEspecialidad INNER JOIN persona p on p.idPersona=u.idPersona INNER JOIN telefono t on t.idPersona=p.idPersona INNER JOIN correo c on c.idPersona=p.idPersona WHERE u.usuario='".$_SESSION['sesion']['usuario']."'";*/

    $consulta = "SELECT u.usuario, p.primerNombre, p.segundoNombre, p.primerApellido, p.segundoApellido, c.correo, t.numeroTelefono FROM usuario u INNER JOIN persona p on p.idPersona=u.idPersona INNER JOIN telefono t on t.idTelefono=p.idTelefono INNER JOIN correo c on c.idCorreo=p.idCorreo WHERE u.usuario='".$_SESSION['sesion']['usuario']."'";


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
    $respuesta = array('status' => true, 'nombre' => $nombreCompleto, 'informacion' => $informacion, 'usuario'=>$_SESSION['sesion']['usuario']);
        echo json_encode($respuesta);
}else{
    echo 'incorrecto';
}
?>