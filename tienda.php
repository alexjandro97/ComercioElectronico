<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="img/icono.png">
    <link href="css/estilos.css" rel="stylesheet" type="text/css"/>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <title>Cadabra - Tienda</title>
    <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<nav class="col-md-12 navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
				<a href="tienda.php" class="navbar-brand">Cadabra</a>
				<ul class="navbar-nav">
					<li class="nav-item">
						<a href="#" class="nav-link">Inicio</a>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-link">Mis Pedidos</a>
					</li>
					<li class="nav-item dropdown">
						<a href="#" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">Categorías</a>
						<div class="dropdown-menu">
							<a href="#" class="dropdown-item">Guantes</a>
							<a href="#" class="dropdown-item">Balones</a>
						</div>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-link">Perfil</a>
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
				<h1 class="text-center">Bienvenido a Cadabra</h1>
				<hr>
				<p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae delectus, non possimus, cum neque laudantium quod facere. Natus quam hic molestias quisquam neque quae porro iste, ipsam, sapiente, numquam laborum.</p>
			</div>
			<div class="col"></div>
		</div>
		<div class="row">
			<div class="jumbotron col-xs-12">
				<div class="card col-md-3" style=" float: left; margin: 5px 5px;">
					<img src="img/fondo.jpg" alt="producto" class="img-fluid card-img-top">
					<div class="card-body">
						<h4 class="card-title">Guantes estrujenbajen</h4>
						<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas voluptatem facilis inventore similique delectus </p>
						<form class="form-inline">
							<div class="btn-group">
								<a href="#" class="btn btn-primary">Comprar</a>
								<input type="number" class="form-control" min="1" max="20">
								<label class="form-control-static">15.95€</label>
							</div>
						</form>
					</div>
				</div>
				<div class="card col-md-3" style=" float: left; margin: 5px 0px;">
					<img src="img/guantes.jpg" alt="producto" class="img-fluid card-img-top">
					<div class="card-body">
						<h4 class="card-title">Guantes wasoski</h4>
						<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas voluptatem facilis inventore similique delectus </p>
						<form class="form-inline">
							<div class="btn-group">
								<a href="#" class="btn btn-primary">Comprar</a>
								<input type="number" class="form-control" min="1" max="20">
								<label class="form-control-static">65.95€</label>
							</div>
						</form>
					</div>
				</div>
				<div class="card col-md-3" style=" float: left; margin: 5px 5px;">
					<img src="img/icono.png" alt="producto" class="img-fluid card-img-top">
					<div class="card-body">
						<h4 class="card-title">Guantes mike <span class="badge badge-danger">New</span></h4>
						<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas voluptatem facilis inventore similique delectus </p>
						<form class="form-inline">
							<div class="btn-group">
								<a href="#" class="btn btn-primary">Comprar</a>
								<input type="number" class="form-control" min="1" max="20">
								<label class="form-control-static">10.95€</label>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>