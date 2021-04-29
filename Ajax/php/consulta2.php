<?php 
session_start();
include 'conexion.php';
$solicitud = "";
if((isset($_POST['lenguaje']))){
    $consulta1 = "SELECT * FROM empleo WHERE datos LIKE '".$_POST['lenguaje']."'";
    $result1 = $conexion->query($consulta1);

    while($fila1 = $result1->fetch_assoc()){
        if($fila1["nombre"]!=null){
            $solicitud .= '
            <div class="card mt-3 col-md-5 p-2 offset-md-1">
            <div class="card-header text-black-50">
            '.$fila1["titulo"].'
            </div>
            <div class="card-body">
                <h5 class="card-title text-black-50" >Empresa '.$fila1["nombre"].'</h5>
                <h6 class="card-title text-black-50">'.$fila1["descripcion"].'</h6>
                <small class="card-text text-black-50">Conocimiento en '.$fila1["datos"].'</small>
                <p class="card-text text-black-50">Sueldo '.$fila1["sueldo"].'</p>
                <a href="#" id="'.$fila1["idempleo"].'" class="btn btn-primary" onclick="postularse(this.id);idEmpleo(this.id)">Postular para el Empleo</a>
            </div>
        </div>';
            
        }
    }

}else{
    $consulta1 = "SELECT * FROM  `empleo`";
    $result1 = $conexion->query($consulta1);
   

    while($fila1 = $result1->fetch_assoc()){
        if($fila1["nombre"]!=null){
            $solicitud .= '
            <div class="card mt-3 col-md-5 p-2 offset-md-1">
            <div class="card-header text-black-50">
            '.$fila1["titulo"].'
            </div>
            <div class="card-body">
                <h5 class="card-title text-black-50" >Empresa '.$fila1["nombre"].'</h5>
                <h6 class="card-title text-black-50">'.$fila1["descripcion"].'</h6>
                <small class="card-text text-black-50">Conocimiento en '.$fila1["datos"].'</small>
                <p class="card-text text-black-50">Sueldo '.$fila1["sueldo"].'</p>
                <a href="#" id="'.$fila1["idempleo"].'" class="btn btn-primary" onclick="postularse(this.id); idEmpleo(this.id)">Postular para el Empleo</a>
            </div>
        </div>';
            
        }
    }

}

echo $solicitud;
