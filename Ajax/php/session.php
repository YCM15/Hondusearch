<?php 
    session_start();
if (isset($_SESSION["sesion"])) {
    echo("1");
}else{
    echo("2");
}
 ?>