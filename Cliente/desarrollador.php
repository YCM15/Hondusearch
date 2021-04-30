<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HonduSherch</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/desarollador.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark border-bottom border-info">
        <div class="container-fluid">
            <a class="navbar-brand" href="../">Hondusearch</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                </ul>
                <div class="btn-group">
                    <a type="button" class="btn btn-primary dropdown-toggle" id="usuario" data-bs-toggle="dropdown" aria-expanded="false">

                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg-end">
                        <li><a class="dropdown-item" type="button" href="./">Perfil</a></li>
                        <li><a class="dropdown-item" type="button" href="../Ajax/php/cerrarsesion.php">Cerrar Sesion</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <input id="id" value="<?php echo $_GET["id"]; ?>">
    <div class="container  mt-5">
        <div class="row">
            <div class="col-md-3 mb-sm-3 mb-3">
                <div class="profile-img ml-auto" id="avatar">
                    <img class="w-100" src="../img/avatar.png" alt="">
                </div>
                <div class="">
                    <a class="btn btn-primary w-100" style="border-radius: 0;" name="btnAddMore" href="configuracion.php">Editar Perfil</a>
                </div>
            </div>
            <div id="contenido" class="col-md-7 mt-5 mr-5" style="margin-left:100px;">
            </div>
        </div>
    </div>

</body>
<script src="../js/jquery.js"></script>
<script src="../js/validar.js"></script>

<script>
    $(document).ready(function() {
        perfil()
    });

    function perfil() {
        id = document.getElementById("id").value;
        console.log(id);
        $.ajax({
            method: "POST",
            url: "../Ajax/php/consulta4.php",
            data: {
                "id": id
            }
        }).done(function(msg) {
            console.log(msg);
            document.getElementById("contenido").innerHTML = msg;
        });

    }
</script>

</html>