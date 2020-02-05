<?php

$host = "localhost"; 
$db = "id7810544_agencia_de_viajes";      
$user = "id7810544_datosviajesanjose"; 
$pw = "micorreo3"; 

$idToGet = $_GET['idToSend'];

$cone=mysqli_connect($host,$user,$pw,$db);

$sql= "SELECT * FROM clientes WHERE id_cliente = $idToGet";

	$resultado = mysqli_query($cone,$sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Actualizar Cliente</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Roboto:300,400,500" rel="stylesheet">
	<link rel="stylesheet" href="../css/fontello.css">
	<link rel="stylesheet" href="../css/estilos.css">
	<style>

		.titulo{
			text-align: center;
			padding-bottom: 25px; 
		}
		.tabla{
			padding-top: 50px;
		}
		table {
		    font-family: arial, sans-serif;
		    border-collapse: collapse;
		    width: 100%;
		}

		td, th {
		    border: 1px solid #dddddd;
		    text-align: center;
		    padding: 8px;
		}

		tr:nth-child(even) {
		    background-color: #dddddd;
		}
	</style>
</head>
<body>

<div class="container-fluid">
		
		<div class="row">
			<div class="barra-lateral col-12 col-sm-auto">
				<div class="logo">
					<h2>Menu</h2>
				</div>
				<nav class="menu d-flex d-sm-block justify-content-center flex-wrap">
					<a href="../principal.html"><i class="icon-home"></i><span>Inicio</span></a>
					<a href="ClientesPrincipal.php"><i class="icon-users"></i><span>Clientes</span></a>
					<a href="../Empleados/EmpleadosPrincipal.php"><i class="icon-users"></i><span>Empleados</span></a>
					<a href="../Bloqueos/BloqueosPrincipal.php"><i class="icon-doc-text"></i><span>Bloqueos</span></a>
				</nav>
			</div>
			<main class="main col">
						<div class="row">
							<div class="botones-superiores col-10">
								<div class="widget nueva_entrada">
									<div class="titulo">
										<h1>Actualizar Cliente</h1>
									</div>
		<form action="../../PHP/PHPClientes/modificarCliente.php" method="POST">

				<?php
				while ($fila = mysqli_fetch_array($resultado)){
				?>
			<div class="form-group row">
				<div class="col-12 col-md-6 mb-3">
						<label for="id">Identificador</label>
						<input type="text" required class="form-control" placeholder="id" name="id" id="id" readonly="" value="<?php echo $fila['id_cliente']; ?>">
					</div>
				<div class="col-12 col-md-6 mb-3">
						<label for="folio">Numero de Folio</label>
						<input type="text" required class="form-control" placeholder="folio" name="folio" id="folio" value="<?php echo $fila['folio_cliente']; ?>">
					</div>
				</div>

			<div class="form-group row">
					<div class="col-12 col-md-6 mb-3">
						<label for="nombre">Nombre</label>
						<input type="text" required class="form-control" placeholder="Nombre" name="nombre" id="nombre" value="<?php echo $fila['nombre_cliente']; ?>">
					</div>
					<div class="col-12 col-md-6 mb-3">
						<label for="apellidos">Apellidos</label>
						<input type="text" required class="form-control" placeholder="Apellidos" name="apellidos" id="apellidos" value="<?php echo $fila['apellidos_cliente']; ?>">
					</div>
					
			</div>

			<div class="form-group row">
					<div class="col-12 col-md-6 mb-3">
						<label for="email">Correo Electronico</label>
						<input type="text" required class="form-control" placeholder="Correo" name="email" id="email" value="<?php echo $fila['correo_cliente']; ?>">
					</div>
					<div class="col-12 col-md-6 mb-3">
						<label for="telefono">Numero de Telefono</label>
						<input type="text" required class="form-control" placeholder="Telefono" name="telefono" id="telefono" value="<?php echo $fila['telefono_cliente']; ?>">
					</div>
			</div>
			<div class="form-group row">
					<div class="col-12 col-md-6 mb-3">
						<label for="city">Ciudad</label>
						<input type="text"required class="form-control" placeholder="Ciudad" name="ciudad" id="ciudad" value="<?php echo $fila['ciudad_cliente']; ?>">
					</div>
			</div>

					<button  class="btn btn-primary" type="submit" name="actualizar" value="actualizar">Actualizar</button>
					<button  class="btn btn-primary" type="submit" name="eliminar" value="eliminar">Eliminar</button>
					<button  class="btn btn-primary" type="reset">Resetear</button>
					<button class="btn btn-primary" type="button" onclick="location.href='javascript:history.back(-1);'">Regresar</button>
				</form>


					<form action="AgregarReservacion.php" method="POST">
						<div class="col-12 col-md-6 mb-3">
							<input type="text" class="form-control" name="idCliente" id="idCliente" readonly="" style="visibility:hidden" value="<?php echo $fila['id_cliente']; ?>">
						</div>						
						<?php
							}
								?>
								<button class="btn btn-primary" type="submit">Agregar Reservacion</button>
					</form>

								</div>
							</div>
						</div>
						<div class="tabla">
						<div class="row">
							<div class="col-12">
								<div class="widget nueva_entrada">
									<h2>Reservaciones</h2>
									<form>
										<input type="text" placeholder="Ingrese datos sobre la reservacion a buscar" id="caja_busqueda" onKeypress="if(event.keyCode == 13) event.returnValue = false">
									</form>
									<div id= "datos">
										
									</div>
								</div>
							</div>
						</div>
					</div>
					</main>


		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../../JS/JSClientes/jquery.min.js"></script>
	<script src="../../JS/JSClientes/buscarReservaciones.js"></script>
</body>
</html>