<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Compra Efectuada</title>
	<link href="https://fonts.googleapis.com/css?family=Atomic+Age" rel="stylesheet">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="shortcut icon" href="img/icono.png">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="css/estilos.css" rel="stylesheet" type="text/css"/>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<style>
		.botones .fa {
			font-size: 25px;
			margin-left: 10px;
		}
	</style>
	<?php 

	$user = $_POST['user'];
	$productoId = $_POST['idProducto'];

	define("DB_HOST","localhost" );
	define("DB_USER", "root");
    define("DB_PASS", "");
    define("DB_DATABASE", "usuarios" );

    $con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
    $sql = "SELECT id FROM usuarios WHERE (correo = '$user'OR nombre = '$user')";

    $resultado = mysqli_query($con, $sql);
    // PROBAR EL FETCH PARA IMPRIMIR DATOS
    $id = mysqli_fetch_all($resultado);

    $userId = $id[0][0];

    $sql2 = "INSERT INTO venta (usuario, producto) VALUES ('$userId', '$productoId');";

    $insercion = mysqli_query($con, $sql2);

    if(mysqli_errno($con)){
    	$error = "Ha habido un error en la compra"; 
       	die(mysqli_error($con)); 
	} else {
		$error = "Su compra se ha realizado con exito";
	}		
	 ?>

</head>
<body>
	<div class="container">
			<div class="row">
			<nav class="col-md-12 navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
				<a href="tienda.php?usuario=<?php echo $user; ?>" class="navbar-brand" style="font-family: 'Atomic Age', cursive; font-size: 40px;">Cadabra</a>
				<ul class="navbar-nav">
					<li class="nav-item">
						<a href="tienda.php?usuario=<?php echo $user; ?>" class="nav-link active">Inicio <i class="fa fa-home" aria-hidden="true"></i></a>
					</li>
					<li class="nav-item">
						<span class="nav-link" id="btnPerfil">Perfil <i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
					</li>
					<li class="nav-item">
						<a href="cerrarSesion.php" class="nav-link">Cerrar Sesión <i class="fa fa-sign-out" aria-hidden="true"></i></a>
					</li>
				</ul>

				<form action="" class="search form-inline">
					<input type="text" class="form-control mr-sm-2" placeholder="Search">
					<button type="submit" class="btn btn-light disabled" style="cursor: no-drop;">Buscar</button>
				</form>
			</nav>
		</div>
	<div class="row">
		<div class="jumbotron col-md-12" style="padding: 10px;">
			<h3 class="titulo text-center" style="padding: 25px;">
				<?php echo $error; ?>
			</h3>
			<br><br>
			<div class="row botones">
					<a href="tienda.php?usuario=<?php echo $user ?>" class="col-12 btn btn-block btn-info">Volver a Cadabra <i class="fa fa-empire" aria-hidden="true"></i></a>
					<a href="pedidos.php?usuario=<?php echo $user ?>" class="col-12 btn btn-block btn-danger">Ver Compras <i class="fa fa-resistance" aria-hidden="true"></i></a>
			</div>
		</div>
	</div>
	</div>
</body>
</html>