<?php

$host = "localhost"; 
$db = "id7810544_agencia_de_viajes";      
$user = "id7810544_datosviajesanjose"; 
$pw = "micorreo3"; 

$idToGet = $_GET['idToSend'];

$cone=mysqli_connect($host,$user,$pw,$db);

$sql= "SELECT * FROM bloqueos WHERE id_bloqueos = $idToGet";

	$resultado = mysqli_query($cone,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Actualizar Bloqueo</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Roboto:300,400,500" rel="stylesheet">
	<link rel="stylesheet" href="../css/fontello.css">
	<link rel="stylesheet" href="../css/estilos.css">
	<style>
		.titulo{
			text-align: center;
			padding-bottom: 25px; 
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
	<title>Actualizar bloqueos</title>
</head>
<body>
	<div class="container-fluid">
		
		<div class="row">
			<div class="barra-lateral col-12 col-sm-auto">
				<div class="logo">
					<div class="title">
						<h2>Menu</h2>
					</div>
					
				</div>
				<nav class="menu d-flex d-sm-block justify-content-center flex-wrap">
					<a href="../principal.html"><i class="icon-home"></i><span>Inicio</span></a>
					<a href="../CLientes/ClientesPrincipal.php"><i class="icon-users"></i><span>Clientes</span></a>
					<a href="../Empleados/EmpleadosPrincipal.php"><i class="icon-users"></i><span>Empleados</span></a>
					<a href="../Bloqueos/BloqueosPrincipal.php"><i class="icon-doc-text"></i><span>Bloqueos</span></a>
				</nav>
			</div>

	<main class="main col">
						<div class="row">
							<div class="botones-superiores col-10">
								<div class="widget nueva_entrada">
									<div class="titulo">
										<h1>Actualizar bloqueos</h1>
									</div>
										<form action="../../PHP/PHPBloqueos/modificarBloqueo.php" method="POST">

                 	<?php
						while ($fila = mysqli_fetch_array($resultado)){
								?>

					<div class="form-group row">
						<div class="col-12 col-md-6 mb-3">
						<label for="id">Identificador</label>
						<input type="text" class="form-control" placeholder="ID" name="id" id="id" readonly="" value="<?php echo $fila['id_bloqueos']; ?>">
					</div>
						<div class="col-12 col-md-6 mb-3">
						<label for="entrada">Entrada</label>
						<input type="text" class="form-control" placeholder="Entrada del bloqueo" name="fecha_entrada" id="fecha_entrada" value="<?php echo $fila['fecha_entrada']; ?>">
					</div>
					</div>

					<div class="form-group row">
						<div class="col-12 col-md-6 mb-3">
						<label for="salida">Salida</label>
						<input type="text" class="form-control" placeholder="Salida del bloqueo" name="fecha_salida" id="fecha_salida" value="<?php echo $fila['fecha_salida']; ?>">
					</div>
					<div class="col-12 col-md-6 mb-3">
						<label for="destino">Lugar</label>
						<input type="text" class="form-control" placeholder="Lugar destino" name="lugar" id="lugar" value="<?php echo $fila['lugar']; ?>">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-12 col-md-6 mb-3">
						<label for="hotel">Hotel</label>
						<input type="text" class="form-control" placeholder="Hotel Destino" name="hotel" id="hotel" value="<?php echo $fila['hotel']; ?>">
					</div>
					<div class="col-12 col-md-6 mb-3">
						<label for="total">Habitaciones totales</label>
						<input type="text" class="form-control" placeholder="Numero de habitaciones totales" name="habit_total" id="habit_total" value="<?php echo $fila['habit_total']; ?>">
					</div>
					
				</div>
				<div class="form-group row">
					<div class="col-12 col-md-6 mb-3">
						<label for="dispo">Habitaciones Disponibles</label>
						<input type="text" class="form-control" placeholder="Numero de habitaciones disponibles" name="habit_dispo" id="habit_dispo" value="<?php echo $fila['habit_dispo']; ?>">
					</div>

				</div>
							<?php
								}
									?>
										<button class="btn btn-primary" type="submit" name="actualizar">Actualizar</button>
										<button class="btn btn-primary" type="submit" name="eliminar">Eliminar</button>
										<button  class="btn btn-primary" type="reset">Resetear</button>
										<button class="btn btn-primary" type="button" onclick="location.href='javascript:history.back(-1);'">Regresar</button>
										</form>
								</div>
							</div>
						</div>

				
		</main>
	</div>
</div>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>