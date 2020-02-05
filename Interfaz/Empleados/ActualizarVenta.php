
<?php

$host = "localhost"; 
$db = "id7810544_agencia_de_viajes";      
$user = "id7810544_datosviajesanjose"; 
$pw = "micorreo3"; 

$idToGet = $_GET['idToSend'];

$cone=mysqli_connect($host,$user,$pw,$db);

$sql= "SELECT * FROM ventas WHERE id_ventas = $idToGet";

	$resultado = mysqli_query($cone,$sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Actualizar Venta</title>
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
					<a href="../ClientesPrincipal.php"><i class="icon-users"></i><span>Clientes</span></a>
					<a href="EmpleadosPrincipal.php"><i class="icon-users"></i><span>Empleados</span></a>
					<a href="../Bloqueos/BloqueosPrincipal.php"><i class="icon-doc-text"></i><span>Bloqueos</span></a>
				</nav>
			</div>
			<main class="main col">
						<div class="row">
							<div class="botones-superiores col-10">
								<div class="widget nueva_entrada">
									<div class="titulo">
										<h1>Actualizar Venta</h1>
									</div>
		<form action="../../PHP/PHPEmpleados/modificarVenta.php" method="POST">
			<?php
				while ($fila = mysqli_fetch_array($resultado)){
				?>
			<div class="form-group">
						<label for="id">Identificador</label>
						<input type="text" class="form-control" placeholder="" name="idVenta" id="idVenta" readonly="" value="<?php echo $fila['id_ventas']; ?>">
					</div>

			<div class="form-group">
						<label for="id">Identificador del empleado</label>
						<input type="text" class="form-control" placeholder="ID cliente" name="idEmpleado" id="idEmpleado" readonly="" value="<?php echo $fila['id_empleado']; ?>">
					</div>

			<div class="form-group">
						<label for="nombre">Nombre</label>
						<input type="text" class="form-control" placeholder="" name="nombre" id="nombre" value="<?php echo $fila['venta_nombre_cliente']; ?>">
					</div>

					<div class="form-group">
						<label for="apellido">Apellidos</label>
						<input type="text" class="form-control" placeholder="" name="apellidos" id="apellidos" value="<?php echo $fila['venta_apellidos_cliente']; ?>">
					</div>

					<div class="form-group">
						<label for="lugar">Lugar</label>
						<input type="text" class="form-control" placeholder="" name="lugar" id="lugar" value="<?php echo $fila['venta_lugar']; ?>">
					</div>

					<div class="form-group">
						<label for="fecha">Fecha</label>
						<input type="text" class="form-control" placeholder="" name="fecha" id="fecha" value="<?php echo $fila['venta_fecha_evento']; ?>">
					</div>
					<?php
						}
							?>

					<button  class="btn btn-primary" type="submit" name="actualizar">Actualizar</button>
					<button  class="btn btn-primary" type="submit" name="eliminar">Eliminar</button>
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
	<script src="js/bootstrap.min.js"></script>
</body>
</html>