<?php 

	$nombre = htmlspecialchars($_POST['name']);

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
      
    //Hago un bucle while, para leer todos los datos de la BBDD y comparar con el nuevo Mail.

//        while($fila = mysqli_fetch_array($resultado, MYSQLI_BOTH)){
//           echo "Precio: " . $fila[0] . ", Nombre:".$fila['nombre'] .
//            ", Stock:".$fila[2].'<br>';
//        } 


        // si hay un error pete, sino ejecuta
    if (mysqli_connect_errno())
    {
    	echo "Imposible conectarse a la base de datos: " . mysqli_connect_error();
	} else {
		//escribo la consulta de SQL
    	$sql = "INSERT INTO usuarios (nombre, correo, password) VALUE ('$nombre', '$email', '$passCifrada')";
    	//ejecuto la query
        $resultado = mysqli_query($con, $sql);
        $to = $email;
	    $subject = "Bienvenido a Cadabra - Tienda Online";
	    $message = <<<EOT
	    	"Querido/a '$nombre' <br> Queremos darte la bienvenida a la tienda online Cadabra y agradecerte la confianza que nos demuestras al confiar en nosotros para darte el mejor servicio de venta online. Al ser cliente de Cadabra, puedes disfrutar de ofertas y de los cupones por puntos que ofrecemos. Entra en tu perfil y descubrelo!! <br> Muchas Gracias. <br><br> No responder a este correo."    
EOT;
	    
	    mail($to, $subject, $message);
        
        if(mysqli_errno($con)){ //si da error mata el proceso
        	die(mysqli_error($con)); 
		}
	}

	header('Location: index.php');

 ?>