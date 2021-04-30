<?php
session_start();
include 'conexion.php';
$solicitudes = "";
if ((isset($_POST['id']))) {
    $consulta1 = "SELECT c.correo, t.numeroTelefono,p.primerNombre,p.segundoNombre, p.primerApellido,p.segundoApellido, a.idaspirantes ,u.usuario, a.pregunta1,a.pregunta2, a.urlpdf, a.idaspirantes,u.idUsuario FROM aspirantes a INNER JOIN usuario u on u.idUsuario=a.idusuario INNER JOIN empleo e on e.idempleo=a.idempleo INNER JOIN persona p on p.idPersona=u.idPersona INNER JOIN telefono t on t.idTelefono=p.idtelefono INNER JOIN correo c ON c.idCorreo=p.idcorreo WHERE e.idempleo='".$_POST['id']."'";
    $result1 = $conexion->query($consulta1);

    while ($fila1 = $result1->fetch_assoc()) {
        $solicitudes.='
        <tr>
        <td>'.$fila1["primerNombre"].' '.$fila1["segundoNombre"].'  </td>
        <td>'.$fila1["primerApellido"].' '.$fila1["segundoApellido"].'  </td>
        <td>'.$fila1["correo"].'</td>
        <td>'.$fila1["numeroTelefono"].'</td>
        <td><a href="../Curriculum/'.$fila1["urlpdf"].'" download="'.$fila1["urlpdf"].'" target="_blank">Curriculum</a></td>
        <td><a href="desarrollador.php?id='.$fila1["idUsuario"].'">Perfil del desarrollador</a></td>
        </tr>';
     
    }
    
}

echo $solicitudes;
