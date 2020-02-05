<?php

$host = "localhost"; 
$db = "id7810544_agencia_de_viajes";      
$user = "id7810544_datosviajesanjose"; 
$pw = "micorreo3"; 

$idToGet = $_GET['idToSend'];

$cone=mysqli_connect($host,$user,$pw,$db);

$sql = "SELECT * FROM imagenes WHERE id_imagenes = $idToGet";

	$resultado = mysqli_query($cone,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../Interfaz/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Roboto:300,400,500" rel="stylesheet">
	<link rel="stylesheet" href="../../Interfaz/css/fontello.css">
	<link rel="stylesheet" href="../../Interfaz/css/estilos.css">
	<title>	Imagenes</title>
</head>
<body>
	<center>
	<div>
		<?php
		while ($fila = mysqli_fetch_array($resultado)){
		?>
		<img height="600px" src="<?php echo $fila['path_imagen']; ?>"/></a>
		
	</div>
	<div>
		<a href="eliminarImagen.php?idToSend=<?php echo $fila['id_imagenes']?>&pathImagen=<?php echo $fila['path_imagen']?>" class="btn btn-primary">Borrar Foto</a>
		<?php
		}
		?>
	</div>
	</center>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="../../Interfaz/js/bootstrap.min.js"></script>
</body>
</html>