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
                <h1>Registro - Cadabra</h1>
            </div>

            <div class="row">
                <div class="col"></div>
                <div class="formulario col-md-5">
                    <form action="insertar.php" method="post" name="form" id="form" class="form-control">
                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="user">E-Mail:</label>
                            <input type="email" id="user" name="user" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="pass">Contraseña:</label>
                            <input type="password" id="pass" name="pass" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="pass2">Repite Contraseña:</label>
                            <input type="password" id="pass2" name="pass2" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" id="submit" name="submit" class="btn btn-block btn-info">
                        </div>
                        <div class="form-group">
                            <p class="text-center">¿Ya tienes cuenta? <a href="index.php">Inicia Sesión</a></p>
                        </div>
                    </form>
                </div>
                <div class="col"></div>
            </div>
            
        </div>
        <?php
        
        ?>
    </body>
</html>