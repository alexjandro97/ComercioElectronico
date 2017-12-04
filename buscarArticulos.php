<?php 

	$referencia = $_POST['referencia'];


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
    	$sql = "SELECT * FROM productos WHERE nombre = '$referencia'";
    	//ejecuto la query
        $resultado = mysqli_query($con, $sql);

        if($resultado = mysqli_query($con, $sql)){
            while($objeto = mysqli_fetch_object($resultado)){
            	$ref = $objeto->nombre;
                $nomProducto = $objeto->nombreProducto;
                $stock = $objeto->stock;
                $precio = $objeto->precio;
                echo $nomProducto . "<br>" . $stock . "<br>" . $precio . "€<br>";
            }
        }

          if(mysqli_errno($con)){ //si da error mata el proceso
        	die(mysqli_error($con)); 
		}

		header("Location: adminPanel.php?usuario=root&ref=$ref&nomProducto=$nomProducto&precio=$precio&stock=$stock");

	}


 ?>