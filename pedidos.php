<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pedidos - Cadabra</title>
    <link href="https://fonts.googleapis.com/css?family=Atomic+Age" rel="stylesheet">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="shortcut icon" href="img/icono.png">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="css/estilos.css" rel="stylesheet" type="text/css"/>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<style>
		table {width: 100%; text-align: center;}
		td, th {
			border-bottom: 1px solid rgba(0,0,0,.3);
		}
		tr:nth-child(even) {background-color: #f2f2f2;}
	</style>
	<?php 

	$user = $_GET['usuario'];

	define("DB_HOST","localhost" );
	define("DB_USER", "root");
    define("DB_PASS", "");
    define("DB_DATABASE", "usuarios" );

    $con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);

    if ($con) {
    	echo "Hay Conexion<br>";
    	$sql = "SELECT * FROM venta WHERE usuario = (SELECT id FROM usuarios WHERE (nombre = '$user') OR (correo = '$user'))";
    	$sql2 = "SELECT nombreProducto FROM productos WHERE cod_producto IN (SELECT producto FROM venta WHERE usuario = (SELECT id FROM usuarios WHERE nombre = '$user'))";

       	$resultado = mysqli_query($con, $sql);
		$articulos = mysqli_fetch_all($resultado);
		//para sacar el nombre del producto
		$resultadoNombre = mysqli_query($con, $sql2);
		$nombreArticulos = mysqli_fetch_all($resultadoNombre);

       //	 print_r($articulos);echo "<br><br>";
      //  print_r($nombreArticulos);
    }else {
    	echo "No hay conexion";
    }
	 ?>
</head>
<body>
	<div class="container">
		<div class="row">
			<nav class="col-md-12 navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
				<a href="tienda.php" class="navbar-brand" style="font-family: 'Atomic Age', cursive; font-size: 40px;">Cadabra</a>
				<ul class="navbar-nav">
					<li class="nav-item">
						<a href="tienda.php" class="nav-link">Inicio <i class="fa fa-home" aria-hidden="true"></i></a>
					</li>
					<li class="nav-item">
						<span class="nav-link active" id="btnPerfil">Perfil <i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
					</li>
					<?php if (isset($_GET['usuario'])) {
						if ($_GET['usuario'] == "root") {
						echo "
						<li class='nav-item'>
							<a href='adminPanel.php?usuario=$user' class='nav-link'>Panel Administración <i class='fa fa-university' aria-hidden='true'></i></a>
						</li>
						";
						}
					} ?>
					<li class="nav-item">
						<a href="cerrarSesion.php" class="nav-link">Cerrar Sesión <i class="fa fa-sign-out" aria-hidden="true"></i></a>
					</li>
				</ul>

				<form action="buscador.php" class="search form-inline">
					<input type="text" class="form-control mr-sm-2" placeholder="Search">
					<button type="submit" class="btn btn-light">Buscar</button>
				</form>
			</nav>
		</div>

		<!-- FIN DE CABECERA -->

		<div class="row">
			<div class="jumbotron col-12">
				<h3 class="tex-center"><?php echo $user ?></h3><hr>
				<table>
					<tr>
						<th class="col-8">Producto</th>
						<th class="col-4">Nº de Pedido</th>
					</tr>
					<?php
					if (empty($articulos)) {
						PRINT <<<ERROR
								<tr>
									<td style='border-bottom:0px; margin:5px;'><h5>No tienes ningun producto en compra.</h5></td>					
								</tr>
							</table>
ERROR;
					}else {

					 for ($i=0; $i < count($articulos); $i++) { 
						$numeroPedido = $articulos[$i][0];
						$nomProducto = $nombreArticulos[$i][0];
						PRINT <<<CODE
								<tr>
									<td>$nomProducto</td>
									<td>$numeroPedido</td>					
								</tr>
							</table>
CODE;
					}
					} ?>
			</div>
		</div>
	</div>
</body>
</html>