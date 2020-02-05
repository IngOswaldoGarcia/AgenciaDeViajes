<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Agregar Reservacion</title>
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
										<h1>Nueva reservacion</h1>
									</div>
										 	<form action="../../PHP/PHPClientes/nuevaReservacion.php" method="POST" enctype="multipart/form-data">

					<div class="form-group">
						<label for="destino">ID cliente</label>
						<input type="text" required class="form-control" readonly="" name="idCliente" id="idCliente" value="<?php echo $_POST['idCliente']?>">
					</div>

					<div class="form-group">
						<label for="destino">Destino</label>
						<input type="text" required class="form-control" placeholder="Destino o lugar" name="destino" id="destino">
					</div>

					<div class="form-group">
						<label for="hotel">Hotel</label>
						<input type="text" required class="form-control" placeholder="Hotel o Alojamiento" name="hotel" id="hotel">
					</div>

					<div class="form-group">
						<label for="fechasReserva">Fecha de reserva</label>
						<input type="text" required class="form-control" placeholder="Fecha de reserva" name="fechaReserva" id="fechaReserva">
					</div>

					<div class="form-group">
						<label for="fechas">Fechas</label>
						<input type="text" required class="form-control" placeholder="Fechas del evento" name="fechas" id="fechas">
					</div>
					
					<div class="form-group">
						<label for="asesor">Agente asesor</label>
						<input type="text" required class="form-control" placeholder="Agente asesor o asesores" name="asesor" id="asesor">
					</div>

				<div class="form-group row">
					<div class="col-12 col-md-6 mb-3">
						<label for="adultos">Adultos</label>
						<input type="text" required class="form-control" placeholder="Numero de Adultos" name="numAdultos" id="numAdultos">
					</div>
					<div class="col-12 col-md-6 mb-3">
						<label for="Menores">Menores</label>
						<input type="text" required class="form-control" placeholder="Numero de Menores" name="numMenores" id="numMenores">
					</div>
					<div class="col-12 col-md-6 mb-3">
						<label for="habitaciones">Habitaciones</label>
						<input type="text" required class="form-control" placeholder="Numero de Habitaciones" name="numHabitaciones" id="numHabitaciones">
					</div>
				</div>
				<div class="col-12 col-md-6 mb-3">
						<label for="fotos">Fotografias de los pagos</label>
						<input name="imagen[]" id="imagen[]" required type="file" multiple>
					</div>
					<div class="form-group">
						<label for="comentario">Comentarios</label>
						<textarea name="comentarios" id="comentarios" placeholder="MAX. 400 caracteres..." class="form-control"></textarea>
					</div>
					<button  class="btn btn-primary" type="submit">Guardar</button>
					<button  class="btn btn-primary" type="reset">Limpiar</button>
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