<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HONDU SEARCH</title>

    <link href="https://fonts.googleapis.com/css?family=Stint+Ultra+Condensed" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/estilos.css">

</head>

<body>
    <!--logo -->
    <header class="logo container">
        <h1>
            <img src="../img/logo.png" class="img img-fluid" alt=" Logotipo de Fazt ">
        </h1>
    </header>

    <p>
        <!-- NAVEGACION -->
    <div class=" navbar nav ">

        <a href="../"> Inicio </a>
        <a href="#"> Quiénes Somos </a>
        <a href="#"> Servicios </a>
        <a href="index.php"> Empleos</a>
        <a href="..Login/login.php"> Ingresar </a>
        <a href="..Login/registro.php"> Registro </a>
    </div>
    </p>
    <div class="container mt-5">
        <div class="row" id="contact" >

        </div>
    </div>
    <script src="../js/jquery.js"></script>
    <script>
        $(document).ready(function(){
        consulta()
    });
        function consulta() {
            $.ajax({
                method: "POST",
                url: "../Ajax/php/consulta2.php"
            }).done(function(msg) {
                document.getElementById("contact").innerHTML = msg;
            });

        }
    </script>

</body>

</html>