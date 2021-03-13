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
</head>
</style>
</head>

<body style="background: rgb(39,84,114); background: linear-gradient(90deg, rgba(39,84,114,1) 0%, rgba(254,141,98,1) 59%, rgba(254,225,73,1) 100%);">
    <div class="card" style="width: 30rem; margin-left: auto; margin-right: auto; margin-top: 50px;">
        <img src="../img/logo.jpeg" style="margin: auto; padding: 10px; display: flex; align-items: center; justify-content: center;" alt="">
        <div class="card-body">
            <form>
                <div class="form-row needs-validation" needs-validation>
                    <div class="col-12">
                        <label for="email">Email</label>
                        <input type="email" required=" " placeholder="Introduce tu email" class="form-control" id="correo" style="margin-bottom: 5px;" required>
                        <div id="email" class="invalid-feedback">
                            Por favor, ingresa un dirección de correo.
                        </div>
                    </div>
                    <div class="row">
                        <label for="pn">Nombre</label>
                        <div class="col-md-6">
                            <input type="text" required=" " placeholder="Primer nombre" class="form-control" id="pn" style="margin-bottom: 5px;" required>
                            <div id="pn" class="invalid-feedback">
                                Por favor, ingresa un nombre.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input type="text" required=" " placeholder="Segundo nombre" class="form-control" id="sn" style="margin-bottom: 5px;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" required=" " placeholder="Primer apellido" class="form-control" id="pa" style="margin-bottom: 5px;">
                        </div>
                        <div class="col-md-6">
                            <input type="text" required=" " placeholder="Segundo apellido" class="form-control" id="sa" style="margin-bottom: 5px;">
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="usuario">Usuario</label>
                        <input type="text" required=" " class="form-control" id="usuario" placeholder="Introduce tu nombre de usuario" style="margin-bottom: 5px;" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="password">Contraseña</label>
                            <input type="password" required=" " placeholder="Introduce la contraseña" class="form-control" id="password" style="margin-bottom: 5px;" required>
                            <div id="email" class="invalid-feedback">
                                Por favor, ingresa una contraseña.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="password1">Confirma la contraseña</label>
                            <input type="password" required=" " placeholder="Confirma la contraseña" class="form-control" id="password1" style="margin-bottom: 5px;" required>
                            <div id="email" class="invalid-feedback">
                                Por favor, repita su contraseña.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="telefono">Teléfono</label>
                        <input type="text" required=" " class="form-control" id="telefono" placeholder="Introduce el número telefónico" style="margin-bottom: 5px;" required>
                        <div id="email" class="invalid-feedback">
                            Por favor, ingresa un número telefonico.
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputPassword1">Tipo De Usuario</label>
                        <select id="tipousuario" class="form-select form-control" aria-label="Default select example">
                        <option id=1 value="1">Desarrollador</option>
                        <option id=2 value="2" >Cliente</option>
                      </select>
                    </div>
                    <span id="msg" class="mt-5"></span>
                    <button type="button" onclick="enviar()" class="btn btn-primary form-control" style="margin-top: 5px; background-color: #275472; border-color: #275472;">Sign in</button>
                </div>
            </form>
            <br>
            <div class="form-inline" style="  display: flex; align-items: center; justify-content: center;">
                <p style="padding:3px; font-size: small;text-align: center; display: inline-block; ">¿Ya tienes cuenta?</p>
                <p><a style="padding:3px; font-size:small; text-align: center; display: inline-block;" href="#">Incia sesión</a></p>
            </div>
        </div>
    </div>
    <script src="../js/bootstrap.min.js "></script>
    <script src="../js/fontawesome-all.min.js "></script>
    <script src="../js/jquery.js "></script>
    <script src="../js/validar.js"></script>
    <script>
        function enviar() {
            var valor = validar();
            if (valor) {
                var password = document.getElementById('password').value;
                var password1 = document.getElementById('password1').value;
                var pn = document.getElementById('pn').value;
                var sn = document.getElementById('sn').value;
                var pa = document.getElementById('pa').value;
                var sa = document.getElementById('sa').value;
                var correo = document.getElementById('correo').value;
                var usuario = document.getElementById('usuario').value;
                var telefono = document.getElementById('telefono').value;
                var combo = document.getElementById('tipousuario');
                var id = $('#tipousuario option:selected').attr('id');

                if (password == password1) {
                    $.ajax({
                        method: 'POST',
                        url: '../Ajax/php/registrar.php',
                        data: {
                            'password': password,
                            'pn': pn,
                            'sn': sn,
                            'pa': pa,
                            'sa': sa,
                            'correo': correo,
                            'usuario': usuario,
                            'telefono': telefono,
                            'tipousuario': id
                        }
                    }).done(function(msg) {
                        console.log(msg);
                        json = JSON.parse(msg);
                        if (json.status) {
                            location = json.url;
                        } else {
                            document.getElementById("msg").innerHTML = `<div class="alert alert-danger">${json.mensaje}</div>`;

                        }
                    });

                } else {
                    document.getElementById("msg").innerHTML = `<div class="alert alert-danger">Las contraseñas no coinciden</div>`;
                }

            } else {
                document.getElementById("msg").innerHTML = `<div class="alert alert-danger">Complete los campos</div>`;
            }

        }
    </script>
</body>

</html>