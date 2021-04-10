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
    <!-- NavBar-->

    <div class="container mt-5 pt-5 perfil" style="color:white;">
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-sm-3 mb-3">
                    <div class="profile-img ml-auto" id="avatar">
                        <img class="w-100" src="../img/avatar.png" alt="">
                    </div>
                    <div class="">
                        <a class="btn btn-primary w-100" style="border-radius: 0;" name="btnAddMore" href="configuracion.php">Editar Perfil</a>
                    </div>
                </div>
                <div class="col-md-9 m-auto">
                    <h4>
                        <b id="nombreCompleto"></b>
                    </h4>
                    <ul class="nav nav-tabs nav-pills border-bottom border-primary" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Mis datos</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="" data-bs-toggle="tab" data-bs-target="" type="button" role="tab" aria-controls="contact" aria-selected="false" onclick="ventanamodal()">Crear Solicitud Empleo</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Solicitudes De Empleo Realizadas</button>
                        </li>
                    </ul>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tab-content mt-5" id="myTabContent">
                                <div class="tab-pane fade show active pt-lg-2" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <h3>Pagina 2</h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione, quae!
                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title  text-center" id="exampleModalLabel">Solicitud de Empleo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form>
                            <div class="mb-2">
                                <h6>Titulo Del Empleo</h6>
                                <input type="text" required=" " class="form-control" id="titulo" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-2">
                                <h6>Descripcion</h6>
                                <input type="text" required=" " class="form-control" id="descripcion" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-2">
                                <h6>Sueldo</h6>
                                <input type="text" required=" " class="form-control" id="sueldo" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-2">
                                <h6>Nombre De La Empresa</h6>
                                <input type="text" required=" " class="form-control" id="nombre" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-2">
                                <h6>Conocimiento En </h6>
                                <input type="text" required=" " class="form-control" id="datos" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-2">
                                <h6>Correo </h6>
                                <input type="email" required=" " class="form-control" id="correo" aria-describedby="emailHelp">
                            </div>
                            <span id="msg" class="mt-2 mb-2"></span>
                            <button type="button" onclick="enviar()" class="btn btn-primary">Enviar </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer mt-4">
            </div>
        </div>
    </div>
    </div>


    <!--JQuery-->
    <script src="../js/jquery.js"></script>
    <script src="../js/validar.js"></script>
    <script>
    $(document).ready(function(){
        consulta()
    });
        function ventanamodal() {
            console.log("he");
            $('#modal').modal('show')
        }

        function enviar() {
            var valor = validar();
            console.log("ge");
            if (valor) {
                var nombre = document.getElementById("nombre").value;
                var descripcion = document.getElementById("descripcion").value;
                var sueldo = document.getElementById("sueldo").value;
                var titulo = document.getElementById("titulo").value;
                var datos = document.getElementById("datos").value;
                var correo = document.getElementById("correo").value;
                $.ajax({
                    method: "POST",
                    url: "../Ajax/php/SolicitudEmpleo.php",
                    data: {
                        "nombre": nombre,
                        "descripcion": descripcion,
                        "sueldo": sueldo,
                        "titulo": titulo,
                        "datos": datos,
                        "correo": correo
                    }
                }).done(function(msg) {
                    console.log(msg);
                    json = JSON.parse(msg);
                    if (json.status) {
                        document.getElementById("msg").innerHTML = `<div class="alert alert-primary" role="alert">
                        Solicitud De Empleo Realizada</div>`;
                        $('#modal').modal('hide');
                        document.getElementById("nombre").value = "";
                        document.getElementById("descripcion").value = "";
                        document.getElementById("sueldo").value = "";
                        document.getElementById("titulo").value = "";
                        document.getElementById("datos").value = "";
                        document.getElementById("correo").value = "";
                        document.getElementById("msg").innerHTML = "";

                    } else {
                        document.getElementById("msg").innerHTML = `<div class="alert alert-danger">${json.mensaje}</div>`;

                    }
                });

            } else {
                document.getElementById("msg").innerHTML = `<div class="alert alert-danger" role="alert">
                                                            Por Favor completar los campos
                                                            </div>`;
            }

        }

        function consulta(){
            $.ajax({
                    method: "POST",
                    url: "../Ajax/php/consulta1.php"
                }).done(function(msg) {
                    document.getElementById("contact").innerHTML =msg;
                });

        }
    </script>


</body>