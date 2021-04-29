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
    <link rel="stylesheet" href="../css/main.css">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand colornav" href="../" style="color:#6C34F5 ;"><img src="../img/logo.jpeg" class="img img-fluid" style="height:60px;"></a>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav float-left">
            </div>
        </div>

        <span class="navbar-text">
            <button type="button" class="btn btn-outline-primary " onclick="dirigir()" id="btn1">Ingresar</button>
            <button type="button" class="btn btn-outline-primary " onclick="dirigir1()" id="btn1">Registrese</button>

        </span>
    </nav>

</head>

<body>

    <div class="container mt-5">
        <div class="row select">
            <div class="col-md-2"></div>
            <div class="col-md-9">
                <select class=" ml-5 mr-3 form-select col-sm-12 col-xs-12 col-md-12 p-2" aria-label="Default select example" onchange="lenguaje(this.options[this.selectedIndex].id)">
                    <option selected>Busqueda de trabajo por Lenguajes de programacion </option>
                    <option id="php">php</option>
                    <option id="Java">Java</option>
                    <option id="Python">Python</option>
                    <option id="Node js">Node js</option>
                    <option id=1>Todas las ofertas</option>
                </select>
            </div>
            <div class="row" id="contact">

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
                                        <h6>¿Por qué te interesa trabajar en esta empresa?</h6>
                                        <input type="text" required=" " class="form-control" id="pregunta1" aria-describedby="emailHelp">
                                        <h6>¿Me puedes describir tus fortalezas?</h6>
                                        <input type="text" required=" " class="form-control" id="pregunta2" aria-describedby="emailHelp">
                                        <div class="mb-2">
                                            <h6>adjunto  curriculum vitae </h6>
                                            <input type="file" required=" " class="form-control" id="correo" aria-describedby="emailHelp">
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
            <script src="../js/jquery.js"></script>
            <script src=" ../js/popper.min.js"></script>
            <script src="../js/sweetalert.min.js"></script>
            <script>
                $(document).ready(function() {
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

                function postularse(id) {
                    $.ajax({
                        method: "POST",
                        url: "../Ajax/php/session.php",
                        data: {
                            'lenguaje': lenguaje
                        }
                    }).done(function(msg) {
                        console.log(msg)
                        if (parseInt(msg) == 1) {
                            $('#modal').modal('show')
                        } else {
                            swal("Por favor Registrese", "para poder optar a un trabajo")
                        }
                    });

                }

                function lenguaje(len) {
                    var lenguaje = len;
                    if (lenguaje == 1) {
                        consulta()
                    } else {
                        $.ajax({
                            method: "POST",
                            url: "../Ajax/php/consulta2.php",
                            data: {
                                'lenguaje': lenguaje
                            }
                        }).done(function(msg) {
                            document.getElementById("contact").innerHTML = msg;
                        });

                    }

                }

                function dirigir() {
                    window.location = '../Login/login.php'

                }

                function dirigir1() {
                    window.location = '../Login/registro.php'
                }
            </script>



</body>

</html>