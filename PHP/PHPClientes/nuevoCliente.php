<!DOCTYPE html>
<html>
<head></head>
<body>

<?php
$host = "localhost"; 
$db = "id7810544_agencia_de_viajes";      
$user = "id7810544_datosviajesanjose"; 
$pw = "micorreo3"; 

$folio = $_POST['folio'];
$nombre = $_POST['nombre']; 
$apellidos = $_POST['apellidos']; 
$telefono = $_POST['telefono']; 
$email = $_POST['email']; 
$ciudad = $_POST['ciudad']; 

$con = mysqli_connect($host,$user,$pw,$db) or die ("no conecta al servidor local");

mysqli_select_db($con,$db) or die ("no conecta con la base de datos");

$sql="INSERT INTO clientes (folio_cliente, nombre_cliente, apellidos_cliente, telefono_cliente, correo_cliente, ciudad_cliente) VALUES ('$folio','$nombre','$apellidos','$telefono','$email','$ciudad')";
$resultado = mysqli_query($con, $sql);

	echo '<script>
	alert("Datos guardados correctamente");
		window.history.go(-2);
		</script>';
?>
</body>
</html>