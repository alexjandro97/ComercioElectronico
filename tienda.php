<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Atomic+Age" rel="stylesheet">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="shortcut icon" href="img/icono.png">
    <link rel="stylesheet" href="css/font-awesome.min.css">
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
    $sql = "SELECT * FROM productos";
    $resultado = mysqli_query($con, $sql);
    // PROBAR EL FETCH PARA IMPRIMIR DATOS
    $articulos = mysqli_fetch_all($resultado);	
	
	?>

</head>
<body style="background: url(img/cuero.jpg); background-size: cover;">
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

				<form action="" class="search form-inline">
					<input type="text" class="form-control mr-sm-2" placeholder="Search">
					<button type="submit" class="btn btn-light disabled" style="cursor: no-drop;">Buscar</button>
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
				<?php for ($i=0; $i < count($articulos) ; $i++) { 
					$idProducto = $articulos[$i][0];
					$nombreProducto = $articulos[$i][7];
				    $precioProducto = $articulos[$i][1];
				    $stockProducto = $articulos[$i][3];
				    $nuevoProducto = $articulos[$i][4];
				    $descripcionProducto = $articulos[$i][5];
				    $foto = $articulos[$i][6];
				    
				    if($nuevoProducto == 1){
				    	$nuevoProducto = '<span class="badge badge-danger">New</span>';
				    } else {
				    	$nuevoProducto = '';
				    }
						PRINT <<<CODE
						<div class="card" style=" float: left; margin: 5px 5px;">
							<a href="individual.php?id=$idProducto&usuario=$user"><img src="$foto" class="img-fluid card-img-top"></a>
							<div class="card-body">
								<h4 class="card-title">$nombreProducto  $nuevoProducto</h4>
								<div class="descripcion" style="overflow: auto;"><p class="card-text">$descripcionProducto</p></div>
								<form action="individual.php?id=$idProducto&usuario=$user" method="post" class="form-inline">
									<div class="btn-group">
										<button type="submit" class="btn btn-primary" style="cursor: pointer;">Ver Producto</button>
										<a class="btn btn-primary disabled form-control-static" style="color: #fff;">$precioProducto €</a>
									</div>
								</form>
							</div>
						</div>
CODE;
				    			     
				} ?>
					
				
			</div>
		</div>
		<div class="row">
			<div class="jumbotron col-xs-6" id="perfil">
				<h4 class="text-center">Perfil <?php echo $user; ?></h4>
				<hr>
				<div class="btn-group-vertical">
					<button class="btn btn-lg btn-block btn-outline-dark disabled">Configuración</button>
					<a href="pedidos.php?usuario=<?php echo $user; ?>" class="btn btn-lg btn-block btn-outline-dark" style="cursor: pointer;">Mis Pedidos <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
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
        		$('#btnPerfil').toggleClass('active');
            	$('#perfil').toggle('slow');     
			});                   
        });
	</script>
</body>
</html>