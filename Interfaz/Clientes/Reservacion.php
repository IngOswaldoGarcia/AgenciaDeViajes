<?php

$host = "localhost"; 
$db = "id7810544_agencia_de_viajes";      
$user = "id7810544_datosviajesanjose"; 
$pw = "micorreo3"; 

$idToGet = $_GET['idToSend'];

$cone=mysqli_connect($host,$user,$pw,$db);

$sql= "SELECT * FROM reservaciones WHERE id_reservaciones = $idToGet";
$sql2 = "SELECT * FROM imagenes WHERE id_reservacion = $idToGet";

	$resultado = mysqli_query($cone,$sql);
	$resultado2 = mysqli_query($cone,$sql2);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Actualizar Reservacion</title>
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
										<h1>Actualizar Reservacion</h1>
									</div>
										 	<form action="../../PHP/PHPClientes/modificarReservacion.php" method="POST" enctype="multipart/form-data">
				<?php
				while ($fila = mysqli_fetch_array($resultado)){
				?>
					<div class="form-group">
						<label for="id">Identificador</label>
						<input type="text" class="form-control" placeholder="ID" name="idReservacion" id="idReservacion" readonly="" value="<?php echo $fila['id_reservaciones']; ?>">
					</div>
					<div class="form-group">
						<label for="id">Identificador del cliente</label>
						<input type="text" class="form-control" placeholder="ID cliente" name="idCliente" id="idCliente" readonly="" value="<?php echo $fila['id_cliente_reservacion']; ?>">
					</div>
					<div class="form-group">
						<label for="destino">Destino</label>
						<input type="text" class="form-control" placeholder="Destino o lugar" name="destino" id="destino" value="<?php echo $fila['destino_reservacion']; ?>">
					</div>

					<div class="form-group">
						<label for="hotel">Hotel</label>
						<input type="text" class="form-control" placeholder="Hotel o Alojamiento" name="hotel" id="hotel" value="<?php echo $fila['hotel_reservacion']; ?>">
					</div>

					<div class="form-group">
						<label for="fechasReserva">Fecha de reserva</label>
						<input type="text" class="form-control" placeholder="Fecha de reserva" name="fechaReserva" id="fechaReserva" value="<?php echo $fila['fecha_reservacion']; ?>">
					</div>

					<div class="form-group">
						<label for="fechas">Fechas</label>
						<input type="text" class="form-control" placeholder="Fechas del evento" name="fechas" id="fechas" value="<?php echo $fila['fecha_evento_reservacion']; ?>">
					</div>
					
					<div class="form-group">
						<label for="asesor">Agente asesor</label>
						<input type="text" class="form-control" placeholder="Agente asesor o asesores" name="agente" id="agente" value="<?php echo $fila['asesor_reservacion']; ?>">
					</div>

					<div class="form-group row">
					<div class="col-12 col-md-6 mb-3">
						<label for="pagosCliente">Pagos del cliente</label>
						<input type="text" class="form-control" placeholder="Numero de pagos del cliente" name="pagosCliente" id="pagosCliente" value="<?php echo $fila['pagos_cliente_reservacion']; ?>">
					</div>
					<div class="col-12 col-md-6 mb-3">
						<label for="pagosAgencia">Pagos de la agencia</label>
						<input type="text" class="form-control" placeholder="Numero de pagos de la ageencia" name="pagosAgencia" id="pagosAgencia" value="<?php echo $fila['pagos_agencia_reservacion']; ?>">
					</div>
				</div>

				<div class="form-group row">
					<div class="col-12 col-md-6 mb-3">
						<label for="adultos">Adultos</label>
						<input type="text" class="form-control" placeholder="Numero de Adultos" name="numAdultos" id="numAdultos" value="<?php echo $fila['num_adultos_reservacion']; ?>">
					</div>
					<div class="col-12 col-md-6 mb-3">
						<label for="Menores">Menores</label>
						<input type="text" class="form-control" placeholder="Numero de Menores" name="numMenores" id="numMenores" value="<?php echo $fila['num_ninos_reservacion']; ?>">
					</div>
					<div class="col-12 col-md-6 mb-3">
						<label for="habitaciones">Habitaciones</label>
						<input type="text" class="form-control" placeholder="Numero de Habitaciones" name="habitaciones" id="habitaciones" value="<?php echo $fila['num_habitaciones_reservacion']; ?>">
					</div>
				</div>

				<div class="form-group row">
					<div class="col-12 col-md-6 mb-3">
						<label for="adultos">Fotografias de los pagos</label>
						<input name="imagen[]" type="file" multiple>
					</div>
				</div>

				<?php
				while ($fila2 = mysqli_fetch_array($resultado2)){
				?>
						<a href="../../PHP/PHPClientes/Imagenes.php?idToSend=<?php echo $fila2['id_imagenes']; ?>"><img height="200px" src="<?php echo $fila2['path_imagen']; ?>"/></a>
			<?php
			}
			?>
					<div class="form-group">
						<label for="comentario">Comentarios</label>
						<textarea name="comentarios" id="comentarios" class="form-control"><?php echo $fila['comentarios_reservacion']; ?></textarea>
					</div>
					<?php
							}
								?>
					<button  class="btn btn-primary" type="submit" name="actualizar" value="actualizar">Actualizar</button>
					<button  class="btn btn-primary" type="submit" name="eliminar" value="eliminar">Eliminar</button>
					<button  class="btn btn-primary" type="reset">Resetear</button>
					<button  class="btn btn-primary" type="submit" name="mail" value="actualizar">Mandar correo</button>
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