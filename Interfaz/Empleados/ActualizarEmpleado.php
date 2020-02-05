<?php

$host = "localhost"; 
$db = "id7810544_agencia_de_viajes";      
$user = "id7810544_datosviajesanjose"; 
$pw = "micorreo3"; 

$idToGet = $_GET['idToSend'];

$cone=mysqli_connect($host,$user,$pw,$db);

$sql= "SELECT * FROM empleados WHERE id_empleados = $idToGet";

	$resultado = mysqli_query($cone,$sql);

$sql= "SELECT * FROM ventas WHERE id_empleado = $idToGet";

	$resul = mysqli_query($cone,$sql);

?>


<!DOCTYPE h<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Actualizar Empleado</title>
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
					<a href="../Clientes/ClientesPrincipal.php"><i class="icon-users"></i><span>Clientes</span></a>
					<a href="EmpleadosPrincipal.php"><i class="icon-users"></i><span>Empleados</span></a>
					<a href="../Bloqueos/BloqueosPrincipal.php"><i class="icon-doc-text"></i><span>Bloqueos</span></a>
				</nav>
			</div>
			<main class="main col">
						<div class="row">
							<div class="botones-superiores col-10">
								<div class="widget nueva_entrada">
									<div class="titulo">
										<h1>Actualizar Empleado</h1>
									</div>
		<form action="../../PHP/PHPEmpleados/modificarEmpleado.php" method="POST">

			<?php
			while ($fila = mysqli_fetch_array($resultado)){
			?>

			<div class="form-group row">
				<div class="col-12 col-md-6 mb-3">
						<label for="id">Identificador</label>
						<input type="text" required class="form-control" placeholder=id" name="id" id="id" readonly="" value="<?php echo $fila['id_empleados']; ?>">
					</div>
				<div class="col-12 col-md-6 mb-3">
						<label for="folio">Numero de Folio</label>
						<input type="text" class="form-control" placeholder="folio" name="folio" id="folio" value="<?php echo $fila['folio']; ?>">
					</div>
				</div>

			<div class="form-group row">
					<div class="col-12 col-md-6 mb-3">
						<label for="nombre">Nombre</label>
						<input type="text" class="form-control" placeholder="Nombre Completo" name="nombre" id="nombre" value="<?php echo $fila['nombre']; ?>">
					</div>

					<div class="col-12 col-md-6 mb-3">
						<label for="apellido">Apellido</label>
						<input type="text" class="form-control" placeholder="Apellido Completo" name="apellidos" id="apellidos" value="<?php echo $fila['apellidos']; ?>">
					</div>
			</div>

			<div class="form-group row">
					<div class="col-12 col-md-6 mb-3">
						<label for="telefono">Telefono</label>
						<input type="text" class="form-control" placeholder="Telefono" name="telefono" id="telefono" value="<?php echo $fila['telefono']; ?>">
					</div>
					<div class="col-12 col-md-6 mb-3">
						<label for="direccion">Direccion</label>
						<input type="text" class="form-control" placeholder="Direccion" name="direccion" id="direccion" value="<?php echo $fila['direccion']; ?>">
					</div>
			</div>
			<div class="form-group row">
					<div class="col-12 col-md-6 mb-3">
						<label for="fechaInicio">Fecha de inicio</label>
						<input type="text" class="form-control" placeholder="Fecha de Inicio" name="fechaInicio" id="fechaInicio" value="<?php echo $fila['fecha_inicio']; ?>">
					</div>
			</div>		
			<div class="form-group row">
						<label for="comentario">Comentarios</label>
						<textarea name="comentarios" id="comentarios" class="form-control"><?php echo $fila['comentarios']; ?></textarea>
					</div>

					<button  class="btn btn-primary" type="submit" name="actualizar">Actualizar</button>
					<button  class="btn btn-primary" type="submit" name="eliminar">Eliminar</button>
					<button  class="btn btn-primary" type="reset">Resetear</button>
					<button class="btn btn-primary" type="button" onclick="location.href='javascript:history.back(-1);'">Regresar</button>
					</form>

						<form action="AgregarVenta.php" method="POST">
						<div class="col-12 col-md-6 mb-3">
							<input type="text" class="form-control" name="idEmpleado" id="idEmpleado" readonly="" style="visibility:hidden" value="<?php echo $fila['id_empleados']; ?>">
						</div>	
						<?php
							}
								?>
								<button class="btn btn-primary" type="submit">Agregar Venta</button>
								
					</form>
								</div>
							</div>
						</div>
						<div class="tabla">
						<div class="row">
							<div class="col-12">
								<div class="widget nueva_entrada">
									<h2>Ventas</h2>
										<form>
										<input type="text" placeholder="Ingrese datos sobre la venta a buscar" id="caja_busqueda" onKeypress="if(event.keyCode == 13) event.returnValue = false">
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
	<script src="../../JS/JSEmpleados/buscarVenta.js"></script>
</body>
</html>