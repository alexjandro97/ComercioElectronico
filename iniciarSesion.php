<?php 
session_start();

	/* Declaro las variables fijas para la conexion a la base de datos */

	define("DB_HOST","localhost" );
	define("DB_USER", "root");
    define("DB_PASS", "");
    define("DB_DATABASE", "usuarios" ); 
    
    //realizo la conexion
    $con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);

    if(mysqli_connect_errno())
    {
    	echo "Fallo al conectarse. Intentelo más tarde.";
    } else {
    	echo "conectado";
    }

	$user = $_POST['user'];
	$pass = $_POST['pass'];



 ?>