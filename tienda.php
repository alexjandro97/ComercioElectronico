<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Atomic+Age" rel="stylesheet">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="shortcut icon" href="img/icono.png">
    <link href="css/estilos.css" rel="stylesheet" type="text/css"/>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <title>Cadabra - Tienda</title>
    <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>

	<?php 

	$user = $_REQUEST['usuario'];

	define("DB_HOST","localhost" );
	define("DB_USER", "root");
    define("DB_PASS", "");
    define("DB_DATABASE", "usuarios" );

    $con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
    $sql = "SELECT precio, nombre, stock, nuevo, descripcion, foto FROM productos";

    $resultado = mysqli_query($con, $sql);
    // PROBAR EL FETCH PARA IMPRIMIR DATOS
    $articulos = $resultado->fetchAll();

   /*	if($resultado = mysqli_query($con, $sql)){
        while($objeto = mysqli_fetch_array($resultado)){
            $nombreProducto = $objeto[1];
            $precioProducto = $objeto[0];
            $stockProducto = $objeto[2];
            $nuevoProducto = $objeto[3];
            $descripcionProducto = $objeto[4];
            $foto = $objeto[5];

            if($foto == null){
               	echo "Sin Foto";
            }
            if($nuevoProducto == 1){
               	$nuevoProducto = '<span class="badge badge-danger">New</span>';
            } else {
               	$nuevoProducto = '';
            }
		}
	}*/
	?>

</head>
<body style="background: url(img/cuero.jpg); background-size: cover;">
	<div class="container">
		<div class="row">
			<nav class="col-md-12 navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
				<a href="tienda.php" class="navbar-brand" style="font-family: 'Atomic Age', cursive; font-size: 40px;">Cadabra</a>
				<ul class="navbar-nav">
					<li class="nav-item">
						<a href="tienda.php" class="nav-link active">Inicio</a>
					</li>
					<li class="nav-item dropdown">
						<a href="" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">Categorías</a>
						<div class="dropdown-menu">
							<a href="#" class="dropdown-item">Guantes</a>
							<a href="#" class="dropdown-item">Balones</a>
						</div>
					</li>
					<li class="nav-item">
						<span class="nav-link" id="btnPerfil">Perfil</span>
					</li>
					<li class="nav-item">
						<a href="cerrarSesion.php" class="nav-link">Cerrar Sesión</a>
					</li>
				</ul>

				<form class="search form-inline">
					<input type="text" class="form-control mr-sm-2" placeholder="Search">
					<button type="submit" class="btn btn-light">Buscar</button>
				</form>
			</nav>
		</div>
		<div class="row">
			<div class="col"></div>
			<div class="jumbotron col-md-7" style="padding: 20px;">
				<h1 class="text-center">Bienvenido a Cadabra, <?php echo $user; ?></h1>
				<hr>
				<p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae delectus, non possimus, cum neque laudantium quod facere. Natus quam hic molestias quisquam neque quae porro iste, ipsam, sapiente, numquam laborum.</p>
			</div>
			<div class="col"></div>
		</div>
		<div class="row">
			<div class="jumbotron col-xs-12">
				<div class="row" style="margin-bottom: 10px;">
					<div class="col">
						<h1>Productos</h1>
						<hr>
					</div>
				</div>
				<!-- BUCLE PARA IMPRIMIR TODAS LAS TUPLAS DE LA BBDD -->
				<?php foreach ($articulos as $articulo):?>
					<div class="card col-md-4" style=" float: left; margin: 5px 5px;">
					<img src="<?php echo $foto; ?>" class="img-fluid card-img-top">
					<div class="card-body">
						<h4 class="card-title"><?php echo $nombreProducto . " " . $nuevoProducto; ?></h4>
						<p class="card-text"><?php echo $descripcionProducto; ?></p>
						<form class="form-inline">
							<div class="btn-group">
								<button class="btn btn-primary" style="cursor: pointer;">Comprar</button>
								<input type="number" class="form-control" min="1" max="20" placeholder="Un.">
								<a class="btn btn-primary disabled form-control-static" style="color: #fff;"><?php echo $precioProducto ?>€</a>
							</div>
						</form>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="row">
			<div class="jumbotron col-xs-6" id="perfil">
				<h4 class="text-center">Perfil <?php echo $user; ?></h4>
				<hr>
				<div class="btn-group-vertical">
					<button class="btn btn-lg btn-block btn-outline-dark disabled">Configuración</button>
					<button class="btn btn-lg btn-block btn-outline-dark">Mis Pedidos</button>
					<button class="btn btn-lg btn-block btn-outline-dark disabled">Lista de Deseos</button>
				</div>
			</div>
			<div class="col"></div>
		</div>
	</div>
	<script>
		$(document).ready(function()
        {
        	$('#btnPerfil').on("click", function(){
            	$('#perfil').toggle('slow');     
			});                   
        });
	</script>
</body>
</html>