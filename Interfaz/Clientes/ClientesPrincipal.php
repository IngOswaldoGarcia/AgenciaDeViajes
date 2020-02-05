

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Clientes</title>
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
	<title>Clientes</title>
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
					<a href="../Empleados/EmpleadosPrincipal.php"><i class="icon-users"></i><span>Empleados</span></a>
					<a href="../Bloqueos/BloqueosPrincipal.php"><i class="icon-doc-text"></i><span>Bloqueos</span></a>
				</nav>
			</div>

	<main class="main col">
						<div class="row">
							<div class="botones-superiores col-10">
								<div class="widget nueva_entrada">
									<div class="titulo">
										<h1>Clientes</h1>
									</div>
										
										
										<button class="btn btn-primary" type="button" onclick="location.href='NuevoCliente.html'">Agregar Nuevo Cliente</button>
										
								</div>
							</div>
						</div>

						<div class="tabla">
						<div class="row">
							<div class="col-12">
								<div class="widget nueva_entrada">
									<h2>Clientes</h2>
									<form action="">
											<div class="form-1-2">
										<input type="text" placeholder="Ingrese datos sobre el cliente a buscar" id="caja_busqueda" onKeypress="if(event.keyCode == 13) event.returnValue = false">
										</div>
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
</body>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="../../JS/JSClientes/jquery.min.js"></script>
	<script src="../../JS/JSClientes/buscarClientes.js"></script>
</body>
</html>