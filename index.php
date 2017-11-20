<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="img/icono.png">
        <link href="css/estilos.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <title>Cadabra</title>
        <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container">
            <div class="titulo text-center">
                <h1>Iniciar Sesión - Cadabra</h1>
            </div>

            <div class="row">
                <div class="col"></div>
                <div class="formulario col-md-5 col-sm-7 col-xs-12">
                    <form action="iniciarSesion.php" method="post" name="form" id="form" class="form-control">
                        <div class="form-group">
                            <label for="user">E-Mail:</label>
                            <input type="email" id="user" name="user" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="pass">Contraseña:</label>
                            <input type="password" id="pass" name="pass" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="custom-control custom-checkbox">
                              <input type="checkbox" id="check" onclick="showHidePass();" class="custom-control-input">
                              <span class="custom-control-indicator"></span>
                              <span class="custom-control-description">Mostrar Contraseña</span>
                            </label>
                        </div>
                        <div class="form-group">
                            <input type="submit" id="submit" name="submit" class="btn btn-block btn-info">
                        </div>
                        <div class="form-group">
                            <p class="text-center">¿Aún no tienes cuenta? <strong><a href="registro.php"  data-toggle="tooltip" title="Registrate!!">Registrate</a></strong></p>
                        </div>
                    </form>
                </div>
                <div class="col"></div>
            </div>
            
        </div>
        <script>
            function showHidePass() {
                var checkbox = document.getElementById('check');
                var passField = document.getElementById('pass');

                if(checkbox.checked == true) {
                    passField.type = "text";
                }else {
                    passField.type = "password";
                }
            }
        </script>
        <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </body>
</html>
