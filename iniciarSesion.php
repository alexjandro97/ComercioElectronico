<?php 
    session_start();

    $user = strtolower($_POST['user']);
    $pass = $_POST['pass'];
    $pass = hash("sha256", $pass);

	if(isset($_SESSION['correo']) || isset($_SESSION['nombre'])){
		header('Location: tienda.php');
	}

	/* Declaro las variables fijas para la conexion a la base de datos */

	define("DB_HOST","localhost" );
	define("DB_USER", "root");
    define("DB_PASS", "");
    define("DB_DATABASE", "usuarios" ); 
    
    //realizo la conexion
    $con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
    $sql = "SELECT * FROM usuarios WHERE (correo = '$user'OR nombre = '$user') AND password = '$pass'"; 
        
    $resultado = mysqli_query($con, $sql);

    if(mysqli_connect_errno())
    {
        echo "Fallo al conectarse. Intentelo más tarde. <br>";
    } else {

        if($resultado = mysqli_query($con, $sql)){
            $encontrado = false;
            $superusuario = false;
            while($objeto = mysqli_fetch_object($resultado)){
                if (($objeto->correo == $user) OR ($objeto->nombre == $user) && ($objeto->password == $pass)) {
                    $encontrado = true;
                    if ($user == "root") {
                        $superusuario = true;
                    }
                    break;
                }
            }

            if ($superusuario == true) {
                header("Location: adminPanel.php?usuario=$user");
            } elseif ($encontrado == true) {
                header("Location: tienda.php?usuario=$user");
            } else {
                header('Location: index.php?encontrado=false');
            }
        }
    }

 ?>