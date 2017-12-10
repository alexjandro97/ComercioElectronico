<?php 

	$referencia = $_POST['referencia'];

	$nomProducto = $_POST['titulo'];

	$descripcion = $_POST['descripcion'];

	$precio = $_POST['precio'];

	/*$nombre_img = $_FILES['imagen']['name'];
	$tipo = $_FILES['imagen']['type'];
	$tamano = $_FILES['imagen']['size'];*/

	$stock = $_POST['stock'];
	$user = "root";
	$nuevo = 1;
/* Declaro las variables fijas para la conexion a la base de datos */

	define("DB_HOST","localhost" );
	define("DB_USER", "root");
    define("DB_PASS", "");
    define("DB_DATABASE", "usuarios" ); 
    
    //realizo la conexion
    $con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
      
        // si hay un error pete, sino ejecuta
    if (!$con) {
    	echo "La conexion a la BBDD peta";
    }

    	print_r($_FILES);
    	echo "<br>Chivato1";
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)) {
		$check = @getimagesize($_FILES['foto']['tmp_name']);
		echo "<br>Chivato2";
		if ($check !== false) {
			$carpeta_destino = 'fotos/';
			echo "<br>Chivato3";
			$archivo_subido = $carpeta_destino . $_FILES['foto']['name'];
			move_uploaded_file($_FILES['foto']['tmp_name'], $archivo_subido);
			echo "<br>chivato4";

			$sql = "INSERT INTO productos (precio, nombre, stock, nuevo, descripcion, foto, nombreProducto) VALUES
	    		('$precio', '$referencia', '$stock', '$nuevo', '$descripcion', '$archivo_subido', '$nomProducto')";

			$resultado = mysqli_query($con, $sql);	
			var_dump($resultado);
			echo "<br>chivato5";
		} else {
			echo "El archivo no es una imagen o el archivo es muy pesado";
		}

	} else {
		echo "<br>a la puta";
	}
	header('Location: adminPanel.php?usuario=<?php echo $user;?>');


 ?>