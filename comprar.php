<?php 

	$user = $_GET['usuario'];
	//$unidad = $_POST['unidades'];

	define("DB_HOST","localhost" );
	define("DB_USER", "root");
    define("DB_PASS", "");
    define("DB_DATABASE", "usuarios" ); 
    
    //realizo la conexion
    $con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);

    $sqlIDUser = "SELECT id FROM usuarios WHERE nombre = '$user'";

    $resultado = mysqli_query($con, $sqlIDUser);

    $prueba = mysqli_fetch_all($resultado);

    echo "idUser: " . print_r($prueba);

    $sql = "";





//    $sql = "INSERT INTO venta (usuario, producto) VALUES ();"; 
        
    







 ?>