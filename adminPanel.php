<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Atomic+Age" rel="stylesheet">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="shortcut icon" href="img/icono.png">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="css/estilosPanel.css" rel="stylesheet" type="text/css"/>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <title>Cadabra - Panel de Administración</title>
    <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<?php $user = $_GET['usuario']; ?>
	<style>
		table {width: 500px; text-align: center;}
		td, th {
			border: 1px solid #000;
			width: 150px;
			height: 40px;
		}
		tr:nth-child(even) {background-color: #f2f2f2;}
		.notFound {display: none;}
	</style>
</head>
<body>
	<div class="contenedor">
		<div class="row fixed-top">
			<div class="col-2" id="itemsPanel">
				<div class="list-group">
				  	<a href="adminPanel.php?usuario=<?php echo $user; ?>" class="list-group-item list-group-item-action" style="font-family: 'Atomic Age', cursive; font-size: 40px;">Cadabra</a>
				  	<p class="list-group-item list-group-item-action text-center" style="font-family: 'Atomic Age', cursive;">Hola, <?php echo $user; ?></p>
				  	<a href="adminPanel.php?usuario=<?php echo $user; ?>" class="btn separacion btn-block btn-outline-dark" id="home">Inicio</a>
					<button class="btn separacion btn-block btn-outline-dark" id="agregar">Añadir Articulos</button>
					<button class="btn separacion btn-block btn-outline-dark" id="modificar">Modificar/Consulta Articulos</button>
					<button class="btn separacion btn-block btn-outline-dark" id="borrar">Borrar Articulos</button>
					<a href="tienda.php?usuario=<?php echo $user; ?>" class="btn separacion btn-block btn-outline-dark">Entrar a Cadabra</a>
					<a href="cerrarSesion.php" class="btn separacion btn-block btn-outline-dark">Cerrar Sesión</a>
				</div>
			</div>
			<div class="col-10" id="scroll">
				<div>
					<div class="row">
						<div class="col"></div>
						<!-- BIENVENIDA -->
						<div class="jumbotron col-5" id="bienvenido">
							<h2 class="text-center">Bienvenido</h2>
							<hr>
							<strong>Este es el Panel de Administración, solo puedes acceder a él con el Usuario Root, si no eres Root.... ¡Vete de aquí ahora mismo!</strong>
						</div>
						<div class="col"></div>
						</div>
						<div class="row">
							<div class="col"></div>
							<div class="col-5 productosBuscados">
							<?php 	if (!empty($_GET['nomProducto']) && !empty($_GET['precio']) && !empty($_GET['stock'])) {
											$nombre = $_GET['nomProducto'];
											$precio = $_GET['precio'];
											$stock = $_GET['stock'];
											$ref = $_GET['ref'];
											echo "
											<h3 class='text-center'> Resultado Consulta </h3>
												<table>
													<tr>
														<th>Nº Referencia</th>
														<td>$ref</td>
													</tr>
													<tr>
														<th>Nombre</th>
														<td>$nombre</td>
													</tr>
													<tr>
														<th>Precio</th>
														<td>$precio</td>
													</tr>
													<tr>
														<th>stock</th>
														<td>$stock</td>
													</tr>
												</table>";
										}
	 							?>
							<div class="col"></div>
							</div>
						<!-- FIN BIENVENIDA -->
						<!-- ADD Product -->
						<div class="jumbotron col-6" id="insertarArticulo">
							<h5 class="text-center">Nuevo Articulo</h5>
							<form action="insertarArticulos.php" method="POST" class="form-control" enctype="multipart/form-data">
								<div class="form-group">
									<label for="referencia">Referencia</label>
									<input type="number" name="referencia" id="referencia" class="form-control">
								</div>
								<div class="form-group">
									<label for="titulo">Nombre Producto</label>
									<input type="text" name="titulo" id="titulo" class="form-control">
								</div>
								<div class="form-group">
									<label for="descripcion">Descripción</label>
									<textarea name="descripcion" id="descripcion" class="form-control"></textarea>
								</div>
								<div class="form-group">
									<label for="stock">Stock</label>
									<input type="number" name="stock" id="stock" class="form-control"></textarea>
								</div>
								<div class="form-group">
									<label for="precio">Precio</label>
									<input type="number" name="precio" id="precio" min="0" placeholder="€" step="any" class="form-control">
								</div>
								<div class="row">
									<div class="form-group col-6">
										<label for="foto" id="labelImage"><i class="fa fa-cloud-upload" aria-hidden="true"></i>Subir Imagen</label>
										<input type="file" id="foto" name="foto">
									</div>
									<div class="form-group col-6">
										<button class="btn btn-block btn-success">Crear Producto</button>
										<input class="btn btn-block btn-danger" type="reset" value="Salir Sin Grabar">
									</div>
								</div>
							</form>
						</div>
						<!-- FIN ADD PRODUCT -->
						<!-- CONSULTA / MODIFICACION DE ARTICULOS -->
							<div class="jumbotron col-6" id="buscarArticulo">
							<h5 class="text-center">Buscar Articulo</h5>
							<form action="buscarArticulos.php" method="POST" class="form-control">
								<div class="form-group">
									<label for="referencia">Número de Referencia:</label>
									<input type="text" name="referencia" id="referencia" class="form-control">
								</div>
								<div class="form-group"><button class="form-control btn btn-block btn-success">Buscar Producto</button><input type="reset" class="form-control btn btn-block btn-danger" value="Salir Sin Grabar"></div>
							</form>
							<div class="producto">
							</div>
						</div>
						<!-- FIN CONSULTA / MODIFICACION DE ARTICULOS -->
						<!-- DELETE PRODUCT -->
						<div class="jumbotron col-6" id="borrarArticulo">
							<h5 class="text-center">Borrar Articulo</h5>
							<form action="borrarArticulos.php" method="POST" class="form-control">
								<div class="form-group">
									<label for="referencia">Referencia</label>
									<input type="text" name="referencia" id="referencia" class="form-control">
								</div>
								<div class="form-group"><button class="form-control btn btn-block btn-success">Borrar Producto</button><input type="reset" class="form-control btn btn-block btn-danger" value="Salir Sin Grabar"></div>
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
            	$('#bienvenido').fadeIn('slow'); 
            	$('#buscarArticulo').fadeOut('slow');
            	$('.productosBuscados').fadeOut('quick');    
			});

        	$('#agregar').on("click", function(){
        		$('#bienvenido').fadeOut('slow');
            	$('#borrarArticulo').fadeOut('slow');
            	$('#insertarArticulo').fadeIn('slow'); 
            	$('#buscarArticulo').fadeOut('slow');
            	$('.productosBuscados').fadeOut('quick');    
			});   

			$('#borrar').on("click", function(){
        		$('#bienvenido').fadeOut('slow');
            	$('#insertarArticulo').fadeOut('slow'); 
            	$('#borrarArticulo').fadeIn('slow'); 
            	$('#buscarArticulo').fadeOut('slow');
            	//$('.productosBuscados').fadeOut('quick');    
			});   
			$('#modificar').on("click", function(){
        		$('#bienvenido').fadeOut('slow');
            	$('#insertarArticulo').fadeOut('slow'); 
            	$('#borrarArticulo').fadeOut('slow');
            	$('#buscarArticulo').fadeIn('slow');
            	$('.productosBuscados').fadeOut('quick');     
			});              
        });
	</script>
</body>
</html>