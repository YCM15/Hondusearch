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
            <button type="button" class="btn btn-outline-primary ml-2 " onclick="dirigir()" id="btn1">Ingresar</button>
            <button type="button" class="btn btn-outline-primary ml-2 " onclick="dirigir1()" id="btn1">Registrese</button>

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
                                            <input type="file" required=" " class="form-control" id="currilum" aria-describedby="emailHelp">
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
                var ide;
                
                function idEmpleo(id){
                    $("#pregunta1").val('');
                    $("#pregunta2").val('');
                    document.getElementById("msg").innerHTML = '';
                    ide = id;
                }

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


            function enviar(){
                let pregunta1 = $("#pregunta1").val();
                let pregunta2 = $("#pregunta2").val();
                if(pregunta1 && pregunta2){
                    const currilum = document.querySelector("#currilum");
                    longitud = currilum.files.length;
                    if (longitud == 1 && currilum.files[0].type == "application/pdf") {
                            let formData = new FormData();
                            formData.append("archivo", currilum.files[0]); // En la posición 0; es decir, el primer elemento
                            fetch("../Ajax/php/guardarCurriculum.php", {
                                method: 'POST',
                                body: formData,
                            })
                                .then(respuesta => respuesta.text())
                                .then(decodificado => {
                                    json = JSON.parse(decodificado);
                                    if(json.status){
                                        $.ajax({
                                            method: "POST",
                                            url: "../Ajax/php/agregarAspirante.php",
                                            data: {
                                                pregunta1,
                                                pregunta2,
                                                idEmpleo:ide
                                            }
                                        }).done(function(msg) {
                                            json = JSON.parse(msg);
                                            if(json.status){
                                                document.getElementById("msg").innerHTML = `<div class="alert alert-primary">${json.msg}</div>`;
                                            } else {
                                                document.getElementById("msg").innerHTML = `<div class="alert alert-danger">${json.msg}</div>`;        
                                            }
                                        });
                                    }else{
                                        document.getElementById("msg").innerHTML = `<div class="alert alert-danger">Error al enviar la solicitud</div>`;
                                    }
                                });    
                        
                    } else {
                        // El usuario no ha seleccionado archivos
                        document.getElementById("msg").innerHTML = `<div class="alert alert-danger">Debe elegir un archivo pdf</div>`;
                    }
                } else {
                    document.getElementById("msg").innerHTML = `<div class="alert alert-danger">Por favor llene todo los campos</div>`;
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