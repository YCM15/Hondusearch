<?php 
    session_start();
if (isset($_SESSION["sesion"])) {
    $nivel = $_SESSION["sesion"]["nivel"];
    if($nivel==1){
        header("location: ../desarrollador/");
    }else if($nivel == 2){
        header("location: ../Cliente/");
    }else if($nivel == 3){
        header("location: ../Admi/");
    }
}
 ?>