<?php 
session_start();
include 'conexion.php';
$consulta = "SELECT * FROM usuario WHERE usuario='".$_SESSION['sesion']['usuario']."'";
$result = $conexion->query($consulta);
$fila = $result->fetch_assoc();
$solicitud = "";
$consulta1 = "SELECT * FROM  `empleo` WHERE idusuario='{$fila['idUsuario']}'";
$result1 = $conexion->query($consulta1);

while($fila1 = $result1->fetch_assoc()){
    $solicitud .= '<div class="card mt-2">
    <div class="card-header text-black-50">
    '.$fila1["titulo"].'
    </div>
    <div class="card-body">
        <h5 class="card-title text-black-50" >Empresa '.$fila1["nombre"].'</h5>
        <h6 class="card-title text-black-50">'.$fila1["descripcion"].'</h6>
        <small class="card-text text-black-50">Conocimiento en '.$fila1["datos"].'</small>
        <p class="card-text text-black-50">Sueldo '.$fila1["sueldo"].'</p>
        <a href="#" id="'.$fila1["idempleo"].'" class="btn btn-primary">Ver Aspirante al Empleo</a>
    </div>
</div>';
}

echo $solicitud;
 ?>