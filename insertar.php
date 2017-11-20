<?php 

	$nombre = $_POST['name'];

	$email = $_POST['user'];

	$pass = $_POST['pass'];

	$pass2 = $_POST['pass2'];

/* Declaro las variables fijas para la conexion a la base de datos */

	define("DB_HOST","localhost" );
	define("DB_USER", "root");
    define("DB_PASS", "");
    define("DB_DATABASE", "usuarios" ); 
    
    //realizo la conexion
    $con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
      
        // si hay un error pete, sino ejecuta
    if (mysqli_connect_errno())
    {
    	echo "Imposible conectarse a la base de datos: " . mysqli_connect_error();
	} else {
		//esta linea de codigo falla, hay que ver porq
    	$sql = mysql_query(INSERT INTO usuarios (nombre, correo, password) VALUE ($nombre, $email, $pass));

        $resultado = mysqli_query($con, $sql);
        if(mysqli_errno($con)){
        	die(mysqli_error($con)); 
		}
	}

	header('Location: index.html');

 ?>