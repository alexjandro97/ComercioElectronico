<?php 

	$nombre = strtolower(htmlspecialchars($_POST['name']));

	$email = htmlspecialchars($_POST['user']);

	$pass = htmlspecialchars($_POST['pass']);
	$passCifrada = hash("sha256", $pass);

	$pass2 = htmlspecialchars($_POST['pass2']);

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
		//escribo la consulta de SQL
    	$sql = "INSERT INTO usuarios (nombre, correo, password) VALUE ('$nombre', '$email', '$passCifrada')";
    	//ejecuto la query
        $resultado = mysqli_query($con, $sql);

          if(mysqli_errno($con)){ //si da error mata el proceso
        	die(mysqli_error($con)); 
		}

        header('Location: index.php');
	}
 ?>