<?php 
    include ('../Ajax/php/redirigir.php');
 ?>
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
</head>
</style>
</head>

<body>

    <body style="background: rgb(39,84,114); background: linear-gradient(90deg, rgba(39,84,114,1) 0%, rgba(254,141,98,1) 59%, rgba(254,225,73,1) 100%);">

            <div class="card" style="width: 25rem; margin-left: auto; margin-right: auto; margin-top: 120px;">
                <div class="card-body">
                    <img src="../img/logo.jpeg" class="img img-fluid" style="margin: auto; padding: 10px; display: flex; align-items: center; justify-content: center;" alt="">
                    <form id="form">
                        <div style="padding-bottom: 10px;">
                            <input required=" " type="text" class="form-control" id="user" aria-describedby="emailHelp" placeholder="Usuario">
                        </div>
                        <div style="padding-bottom: 10px;">
                            <input required=" " type="password" class="form-control" id="password" placeholder="Contraseña">
                        </div>
                        <spam id="msg" class="mt-2 nb-2"></spam>
                        <button type="button" onclick="enviar()" class="btn btn-primary form-control" style="background-color: #275472; border-color: #275472;">Inciar sesión</button>
                        <br>
                        <a href="#" style="font-size: small;  margin-left: auto; margin-right: auto; text-align: center; display: inline-block; width: 100%; padding-top: 15px">¿Olvidaste tu contraseña?</a>
                    </form>
                </div>
            </div>

            <div div class="card" style="width: 25rem; margin-left: auto; margin-right: auto; margin-top: 10px; padding-top: 10px;">
                <div class="form-inline" style="  display: flex; align-items: center; justify-content: center;">
                    <p style="padding:3px; font-size: small;text-align: center; display: inline-block; ">¿No tienes cuenta? </p>
                    <p><a style="padding:3px; font-size:small; text-align: center; display: inline-block;" href="registro.html"> Regístrate</a></p>
                </div>
            </div>
        <script src="../js/fontawesome-all.min.js "></script>
        <script src="../js/jquery.js "></script>
        <script src="../js/validar.js"></script>
        <script>
            function enviar() {
                var valor = validar();
                if (valor) {
                    usuario = document.getElementById('user').value;
                    contrasenia = document.getElementById('password').value
                    $.ajax({
                        method: "POST",
                        url: "../Ajax/php/IniciarSesion.php",
                        data: {
                            "usuario": usuario,
                            "clave": contrasenia
                        }
                    }).done(function(msg) {
                        console.log(msg);
                        json = JSON.parse(msg);
                        if (json.status) {
                            console.log(json)
                            window.location = json.url;
                        } else {
                            document.getElementById("msg").innerHTML = `<div class="alert alert-danger">${json.mensaje}</div>`;

                        }
                    });
                }

            }
        </script>

    </body>