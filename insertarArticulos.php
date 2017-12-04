<?php 

	$referencia = $_POST['referencia'];

	$nomProducto = $_POST['titulo'];

	$descripcion = $_POST['descripcion'];

	$precio = $_POST['precio'];

	/*$nombre_img = $_FILES['imagen']['name'];
	$tipo = $_FILES['imagen']['type'];
	$tamano = $_FILES['imagen']['size'];*/

	$stock = $_POST['stock'];

	$nuevo = 1;
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
		

		/*//Si existe imagen y tiene un tamaño correcto
		if (($nombre_img == !NULL) && ($_FILES['imagen']['size'] <= 200000)) 
		{
		   //indicamos los formatos que permitimos subir a nuestro servidor
		   if (($_FILES["imagen"]["type"] == "image/gif")
		   || ($_FILES["imagen"]["type"] == "image/jpeg")
		   || ($_FILES["imagen"]["type"] == "image/jpg")
		   || ($_FILES["imagen"]["type"] == "image/png"))
		   {
		      // Ruta donde se guardarán las imágenes que subamos
		      $directorio = $_SERVER['DOCUMENT_ROOT'].'/intranet/uploads/';
		      // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
		      move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nombre_img);
		    } 
		    else 
		    {
		       //si no cumple con el formato
		       echo "No se puede subir una imagen con ese formato ";
		    }
		} 
		else 
		{
		   //si existe la variable pero se pasa del tamaño permitido
		   if($nombre_img == !NULL) echo "La imagen es demasiado grande "; 
		}
		*/











		//escribo la consulta de SQL
    	$sql = "INSERT INTO productos (precio, nombre, stock, nuevo, descripcion, nombreProducto) VALUE 
    	('$precio', '$referencia', '$stock', '$nuevo', '$descripcion', '$nomProducto')";
    	//ejecuto la query
        $resultado = mysqli_query($con, $sql);

          if(mysqli_errno($con)){ //si da error mata el proceso
        	die(mysqli_error($con)); 
		}

		header('Location: adminPanel.php?usuario=root');

	}

 ?>