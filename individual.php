<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Producto</title>
	<link href="https://fonts.googleapis.com/css?family=Atomic+Age" rel="stylesheet">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="shortcut icon" href="img/icono.png">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="css/estilos.css" rel="stylesheet" type="text/css"/>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<?php 
	$id = $_GET['id'];
	$user = $_GET['usuario'];
	define("DB_HOST","localhost" );
	define("DB_USER", "root");
    define("DB_PASS", "");
    define("DB_DATABASE", "usuarios" );

    $con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
    $sql = "SELECT * FROM productos WHERE cod_producto = '$id'";

    $resultado = mysqli_query($con, $sql);
    // PROBAR EL FETCH PARA IMPRIMIR DATOS
    $atributos = mysqli_fetch_all($resultado);

    $idProducto = $atributos[0][0];
	$nombreProducto = $atributos[0][7];
	$precioProducto = $atributos[0][1];
	$stockProducto = $atributos[0][3];
	$nuevoProducto = $atributos[0][4];
	$descripcionProducto = $atributos[0][5];
	$foto = $atributos[0][6];

	if ($stockProducto > 15) {
		$stockProducto = '<strong style="color: green";>En Stock!</strong>';
	} else if ($stockProducto > 5 && $stockProducto < 15) {
		$stockProducto = '<strong style="color: orange";>En Stock!</strong>';
	} else if ($stockProducto < 5 && $stockProducto > 0){
		$stockProducto = '<strong style="color: red";>Ultimas Unidades</strong>';
	} else {
		$stockProducto = '<strong style="color: red";>Agotado</strong>';
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
		<br><br>
		<div class="row">
			<div class="jumbotron box_compra col-12" style="padding: 10px;">
				<div class="imagen"><img src="<?php echo $foto; ?>" alt="Imagen del Producto"></div>
				<div class="nombre"><h3><?php echo $nombreProducto; ?></h3><hr></div>
				<div class="descripcionProducto">
					<h5>Descripción Producto:</h5>
					<p><?php echo $descripcionProducto; ?></p>
				</div>
				<div class="precio">
					<div class="precioIn">
						<h5>Este producto cuesta: </h5>
						<h4><?php echo $precioProducto; ?> €</h4>
						<div class="stock"><?php echo $stockProducto; ?></div>
					</div>
					<form action="compra.php" class="compra" method="post">
						<input type="number" hidden name="idProducto" value="<?php echo $idProducto; ?>">
						<input type="text" hidden name="user" value="<?php echo $user; ?>">
						<input type="submit" id="comprar" name="comprar" class="btn btn-info" value="Comprar"> 
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>





