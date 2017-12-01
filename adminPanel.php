<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Atomic+Age" rel="stylesheet">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="shortcut icon" href="img/icono.png">
    <link href="css/estilosPanel.css" rel="stylesheet" type="text/css"/>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <title>Cadabra - Panel de Administración</title>
    <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<?php $user = $_GET['usuario']; ?>
</head>
<body>
	<div class="contenedor">
		<div class="row fixed-top">
			<div class="col-2" id="itemsPanel">
				<div class="list-group">
				  	<a href="adminPanel.php" class="list-group-item list-group-item-action" style="font-family: 'Atomic Age', cursive; font-size: 40px;">Cadabra</a>
				  	<p class="list-group-item list-group-item-action text-center" style="font-family: 'Atomic Age', cursive;">Hola, <?php echo $user; ?></p>
				  	<button href="adminPanel.php?usuario=$user" class="btn separacion btn-block btn-outline-dark" id="home">Inicio</button>
					<button class="btn separacion btn-block btn-outline-dark" id="agregar">Añadir Articulos</button>
					<button class="btn separacion btn-block btn-outline-dark" id="borrar">Borrar Articulos</button>
					<a href="cerrarSesion.php" class="btn separacion btn-block btn-outline-dark">Cerrar Sesión</a>
				</div>
			</div>
			<div class="col-10">
				<div>
					<h1 class="text-center">Panel de administración</h1>
					<hr>
					<div class="row">
						<div class="col"></div>
						<!-- BIENVENIDA -->
						<div class="jumbotron col-5" id="bienvenido">
							<h2 class="text-center">Bienvenido</h2>
							<hr>
							<strong>Este es el Panel de Administración, solo puedes acceder a él con el Usuario Root, si no eres Root.... ¡Vete de aquí ahora mismo!</strong>
						</div>
						<!-- FIN BIENVENIDA -->
						<!-- ADD Product -->
						<div class="jumbotron col-6" id="insertarArticulo">
							<h5>Nuevo Articulo</h5>
							<form action="insertarArticulos.php" method="POST" class="form-control">
								<div class="form-group">
									<label for="titulo">Titulo</label>
									<input type="text" name="titulo" id="titulo" class="form-control">
								</div>
								<div class="form-group">
									<label for="descripcion">Descripción</label>
									<textarea name="descripcion" id="descripcion" class="form-control"></textarea>
								</div>
								<div class="form-group">
									<label for="precio">Precio</label>
									<input type="number" name="precio" id="precio" min="0" placeholder="€" class="form-control">
								</div>
								<div class="form-group">
									<label for="imagen">Imagen</label>
									<input type="file" name="imagen" id="imagen">
								</div>
								<div class="form-group"><button class="form-control btn btn-block btn-success">Crear Producto</button></div>
							</form>
						</div>
						<!-- FIN ADD PRODUCT -->
						<!-- DELETE PRODUCT -->
						<div class="jumbotron col-6" id="borrarArticulo">
							<h5>Borrar Articulo</h5>
							<form action="borrarArticulos.php" method="POST" class="form-control">
								<div class="form-group">
									<label for="titulo">Titulo</label>
									<input type="text" name="titulo" id="titulo" class="form-control">
								</div>
								<div class="form-group">
									<label for="descripcion">Descripción</label>
									<textarea name="descripcion" id="descripcion" class="form-control"></textarea>
								</div>
								<div class="form-group">
									<label for="precio">Precio</label>
									<input type="number" name="precio" id="precio" min="0" placeholder="€" class="form-control">
								</div>
								<div class="form-group">
									<label for="imagen">Imagen</label>
									<input type="file" name="imagen" id="imagen">
								</div>
								<div class="form-group"><button class="form-control btn btn-block btn-success">Crear Producto</button></div>
							</form>
						</div>
						<div class="col"></div>
					</div>					
				</div>
			</div>
		</div>
	</div>	
	<script>

		$(document).ready(function()
        {
			$('#home').on("click", function(){
        		$('#insertarArticulo').fadeOut('slow');
        		$('#borrarArticulo').fadeOut('slow');
            	$('#bienvenido').toggle('slow');     
			});

        	$('#agregar').on("click", function(){
        		$('#bienvenido').fadeOut('slow');
            	$('#borrarArticulo').fadeOut('slow');
            	$('#insertarArticulo').toggle('slow');     
			});   

			$('#borrar').on("click", function(){
        		$('#bienvenido').fadeOut('slow');
            	$('#insertarArticulo').fadeOut('slow'); 
            	$('#borrarArticulo').toggle('slow');     
			});                 
        });
	</script>
</body>
</html>